@extends('layouts.master')
<head> 
    @section ('title')Clientes @stop
</head>
@section('header')
@parent
@stop
@section('content')


<div class="col col-sm-3">            
    <div id="sidebar"> 
        <h3 class="highlight nav nav-stacked">Trabajos <i class="glyphicon glyphicon-dashboard pull-right"></i></h3>
        <hr>

        <div class="row">
            <div class="col-xs-5 col-sm-12">
                <h3> Pruebas </h3>
                <p> Pruebas </p>
            </div>                                           
        </div>
        <div class=" bhoechie-tab-menu">                  
            <div class="list-group">                        
                <a href="#" class="list-group-item active text-center">                           
                    <h4 class="glyphicon glyphicon-plane"></h4><br/>Flight
                </a>                         
                <a href="#" class="list-group-item text-center">
                    <h4 class="glyphicon glyphicon-road"></h4><br/>Train
                </a>
                <a href="#" class="list-group-item text-center">
                    <h4 class="glyphicon glyphicon-home"></h4><br/>Hotel
                </a>
                <a href="#" class="list-group-item text-center">
                    <h4 class="glyphicon glyphicon-cutlery"></h4><br/>Restaurant
                </a>
                <a href="#" class="list-group-item text-center">
                    <h4 class="glyphicon glyphicon-credit-card"></h4><br/>Credit Card
                </a>                      
            </div>                   
        </div>     
    </div>
    <hr>
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
    <div class="row">
        <div class="col-xs-5 col-sm-12">
            <h3> Pruebas </h3>
            <p> Pruebas </p>
        </div>                                           
    </div>
</div>  

<div class="col col-sm-9">
    <div class="row panel">

        <div class="bhoechie-tab">                     
            <!-- flight section -->
            <div class="bhoechie-tab-content active">
                <center>
                    <h1 class="glyphicon glyphicon-plane" style="font-size:14em;color:#55518a"></h1>
                    <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                    <h3 style="margin-top: 0;color:#55518a">Flight Reservation</h3>


                    <h2>Content</h2>
                    <img src="//placehold.it/150x100/EEEEEE" class="img-responsive pull-right"> Farmhand ida quae ab illo inventore veritatis et quasi architecto beatae vitae 
                    dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia cor magni dolores 
                    eos qui ratione voluptatem sequi nesciunt. I met him on the Internet. He's a French model. Qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, 
                    sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                    Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
                    <br><br>
                    <button class="btn btn-default">More</button>

                    <hr>

                    <div class="row">
                        <div class="col col-sm-6">
                            <img src="/assets/example/bg_smartphones.jpg" class="img-responsive">

                        </div> 
                        <div class="col col-sm-6">
                            <h1>There is still a lot to be said about the Responsive Web.</h1>
                        </div>   
                    </div>
                    <hr>                          
                    <h2>Media Queries</h2>
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
                    <h1><a href="#"><i class="glyphicon glyphicon-user"></i> <i class="glyphicon glyphicon-chevron-down"></i></a></h1>

                    <hr>

                </center>
            </div>

            <!-- train section -->
            <div class="bhoechie-tab-content">
                <center>
                    <h1 class="glyphicon glyphicon-road" style="font-size:12em;color:#55518a"></h1>
                    <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                    <h3 style="margin-top: 0;color:#55518a">Train Reservation</h3>
                </center>
            </div>

            <!-- hotel search -->
            <div class="bhoechie-tab-content">
                <center>
                    <h1 class="glyphicon glyphicon-home" style="font-size:12em;color:#55518a"></h1>
                    <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                    <h3 style="margin-top: 0;color:#55518a">Hotel Directory</h3>
                </center>
            </div>
            <div class="bhoechie-tab-content">
                <center>
                    <h1 class="glyphicon glyphicon-cutlery" style="font-size:12em;color:#55518a"></h1>
                    <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                    <h3 style="margin-top: 0;color:#55518a">Restaurant Diirectory</h3>
                </center>
            </div>
            <div class="bhoechie-tab-content">
                <center>
                    <h1 class="glyphicon glyphicon-credit-card" style="font-size:12em;color:#55518a"></h1>
                    <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                    <h3 style="margin-top: 0;color:#55518a">Credit Card</h3>
                </center>
            </div>
        </div>
        <p>pruebas</p>

    </div>             
</div>

@stop