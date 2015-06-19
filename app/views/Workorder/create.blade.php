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
        <!-- work order -->            
        <center>
            <h3 class="glyphicon glyphicon-th-list " ></h3>
            <h3> Orden/Trabajo</h3>                    
            <div class="panel panel-default tam">
                <!-- Default panel contents -->
                <div class="panel-heading row panel"> <h3 class="list-group-item-heading color">Pedido</h3></div>
                <div class="panel-body">
                    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                    <div class="panel panel-default ">
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
                    </div>
                    <div class="panel panel-default ">
                        <div class="row ">                            
                            <div class="col-xs-6 col-md-4 imp ">
                                <label for="ex1"><h4 class="tex">VALOR</h4></label>
                                <input class="form-control" id="ex1" type="text">
                            </div>                            
                            <div class="col-xs-6 col-md-4 imp">
                                <div class="col-xs-6 col-md-6 imp">
                                    <label for="ex1"><h4 class="tex">IVA</h4></label>
                                    <select class="form-control" id="ex1"><option>1</option>
                                        <option>2</option>
                                        <option>3</option>                                       
                                    </select>
                                </div>
                                <div class="col-xs-6 col-md-6 imp">
                                    <label for="ex1"><h4 class="tex">%IVA</h4></label>
                                    <input class="form-control" id="ex1" type="text">
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <label for="ex1"><h4 class="tex">TOTAL</h4></label>
                                <input class="form-control" id="ex1" type="text">
                            </div>
                        </div> 
                        <div class="row ">                            
                            <div class="col-xs-6 col-md-4 imp ">
                                <label for="ex1"><h4 class="tex">ABONO</h4></label>
                                <input class="form-control" id="ex1" type="text">
                            </div>                              
                            <div class="col-xs-6 col-md-4 imp">
                                <label for="ex1"><h4 class="tex">SALDO</h4></label>
                                <input class="form-control" id="ex1" type="text">
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <label for="ex1"><h4 class="tex">PAGO</h4></label>
                                <input class="form-control" id="ex1" type="text">
                            </div>
                        </div> 
                    </div>
                    <div class="row "> 
                        <label for="ex1"><h4 class="tex">DETALLES</h4></label>                                    
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <p>                                
                    <button class="btn btn-default">Reset</button>
                    <button class="btn btn-primary">Save</button>
                </p>
            </div>                        
            <div class="panel panel-default tam">
                <!-- Default panel contents -->
                <div class="panel-heading row panel"> <h3 class="list-group-item-heading color">Orden de Producción</h3></div>
                <div class="panel-body">
                    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                    <div class="panel panel-default ">
                        <div class="row ">                            
                            <div class="col-xs-6 col-md-4 imp ">
                                <label for="ex1"><h4 class="tex">DISEÑO</h4></label>
                                <select class="form-control" id="ex1"><option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>                              
                            <div class="col-xs-6 col-md-4 imp">
                                <label for="ex1"><h4 class="tex">DISEÑADOR</h4></label>
                                <input class="form-control" id="ex1" type="text">
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <label for="ex1"><h4 class="tex">No.COPIAS</h4></label>                               
                                <select class="form-control" id="ex1"><option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>                     
                        <div class="row ">                            
                            <div class="col-xs-6 col-md-4 imp">
                                <label for="ex1"><h4 class="tex">COPIA1</h4></label>                               
                                <select class="form-control" id="ex1"><option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <label for="ex1"><h4 class="tex">COPIA2</h4></label>                               
                                <select class="form-control" id="ex1"><option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <label for="ex1"><h4 class="tex">COPIA3</h4></label>                               
                                <select class="form-control" id="ex1"><option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>   
                        <div class="row ">                            
                            <div class="col-xs-6 col-md-4 imp">
                                <label for="ex1"><h4 class="tex">COPIA4</h4></label>                               
                                <select class="form-control" id="ex1"><option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <label for="ex1"><h4 class="tex">No.TINTA</h4></label>                               
                                <select class="form-control" id="ex1"><option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <label for="ex1"><h4 class="tex">COLOR1</h4></label>                               
                                <input class="form-control" id="ex1" type="text">
                            </div>
                        </div> 
                        <div class="row ">                            
                            <div class="col-xs-6 col-md-4 imp ">
                                <label for="ex1"><h4 class="tex">COLOR2</h4></label>
                                <input class="form-control" id="ex1" type="text">
                            </div>                              
                            <div class="col-xs-6 col-md-4 imp">
                                <label for="ex1"><h4 class="tex">COLOR3</h4></label>
                                <input class="form-control" id="ex1" type="text">
                            </div>
                            <div class="col-xs-6 col-md-4 imp">                            
                                <label for="ex1"><h4 class="tex">NUMERADO</h4></label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        Trabajo enumerado
                                    </label>
                                </div>

                            </div>
                        </div>                             
                        <div class="row ">   
                            <div class="col-xs-6 col-md-4 imp">
                                <div class="col-xs-6 col-md-6 imp">
                                    <label for="ex1"><h4 class="tex">No.INICIAL</h4></label>
                                    <input class="form-control" id="ex1" type="text">
                                </div>
                                <div class="col-xs-6 col-md-6 imp">
                                    <label for="ex1"><h4 class="tex">No.FINAL </h4></label>
                                    <input class="form-control" id="ex1" type="text">
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp ">
                                <label for="ex1"><h4 class="tex">HABILITA DIAN</h4></label>
                                <input class="form-control" id="ex1" type="text">
                            </div>                            
                            <div class="col-xs-6 col-md-4 imp ">
                                <label for="ex1"><h4 class="tex">FECHA DIAN </h4></label>
                                <input class="form-control" id="ex1" type="text">
                            </div>
                        </div>                    
                        <div class="row ">                                                        
                            <div class="col-xs-6 col-md-4 imp">
                                <label for="ex1"><h4 class="tex">EMBLOCADO</h4></label>
                                <input class="form-control" id="ex1" type="text">
                            </div>
                            <div class="col-xs-6 col-md-4 imp ">
                                <label for="ex1"><h4 class="tex">QUEMADO</h4></label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        Quemar trabajo 
                                    </label>
                                </div>
                            </div> 
                            <div class="col-xs-6 col-md-4 imp">                            
                                <label for="ex1"><h4 class="tex">TIRO/RETIRO</h4></label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        Trabajo dos caras
                                    </label>
                                </div>
                            </div>
                        </div>  
                        <div class="row ">                            
                            <div class="col-xs-6 col-md-4 imp ">
                                <label for="ex1"><h4 class="tex">No. PLANCHA</h4></label>
                                <input class="form-control" id="ex1" type="text">
                            </div>                              
                            <div class="col-xs-6 col-md-4 imp">
                                <label for="ex1"><h4 class="tex">No. MASTER</h4></label>
                                <input class="form-control" id="ex1" type="text">
                            </div>
                            <div class="col-xs-6 col-md-4 imp">                            
                                <label for="ex1"><h4 class="tex">ENGOMADO</h4></label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        Engomar trabajo 
                                    </label>
                                </div>
                            </div>
                        </div> 
                        <div class="row ">                            
                            <div class="col-xs-6 col-md-4 imp">                            
                                <label for="ex1"><h4 class="tex">PERFORADO</h4></label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        Perforar trabajo 
                                    </label>
                                </div>
                            </div>                             
                            <div class="col-xs-6 col-md-4 imp">                            
                                <label for="ex1"><h4 class="tex">LEVANTE</h4></label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        levantar trabajo
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">                            
                                <label for="ex1"><h4 class="tex">ENGRAPADO</h4></label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        Engrapar trabajo
                                    </label>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="row "> 
                        <label for="ex1"><h4 class="tex">OBSERVACIONES</h4></label>                                    
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <p>                                
                    <button class="btn btn-default">Reset</button>
                    <button class="btn btn-primary">Save</button>
                </p>
            </div>
            <hr>                          
            <h2>Menu</h2>
            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
            <h2><a href="#"><i class="glyphicon glyphicon-home"></i> <i class="glyphicon glyphicon-chevron-down"></i></a></h2>
            <h3 class="color">Home</h3>
            <hr>
        </center>           

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