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
    <div class="row panel">
        <div class="col-sm-8 col-md-12">
            <h3 class="color">{{ Auth::user()->representante}}  </h3>
            <h5 class="color"> Nit: {{ Auth::user()->nit_cc}}  </h5>
            <h5>Telefono: {{ Auth::user()->telefono}} </h5>
            <h5>Celular: {{ Auth::user()->celular}} </h5>   
            <h5>{{ Auth::user()->otro}} </h5>  
        </div>                                           
    </div>
    <br>
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
            <a href="create" class="list-group-item active text-center">
                <h4 class="glyphicon glyphicon-plus"></h4><br/>Nueva Cotización 
            </a>                        
            <a href="/quotation" class="list-group-item  text-center">                           
                <h4 class="glyphicon glyphicon-th-list"></h4><br/>Listar Cotización
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
    <div class="row panel">                             
        <!-- cho section -->
        <div class="bhoechie-tab-content active">
            <center>
                <h2 class="glyphicon glyphicon-pencil color" ></h2>
                <h3> Nueva Cotización</h3>    
                <div class="panel panel-default tam">
                    <!-- Default panel contents -->
                    <div class="panel-heading row panel"> <h3 class="list-group-item-heading color">Registro</h3></div>
                    <div class="panel-body">
                        <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                        <div class="panel panel-default ">
                            {{Form::open(array('url' => '/quotation/'.$quotation->id,'method' => 'PUT', 'role'=>'form', 'class'=>'form-inline')) }}
                            <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                            <div class="row ">
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('nombre_cliente', 'NOMBRE CLIENTE:') }}
                                        {{ Form::text('id', $quotation->id, array('hidden' => 'true')) }} 
                                        {{ Form::text('nombre_cliente', $quotation->nombre_cliente, array('placeholder' => 'Nombre Cliente', 'class' => 'form-control')) }}
                                    </div>
                                </div>                               
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('telefono', 'TELEFONO:') }}
                                        {{ Form::text('telefono', $quotation->telefono, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}
                                    </div>
                                </div>                                
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('celular', 'CELULAR:') }}
                                        {{ Form::text('celular', $quotation->celular, array('placeholder' => 'Celular', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row ">   
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('email', 'E-MAIL:') }}
                                        {{ Form::text('email', $quotation->email, array('placeholder' => 'E-mail', 'class' => 'form-control')) }}
                                    </div>
                                </div>                               
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('direccion', 'DIRECCIÓN:') }}
                                        {{ Form::text('direccion', $quotation->direccion, array('placeholder' => 'Direccion', 'class' => 'form-control')) }}
                                    </div>
                                </div>                                
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('barrio', 'BARRIO:') }}
                                        {{ Form::text('barrio', $quotation->barrio, array('placeholder' => 'Barrio', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>                        
                        </div>
                        <div class="panel panel-default ">
                            <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                            <div class="row ">                            
                                <div class="col-xs-12 col-md-6 imp ">                                   
                                    <div class='form-group form-register'>
                                        {{ Form::label('clase_trabajo', 'CLASE DE TRABAJO:') }}
                                        {{ Form::text('clase_trabajo', $quotation->clase_trabajo, array('placeholder' => 'Clase Trabajo', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 imp">                                     
                                    <div class='form-group form-register'>
                                        {{ Form::label('estado_cotizacion', 'ESTADO DE COTIZACIÓN:') }}
                                        {{ Form::select('estado_cotizacion', array('Estado Cotizacion' => array('1' => 'Espera', '2' => 'Elaborada', '3' => 'Enviado', '4' => 'Autorizado')), $quotation->estado_cotizacion, array('class' => 'form-control')); }}
                                    </div>
                                </div>
                            </div>
                            <div class="row "> 
                                <div class='form-group form-register tex'>
                                    {{ Form::label('especificaciones', 'ESPECIFICACIONES:') }}
                                    {{ Form::textarea('especificaciones', $quotation->especificaciones, array('rows' => '4', 'placeholder' => 'Especificaciones', 'class' => 'form-control')) }}
                                </div>
                            </div>

                            <div class="row "> 
                                <div class='form-group form-register tex'>
                                    {{ Form::label('cotizacion', 'COTIZACIÓN:') }}
                                    {{ Form::textarea('cotizacion', $quotation->cotizacion, array('rows' => '4', 'placeholder' => 'Cotización', 'class' => 'form-control')) }}
                                </div>
                            </div>
                        </div>
                    </div>                   
                    <div class='row buttons'>                                
                        {{ Form::button('Reset', array('type' => 'reset', 'class' => 'btn btn-default')) }} 
                        {{ Form::button('Save', array('type' => 'submit', 'class' => 'btn  btn-success')) }}  
                        {{ Form::button('Enviar', array('type' => 'reset', 'class' => 'btn btn-default')) }} 
                    </div>
                    {{ Form::close() }}
                </div> 
                <hr>   
                <div class="list-group">                
                    <h4>Menu</h4>   
                    <a href="/user" class="list-group-item ">
                        <h3 class="color"> <i class="glyphicon glyphicon-home"></i> <i class="glyphicon glyphicon-chevron-down"></i></h3>
                        <h3 class="color">Home</h3>
                    </a>
                    <a href="/customer" class="list-group-item ">
                        <h3 class="glyphicon glyphicon-user"></h3>
                        <h3>Clientes</h3>
                    </a>   
                    <a href="/quotation" class="list-group-item ">
                        <h3 class="glyphicon glyphicon-pencil"></h3>
                        <h3>Cotizar</h3>
                    </a>
                    <a href="#" class="list-group-item ">
                        <h3 class="glyphicon glyphicon-bell"></h3>
                        <h3>Notificaciones</h3>
                    </a>                   
                </div>
            </center>
        </div>
    </div>  
    @stop
