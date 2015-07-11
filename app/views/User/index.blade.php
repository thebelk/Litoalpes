@extends('layouts.master')
<head> 
    @section ('title')Trabajo @stop
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
            <a href="/phonebooklist" class="list-group-item active text-center">
                <h4 class="list-group-item-heading glyphicon glyphicon-earphone"></h4><h5>Contactos</h5>

            </a>
            <a href="/workorderlist" class="list-group-item text-center">
                <h4 class="list-group-item-heading glyphicon glyphicon-th-list"></h4><h5>Trabajos</h5>

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
        <div class="bhoechie-tab">                     
            <!-- work section -->
            <div class="bhoechie-tab-content active">
                <center>
                    <h2 class="glyphicon glyphicon-th-list color" ></h2>
                    <h3> Trabajos por Realizar</h3>                   
                    <div class="panel panel-default contenido">                        
                        <div class="panel-body">
                            <hr>
                            <p>
                                <br>
                                <button class="btn btn-default">Edit</button>
                                <button class="btn btn-primary">Ver</button>
                            </p>
                        </div>
                    </div>               
                    <hr>  
                </center>
            </div>
        </div>
        <!-- menu-->
        <center>
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