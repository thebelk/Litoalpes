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
            <h4 class="color"> Nit: {{ Auth::user()->nit_cc}}  </h4>
            <h4>Telefono: {{ Auth::user()->telefono}} </h4>
            <h4>Celular: {{ Auth::user()->celular}} </h4>   
            <h4>{{ Auth::user()->otro}} </h4>  
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
                    <p><h5>Direccion: {{ Auth::user()->direccion}} </h5>
                    <h5> Barrio: {{ Auth::user()->barrio}} </h5>
                    <h5> Ciudad: {{ Auth::user()->ciudad}} </h5>
                    <h5> Pais: {{ Auth::user()->pais}} </h5></p>
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
                    <h4 class="glyphicon glyphicon-user"></h4><br/>Perfil
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
                <h2 class="glyphicon glyphicon-user color" ></h2>
                <h3> Nuevo Cliente</h3>    
                <div class="panel panel-default tam">
                    <!-- Default panel contents -->
                    <div class="panel-heading row panel"> <h3 class="list-group-item-heading color">Cliente / id / fecha registro</h3></div>
                    <div class="panel-body">
                        <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                        <div class="panel panel-default ">
                            <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                            <div class="row ">                            
                                <div class="col-xs-6 col-md-4 imp ">
                                    <label for="ex1"><h4 class="tex">CLIENTE</h4></label>
                                    <input class="form-control" id="ex1" type="text">
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <label for="ex1"><h4 class="tex">NIT/CC</h4></label>                               
                                    <input class="form-control" id="ex1" type="text">
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <label for="ex1"><h4 class="tex">TIPO CLIENTE</h4></label>
                                    <input class="form-control" id="ex1" type="text">
                                </div>
                            </div>
                            <div class="row ">                            
                                <div class="col-xs-6 col-md-4 imp ">
                                    <label for="ex1"><h4 class="tex">TELEFONO</h4></label>
                                    <input class="form-control" id="ex1" type="text">
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <label for="ex1"><h4 class="tex">E-MAIL</h4></label>                               
                                    <input class="form-control" id="ex1" type="text">
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <label for="ex1"><h4 class="tex">OTRO</h4></label>
                                    <input class="form-control" id="ex1" type="text">
                                </div>
                            </div>                        
                            <div class="row ">                            
                                <div class="col-xs-6 col-md-4 imp ">
                                    <label for="ex1"><h4 class="tex">DIRECCIÓN</h4></label>
                                    <input class="form-control" id="ex1" type="text">
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <label for="ex1"><h4 class="tex">BARRIO</h4></label>                               
                                    <input class="form-control" id="ex1" type="text">
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <label for="ex1"><h4 class="tex">CIUDAD</h4></label>
                                    <input class="form-control" id="ex1" type="text">
                                </div>
                            </div>
                            <div class="row ">                            
                                <div class="col-xs-6 col-md-4 imp ">
                                    <label for="ex1"><h4 class="tex">PAIS</h4></label>
                                    <input class="form-control" id="ex1" type="text">
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <label for="ex1"><h4 class="tex">RESPONSABLE</h4></label>                               
                                    <input class="form-control" id="ex1" type="text">
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <label for="ex1"><h4 class="tex">CONTACTO</h4></label>
                                    <input class="form-control" id="ex1" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>                                
                        <button class="btn btn-default">Reset</button>
                        <button class="btn  btn-success">Save</button>
                    </p>
                </div> 
                <hr>                          
                <h2>Menu</h2>
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
                <h2><a href="#"><i class="glyphicon glyphicon-home"></i> <i class="glyphicon glyphicon-chevron-down"></i></a></h2>
                <h3 class="color">Home</h3>
                <hr>
            </center>
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

