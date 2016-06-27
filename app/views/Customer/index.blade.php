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
            <a href="customer/create" class="list-group-item  text-center">                           
                <h4 class="glyphicon glyphicon-plus"></h4><br/><h4>Nuevo Cliente</h4>
            </a>
			<a href="/workorderlist" class="list-group-item active text-center">
                <h4 class="list-group-item-heading glyphicon glyphicon-th-list"></h4><h4>Trabajos</h4>
            </a>
			<a href="/phonebook" class="list-group-item  text-center">                           
                <h4 class="glyphicon glyphicon-earphone"></h4><br/><h4>Contactos | Proveedor</h4>
            </a>
        </div>        
    </div>
    <hr>
    <div class="row ">
        <div class="col-sm-8 col-md-12">
            <h3 class="color" > Entregas de Hoy </h3>
            <p> Pruebas </p>
        </div>
    </div>
</div> 
<div class="col col-sm-9">
    <div class="row ">  
        <div class="bhoechie-tab-content active tam">
            <center>
                <h2 class="glyphicon glyphicon-user color" ></h2>
                <h3> Lista de Clientes</h3>  
            </center>
            <div class="panel panel-default tam">                  
                <div class="panel-body ">
                    <hr>                        
                    @foreach($customer as $custlist)                      
                    <br><h3><strong> 
                            @if($custlist->empresa=="")
                            {{ $custlist->cliente }} 
                            @endif
                            {{ $custlist->empresa }} 
                            {{ $custlist->nit_cc }}</strong>
                    </h3><br>
                    <h4>
                        <strong>Cliente </strong>: 
                        @if($custlist->tipo_cliente==1) Directo
                        @elseif($customer->tipo_cliente==2) Servicio                             
                        @endif,
                        <strong>Nombre </strong>: {{ $custlist->cliente }} ,                                               
                        <strong>Celular</strong>: {{ $custlist->cel_contacto }},
                        <strong>Telefono</strong>: {{ $custlist->telefono }}, 
                        <strong>E-mail </strong>: {{ $custlist->email }}</h4> 
                    <h4><strong>Direccion</strong>: {{ $custlist->direccion }},
                        <strong>Ciudad </strong>: {{ $custlist->ciudad }},
                        <strong>Pais </strong>: {{ $custlist->pais}}</h4> 
                    <br><br> 
                    {{ HTML::link('/customer/'.$custlist->id.'/edit','Editar', array('class' => 'btn btn-default'), false)}}                       
                    {{ HTML::link('/customer/'.$custlist->id.'/profile','Ver', array('class' => 'btn btn-success'), false)}} 
                    <br><br>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>  
</div>  
@stop