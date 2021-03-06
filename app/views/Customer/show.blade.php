@extends('layouts.master')
@section('header')
@parent
@stop
@section('content')

@section('container1')   
	<h3 class="message">     @if(isset($message))
		{{$message}}
		@endif
	</h3>
    <h3 class="highlight nav nav-stacked ">
        @if($customer->empresa=="")
        {{ $customer->cliente }} 
        @endif
        {{$customer->empresa}}
        <i class="glyphicon glyphicon glyphicon glyphicon-user"></i></h3>
    <div class="comp">  
        <a href="/customer/{{$customer->id}}/profile"> 
            <h2 class="til">{{$customer->cliente}}&nbsp </h2></a>
        <h5>Contacto: {{$customer->contacto}} </h5> 
        <h5>Telefono: {{$customer->telefono}} </h5> 
        <h5>Cliente:          
            @if($customer->tipo_cliente==1) Directo
            @elseif($customer->tipo_cliente==2) Tercero                               
            @endif
        </h5>
        <h5> Nit: {{ $customer->nit_cc}}  </h5>
        <h5>{{ $customer->otro}} </h5>  
    </div>         
    <h5>{{ HTML::link('/customer/'.$customer->id.'/edit','Editar', array('class' => 'btn btn-link'), false)}}</h5> 
    <div class="accordion" id="accordion2">
        <div class="accordion-group">
            <div class="accordion-heading"><h4>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        Correo Electronico
                    </a></h4>
            </div>
            <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <h5>Email: {{ Auth::user()->email}} </h5>
                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading"><h4>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                        Dirección
                    </a></h4>
            </div>
            <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
                    <h5>Direccion: {{ Auth::user()->direccion}} </h5>
                    <h5> Ciudad: {{ Auth::user()->ciudad}} </h5>
                    <h5> Pais: {{ Auth::user()->pais}} </h5>
                </div>
            </div>
        </div>
        <br>
    </div>  
    <br>
    <div id="sidebar"> 
        <div class="list-group">    
            <a href="workorder/create" class="list-group-item  text-center">
                <h5 class="glyphicon glyphicon-plus"></h5><br/><h4 class="cel">Nuevo Trabajo</h4> 
            </a>
            <a href="/phonebook/create" class="list-group-item active text-center">                           
                <h5 class="glyphicon glyphicon-plus"></h5><br/><h4 class="cel">Nuevo Contato </h4>
            </a> 
            <a href="/phonebook" class="list-group-item  text-center">                           
                <h5 class="glyphicon glyphicon-earphone"></h5><br/><h4 class="cel">Contactos | Proveedor</h4>
            </a>
        </div>    
    </div>
  	@stop
	
    @section('container2')
	@parent
	@stop
	
  
 @section('container3')
