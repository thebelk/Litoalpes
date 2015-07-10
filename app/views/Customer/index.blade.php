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
            <a href="customer/create" class="list-group-item active text-center">                           
                <h4 class="glyphicon glyphicon-plus"></h4><br/>Nuevo Cliente
            </a>                         
            <a href="workorderlist" class="list-group-item text-center">
                <h4 class="glyphicon glyphicon-th-list"></h4><br/>Trabajos
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
                    <h2 class="glyphicon glyphicon-user color" ></h2>
                    <h3> Lista de Clientes</h3>                  
                    <div class="panel panel-default  tam ">
                        <!-- Default panel contents -->
                        <div class="panel-heading row panel "> <h3 class="list-group-item-heading color ">Nombre Clientes</h3></div>
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

