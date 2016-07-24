@extends('layouts.master')
<head> 
    @section ('title')Clientes @stop
</head>
@section('header')
@parent
@stop
@section('content')
<div class="col col-sm-3 complement">   
     <h3 class="highlight nav nav-stacked ">{{Auth::user()->razon_social}}</h3>
     <br>
    <div class="comp">        
            <h2>{{ Auth::user()->representante}}  </h2>
            <h5> Nit: {{ Auth::user()->nit_cc}}  </h5>
            <h5>Telefono: {{ Auth::user()->telefono}} </h5>
            <h5>Celular: {{ Auth::user()->celular}} </h5>   
            <h5>{{ Auth::user()->otro}} </h5>       
            
    </div>
    <h5>{{ HTML::link('/user/'.Auth::user()->id.'/edit','Editar', array('class' => 'btn btn-link'), false)}}</h5>
    <div class="accordion" id="accordion2">
        <div class="accordion-group">
            <div class="accordion-heading"><h5>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        Correo Electronico
                    </a></h5>
            </div>
            <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <br>
                    <p> <h5>Email: {{ Auth::user()->email}} </h5></p>
                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading"><br><h5>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                        Dirección
                    </a></h5>
            </div>
            <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
                    <br>
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
            <a href="customer/create" class="list-group-item  text-center">                           
                <h5 class="glyphicon glyphicon-plus"></h5><br/><h5>Nuevo Cliente</h5>
            </a>
			<a href="/workorderlist" class="list-group-item active text-center">
                <h5 class="list-group-item-heading glyphicon glyphicon-th-list"></h5><h5>Trabajos</h5>
            </a>
			<a href="/phonebook" class="list-group-item  text-center">                           
                <h5 class="glyphicon glyphicon-earphone"></h5><br/><h5>Contactos | Proveedor</h5>
            </a>
        </div>        
    </div>
   <div class="col-sm-8 col-md-12 not">
            <h3 class="color" > Entregas de Hoy </h3>
            <p> Pruebas </p>
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
                    @foreach($customer as $custlist)                      
                    <h3><strong> 
                            @if($custlist->empresa=="")
                            {{ $custlist->cliente }} 
                            @endif
                            {{ $custlist->empresa }} 
                            {{ $custlist->nit_cc }}</strong>
                    </h3>
                    <h5>
                        <strong>Cliente </strong>: 
                        @if($custlist->tipo_cliente==1) Directo
                        @elseif($customer->tipo_cliente==2) Intermediario                              
                        @endif,
                        <strong>Nombre </strong>: {{ $custlist->cliente }} ,                                               
                        <strong>Celular</strong>: {{ $custlist->cel_contacto }},
                        <strong>Telefono</strong>: {{ $custlist->telefono }}, 
                        <strong>E-mail </strong>: {{ $custlist->email }}</h5> 
                    <h5><strong>Direccion</strong>: {{ $custlist->direccion }},
                        <strong>Ciudad </strong>: {{ $custlist->ciudad }},
                        <strong>Pais </strong>: {{ $custlist->pais}}</h5> 
                    <br>
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