@extends('layouts.master')
<head> 
    @section ('title')Contactos @stop
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
                <h4 class="glyphicon glyphicon-plus"></h4><br/>Nuevo Contacto 
            </a>                        
            <a href="/phonebook" class="list-group-item  text-center">                           
                <h4 class="glyphicon glyphicon-earphone"></h4><br/>Listar Contactos
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
                <h2 class="glyphicon glyphicon-user color" ></h2>
                <h3> Nuevo Contacto</h3>    
                <div class="panel panel-default tam">
                    <!-- Default panel contents -->
                    <div class="panel-heading row panel"> <h3 class="list-group-item-heading color">
                            Fecha registro {{  Auth::user()->created_at }}  </h3>
                    </div>
                    <div class="panel-body">
                        <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                        <div class="panel panel-default ">
                            {{Form::open(array('url' => '/phonebook','role'=>'form', 'method' => 'POST')) }}
                            <div class="row mar-b-60"> 
                                <section class="tab wow fadeInLeft"> 
                                    <header class="panel-heading tab-bg-dark-navy-blue">
                                        <ul class="nav nav-tabs nav-justified ">
                                            <li class="active">
                                                <a data-toggle="tab" href="#contacto">
                                                    <h4>CONTACTOS</h4> 
                                                </a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#proveedor">
                                                    <h4>PROVEEDOR</h4>  
                                                </a>
                                            </li>
                                        </ul>
                                    </header>
                                    <div class="panel-body">
                                        <div class="tab-content tasi-tab" >
                                            <div id="contacto" class="tab-pane fade in active" height="100">                               
                                                <article class="media">
                                                    <div class="panel panel-default ">                                           
                                                        <div class="row"  align="justify">
                                                            <h2  align="center"> NUEVO CONTACTO </h2>
                                                            <br><br>
                                                            <div class="col-xs-4">
                                                                <div class='form-group form-register'>
                                                                    {{ Form::label('nombre', 'PROVEEDOR:') }}
                                                                    {{ Form::text('nombre', null, array('placeholder' => 'Nombre del Proveedor', 'class' => 'form-control', 'required' => 'required')) }}
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-4">
                                                                <div class='form-group form-register'>
                                                                    {{ Form::label('empresa', 'EMPRESA:') }}
                                                                    {{ Form::text('empresa', null, array('placeholder' => 'Nombre del Empresa', 'class' => 'form-control', 'required' => 'required')) }}
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-4">
                                                                <div class='form-group form-register'>
                                                                    {{ Form::label('nit', 'NIT:') }}
                                                                    {{ Form::text('nit', null, array('placeholder' => 'NIT.Empresa', 'class' => 'form-control', 'required' => 'required')) }}
                                                                </div>
                                                                <br>
                                                            </div>
                                                            <div class="col-xs-4"><br>
                                                                <div class='form-group form-register'>
                                                                    {{ Form::label('tipo_actividad ', 'TIPO DE ACTIVIDAD:') }}
                                                                    {{ Form::select('tipo_actividad ',array('1' => 'Seleccionar', '2' => 'Servicio','3' => 'Producto'),null ,array('class' => 'form-control')); }}

                                                                </div>
                                                            </div>
                                                            <div class="col-xs-8">
                                                                <div class='form-group form-register tex'>
                                                                    {{ Form::label('descripcion_actividad ', ' DESCRIPCIÓN DE ACTIVIDAD:') }}
                                                                    {{ Form::textarea('descripcion_actividad ', null, array('rows' => '2', 'placeholder' => 'Detalles de Actividad', 'class' => 'form-control')) }}
                                                                </div> 
                                                                <br>
                                                            </div>
                                                            <div class="col-xs-4">
                                                                <div class='form-group form-register'>
                                                                    {{ Form::label('email', 'E-MAIL:')}}
                                                                    {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required')) }}
                                                                </div>
                                                            </div> 
                                                            <div class="col-xs-4">								
                                                                <div class='form-group form-register'>
                                                                    {{ Form::label('celular', 'CELULAR:') }}
                                                                    {{ Form::text('celular', null, array('placeholder' => 'Celular', 'class' => 'form-control', 'required' => 'required')) }}
                                                                </div>
                                                            </div>  
                                                            <div class="col-xs-4">
                                                                <div class='form-group form-register'>
                                                                    {{ Form::label('telefono', 'TELEFONO:') }}
                                                                    {{ Form::text('telefono', null, array('placeholder' => 'Telefono', 'class' => 'form-control', 'required' => 'required')) }}
                                                                </div>
                                                                <br>
                                                            </div>                         
                                                            <div class="col-xs-4">
                                                                <div class='form-group form-register'>
                                                                    {{ Form::label('direccion', 'DIRECCIÓN:') }}
                                                                    {{ Form::text('direccion', null, array('placeholder' => 'Direccion', 'class' => 'form-control', 'required' => 'required')) }}
                                                                </div>
                                                            </div>                               
                                                            <div class="col-xs-4">
                                                                <div class='form-group form-register'>
                                                                    {{ Form::label('ciudad', 'CIUDAD:') }}
                                                                    {{ Form::text('ciudad', null, array('placeholder' => 'Ciudad', 'class' => 'form-control', 'required' => 'required')) }}
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-4">
                                                                <div class='form-group form-register'>
                                                                    {{ Form::label('pais', 'PAIS:') }}
                                                                    {{ Form::text('pais', null, array('placeholder' => 'País', 'class' => 'form-control', 'required' => 'required')) }}
                                                                </div>
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                    </div> 
                                                </article> 
                                            </div>                                                       
                                            <div id="proveedor"  class="tab-pane fade">                          
                                                <div class="panel panel-default ">                                           
                                                    <div class="row"  align="justify">                                        
                                                        <h2  align="center">NUEVO PROVEEDOR</h2>
                                                        <br>                              
                                                        <div class="col-xs-4">
                                                            <div class='form-group form-register'>
                                                                {{ Form::label('nombre', 'PROVEEDOR:') }}
                                                                {{ Form::text('nombre', null, array('placeholder' => 'Nombre del Proveedor', 'class' => 'form-control', 'required' => 'required')) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <div class='form-group form-register'>
                                                                {{ Form::label('empresa', 'EMPRESA:') }}
                                                                {{ Form::text('empresa', null, array('placeholder' => 'Nombre del Empresa', 'class' => 'form-control', 'required' => 'required')) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <div class='form-group form-register'>
                                                                {{ Form::label('nit', 'NIT:') }}
                                                                {{ Form::text('nit', null, array('placeholder' => 'NIT.Empresa', 'class' => 'form-control', 'required' => 'required')) }}
                                                            </div>
                                                            <br>
                                                        </div>
                                                        <div class="col-xs-4"><br>
                                                            <div class='form-group form-register'>
                                                                {{ Form::label('tipo_actividad ', 'TIPO DE ACTIVIDAD:') }}
                                                                {{ Form::select('tipo_actividad ',array('1' => 'Seleccionar', '2' => 'Servicio','3' => 'Producto'),null ,array('class' => 'form-control')); }}

                                                            </div>
                                                        </div>
                                                        <div class="col-xs-8">
                                                            <div class='form-group form-register tex'>
                                                                {{ Form::label('descripcion_actividad ', ' DESCRIPCIÓN DE ACTIVIDAD:') }}
                                                                {{ Form::textarea('descripcion_actividad ', null, array('rows' => '2', 'placeholder' => 'Detalles de Actividad', 'class' => 'form-control')) }}
                                                            </div> 
                                                            <br>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <div class='form-group form-register'>
                                                                {{ Form::label('email', 'E-MAIL:')}}
                                                                {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required')) }}
                                                            </div>
                                                        </div> 
                                                        <div class="col-xs-4">								
                                                            <div class='form-group form-register'>
                                                                {{ Form::label('celular', 'CELULAR:') }}
                                                                {{ Form::text('celular', null, array('placeholder' => 'Celular', 'class' => 'form-control', 'required' => 'required')) }}
                                                            </div>
                                                        </div>  
                                                        <div class="col-xs-4">
                                                            <div class='form-group form-register'>
                                                                {{ Form::label('telefono', 'TELEFONO:') }}
                                                                {{ Form::text('telefono', null, array('placeholder' => 'Telefono', 'class' => 'form-control', 'required' => 'required')) }}
                                                            </div>
                                                            <br>
                                                        </div>                         
                                                        <div class="col-xs-4">
                                                            <div class='form-group form-register'>
                                                                {{ Form::label('direccion', 'DIRECCIÓN:') }}
                                                                {{ Form::text('direccion', null, array('placeholder' => 'Direccion', 'class' => 'form-control', 'required' => 'required')) }}
                                                            </div>
                                                        </div>                               
                                                        <div class="col-xs-4">
                                                            <div class='form-group form-register'>
                                                                {{ Form::label('ciudad', 'CIUDAD:') }}
                                                                {{ Form::text('ciudad', null, array('placeholder' => 'Ciudad', 'class' => 'form-control', 'required' => 'required')) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <div class='form-group form-register'>
                                                                {{ Form::label('pais', 'PAIS:') }}
                                                                {{ Form::text('pais', null, array('placeholder' => 'País', 'class' => 'form-control', 'required' => 'required')) }}
                                                            </div>
                                                            <br>
                                                        </div>                  
                                                    </div>
                                                </div>                                   
                                            </div>
                                        </div>
                                    </div>                       
                                </section>
                            </div>
                            {{ Form::close() }}
                        </div>
                        </center>
                    </div>
                </div>  
        </div>  
        @stop