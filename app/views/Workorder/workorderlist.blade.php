@extends('layouts.master')
<head> 
    @section ('title')Trabajo @stop
</head>
@section('header')
@parent
@stop
@section('content')
<div class="col col-sm-3">   
    <h3 class="highlight nav nav-stacked ">Lito Alpes <i class="glyphicon glyphicon glyphicon-print pull-right"></i></h3>
    <hr>
    <div class="row panel">
        <div class="col-sm-8 col-md-12">
            <h3 class="color"> Datos </h3>
            <p> Datos  de la empresa  </p>
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
    <div id="sidebar"> 
        <div class=" bhoechie-tab-menu">                  
            <div class="list-group">                        
                <a href="#" class="list-group-item active text-center">                           
                    <h4 class="glyphicon glyphicon-earphone"></h4><br/>Contactos
                </a>                         
                <a href="#" class="list-group-item text-center">
                    <h4 class="glyphicon glyphicon-plus-sign"></h4><br/>Cuentas
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
                    <h1 class="glyphicon glyphicon-th-list color" ></h1>
                    <h2> Trabajos por Realizar</h2>
                    <h4>Content</h4>
                    <div class="panel panel-default contenido">
                        <!-- Default panel contents -->
                        <div class="panel-heading row panel "> <h3 class="list-group-item-heading color">Nombre Trabajo</h3></div>
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
                    <h2>Media Queries</h2>
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
                    <h1><a href="#"><i class="glyphicon glyphicon-home"></i> <i class="glyphicon glyphicon-chevron-down"></i></a></h1>
                    <h3 class="color">Home</h3>
                    <hr>
                </center>
            </div>
        </div>
        <!-- Thabajis -->
        <div class="bhoechie-tab-content">
            <center>
                <h1 class="glyphicon glyphicon-th-list" style="font-size:12em;"></h1>
                <h2>Trabajos</h2>
            </center>
        </div>
    </div>
</div>  

@stop