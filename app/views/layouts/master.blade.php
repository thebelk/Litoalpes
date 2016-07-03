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
					<nav class="navbar navbar-static" role="navigation">
					  <!-- El logotipo y el icono que despliega el menú se agrupan
						   para mostrarlos mejor en los dispositivos móviles -->
					  <div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse"
								data-target=".navbar-ex1-collapse">
						  <span class="sr-only">Desplegar navegación</span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Logotipo</a>
					  </div>
					 
					  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
						   otro elemento que se pueda ocultar al minimizar la barra -->
					  <div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
						  <li><a href="/user"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                            <li><a href="/customer" role="button" data-toggle="modal"><i class="glyphicon glyphicon-user"></i> Clientes</a>                             
                            <li><a href="/quotation" role="button" data-toggle="modal"><i class="glyphicon glyphicon-pencil"></i> Cotizar</a>
                            <li><a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-bell"></i> Notificaciones</a>
                            <li><a href="/customer/create"><span class="badge"><i class="glyphicon glyphicon-plus"></i> Orden | Trabajo</span></a></li>
						  
						   <!--
						  <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							  Menú #1 <b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
							  <li><a href="#">Acción #1</a></li>
							  <li><a href="#">Acción #2</a></li>
							  <li><a href="#">Acción #3</a></li>
							  <li class="divider"></li>
							  <li><a href="#">Acción #4</a></li>
							  <li class="divider"></li>
							  <li><a href="#">Acción #5</a></li>
							</ul>
						  </li>
						</ul>
					
						<form class="navbar-form navbar-left" role="search">
						  <div class="form-group">
							<input type="text" class="form-control" placeholder="Buscar">
						  </div>
						  <button type="submit" class="btn btn-default">Enviar</button>
						</form> -->
						</ul>
						<ul class="nav navbar-right navbar-nav nave">
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
