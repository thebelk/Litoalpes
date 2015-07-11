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

    </head>
    <body>
        @section('header')
        <header>     
            <div class="container-">
                <nav class="navbar navbar-static">          
                    <div class="nav-collapse collase">
                        <ul class="nav navbar-nav">
                            <li><a href="/user"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                            <li><a href="/customer" role="button" data-toggle="modal"><i class="glyphicon glyphicon-user"></i> Clientes</a>                             
                            <li><a href="/quotation" role="button" data-toggle="modal"><i class="glyphicon glyphicon-pencil"></i> Cotizar</a>
                            <li><a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-bell"></i> Notificaciones</a>
                            <li><a href="/customer/create"><span class="badge"><i class="glyphicon glyphicon-plus"></i> Orden / Trabajo</span></a></li>

                        </ul>
                        <ul class="nav navbar-right navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-search"></i></a>
                                <ul class="dropdown-menu" >
                                    <form class="form-inline">
                                        <button type="submit" class="btn btn-default pull-right"><i class="glyphicon glyphicon-search"></i></button><input type="text" class="form-control  pull-left " placeholder="Search">
                                    </form>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <i class="glyphicon glyphicon-chevron-down"></i></a>
                                <ul class="dropdown-menu" >                                   
                                    <li><a href="#">Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="/logout">Salir</a></li>
                                </ul>
                            </li>  
                        </ul>
                    </div>                
                </nav>
            </div>
        </header>
        @show        
        <div class="container-fluid">   
            @yield('content') 
        </div>  
        <footer>
            <div class="footer">
                @yield('footer')


            </div>
        </footer>
        @show       

        <!-- script references -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="/recursos/js/bootstrap.min.js"></script>
        <script src="/recursos/js/scripts.js"></script>
        <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    </body>
</html>
