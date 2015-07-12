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
            <h3 class="color">{{$customer->tipo_cliente}} </h3>            
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
            <a href="/workorder/create" class="list-group-item active text-center">
                <h4 class="glyphicon glyphicon-plus"></h4><br/>Nuevo Trabajo 
            </a>
            <a href="/customer/profile" class="list-group-item  text-center">                           
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
                        <div class="panel-heading row panel"> <h3 class="list-group-item-heading color">Nombre Trabajo</h3></div>
                        <div class="panel-body">
                            <p>
                                <img src="//placehold.it/150x100/EEEEEE" class="img-responsive pull-right"> Farmhand ida quae ab illo inventore veritatis et quasi architecto beatae vitae 
                                dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia cor magni dolores 
                                eos qui ratione voluptatem sequi nesciunt. I met him on the Internet. He's a French model. Qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, 
                                sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
                                <br><br>
                                <button class="btn btn-default">Edit</button>
                                <button class="btn btn-primary">Ver</button>
                            </p>
                        </div>
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
