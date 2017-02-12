@extends('layouts.master')
<head> 
    @section ('title')Trabajo @stop
</head>
@section('header')
@parent
@stop
@section('content')

@section('container1')   
    <h3 class="highlight nav nav-stacked ">{{Auth::user()->razon_social}}</h3>
    <div class="comp">        
        <h2 class="til">{{ Auth::user()->representante}}  </h2>
        <h5> Nit: {{ Auth::user()->nit_cc}}  </h5>
        <h5>Telefono: {{ Auth::user()->telefono}} </h5>
        <h5>Celular: {{ Auth::user()->celular}} </h5>   
        <h5>{{ Auth::user()->otro}} </h5>   
    </div>
    <h5>{{ HTML::link('/user/'.Auth::user()->id.'/edit','Editar', array('class' => 'btn btn-link'), false)}}</h5> 
    <div class="accordion" id="accordion2">
        <div class="accordion-group">
            <div class="accordion-heading"><h4>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        Correo Electronico
                    </a></h4>
            </div>
            <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <h5>{{ Auth::user()->email}}</h5>
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
			<a href="phonebook/create" class="list-group-item  text-center">                           
                <h5 class="glyphicon glyphicon-plus"></h5><br/><h4>Nuevo Contato </h4>
            </a> 
            <a href="/phonebook" class="list-group-item active text-center">
                <h5 class="list-group-item-heading glyphicon glyphicon-earphone"></h5><h4>Contactos | Proveedor</h4>
            </a>
        </div>
    </div>
	@stop
	
    @section('container2')
	@parent
	@stop
	
  
 @section('container3')
<div class="col col-sm-9">
                   
            <!-- work section -->
            <div class="row">
                <div class="titulo">
                    <h3 class="glyphicon glyphicon-th-list color" ></h3>
                    <h4> Trabajos por Realizar</h4>   
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
												  <input type="radio" name="searchType" id="vendedor" value="vendedor" /> Vendedor
												</label>
												<label class="radio-inline">
												  <input type="radio" name="searchType" id="diseñador" value="diseñador" /> Diseñador
												</label>
												<label class="radio-inline">
												  <input type="radio" name="searchType" id="producto" value="producto" /> Producto 
												</label>
												
										  </div>
											
										</div>
								</div>
								
								{{ Form::button('<span class="glyphicon glyphicon-search" aria-hidden="true"></span>', array('type' => 'submit','class' => 'btn btn-primary')) }}
																
						</div>
                    </div>			
           
		   {{ Form::close() }}

                <div class="com "><div class="com2 "></div>
                    <div id="scroll" class="panel panel-default slimScrollBar tam">
                        @foreach($workorder as $worklist)
                        

                        <!-- Default panel contents -->                
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
                        <br><hr>
                        
                        @endforeach
                    </div> 
                </div>              
            </div>
</div>   
<script>

    $('#scroll').slimScroll({
        size: '5px',
        railColor: '#222',
        height: '1140px',
        railOpacity: 0.3,
        wheelStep: 2,
        allowPageScroll: true
    });
</script>	
@stop
@stop