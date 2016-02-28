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
        <div class="col-md-8"></div>
        <div class="col-md-1">
            {{ HTML::link('/user/'.Auth::user()->id.'/edit','Editar', array('class' => 'btn btn-link'), false)}}    
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
                <h4 class="list-group-item-heading glyphicon glyphicon-earphone"></h4><h5>Contactos / Proveedor</h5>

            </a>
            <a href="/workorderlist" class="list-group-item text-center">
                <h4 class="list-group-item-heading glyphicon glyphicon-th-list"></h4><h5>Listar  Trabajos</h5>

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
        <div class="bhoechie-tab">                     
            <!-- work section -->
            <div class="bhoechie-tab-content active">
                <center>
                    <h2 class="glyphicon glyphicon-th-list color" ></h2>
                    <h3> Trabajos por Realizar</h3>   
                </center>
                <div class="panel panel-default tam">
                    @foreach($workorder as $worklist)
                    @if($worklist->estado_trabajo==1)

                    <!-- Default panel contents -->                
                    <hr>                     
                    <h3><strong> {{ $worklist->clase_trabajo}} / ESTADO TRABAJO
                            <span class="estilo">
                                @if($worklist->estado_trabajo==1) Por realizar                                
                                @elseif($worklist->estado_trabajo==2) Diseño 
                                @elseif($worklist->estado_trabajo==3) Produccion 
                                @elseif($worklist->estado_trabajo==3) Entregado 
                                @endif 
                            </span>
                        </strong></h3>
                    <p><strong>Fecha Pedido</strong>: {{  $worklist->created_at }},
                        <strong>Fecha Entrega</strong>: {{ $worklist->fecha_entrega}}, 
                        <strong>Material</strong>: {{ $worklist->tipo_material }} ,
                        <strong>Cantidad</strong>: {{ $worklist->cantidad }} ,
                        <strong>Tamaño </strong>: {{ $worklist->tamano }} </p> 
                    <p><strong>Valor Trabajo</strong>: {{ $worklist->valor_trabajo}},                         
                        <strong>Abono</strong>: {{ $worklist->abono }} ,
                        <strong>Saldo</strong>: {{ $worklist->saldo }} ,
                        <strong>Diseño</strong>: 
                        @if($worklist->estado_trabajo==1) Ninguno                                
                        @elseif($worklist->diseño==2) Correcion
                        @elseif($worklist->diseño==3) Art
                        @endif,
                        <strong>Diseñador</strong>: {{ $worklist->diseñador}},
                        <strong>Atendido</strong>: {{ $worklist->atendido }}</p> 
                    <br>
                    <div class="col-md-1">
                        {{ HTML::link('/workorder/'.$worklist->id.'/edit','Editar', array('class' => 'btn btn-default'), false)}}                       
                    </div>  
                    
                    <div class="col-md-1">
                        {{ HTML::link('/worklist/'.$worklist->id.'/ver','Ver', array('class' => 'btn btn-success'), false)}} 
                    </div> 
                    {{ Form::close() }}                       

                    <br> <br>
                    <hr>
                    @endif 
                    @endforeach
                </div>               
            </div>
        </div>
    </div>
</div>       

@stop