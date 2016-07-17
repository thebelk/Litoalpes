@extends('layouts.master')
@section('header')
@parent
@stop
@section('content')
<h3 class="message">     @if(isset($message))
    {{$message}}
    @endif
</h3>
<div class="col col-sm-3 complement">  
    <h3 class="highlight nav nav-stacked ">
        @if($customer->empresa=="")
        {{ $customer->cliente }} 
        @endif
        {{$customer->empresa}}
        <i class="glyphicon glyphicon glyphicon glyphicon-user"></i></h3>
    <br>
    <div class="row panel">        
        <div class="col-sm-8 col-md-12">
            <h3 class="color">{{$customer->cliente}}&nbsp(Cliente)  </h3><br>
            <h4>Contacto: {{$customer->contacto}} </h4> 
            <h4>Telefono: {{$customer->telefono}} </h4> 
            <h4 class="color">Cliente:          
                @if($customer->tipo_cliente==1) Directo
                @elseif($customer->tipo_cliente==2) Servicio                              
                @endif
            </h4>
            <h4 class="color"> Nit: {{ $customer->nit_cc}}  </h4>
            <h4>{{ $customer->otro}} </h4>  
        </div>         
        <h4>{{ HTML::link('/customer/'.$customer->id.'/edit','Editar', array('class' => 'btn btn-link'), false)}}</h4>    
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
                <br>
                <p> <h4>Email: {{ $customer->email}} </h4></p>             
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
                    <h4>Direccion: {{$customer->direccion}} </h4>
                    <h4> Barrio: {{ $customer->barrio}} </h4>
                    <h4> Ciudad: {{$customer->ciudad}} </h4>
                    <h4> Pais: {{$customer->pais}} </h4>
                </div>
            </div>
        </div>
    </div> 
    <hr>
    <div id="sidebar"> 
        <div class="list-group">    
            <a href="workorder/create" class="list-group-item  text-center">
                <h4 class="glyphicon glyphicon-plus"></h4><br/><h4>Nuevo Trabajo</h4> 
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
    <div class="row panel">
        <div class="bhoechie-tab">                     
            <!-- work section -->
            <div class="bhoechie-tab-content active tam">
                <center>
                    <h3 class="glyphicon glyphicon-th-list color" ></h3>
                    <h2> Lista Trabajos</h2>
                    <h5>trabajos de cada cliente</h5>
                </center>
                <div class="panel panel-default tam">
                    <!-- Default panel contents -->                
                    <hr> <br>                      
                    @foreach($workorder as $worklist)                    
                    <h3><strong> {{ $worklist->clase_trabajo}} / ESTADO TRABAJO
                            <span class="estilo">
                                @if($worklist->estado_trabajo==1) Por realizar                                
                                @elseif($worklist->estado_trabajo==2) Diseño 
                                @elseif($worklist->estado_trabajo==3) Produccion 
                                @elseif($worklist->estado_trabajo==3) Entregado 
                                @endif 
                            </span>
                         <h4><strong>Fecha Pedido</strong>: {{  $worklist->created_at }},
                    <strong>Fecha Entrega</strong>: {{ $worklist->fecha_entrega}}, 
                    <strong>Material</strong>: {{ $worklist->clase_material }} ,
                    <strong>Cantidad</strong>: {{ $worklist->cantidad_trabajo }} ,
                    <strong>Tamaño </strong>: {{ $worklist->tamano }} </h4> 
                <h4><strong>Valor Trabajo</strong>: {{ $worklist->total}},                         
                    <strong>Abono</strong>: {{ $worklist->abono }} ,
                    <strong>Saldo</strong>: {{ $worklist->saldo }} ,                    
                    <strong>Diseñador</strong>: {{ $worklist->diseñador}},
                    <strong>Vendedor</strong>: {{ $worklist->vendedor}}</h4> 
                <br>
                    <br>
                    
                        {{ HTML::link('/workorder/'.$worklist->id.'/edit','Editar', array('class' => 'btn btn-default'), false)}}                       
                   
                        {{ HTML::link('/worklist/'.$worklist->id.'/ver','Ver', array('class' => 'btn btn-success'), false)}} 
                    
                    {{ Form::close() }}                       

                    <br> <br>
                    <hr>
                    @endforeach
                </div>               
            </div>
        </div>  
    </div> 
</div> 
@stop
