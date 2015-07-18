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
    <div class="row panel">                             
        <!-- cho section -->
        <div class="bhoechie-tab-content active">
            <center>
                <h2 class="glyphicon glyphicon-user color" ></h2>
                <h3> Editar Contacto</h3>    
                <div class="panel panel-default tam">
                    <!-- Default panel contents -->
                    <div class="panel-heading row panel"> <h3 class="list-group-item-heading color">Contacto</h3></div>
                    <div class="panel-body">
                        {{Form::open(array('url' => '/phonebook/'.$phonebook->id,'method' => 'PUT', 'role'=>'form', 'class'=>'form-inline')) }}
                        <div class="panel panel-default ">
                            <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                            <div class="row ">                            
                                <div class="col-xs-6 col-md-4 imp ">
                                    <div class='form-group form-register'>
                                        {{ Form::label('nombre', 'NOMBRE:') }}
                                        {{ Form::text('id', $phonebook->id, array('hidden' => 'true')) }}  
                                        {{ Form::text('nombre', $phonebook->nombre, array('placeholder' => 'Nombre', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('empresa', 'EMPRESA:') }}
                                        {{ Form::text('empresa', $phonebook->empresa, array('placeholder' => 'Empresa', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('ocupacion', 'ACTIVIDAD:') }}
                                        {{ Form::text('ocupacion', $phonebook->ocupacion, array('placeholder' => 'Ocupación', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row "> 
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('telefono', 'TELEFONO:') }}
                                        {{ Form::text('telefono', $phonebook->telefono, array('placeholder' => 'Telefono', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>                               
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('celular', 'CELULAR:') }}
                                        {{ Form::text('celular', $phonebook->celular, array('placeholder' => 'Celular', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('email', 'E-MAIL:') }}
                                        {{ Form::text('email', $phonebook->email, array('placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                            </div>                        
                            <div class="row ">                            
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('direccion', 'DIRECCIÓN:') }}
                                        {{ Form::text('direccion', $phonebook->direccion, array('placeholder' => 'Direccion', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>

                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('barrio', 'BARRIO:') }}
                                        {{ Form::text('barrio', $phonebook->barrio, array('placeholder' => 'Barrio', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>

                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        {{ Form::label('ciudad', 'CIUDAD:') }}
                                        {{ Form::text('ciudad', $phonebook->ciudad, array('placeholder' => 'Ciudad', 'class' => 'form-control', 'required' => 'required')) }}
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