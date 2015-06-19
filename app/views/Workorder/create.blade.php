@extends('layouts.master')
<head> 
    @section ('title')Trabajos @stop
</head>
@section('header')
@parent
@stop
@section('content')
<div class="col col-sm-3 complement">   
    <h3 class="highlight nav nav-stacked ">Cliente <i class="glyphicon glyphicon glyphicon glyphicon-user"></i></h3>
    <div class="row panel">
        <div class="col-sm-8 col-md-12">
            <h3 class="color"> Datos </h3>
            <p> Datos contacto de la empresa  </p>
        </div>                                           
    </div>
    <div class="accordion" id="accordion2">
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                    Accordion
                </a>
            </div>
            <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <p>There is a lot to be said about RWD.</p>
                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                    Accordion
                </a>
            </div>
            <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
                    <p>Use @media queries or utility classes to customize responsiveness.</p>
                </div>
            </div>
        </div>
    </div> 
    <hr>
    <div id="sidebar"> 
        <div class=" bhoechie-tab-menu">                  
            <div class="list-group">    
                <a href="#" class="list-group-item active text-center">
                    <h4 class="glyphicon glyphicon-plus"></h4><br/>Nuevo Trabajo 
                </a>
                <a href="#" class="list-group-item  text-center">                           
                    <h4 class="glyphicon glyphicon-th-list"></h4><br/> Lista Trabajos
                </a>                       
            </div>                    
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
                    <h3 class="glyphicon glyphicon-th-list " ></h3>
                    <h3> Orden/Trabajo</h3>                    
                    <div class="panel panel-default tam">
                        <!-- Default panel contents -->
                        <div class="panel-heading row panel"> <h3 class="list-group-item-heading color">Pedido</h3></div>
                        <div class="panel-body">
                            <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                            <div class="row ">                            
                                <div class="col-xs-6 col-md-4 imp ">
                                    <label for="ex1"><h4 class="tex">FECHANENTREGA</h4></label>
                                    <input class="form-control" id="ex1" type="date">
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <label for="ex1"><h4 class="tex">ESTADO ENTREGA</h4></label>                               
                                    <select class="form-control" id="ex1"><option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <label for="ex1"><h4 class="tex">VENDEDOR</h4></label>
                                    <input class="form-control" id="ex1" type="text">
                                </div>
                            </div>     
                            <div class="row ">                            
                                <div class="col-xs-6 col-md-4 imp ">
                                    <label for="ex1"><h4 class="tex">CLASE DE TRABAJO</h4></label>
                                    <input class="form-control" id="ex1" type="text">
                                </div>                              
                                <div class="col-xs-6 col-md-4 imp">
                                    <label for="ex1"><h4 class="tex">MATERIAL</h4></label>
                                    <input class="form-control" id="ex1" type="text">
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class="col-xs-6 col-md-6 imp">
                                        <label for="ex1"><h4 class="tex">CANTIDAD</h4></label>
                                        <input class="form-control" id="ex1" type="text">
                                    </div>
                                    <div class="col-xs-6 col-md-6 imp">
                                        <label for="ex1"><h4 class="tex">TAMAÑO</h4></label>
                                        <input class="form-control" id="ex1" type="text">
                                    </div>
                                </div>
                            </div> 
                            <div class="row ">                            
                                <div class="col-xs-6 col-md-4 imp ">
                                    <label for="ex1"><h4 class="tex">CLASE DE TRABAJO</h4></label>
                                    <input class="form-control" id="ex1" type="text">
                                </div>                              
                                <div class="col-xs-6 col-md-4 imp">
                                    <label for="ex1"><h4 class="tex">MATERIAL</h4></label>
                                    <input class="form-control" id="ex1" type="text">
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class="col-xs-6 col-md-6 imp">
                                        <label for="ex1"><h4 class="tex">CANTIDAD</h4></label>
                                        <input class="form-control" id="ex1" type="text">
                                    </div>
                                    <div class="col-xs-6 col-md-6 imp">
                                        <label for="ex1"><h4 class="tex">TAMAÑO</h4></label>
                                        <input class="form-control" id="ex1" type="text">
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <p>                                
                            <button class="btn btn-default">Edit</button>
                            <button class="btn btn-primary">Ver</button>
                        </p>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col col-sm-6">
                            <img src="/assets/example/bg_smartphones.jpg" class="img-responsive">
                        </div> 
                        <div class="col col-sm-6">
                            <h1>hola mucndo</h1>

                        </div>   
                    </div>
                    <hr>                          
                    <h2>Media Queries</h2>
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
                    <h2><a href="#"><i class="glyphicon glyphicon-home"></i> <i class="glyphicon glyphicon-chevron-down"></i></a></h2>
                    <h3 class="color">Home</h3>
                    <hr>
                </center>
            </div>
        </div>
        <!-- menu-->
        <center>
            <div class="list-group">
                <a href="#" class="list-group-item ">
                    <h2 class="glyphicon glyphicon-user"></h2>
                    <h3>Clientes</h3>
                </a>
                <a href="#" class="list-group-item ">
                    <h2 class="glyphicon glyphicon-th-list"></h2>
                    <h3>Orden/Trabajo</h3>
                </a>

            </div>
        </center>
    </div>
</div>       

@stop