@extends('layouts.master')
<head> 
    @section ('title')Clientes @stop
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
            <a href="/customer" class="list-group-item text-center">
                <h4 class="glyphicon glyphicon-user "></h4><br/>Listar Clientes
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
                <h2 class="glyphicon glyphicon-user color" ></h2>
                <h3> Nuevo Cliente</h3>    
                <div class="panel panel-default tam">
                    <!-- Default panel contents -->
                    <div class="panel-heading row panel"> <h3 class="list-group-item-heading color">
                            Fecha registro {{  Auth::user()->created_at }}  </h3>
                    </div>
                    <div class="panel-body">
                        <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                        <div class="panel panel-default ">
                            {{Form::open(array('url' => '/customer','role'=>'form', 'method' => 'POST')) }}
                            <div class="row ">                            
                                <div class="col-xs-6 col-md-4 imp ">
                                    <div class='form-group form-register'>
                                        {{ Form::label('cliente', 'CLIENTE:') }}
                                        {{ Form::text('cliente', null, array('placeholder' => 'Cliente', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('nit_cc', 'NIT/CC:') }}
                                        {{ Form::text('nit_cc', null, array('placeholder' => 'Nit/CC', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>

                                <div class="col-xs-6 col-md-4 imp">                                     
                                    <div class='form-group form-register'>
                                        {{ Form::label('tipo_cliente', 'TIPO CLIENTE:') }}
                                        {{ Form::select('tipo_cliente', array('Tipo Cliente' => array( '1' => 'Seleccionar','1' => 'Directo ', '2' => 'Intermediario')),null ,array('class' => 'form-control')); }}
                                    </div>
                                </div>
                            </div>
                            <div class="row ">                            
                                <div class="col-xs-6 col-md-4 imp ">
                                    <div class='form-group form-register'>
                                        {{ Form::label('telefono', 'TELEFONO:') }}
                                        {{ Form::text('telefono', null, array('placeholder' => 'Telefono', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('email', 'E-MAIL:') }}
                                        {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('otro', 'OTRO:') }}
                                        {{ Form::text('otro', null, array('placeholder' => 'Otro', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>                        
                            <div class="row ">                            
                                <div class="col-xs-6 col-md-4 imp ">
                                    <div class='form-group form-register'>
                                        {{ Form::label('direccion', 'DIRECCIÓN:') }}
                                        {{ Form::text('direccion', null, array('placeholder' => 'DirecciÓn', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('barrio', 'BARRIO:') }}
                                        {{ Form::text('barrio', null, array('placeholder' => 'Barrio', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('ciudad', 'CIUDAD:') }}
                                        {{ Form::text('ciudad', null, array('placeholder' => 'Ciudad', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row ">                            
                                <div class="col-xs-6 col-md-4 imp ">
                                    <div class='form-group form-register'>
                                        {{ Form::label('pais', 'PAIS:') }}
                                        {{ Form::text('pais', null, array('placeholder' => 'Pais', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('repsponsable', 'RESPONSABLE:') }}
                                        {{ Form::text('repsponsable', null, array('placeholder' => 'Repsponsable', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('contacto', 'CONTACTO:') }}
                                        {{ Form::text('contacto', null, array('placeholder' => 'Contacto', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class='row buttons'>                                
                        {{ Form::button('Reset', array('type' => 'reset', 'class' => 'btn btn-default')) }} 
                        {{ Form::button('Save', array('type' => 'submit', 'class' => 'btn  btn-success')) }}                                 
                    </div>
                    {{ Form::close() }}
                </div>
            </center>
        </div>
    </div>  
</div>  
@stop

