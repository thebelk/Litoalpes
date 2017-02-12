@extends('layouts.master')
<head> 
    @section ('title')Cotizar @stop
</head>
@section('header')
@parent
@stop
@section('content')
<div class="col col-sm-3 complement">   
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
                    <p> <h5>Email: {{ Auth::user()->email}} </h5></p>
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
            <a href="quotation/create" class="list-group-item  text-center">
                <h5 class="glyphicon glyphicon-plus"></h5><br/><h4>Nueva Cotización</h4> 
            </a>                        
            <a href="/workorderlist" class="list-group-item active  text-center">
                <h5 class="list-group-item-heading glyphicon glyphicon-th-list"></h5><h4>Trabajos</h4>
            </a>
            <a href="/phonebook" class="list-group-item  text-center">                           
                <h5 class="glyphicon glyphicon-earphone"></h5><br/><h4>Contactos | Proveedor</h4>
            </a>
        </div>  
    </div>

    <div class="col-sm-8 col-md-12 not">
        <h3 class="color" > Entregas de Hoy </h3>
        <p> Pruebas </p>

    </div>

</div>   
<div class="col col-sm-9">
    <div class="row ">                             
        <!-- cho section -->
            <div class="titulo">
                <h3 class="glyphicon glyphicon-pencil color" ></h3>
                <h4> Listar Cotización</h4> 
            </div>
			{{ Form::open(['route' => 'quotation.index', 'method' => 'GET', 'class' => 'input-group','id' => 'adv-search', 'role' => 'search ']) }}
			{{ Form::text('buscar', null, ['class' => 'form-control','style' => 'text-align:center', 'placeholder' => 'Buscar Trabajos']) }}  
               <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            {{ Form::button('<span class="caret"></span>', array('type' => 'submit', 'data-toggle' => 'dropdown','aria-expanded' => 'false','class' => 'btn btn-default dropdown-toggle ')) }}
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                              <div class="form-group">
                                <label class="radio-inline">
                                  <input type="radio" name="searchLocation" id="espera" value="espera" /> Espera 
                                </label>
								<label class="radio-inline">
                                  <input type="radio" name="searchLocation" id="realizado" value="realizado" /> Realizado
                                </label>
								<label class="radio-inline">
                                  <input type="radio" name="searchLocation" id="enviado" value="everywhere" /> Enviado 
                                </label>								
								<label class="radio-inline">
                                  <input type="radio" name="searchLocation" id="autorizado" value="everywhere" /> Autorizado  
								</label>
                              </div>							  
							  <form id="dateRangeForm" method="post" class="form-horizontal">
									<div class="form-group">											
										<div class="col-xs-6 date">	
											<label class="col-xs-3 control-label"><h6>Fecha Inicial</h6></label>
											<input type='date' id='fecha_inicial' name='fecha_inicial' class='form-control '/>
										</div>
										<div class="col-xs-6 date">	
											<label class="col-xs-3 control-label"> <h6>Fecha Final</h6></label>
											<input type='date' id='fecha_final' name='fecha_final' class='form-control '/>
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
                    <div class="panel-body">                   
                        @foreach($quotation as $quotlist)                    
                        <h4><strong> {{ $quotlist->clase_trabajo }} / Cotizacion:
                                <span class="estilo">
                                    @if($quotlist->estado_cotizacion==1) Espera
                                    @elseif($quotlist->estado_cotizacion==2) Realizado
                                    @elseif($quotlist->estado_cotizacion==3) Enviado 
                                    @elseif($quotlist->estado_cotizacion==4) Autorizado 
                                    @endif 
                                </span>
                            </strong></h4>
                        <h5><strong>Cliente</strong>: {{ $quotlist->cliente}},                        
                            <strong>Celular</strong>: {{ $quotlist->cel_contacto }} ,
                            <strong>Empresa </strong>: {{ $quotlist->empresa }},
                            <strong>Telefono</strong>: {{ $quotlist->telefono }},
                            <strong>Direccion</strong>: {{ $quotlist->direccion}}.</h5>
                        <h5> <strong>Especificaciones</strong>: {{ $quotlist->especificaciones }}</h5> 
                        <h5> <strong>Cotizacion</strong>: {{ $quotlist->cotizacion }}</h5> 
                                             
						
						{{ Form::model($quotation, array('url' => array('/quotation/'.$quotlist->id), 'method' => 'DELETE', 'role' => 'form')) }}                    
						{{ Form::submit('Eliminar', array('class' => 'btn  btn-success btn-sm',)) }}  	
						
						{{ HTML::link('/quotation/'.$quotlist->id.'/edit','Editar', array('class' => 'btn btn-default btn-sm'), false)}} 
                        <hr>
                        @endforeach

                    </div>
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