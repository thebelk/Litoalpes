@extends('layouts.master')
<head> 
    @section ('title')Usuario @stop
</head>
@section('header')
@parent
@stop
@section('content')

@section('container1')    
    <h3 class="highlight nav nav-stacked ">{{Auth::user()->razon_social}} </h3>
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
			<a href="/phonebook/create" class="list-group-item  active text-center">                           
                <h5 class="glyphicon glyphicon-plus"></h5><br/><h4 class="cel">Nuevo Contato </h4>
            </a>
            <a href="/phonebook" class="list-group-item  text-center">
                <h5 class="list-group-item-heading glyphicon glyphicon-earphone"></h5><h4 class="cel">Contactos | Proveedor</h4>
            </a>
        </div> 
    </div>
	@stop
	
    @section('container2')
	@parent
	@stop
	
  
 @section('container3')
<div class="col col-sm-9">
    <center>
        <div class="row ">
            <div class="bhoechie-tab-content active">	
                <div class="panel-body">
                    <div class="panel panel-default  tam">
                        <div class="panel-heading" align="center"> 
                            <h3 class="glyphicon glyphicon-user color" ></h3>
                            <h4> Editar Usuario</h4> 
                        </div>
                    </div>

                    <div class="panel-body tam pancol">
                        <div class="com2 "></div>

                        <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                        <div class="panel panel-default tam ">
                            {{Form::open(array('url' => '/user/'.Auth::user()->id,'method' => 'PUT', 'role'=>'form')) }}
                            {{ Form::hidden('id', Auth::user()->id) }}
                            <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                            <div class="row ">					
                                <div class="col-xs-6 imp">
                                    <div class="form-group form-register"align="justify">
                                        {{ Form::label('representante', 'Nombre y Apellido *:') }}<br>
                                        {{ Form::text('representante', Auth::user()->representante, array('placeholder' => 'Nombre y Apellido', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
								 <div class="col-xs-6 col-md-6 imp">
                                    <div class='form-group form-register' align="justify">
                                        {{ Form::label('nit_cc', 'C.C / NIT *:') }}<br>
                                        {{ Form::text('nit_cc',Auth::user()->nit_cc, array('placeholder' => 'C.C / Nit', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 imp">
                                    <div class="form-group form-register"align="justify">
                                        {{ Form::label('celular', 'Celular *:') }}<br>
                                        {{ Form::text('celular',Auth::user()->celular, array('placeholder' => 'Celular', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                               
                                <div class="col-xs-6 col-md-6 imp">
                                    <div class='form-group form-register' align="justify">
                                        {{ Form::label('razon_social', 'Empresa *:') }}<br>
                                        {{ Form::text('razon_social', Auth::user()->razon_social, array('placeholder' => 'Razon Social', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 imp">
                                    <div class='form-group form-register' align="justify">
                                        {{ Form::label('email', 'Email *:') }}<br>
                                        {{ Form::text('email', Auth::user()->email, array('placeholder' => ' Empresa', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 imp">
                                    <div class='form-group form-register' align="justify">
                                        {{ Form::label('email_confirmation', 'Confirmar Email *:') }}<br>
                                        {{ Form::email('email_confirmation', Auth::user()->email_confirmation, array('placeholder' => 'Confirmar Email', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>

                                <div class="col-xs-6 imp ">
                                    <div class='form-group form-register' align="justify">
                                        {{ Form::label('pais', 'Pais:') }}<br>
                                        {{ Form::text('pais', Auth::user()->pais, array('placeholder' => 'Pais', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 imp ">
                                    <div class='form-group form-register' align="justify">
                                        {{ Form::label('ciudad', 'Ciudad / Municipio:') }}<br>
                                        {{ Form::text('ciudad', Auth::user()->ciudad, array('placeholder' => 'Ciudad', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 imp ">
                                    <div class='form-group form-register' align="justify">
                                        {{ Form::label('direccion', 'Direccion:') }}<br>
                                        {{ Form::text('direccion', Auth::user()->direccion, array('placeholder' => 'Direccion', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 imp ">
                                    <div class='form-group form-register' align="justify">
                                        {{ Form::label('telefono', 'Telefono :') }}<br>
                                        {{ Form::text('telefono', Auth::user()->telefono, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}
                                    </div>
                                    <br><br>
                                </div>

                                {{ HTML::link('/user','Limpiar', array('class' => 'btn btn-success'), false)}}                        
                                {{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn btn-default')) }}                                 

                                {{ Form::hidden('save', 'savenormal') }}
                                {{ Form::close() }}
                            </div>
                            <div class="col-xs-12 imp"><br><br>
                                <h5 class='form-register' align="justify">Editar contraseña </h5><hr>
                                {{Form::open(array('url' => '/user/'.Auth::user()->id,'method' => 'PUT', 'role'=>'form', 'class'=>'form-inline')) }}
                                {{ Form::hidden('id', Auth::user()->id) }}
                                {{ Form::hidden('save', 'savepassword') }}<br>
                                <div class="col-xs-4 imp">						
                                    <div class='form-group form-register' align="justify">
                                        {{ Form::label('old_password', 'Contraseña Actual *:') }}<br>
                                        {{ Form::password('old_password', array('placeholder' => 'Contraseña Anterior', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xs-4 imp">
                                    <div class='form-group form-register' align="justify">
                                        {{ Form::label('password', 'Nueva Contraseña *:') }}<br>
                                        {{ Form::password('password ', array('placeholder' => 'Nueva Contraseña', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xs-4 imp">
                                    <div class='form-group form-register' align="justify">
                                        {{ Form::label('password_confirmation', 'Confirmar Contraseña *:') }}<br>
                                        {{ Form::password('password_confirmation', array('placeholder' => 'Confirmar Contraseña', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div><br><br>
                                </div>

                            </div>

                        </div>	
                        <div class="col-xs-6 imp">
                            <div class='button '>
                                {{ HTML::link('/user','Limpiar', array('class' => 'btn btn-success btn-sm'), false)}}                        
                                {{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn btn-default btn-sm')) }}
                            </div>	<br>
                        </div>
                        {{ Form::close() }}<hr>					
                    </div>		
                </div>
            </div>
    </center>
</div>  
@stop
@stop
