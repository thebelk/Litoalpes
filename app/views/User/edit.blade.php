@extends('layouts.master')
<head> 
    @section ('title')Usuario @stop
</head>
@section('header')
@parent
@stop
@section('content')
<div class="col col-sm-3 complement">   
    <h3 class="highlight nav nav-stacked ">{{Auth::user()->razon_social}} <i class="glyphicon glyphicon glyphicon-print pull-right"></i></h3>
    <div class="row panel">
        <div class="col-sm-8 col-md-12">
            <h3 class="color">{{ Auth::user()->representante}}  </h3>
            <h5 class="color"> Nit: {{ Auth::user()->nit_cc}}  </h5>
            <h5>Telefono: {{ Auth::user()->telefono}} </h5>
            <h5>Celular: {{ Auth::user()->celular}} </h5>   
            <h5>{{ Auth::user()->otro}} </h5>  
        </div>                                           
    </div>
    <div class="accordion" id="accordion2">
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                    Correo Electronico
                </a>
            </div>
            <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <p> <h4>Email: {{ Auth::user()->email}} </h4></p>
                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                    Dirección
                </a>
            </div>
            <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
                    <h5>Direccion: {{ Auth::user()->direccion}} </h5>
                    <h5> Barrio: {{ Auth::user()->barrio}} </h5>
                    <h5> Ciudad: {{ Auth::user()->ciudad}} </h5>
                    <h5> Pais: {{ Auth::user()->pais}} </h5>
                </div>
            </div>
        </div>
    </div> 
    <hr>
    <div id="sidebar">  
        <div class="list-group">                        
            <a href="/workorder/create" class="list-group-item active text-center">
                <h4 class="glyphicon glyphicon-plus"></h4><br/>Nuevo Trabajo 
            </a>                        
            <a href="profile" class="list-group-item  text-center">                           
                <h4 class="glyphicon glyphicon-user"></h4><br/>Perfil
            </a>
        </div>  
    </div>
    <hr>
    <div class="row panel">
        <div class="col-sm-8 col-md-12">
            <h3 class="color" > Entregas de Hoy </h3>
            <p> Pruebas </p>
        </div>
    </div>

</div>  

<div class="col col-sm-9">
    <center>
        <div class="row panel">
            <div class="bhoechie-tab-content active">	
                <div class="panel-body">
				<div class="panel panel-default">
					<div class="panel-heading row panel  tam " align="center"> <h3 class="list-group-item-heading color">
							<h2 class="glyphicon glyphicon-user color" ></h2>
							<h3> Editar Usuario</h3> 
					</div>
				</div>
				 
					{{Form::open(array('url' => '/user/'.Auth::user()->id,'method' => 'PUT', 'role'=>'form', 'class'=>'form-inline')) }}
					<div class='row'>
						<div class="col-md-7 col-md-offset-3">
                                <div class="col-xs-6 col-md-6">
                                    <div class="form-group form-register"align="justify">
                                        {{ Form::label('representante', 'Nombre y Apellido *:') }}<br>
                                        {{ Form::text('representante', Auth::user()->representante, array('placeholder' => 'Nombre y Apellido', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-6">
                                    <div class="form-group form-register"align="justify">
                                        {{ Form::label('celular', 'Celular *:') }}<br>
                                        {{ Form::text('celular',Auth::user()->celular, array('placeholder' => 'Celular', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-6">
                                    <div class='form-group form-register' align="justify">
                                        {{ Form::label('nit_cc', 'NIT *:') }}<br>
                                        {{ Form::text('nit_cc',Auth::user()->nit_cc, array('placeholder' => 'Nit', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-6">
                                    <div class='form-group form-register' align="justify">
                                        {{ Form::label('razon_social', 'Empresa *:') }}<br>
                                        {{ Form::text('razon_social', Auth::user()->razon_social, array('placeholder' => 'Razon Social', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 ">
                                    <div class='form-group form-register' align="justify">
                                        {{ Form::label('email', 'Email *:') }}<br>
                                        {{ Form::text('email', Auth::user()->email, array('placeholder' => ' Empresa', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 ">
                                    <div class='form-group form-register' align="justify">
                                        {{ Form::label('confiremail', 'Confirmar Email *:') }}<br>
                                        {{ Form::email('confiremail', Auth::user()->confiremail, array('placeholder' => 'Confirmar Email', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                               
                                <div class="col-xs-6 ">
                                    <div class='form-group form-register' align="justify">
                                        {{ Form::label('pais', 'Pais:') }}<br>
                                        {{ Form::text('pais', Auth::user()->pais, array('placeholder' => 'Pais', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 ">
                                    <div class='form-group form-register' align="justify">
                                        {{ Form::label('ciudad', 'Ciudad / Municipio:') }}<br>
                                        {{ Form::text('ciudad', Auth::user()->ciudad, array('placeholder' => 'Ciudad', 'class' => 'form-control')) }}
                                    </div>
                                </div>

                                <div class="col-xs-6 ">
                                    <div class='form-group form-register' align="justify">
                                        {{ Form::label('direccion', 'Direccion:') }}<br>
                                        {{ Form::text('direccion', Auth::user()->direccion, array('placeholder' => 'Direccion', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 ">
                                    <div class='form-group form-register' align="justify">
                                        {{ Form::label('telefono', 'Telefono :') }}<br>
                                        {{ Form::text('telefono', Auth::user()->telefono, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}
                                    </div>
									<br><br>
                                </div>
						
							<div class='row buttons'> 
								{{ HTML::link('/user','Reset', array('class' => 'btn btn-default'), false)}}                        
								{{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn btn-success')) }}                                 
							</div>	
												
						</div>
					{{ Form::close() }}	

					</div>
					<div class="col-xs-12 ">
					<br>
						<h5 class='form-register' align="justify">Editar contraseña </h5>                                            
						<hr>
						{{Form::open(array('route' => 'user.store','role'=>'form')) }} 
							<div class="col-xs-3 ">
						
								<div class='form-group form-register' align="justify">
									{{ Form::label('password', 'Password *:') }}<br>
									{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control', 'required' => 'required')) }}
								</div>
							</div>
							<div class="col-xs-3 ">
								<div class='form-group form-register' align="justify">
									{{ Form::label('confirpassword', 'Nueva Password *:') }}<br>
									{{ Form::password('confirpassword', array('placeholder' => 'Confirmar Password', 'class' => 'form-control', 'required' => 'required')) }}
								</div>
							</div>
							<div class="col-xs-3 ">
								<div class='form-group form-register' align="justify">
									{{ Form::label('confirpassword', 'Confirmar Password *:') }}<br>
									{{ Form::password('confirpassword', array('placeholder' => 'Confirmar Password', 'class' => 'form-control', 'required' => 'required')) }}
								</div>
							</div>
							<div class="col-xs-3 ">
							<br>
									{{ HTML::link('/user','Reset', array('class' => 'btn btn-default'), false)}}                        
									{{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn btn-success')) }}                                 
									<br><br>
							</div>
						{{ Form::close() }}
					</div>
                   
                    
                </div>
            </div>
    </center>
</div>
</div>  
</div>  
@stop

