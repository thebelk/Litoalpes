<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html;">
        <meta charset="utf-8">  
        <title>@yield('title', 'Litografia')</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Bootstrap core CSS -->
        {{ HTML::style('recursos/css/bootstrap.min.css' , array('media'=>'screen')) }}
        {{ HTML::style('recursos/css/styles.css' , array('media'=>'screen')) }}
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script type="text/javascript" src="/recursos/js/jquery.slimscroll.js"></script>
    </head>
    <body>
        @section('header')
        <header>     
            <div class="container-fluid">     
                <nav class="navbar navbar-default  navbar-fixed-top" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Desplegar navegación</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/user">LitoAlpes</a>
                    </div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="/user"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                            <li><a href="/customer" role="button" data-toggle="modal"><i class="glyphicon glyphicon-user"></i> Clientes</a>                             
                            <li><a href="/quotation" role="button" data-toggle="modal"><i class="glyphicon glyphicon-pencil"></i> Cotizar</a>
                            <li>
                                @if(DB::table('notifications')->count() === 0)
                                <a href="/notifications" role="button" data-toggle="modal"><i class="glyphicon glyphicon-bell"></i> Notificaciones</a>
                                @else
                                <a href="/notifications" role="button" data-toggle="modal"><i style="color:red" class="glyphicon glyphicon-warning-sign"></i> Notificaciones ({{ DB::table('notifications')->count() }})</a>
                                @endif
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge"><i class="glyphicon glyphicon-plus"></i> Orden | Trabajo</span></a>
                                <ul class="dropdown-menu nav " >
                                    <form class="form-horizontal" role="form" action="/customer/search" method="POST">
                                         <a style="margin-left: 190px" href="/customer/create" role="button" data-toggle="modal"><i class="glyphicon glyphicon-user " ></i> Nuevo</a>  
										<div class="form-group">
                                            <label for="nit_cc">Nit / C.C</label>
                                            <input class="form-control" type="text" name="nit_cc" id="nit_cc"/>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                    </form>
                                </ul>
                            </li>
                        </ul>                        
                        <ul class="nav navbar-right   navbar-nav nave">
                            <li class="dropdown dropdown-toggle">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i> Bildirimler <span class="badge">0</span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="dropdown-header">No message.</li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" class="navbar-link"><i class="glyphicon glyphicon-user"></i><span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li class="active"><a class="animate" href="#">Home</a></li>
                                    <li>{{ HTML::link('/user/'.Auth::user()->representante.'/edit','Users', array('class' => 'animate'), false)}}</li>
                                    <li><a class="animate" href="/user/{user}/income">Ingresos</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a class="animate" href="/logout">Salir</a></li>
                                </ul>
                            </li>
                            <!--
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badgeadmin"><i class="glyphicon glyphicon-user"></i></span></a>
                                <ul class="dropdown-menu" >                                   
                                    <li><a href="/user/{user}/income">Ingresos</a></li>
                                    <li class="divider"></li>
                                    <li><a href="/logout">Salir</a></li>
                                </ul>
                            </li> --> 
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        @show        
        <div class="container-fluid content">   
            @yield('content') 
            @show  
        </div> 
        @section('footer')		
        <!--footer start-->
        <footer id="footer" class="footer">
            <div class="container">							
                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms">
                    <div class="footer-single"><br>					
                        <h5>UBICACIÓN</h5>

                        <p>Alpes Calle 31 A - #70 - 03</p>
                        <p>Tel. (5) 6634041 - Cel. 3106054347 </p>							

                    </div>
                </div>			

                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="600ms">
                    <div class="footer-single"><br><!--
                            <center>
                            {{ HTML::image('recursos/img/logo.png', 'a picture') }}
                            </center>
                            
                                    <h6>Explore</h6>-->
                        <ul>
                            <p> litoalpes6677@hotmail.com</p>
                            <p>litografialosalpes@gmail.com</p>
                            <p>Cartagena de Indias - Colombia.</p>
                        </ul>
                    </div>
                </div>	

                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="600ms">
                    <div class="footer-single"><br>
                    <!--	<center>							
                            {{ HTML::image('recursos/img/logo.png', 'a picture') }}	
                            </center>
                            
                                    <h6>Explore</h6>
                                    <ul>
                                            <li><a href="#">Inside Us</a></li>
                                            <li><a href="#">Flickr</a></li>
                                            <li><a href="#">Google</a></li>
                                            <li><a href="#">Forum</a></li>
                                    </ul>-->
                    </div>
                </div>										
        </footer>
        <div id="footerend" class="footerend">
            <div class="container">	
                <div class="col-md-6"><br>
                    <div class="copyright">
                        <h5><b>&copy;  by Belkis Buelvas Castillo - Copyright - 2016</b></h5>

                    </div>
                </div>
            </div>			  
        </div>
        <!-- footer end -->
        @show        


        <!-- script references -->

        <script src="/recursos/js/bootstrap.min.js"></script>
        <script src="/recursos/js/scripts.js"></script>
        <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>

    </body>
</html>