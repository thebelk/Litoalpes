@extends('layouts.master')
<head> 
    @section ('title')Contactos @stop
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
            <a href="phonebook/create" class="list-group-item  text-center">                           
                <h5 class="glyphicon glyphicon-plus"></h5><br/><h5>Nuevo Contato </h5>
            </a>                         
            <a href="/workorderlist" class="list-group-item active  text-center">
                <h5 class="list-group-item-heading glyphicon glyphicon-th-list"></h5><h5>Trabajos</h5>
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
        <div class="bhoechie-tab-content active">
            <center>
                <h3 class="glyphicon glyphicon-user color" ></h3>
                <h4>  Contactos & Provedor </h4>  
            </center>
            <div class="panel panel-default tam">                  
                <div class="panel-body">
                                          
                    @foreach($phonebook as $phonlist)                      
                    <h3 class="color"><strong> {{ $phonlist->nombre }}&nbsp
                            @if($phonlist->tipo_contacto==1) CONTACTO                                
                            @elseif($phonlist->tipo_contacto==2) PROVEEDOR
                            @endif 
                        </strong></h3>
                    <h5> 
                        @if($phonlist->tipo_contacto==2)
                        <strong>Actividad:</strong>                         
                        @if($phonlist->tipo_actividad==1) NO SELECCIONADO                                 
                        @elseif($phonlist->tipo_actividad==2)SERVICIO 
                        @elseif($phonlist->tipo_actividad==3) PRODUCTO
                        @endif  &nbsp
                        <strong>Detalle: </strong>&nbsp{{ $phonlist->descripcion_actividad}}
                        @endif </h5> 
                    <h5><strong>Empresa</strong>: {{ $phonlist->empresa}},
                        <strong> Nit:{{ $phonlist->nit}} </strong>
                        <strong>Telefono</strong>: {{ $phonlist->telefono }} ,
                        <strong>Celular </strong>: {{ $phonlist->celular }},
                        <strong>E-mail </strong>: {{ $phonlist->email }} </h5>  
                    <h5><strong>Dirección </strong>: {{ $phonlist->direccion }},
                        <strong>Ciudad </strong>: {{ $phonlist->ciudad }}
                        <strong>Pais: </strong>: {{ $phonlist->pais }}</h5> 
                    <br>
                    <div class="col-md-1">
                        {{ HTML::link('/phonebook/'.$phonlist->id.'/edit','Editar', array('class' => 'btn btn-default'), false)}}                       
                    </div> 
					<div class="col-md-1">	
                    {{ Form::model($phonebook, array('url' => array('/phonebook/'.$phonlist->id), 'method' => 'DELETE', 'role' => 'form')) }}                    
                    {{ Form::submit('Eliminar', array('class' => 'btn  btn-success')) }}
                    </div> 
					<br> <br>
                    <hr>
                    @endforeach
                </div>
            </div> 
        </div>
    </div> 
</div>
@stop
