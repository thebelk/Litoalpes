@extends('layouts.master')
<head> 
    @section ('title')Cotizacion  @stop
</head>
@section('header')  
@parent
@stop
@section('content')
<div class="col col-sm-3 complement">   
   <h3 class="highlight nav nav-stacked ">{{Auth::user()->razon_social}} <i class="glyphicon glyphicon glyphicon-print pull-right"></i></h3>
    <br>
    <div class="row panel">
        <div class="col-sm-8 col-md-12">
            <h2 class="color">{{ Auth::user()->representante}}  </h2><br>
            <h4 class="color"> Nit: {{ Auth::user()->nit_cc}}  </h4>
            <h4>Telefono: {{ Auth::user()->telefono}} </h4>
            <h4>Celular: {{ Auth::user()->celular}} </h4>   
            <h4>{{ Auth::user()->otro}} </h4>  
        </div>         
        <h4>{{ HTML::link('/user/'.Auth::user()->id.'/edit','Editar', array('class' => 'btn btn-link'), false)}}</h4>     
    </div>
    <br><br>
    <div class="accordion" id="accordion2">
        <div class="accordion-group">
            <div class="accordion-heading"><h4>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        Correo Electronico
                    </a></h4>
            </div>
            <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <br>
                    <p> <h4>Email: {{ Auth::user()->email}} </h4></p>
                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading"><br><h4>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                        Dirección
                    </a></h4>
            </div>
            <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
                    <br>
                    <h4>Direccion: {{ Auth::user()->direccion}} </h4>
                    <h4> Ciudad: {{ Auth::user()->ciudad}} </h4>
                    <h4> Pais: {{ Auth::user()->pais}} </h4>
                </div>
            </div>
        </div>
        <br>
    </div> 
    <hr>
    <div id="sidebar"> 
        <div class="list-group">                       
            <a href="/quotation" class="list-group-item  text-center">                           
                <h4 class="glyphicon glyphicon-pencil"></h4><br/><h4>Listar Cotización</h4>
            </a>
			<a href="create" class="list-group-item active text-center">
                <h4 class="glyphicon glyphicon-plus"></h4><br/><h4>Nueva Cotización</h4> 
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
    <div class="row ">                             
        <!-- cho section -->
        <div class="bhoechie-tab-content active">
            <center>                 
                <div class="panel panel-default tam">
                    <!-- Default panel contents -->
                    <div class="panel-heading row panel">
                        <h3 class="list-group-item-heading color"></h3>
                        <h2 class="glyphicon glyphicon-pencil color" ></h2>
                        <h3> Nueva Cotización</h3> 
                    </div>
                </div>
            </center>
            <div class="panel-body tam">
                <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                <div class="panel panel-default ">
                    {{Form::open(array('url' => '/quotation','role'=>'form', 'method' => 'POST')) }}
                    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                    <div class="row ">
                        <div class="col-xs-6 col-md-4 imp ">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('cliente', 'CLIENTE:') }}
                                {{ Form::text('cliente', null, array('placeholder' => 'Cliente', 'class' => 'form-control', 'required' => 'required')) }}
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4 imp">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('cel_contacto', 'NUMERO DE CONTACTO:') }}
                                {{ Form::text('cel_contacto', null, array('placeholder' => 'Celular', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4 imp">                                     
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('tipo_cliente', 'TIPO CLIENTE:') }}
                                {{ Form::select('tipo_cliente', array('Tipo Cliente' => array( '1' => 'Seleccionar','1' => 'Directo  ', '2' => 'Servicio')),null ,array('class' => 'form-control')); }}
                            </div>
                            <br>
                        </div>
                        <div class="col-xs-6 col-md-4 imp">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('nit_cc', 'NIT / CC:') }}
                                {{ Form::text('nit_cc', null, array('placeholder' => 'Nit / CC', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4 imp">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('empresa', 'EMPRESA:') }}
                                {{ Form::text('empresa', null, array('placeholder' => 'Empresa', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4 imp ">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('telefono', 'TELEFONO:') }}
                                {{ Form::text('telefono', null, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}
                            </div>
                            <br>
                        </div>
                        <div class="col-xs-6 col-md-4 imp ">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('direccion', 'DIRECCIÓN:') }}
                                {{ Form::text('direccion', null, array('placeholder' => 'DirecciÓn', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4 imp">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('ciudad', 'CIUDAD:') }}
                                {{ Form::text('ciudad', null, array('placeholder' => 'Ciudad', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4 imp ">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('pais', 'PAIS:') }}
                                {{ Form::text('pais', null, array('placeholder' => 'Pais', 'class' => 'form-control')) }}
                            </div>
                            <br>
                        </div>
                        <div class="col-xs-6 col-md-4 imp">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('email', 'E-MAIL:') }}
                                {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4 imp">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('pagina_web', 'PAGINA WEB:') }}
                                {{ Form::text('pagina_web', null, array('placeholder' => 'Pagina Web', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4 imp">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('otro', 'OTRO:') }}
                                {{ Form::text('otro', null, array('placeholder' => 'Otro', 'class' => 'form-control')) }}
                            </div>
                            <br>
                        </div>                        
                    </div> 
                </div>
                <div class="panel panel-default ">
                    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                    <div class="row ">                            
                        <div class="col-xs-12 col-md-6 imp ">                                   
                            <div class='form-group form-register'>
                                {{ Form::label('clase_trabajo', 'CLASE DE TRABAJO:') }}
                                {{ Form::text('clase_trabajo', null, array('placeholder' => 'Clase Trabajo', 'class' => 'form-control', 'required' => 'required')) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 imp">                                     
                            <div class='form-group form-register'>
                                {{ Form::label('estado_cotizacion', 'ESTADO DE COTIZACIÓN:') }}
                                {{ Form::select('estado_cotizacion', array('Estado Cotizacion' => array('1' => 'Espera', '2' => 'Elaborado', '3' => 'Enviado', '4' => 'Autorizado')),null ,array('class' => 'form-control')); }}
                            </div>
                        </div>

                        <div class="col-xs-12 imp">  
                            <div class='form-group form-register tex'>
                                {{ Form::label('especificaciones', 'ESPECIFICACIONES:') }}
                                {{ Form::textarea('especificaciones', null, array('rows' => '4', 'placeholder' => 'Especificaciones', 'class' => 'form-control', 'required' => 'required')) }}
                            </div>
                        </div>
                        <div class="button col-xs-12"align="right">
                            {{ Form::button('Reset', array('type' => 'reset', 'class' => 'btn btn-default')) }} 
                            {{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn  btn-success')) }}  
                        </div>
                        <div class="col-xs-12  imp"> 
                            <br>
                            <div class='form-group form-register tex'>
                                {{ Form::label('cotizacion', 'COTIZACIÓN:') }}
                                {{ Form::textarea('cotizacion', null, array('rows' => '4', 'placeholder' => 'Cotización', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="button  "align="center">                      
                            {{ Form::button('Enviar', array('type' => 'submit', 'class' => 'btn  btn-success')) }}
                        </div>
                        <br>
                    </div>	
                </div>

            </div>
        </div>                 

        {{ Form::close() }}
    </div> 
</div>
@stop
