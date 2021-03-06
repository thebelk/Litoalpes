@extends('layouts.master')
<head> 
    @section ('title')Cotizar @stop
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
            <a href="/quotation/create" class="list-group-item  text-center">
                <h5 class="glyphicon glyphicon-plus"></h5><br/><h4 class="cel">Nueva Cotización</h4> 
            </a>                        
            <a href="/phonebook/create" class="list-group-item  active text-center">                           
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
		<div class="address">
		  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ordine">Configurar Correo </button>
		</div>
		<!-- Modal -->
		<div id="ordine" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">Configurar correo para enviar cotizaciónes</h4>
			  </div>
			  <div class="modal-body">
					{{Form::open(array('url' => '/quotation/configmail', 'method'=> 'POST', 'role'=>'form', 'class'=>'form-horizontal', 'id' => 'config_correo')) }}
						<fieldset>

						<!-- Text input-->
						  <div class="col-md-6">
							  {{ Form::label('', 'Correo Electronico:',array('class' => 'control-label')) }}
                              {{ Form::email('email', null, array('placeholder' => '','id' => 'email','name' => 'email', 'class' => 'form-control input-md','required' => 'required')) }}
						  </div>


						<!-- Text input-->
						 <div class="col-md-6">
						   {{ Form::label('', 'Confirme Correo Electronico:',array('class' => 'control-label')) }}
                           {{ Form::email('', null, array('placeholder' => '','id' => 'email2','name' => 'email2', 'class' => 'form-control input-md','required' => 'required')) }}
						</div>

						<!-- Password input-->
						 <div class="col-md-6">
							{{ Form::label('', 'Contraseña:',array('class' => 'control-label')) }}
							{{ Form::password('clave_correo', array('placeholder' => '', 'class' => 'form-control', 'required' => 'required')) }}
						</div>

						<!-- Password input-->

						  <div class="col-md-6">
							{{ Form::label('', 'Confirme Contraseña:',array('class' => 'control-label')) }}
							{{ Form::password('', array('placeholder' => '', 'class' => 'form-control', 'required' => 'required')) }}
							<br>
						  </div>

						<!-- Button -->
						  <div class="col-md-12">
							
							{{ Form::button('Limpiar', array('type' => 'reset', 'class' => ' btn btn-primary')) }}
							{{ Form::button('Registrar', array('type' => 'submit', 'class' => 'btn btn-success ')) }}
							
						</div>

						</fieldset>
					{{ Form::close() }}
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>

		  </div>
		</div>
        <!-- cho section -->
			@if(Session::has('message'))
				<br><p class="alert alert-info">{{ Session::get('message') }}</p>
			@endif
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
                                    @elseif($quotlist->estado_cotizacion==2) Enviado
                                    @elseif($quotlist->estado_cotizacion==3)  Autorizado 
                                    @endif 
                                </span>
                            </strong></h4>
                        <h5><strong>Cliente</strong>: {{ $quotlist->cliente}},                        
                            <strong>Celular</strong>: {{ $quotlist->cel_contacto }} ,
                            <strong>Empresa </strong>: {{ $quotlist->empresa }},
                            <strong>Telefono</strong>: {{ $quotlist->telefono }},
                            <strong>Direccion</strong>: {{ $quotlist->direccion}}</h5>
                        <h5> <strong>Especificaciones</strong>: {{ $quotlist->especificaciones }} </h5> 
						<h5><strong>Cotizacion</strong>: {{ $quotlist->cotizacion }}</h5>
                                             
						
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
@stop@stop