<div class="col col-sm-9">
    <div class="row "> 
				@if(Session::has('message'))
					<p class="alert alert-info">{{ Session::get('message') }}</p>
				@endif
            <!-- work section -->
                <div class="titulo">
                    <h3 class="glyphicon glyphicon-th-list color" ></h3>
                    <h4> Lista Trabajos</h4>
                </div>
				{{ Form::open(['route' => 'user.index', 'method' => 'GET', 'class' => 'input-group','id' => 'adv-search', 'role' => 'search ']) }}
				{{ Form::text('buscar', null, ['class' => 'form-control','style' => 'text-align:center', 'placeholder' => 'Buscar Trabajos']) }}         		
                    <div class="input-group-btn">
						<div class="btn-group" role="group">
								<div class="dropdown dropdown-lg">
										{{ Form::button('<span class="caret"></span>', array('type' => 'submit', 'data-toggle' => 'dropdown','aria-expanded' => 'false','class' => 'btn btn-default dropdown-toggle ')) }}										
										<div class="dropdown-menu dropdown-menu-right" role="menu">
										  <div class="form-group">
												<label class="radio-inline">
												  <input type="radio" id="clase_trabajo" value="clase_trabajo" checked="checked" /> Produccion 
												</label>
												<label class="radio-inline">
												  <input type="radio" id="clase_trabajo" value="clase_trabajo" checked="checked" /> Listos
												</label>
										  </div>
										  <form id="dateRangeForm" method="post" class="form-horizontal">
												<div class="form-group">											
													<div class="col-xs-6 date">	
														<label class="col-xs-3 control-label"><h6>Fecha Inicial</h6></label>
														<input type='date' id='fecha_entrega' name='fecha_entrega' class='form-control '/>
													</div>
													<div class="col-xs-6 date">	
														<label class="col-xs-3 control-label"> <h6>Fecha Final</h6></label>
														<input type='date' id='fecha_entrega' name='fecha_entrega' class='form-control '/>
													</div>
												</div>
											</form>	
										</div>
								</div>
								
								{{ Form::button('<span class="glyphicon glyphicon-search" aria-hidden="true"></span>', array('type' => 'submit','class' => 'btn btn-primary')) }}
																
						</div>
                    </div>			
           
		   {{ Form::close() }}
              
                <div class="com "><div class="com2 "></div>
                    <div id="scroll" class="panel panel-default slimScrollBar tam">
                        <!-- Default panel contents -->                

                        @foreach($workorder as $worklist)                    
                        <h4><strong> {{ $worklist->clase_trabajo}} | ESTADO TRABAJO
                            <span class="estilo">
                                @if($worklist->estado_trabajo==1) Por realizar                                
                                @elseif($worklist->estado_trabajo==2) Diseño 
                                @elseif($worklist->estado_trabajo==3) Revisión 
                                @elseif($worklist->estado_trabajo==4) Impresion
								@elseif($worklist->estado_trabajo==5) Acabados 
								@elseif($worklist->estado_trabajo==6) Terminado
								@elseif($worklist->estado_trabajo==7) Entregado 
                                @endif 
                            </span>
                        </strong>							
					</h4>					
                    <h5><strong>No. Orden</strong>: {{ $worklist->no_orden}},
						<strong>Orden</strong>: 
								@if($worklist->tipo_orden==1)                                 
								@elseif($worklist->tipo_orden==2) SERVICIO ,
								@elseif($worklist->tipo_orden==3) PRODUCTO ,
								@endif 
						<strong>Fecha Pedido</strong>: {{  $worklist->created_at }},
                        <strong>Fecha Entrega</strong>: {{ $worklist->fecha_entrega}},
						<strong>Trabajo</strong>: 
								@if($worklist->tipo_realizado==1)	                             
								@elseif($worklist->tipo_realizado==2) Diseño Nuevo,
								@elseif($worklist->tipo_realizado==3) Corrección,
								@elseif($worklist->tipo_realizado==4) Quema de Master,
								@elseif($worklist->tipo_realizado==5) Diseño según Muestra,
								@elseif($worklist->tipo_realizado==6) Identidad Corporativa,
								@endif
						<strong>Diseñador</strong>: {{ $worklist->diseñador}},
						<strong>Vendedor</strong>: {{ $worklist->vendedor}},
						<strong>Valor Trabajo</strong>: ${{ $worklist->total}},                         
                        <strong>Abono</strong>: ${{ $worklist->abono }} ,
                        <strong>Saldo</strong>: ${{ $worklist->saldo }}                    
                       
                    </h5> 

                        {{ HTML::link('/workorder/'.$worklist->id.'/edit','Editar', array('class' => 'btn btn-default btn-sm'), false)}}                       

                        {{ HTML::link('/worklist/'.$worklist->id.'/ver','Ver', array('class' => 'btn btn-success btn-sm'), false)}} 

                        {{ Form::close() }}                       

                        <br>
                        <hr>
                        @endforeach
                    </div> 
                </div> 	
      
    </div> 
</div>
<script>

    $('#scroll').slimScroll({
        height: '1070px;',
        size: '5px',
        railColor: '#222',
        height: '1140px',
        railOpacity: 0.3,
        wheelStep: 2,
        allowPageScroll: true
    });
</script> 
@stop@stop

