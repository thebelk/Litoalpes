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

    <h3 class="highlight nav nav-stacked ">{{$customer->cliente}} <i class="glyphicon glyphicon glyphicon glyphicon-user"></i></h3>
    <div class="row panel">
        <div class="col-sm-8 col-md-12">
            <h3 class="color">Cliente:          
                @if($customer->tipo_cliente==1) Seleccionar
                @elseif($customer->tipo_cliente==2) Directo
                @elseif($customer->tipo_cliente==3) Intermediario                
                @endif
            </h3>            
            <h5 class="color"> Nit: {{ $customer->nit_cc}}  </h5>           
            <h5>Telefono: {{$customer->telefono}} </h5>   
            <h5>Repsponsable: {{$customer->repsponsable}} </h5> 
            <h5>Contacto: {{$customer->contacto}} </h5> 
            <h5>{{ $customer->otro}} </h5>  
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
                    <p> <h4>Email: {{ $customer->email}} </h4></p>
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
                    <h5>Direccion: {{$customer->direccion}} </h5>
                    <h5> Barrio: {{ $customer->barrio}} </h5>
                    <h5> Ciudad: {{$customer->ciudad}} </h5>
                    <h5> Pais: {{$customer->pais}} </h5>
                </div>
            </div>
        </div>
    </div> 
    <hr>
    <div id="sidebar"> 
        <div class="list-group">    
            <a href="workorder/create" class="list-group-item active text-center">
                <h4 class="glyphicon glyphicon-plus"></h4><br/>Nuevo Trabajo 
            </a>
            <a href="profile" class="list-group-item  text-center">                           
                <h4 class="glyphicon glyphicon-th-list"></h4><br/> Listar Trabajos
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
                    <h1 class="glyphicon glyphicon-th-list color" ></h1>
                    <h2> Lista Trabajos</h2>
                    <h5>trabajos de cada cliente</h5>
                    <div class="panel panel-default tam">
                        <!-- Default panel contents -->                
                        <hr>                       
                        @foreach($workorder as $worklist)                    
                        <h3><strong> {{ $worklist->clase_trabajo}} / ESTADO TRABAJO
                                <span class="estilo">
                                    @if($worklist->estado_trabajo==1) Por realizar                                
                                    @elseif($worklist->estado_trabajo==2) Diseño 
                                    @elseif($worklist->estado_trabajo==3) Produccion 
                                    @elseif($worklist->estado_trabajo==3) Entregado 
                                    @endif 
                                </span>
                            </strong></h3>
                        <p><strong>Fecha Entrega</strong>: {{ $worklist->fecha_entrega}}, 
                            <strong>Material</strong>: {{ $worklist->tipo_material }} ,
                            <strong>Cantidad</strong>: {{ $worklist->cantidad }} ,
                            <strong>Tamaño </strong>: {{ $worklist->tamano }} </p> 
                        <p><strong>Valor Trabajo</strong>: {{ $worklist->valor_trabajo}},                         
                            <strong>Abono</strong>: {{ $worklist->abono }} ,
                            <strong>Saldo</strong>: {{ $worklist->saldo }} ,
                            <strong>Atendido</strong>: {{ $worklist->atendido }}</p> 
                        <br>
                        <div class="col-md-1">
                            {{ HTML::link('/workorder/'.$worklist->id.'/edit','Editar', array('class' => 'btn btn-default'))}}
                        </div>  

                        {{ Form::model($worklist, array('url' => array('/workorder/'.$worklist->id), 'method' => 'DELETE', 'role' => 'form')) }}
                        <div class="col-md-1">
                            {{ Form::submit('Eliminar', array('class' => 'btn  btn-success')) }}
                        </div>    
                        <div class="col-md-1">
                            {{ HTML::link('/workorder/'.$worklist->id.'/ver','Ver', array('class' => 'btn btn-success'), false)}} 
                        </div> 
                        {{ Form::close() }}                       

                        <br> <br>
                        <hr>
                        @endforeach
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col col-sm-6">
                            <img src="/assets/example/bg_smartphones.jpg" class="img-responsive">
                        </div> 
                        <div class="col col-sm-6">
                            <h1>loren insut .</h1>
                        </div>   
                    </div>
                    <hr>                          
                    <!-- menu-->

                    <div class="list-group">                
                        <h4>Menu</h4>   
                        <a href="#" class="list-group-item ">
                            <h3 class="color"> <i class="glyphicon glyphicon-home"></i> <i class="glyphicon glyphicon-chevron-down"></i></h3>
                            <h3 class="color">Home</h3>
                        </a>
                        <a href="#" class="list-group-item ">
                            <h3 class="glyphicon glyphicon-user"></h3>
                            <h3>Clientes</h3>
                        </a>                       
                    </div>
                </center>
            </div>
        </div>  
    </div> 
</div> 
@stop
