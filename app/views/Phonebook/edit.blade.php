@extends('layouts.master')
<head> 
    @section ('title')Contactos @stop
</head>
<a href="../Customer/edit.blade.php"></a>
@section('header')
@parent
@stop
@section('content')
<div class="col col-sm-3 complement">   
    <h3 class="highlight nav nav-stacked ">{{Auth::user()->razon_social}}</h3>
    <br>
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
            <a href="/phonebook" class="list-group-item  text-center">                           
                <h5 class="glyphicon glyphicon-earphone"></h5><br/><h4>Contactos | Proveedor</h4>
            </a>
            <a href="/workorderlist" class="list-group-item active  text-center">
                <h5 class="list-group-item-heading glyphicon glyphicon-th-list"></h5><h4>Trabajos</h4>
            </a>
        </div>     
    </div>
    <div class="col-sm-8 col-md-12 not">
        <h3 class="color" > Entregas de Hoy </h3>
        <p> Pruebas </p>
    </div>
</div>  
<div class="col col-sm-9">
    <div class="row">                             
	<!-- cho section -->
		<center><!--
			<h2 class="glyphicon glyphicon-user color" ></h2>
			<h3> Nuevo Contacto</h3>  -->  
			<div class="panel panel-default tam">
				<!-- Default panel contents -->
				<div class="panel-heading"> 
					<h3 class="glyphicon glyphicon-user color" ></h3>
					<h4> Contacto / Proveedor </h4>                             
				</div>
			</div>
			<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->               
			<section class="tab wow fadeInLeft tam">                     
				<header class="panel-heading tab-bg-dark-navy-blue">
					<ul class="nav nav-tabs nav-justified ">
						<li class="active">
							<a data-toggle="tab" href="#contacto">
								<h5>CONTACTOS</h5> 
							</a>
						</li>
						<li>
							<a data-toggle="tab" href="#proveedor">
								<h5>PROVEEDOR</h5>  
							</a>
						</li>
					</ul>
				</header>                     
				<div class="tab-content tasi-tab" >
				 @if($phonebook->tipo_contacto==1) 
					<div id="contacto" class="tab-pane fade in active" height="100"> 
						@elseif($phonebook->tipo_contacto==2) 
						<div id="contacto" class="tab-pane fade"> 
							@endif
							<article class="media">
								{{Form::open(array('url' => '/phonebook/'.$phonebook->id,'method' => 'PUT', 'role'=>'form')) }}
								<div class="panel panel-default "> 
									<div class="row"  align="justify">
										<!--    <h2  align="center"> NUEVO CONTACTO </h2>-->                                                      
										<div class="col-xs-4">
											<div class='form-group form-register'>
												{{ Form::label('nombre', 'CONTACTO:') }}                                                    
												{{ Form::text('tipo_contacto',1, array('hidden' => 'true')) }}
												{{ Form::text('tipo_actividad',0, array('hidden' => 'true')) }}
												{{ Form::text('descripcion_actividad',"", array('hidden' => 'true')) }}
												{{ Form::text('id', $phonebook->id, array('hidden' => 'true')) }}
												{{ Form::text('nombre', $phonebook->nombre, array('placeholder' => 'Nombre del Contacto', 'class' => 'form-control', 'required' => 'required')) }}
											</div>
										</div>
										<div class="col-xs-4">
											<div class='form-group form-register'>
												{{ Form::label('empresa', 'EMPRESA:') }}
												{{ Form::text('empresa', $phonebook->empresa, array('placeholder' => 'Nombre de Empresa', 'class' => 'form-control')) }}
											</div>
										</div>
										<div class="col-xs-4">
											<div class='form-group form-register'>
												{{ Form::label('nit', 'NIT:') }}
												{{ Form::text('nit', $phonebook->nit, array('placeholder' => 'Nit . Empresa', 'class' => 'form-control')) }}
											</div>
											<br>
										</div>
										<div class="col-xs-4">
											<div class='form-group form-register'>
												{{ Form::label('telefono', 'TELEFONO:') }}
												{{ Form::text('telefono', $phonebook->telefono, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}
											</div>
										</div> 
										<div class="col-xs-4">								
											<div class='form-group form-register'>
												{{ Form::label('celular', 'CELULAR:') }}
												{{ Form::text('celular', $phonebook->celular, array('placeholder' => 'Celular', 'class' => 'form-control')) }}
											</div>
										</div>  
										<div class="col-xs-4">
											<div class='form-group form-register'>
												{{ Form::label('email', 'E-MAIL:')}}
												{{ Form::text('email', $phonebook->email, array('placeholder' => 'Email', 'class' => 'form-control')) }}
											</div>
											<br>
										</div>                         
										<div class="col-xs-4">
											<div class='form-group form-register'>
												{{ Form::label('direccion', 'DIRECCIÓN:') }}
												{{ Form::text('direccion', $phonebook->direccion, array('placeholder' => 'Direccion', 'class' => 'form-control')) }}
											</div>
										</div>                               
										<div class="col-xs-4">
											<div class='form-group form-register'>
												{{ Form::label('ciudad', 'CIUDAD:') }}
												{{ Form::text('ciudad', $phonebook->ciudad, array('placeholder' => 'Ciudad', 'class' => 'form-control')) }}
											</div>
										</div>
										<div class="col-xs-4">
											<div class='form-group form-register'>
												{{ Form::label('pais', 'PAIS:') }}
												{{ Form::text('pais', $phonebook->pais, array('placeholder' => 'País', 'class' => 'form-control')) }}
											</div>
											<br>
										</div>
										<center>                                                
											{{ Form::button('Limpiar', array('type' => 'reset', 'class' => 'btn btn-default')) }}                       
											{{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn  btn-success')) }} 
										</center>
										{{ Form::close() }}
									</div>
									<br>
								</div>

							</article>                                   
						</div>  
						@if($phonebook->tipo_contacto==1)
						<div id="proveedor" class="tab-pane fade"> 
							@elseif($phonebook->tipo_contacto==2) 
							<div id="proveedor"  class="tab-pane fade in active" height="100"> 
								@endif
								<div class="panel panel-default ">  
									{{Form::open(array('url' => '/phonebook/'.$phonebook->id,'method' => 'PUT', 'role'=>'form')) }}
									<div class="row"  align="justify">                                        
										<!--   <h2  align="center">NUEVO PROVEEDOR</h2>-->                                                                                  
										<div class="col-xs-4">
											<div class='form-group form-register'>
												{{ Form::label('nombre', 'PROVEEDOR:') }}
												{{ Form::text('tipo_contacto',2, array('hidden' => 'true')) }}
												{{ Form::text('id', $phonebook->id, array('hidden' => 'true')) }}
												{{ Form::text('nombre', $phonebook->nombre, array('placeholder' => 'Nombre del Proveedor', 'class' => 'form-control', 'required' => 'required')) }}
											</div>
										</div>
										<div class="col-xs-4">
											<div class='form-group form-register'>
												{{ Form::label('empresa', 'EMPRESA:') }}
												{{ Form::text('empresa', $phonebook->empresa, array('placeholder' => 'Nombre de Empresa', 'class' => 'form-control', 'required' => 'required')) }}
											</div>
										</div>
										<div class="col-xs-4">
											<div class='form-group form-register'>
												{{ Form::label('nit', 'NIT:') }}
												{{ Form::text('nit', $phonebook->nit, array('placeholder' => 'Nit. Empresa', 'class' => 'form-control')) }}
											</div>
											<br>
										</div>
										<div class="col-xs-4"><br>
											<div class='form-group form-register'>
												{{ Form::label('tipo_actividad ', 'TIPO DE ACTIVIDAD:') }}
												{{ Form::select('tipo_actividad',array('1' => 'Seleccionar', '2' => 'Servicio','3' => 'Producto'),$phonebook->tipo_actividad ,array('class' => 'form-control')); }}

											</div>
										</div>
										<div class="col-xs-8">
											<div class='form-group form-register tex'>
												{{ Form::label('descripcion_actividad ', ' DESCRIPCIÓN DE ACTIVIDAD:') }}
												{{ Form::textarea('descripcion_actividad', $phonebook->descripcion_actividad, array('rows' => '2', 'placeholder' => 'Detalles de Actividad', 'class' => 'form-control')) }}
											</div> 
											<br>
										</div>
										<div class="col-xs-4">
											<div class='form-group form-register'>
												{{ Form::label('telefono', 'TELEFONO:') }}
												{{ Form::text('telefono', $phonebook->telefono, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}
											</div>
										</div> 
										<div class="col-xs-4">								
											<div class='form-group form-register'>
												{{ Form::label('celular', 'CELULAR:') }}
												{{ Form::text('celular', $phonebook->celular, array('placeholder' => 'Celular', 'class' => 'form-control')) }}
											</div>
										</div>  
										<div class="col-xs-4">
											<div class='form-group form-register'>
												{{ Form::label('email', 'E-MAIL:')}}
												{{ Form::text('email', $phonebook->email, array('placeholder' => 'Email', 'class' => 'form-control')) }}
											</div>
											<br>
										</div>                         
										<div class="col-xs-4">
											<div class='form-group form-register'>
												{{ Form::label('direccion', 'DIRECCIÓN:') }}
												{{ Form::text('direccion', $phonebook->direccion, array('placeholder' => 'Direccion', 'class' => 'form-control')) }}
											</div>
										</div>                               
										<div class="col-xs-4">
											<div class='form-group form-register'>
												{{ Form::label('ciudad', 'CIUDAD:') }}
												{{ Form::text('ciudad', $phonebook->ciudad, array('placeholder' => 'Ciudad', 'class' => 'form-control')) }}
											</div>
										</div>
										<div class="col-xs-4">
											<div class='form-group form-register'>
												{{ Form::label('pais', 'PAIS:') }}
												{{ Form::text('pais', $phonebook->pais, array('placeholder' => 'País', 'class' => 'form-control')) }}
											</div>
											<br>
										</div> 
									</div>
									{{ Form::button('Limpiar', array('type' => 'reset', 'class' => 'btn btn-default')) }}                      
									{{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn  btn-success')) }}   
									{{ Form::close() }}
								</div> 
							</div> 
						</div>
					</div> 				   
				</div>      
			</section>  
		</center>
	</div> 
</div>  
@stop