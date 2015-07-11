@extends('layouts.master')
<head> 
    @section ('title')Contactos @stop
</head>
@section('header')
@parent
@stop
@section('content')
<div class="col col-sm-3 complement">   
    <h3 class="highlight nav nav-stacked ">Lito Alpes <i class="glyphicon glyphicon glyphicon-print pull-right"></i></h3>
    <div class="row panel">
        <div class="col-sm-8 col-md-12">
            <h3 class="color"> Datos </h3>
            <p> Datos  de la empresa  </p>
        </div>                                           
    </div>
    <div class="accordion" id="accordion2">
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                    Accordion
                </a>
            </div>
            <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <p>There is a lot to be said about RWD.</p>
                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                    Accordion
                </a>
            </div>
            <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
                    <p>Use @media queries or utility classes to customize responsiveness.</p>
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
    <div class="row panel">                             
        <!-- cho section -->
        <div class="bhoechie-tab-content active">
            <center>
                <h2 class="glyphicon glyphicon-user color" ></h2>
                <h3> Nuevo Contacto</h3>    
                <div class="panel panel-default tam">
                    <!-- Default panel contents -->
                    <div class="panel-heading row panel"> <h3 class="list-group-item-heading color">Contacto</h3></div>
                    <div class="panel-body">
                        {{Form::open(array('url' => '/phonebook','role'=>'form', 'method' => 'POST')) }}
                        <div class="panel panel-default ">
                            <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                            <div class="row ">                            
                                <div class="col-xs-6 col-md-4 imp ">
                                    <div class='form-group form-register'>
                                        {{ Form::label('nombre', 'NOMBRE:') }}
                                        {{ Form::text('nombre', null, array('placeholder' => 'Nombre', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('empresa', 'EMPRESA:') }}
                                        {{ Form::text('empresa', null, array('placeholder' => 'Empresa', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('ocupacion', 'OCUPACIÓN:') }}
                                        {{ Form::text('ocupacion', null, array('placeholder' => 'Ocupación', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row "> 
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('telefono', 'TELEFONO:') }}
                                        {{ Form::text('telefono', null, array('placeholder' => 'Telefono', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>                               
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('celular', 'CELULAR:') }}
                                        {{ Form::text('celular', null, array('placeholder' => 'Celular', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('email', 'E-MAIL:') }}
                                        {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                            </div>                        
                            <div class="row ">                            
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('direccion', 'DIRECCIÓN:') }}
                                        {{ Form::text('direccion', null, array('placeholder' => 'Direccion', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>

                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('barrio', 'BARRIO:') }}
                                        {{ Form::text('barrio', null, array('placeholder' => 'Barrio', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>

                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('ciudad', 'CIUDAD:') }}
                                        {{ Form::text('ciudad', null, array('placeholder' => 'Ciudad', 'class' => 'form-control', 'required' => 'required')) }}
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

                <hr>                          
                <!-- menu-->
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
</div>  
@stop