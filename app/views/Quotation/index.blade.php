@extends('layouts.master')
<head> 
    @section ('title')Cotizar @stop
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
            <a href="quotation/create" class="list-group-item active text-center">
                <h4 class="glyphicon glyphicon-plus"></h4><br/>Nueva Cotización 
            </a>                        
            <a href="quotationlist" class="list-group-item  text-center">                           
                <h4 class="glyphicon glyphicon-pencil"></h4><br/>Listar Cotización
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
                <h2 class="glyphicon glyphicon-th-list color" ></h2>
                <h3> Listar Cotización</h3> 
            </center>    
            <div class="panel panel-default tam">                  
                <div class="panel-body">
                    <hr>                        
                    @foreach($quotation as $quotlist)                    
                    <h3><strong> {{ $quotlist->clase_trabajo }} / Cotizacion:
                            <span class="estilo">
                                @if($quotlist->estado_cotizacion==1) Espera
                                @elseif($quotlist->estado_cotizacion==2) Elaborada
                                @elseif($quotlist->estado_cotizacion==3) Enviado 
                                @elseif($quotlist->estado_cotizacion==4) Autorizado 
                                @endif 
                            </span>
                        </strong></h3>
                    <p><strong>Cliente</strong>: {{ $quotlist->nombre_cliente}}, 
                        <strong>Telefono</strong>: {{ $quotlist->telefono }} ,
                        <strong>Celular</strong>: {{ $quotlist->celular }} ,
                        <strong>E-mail </strong>: {{ $quotlist->email }} </p> 
                    <p><strong>direccion</strong>: {{ $quotlist->direccion}},                         
                        <strong>Barrio</strong>: {{ $quotlist->barrio }} ,
                        <strong>Especificaciones</strong>: {{ $quotlist->especificaciones }}</p> 
                    <br>
                    <div class="col-md-1">
                        {{ HTML::link('/quotation/'.$quotlist->id.'/edit','Editar', array('class' => 'btn btn-default'), false)}}                       
                    </div>  

                    {{ Form::model($quotation, array('url' => array('/quotation/'.$quotlist->id), 'method' => 'DELETE', 'role' => 'form')) }}                    
                    <div class="col-md-1">
                        {{ Form::submit('Eliminar', array('class' => 'btn  btn-success')) }}
                    </div>                    
                    {{ Form::close() }}                       

                    <br> <br>
                    <hr>
                    @endforeach
                </div>
            </div>
            <hr>                                      
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
</div>  
@stop