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
                    <div class="nav-collapse collase">
                        <div class=" navbar-left" style=" float: left">
                            <div class="bootoom">
                                <h2><span class="label label-success cont">Litografia LitoApp</span></h2>
                            </div>
                        </div>
                        <div class=" navbar-right" style="margin: 30px; float: left" > 
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badgeadmin"><i class="glyphicon glyphicon-user"></i></span> </a>
                            <ul class="dropdown-menu" > 
                                <li><a href="/logout">Salir</a></li>
                            </ul>
                        </div> 
                        
                    </div>  
                </nav>
            </div>
        </header>
	
        @show 
        <!-- container register -->
        <div id="container">
            <center>
                <div class="row login ">
                    <div class="col-md-7 col-md-offset-3">
                        <div class=" panel panel-default tam ">
                            <div class="panel-body pancol ">
                                <h2 class="form-signin-heading" ><b>LitoApp</b></h2> <br>                                                          
                                <h3 align="justify"><b>Crear una cuenta. </b> </h3>
                                <h5 align="justify"> ¿Registra tu información  y en breve podrás acceder a nuestro servicios? </h5>
                                <h5 align="justify">Los campos con asteriscos (*) son requeridos.</h5><br>
                            </div>
                        </div> 
                        <div class="panel-body tam pancol">
                            <div class="com2 "></div>
                            <div class="  panel panel-default"style=" padding: 35px;" >
                                {{Form::open(array('route' => 'user.store','role'=>'form')) }} 
                                <div class=" carousel-inner ">
                                    <div class="col-xs-6 col-md-6">
                                        <div class="form-group form-register"align="justify">
                                            {{ Form::label('representante', 'Nombre y Apellido *:') }}<br>
                                            {{ Form::text('representante', null, array('placeholder' => 'Nombre y Apellido', 'class' => 'form-control', 'required' => 'required')) }}
                                        </div>
                                    </div>
                                   
                                    <div class="col-xs-6 col-md-6">
                                        <div class='form-group form-register' align="justify">
                                            {{ Form::label('nit_cc', 'C.C / NIT *:') }}<br>
                                            {{ Form::text('nit_cc',null, array('placeholder' => 'C.C / Nit', 'class' => 'form-control', 'required' => 'required')) }}
                                        </div>
                                    </div>
									 <div class="col-xs-6 col-md-6">
                                        <div class="form-group form-register"align="justify">
                                            {{ Form::label('celular', 'Celular *:') }}<br>
                                            {{ Form::text('celular', null, array('placeholder' => 'Celular', 'class' => 'form-control', 'required' => 'required')) }}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-6">
                                        <div class='form-group form-register' align="justify">
                                            {{ Form::label('razon_social', 'Empresa *:') }}<br>
                                            {{ Form::text('razon_social', null, array('placeholder' => 'Empresa ', 'class' => 'form-control')) }}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 ">
                                        <div class='form-group form-register' align="justify">
                                            {{ Form::label('email', 'Email *:') }}<br>
                                            {{ Form::text('email', null, array('placeholder' => ' Email', 'class' => 'form-control', 'required' => 'required')) }}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 ">
                                        <div class='form-group form-register' align="justify">
                                            {{ Form::label('email_confirmation', 'Confirmar Email *:') }}<br>
                                            {{ Form::email('email_confirmation', null, array('placeholder' => 'Confirmar Email', 'class' => 'form-control', 'required' => 'required')) }}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 ">
                                        <div class='form-group form-register' align="justify">
                                            {{ Form::label('password', 'Password *:') }}<br>
                                            {{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control', 'required' => 'required')) }}
                                        </div>
                                    </div>

                                    <div class="col-xs-6 ">
                                        <div class='form-group form-register' align="justify">
                                            {{ Form::label('password_confirmation', 'Confirmar Password *:') }}<br>
                                            {{ Form::password('password_confirmation', array('placeholder' => 'Confirmar Password', 'class' => 'form-control', 'required' => 'required')) }}
                                        </div>
                                    </div>

                                    <div class="col-xs-6 ">
                                        <div class='form-group form-register' align="justify">
                                            {{ Form::label('pais', 'Pais:') }}<br>
                                            {{ Form::text('pais', null, array('placeholder' => 'Pais', 'class' => 'form-control')) }}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 ">
                                        <div class='form-group form-register' align="justify">
                                            {{ Form::label('ciudad', 'Ciudad / Municipio:') }}<br>
                                            {{ Form::text('ciudad', null, array('placeholder' => 'Ciudad', 'class' => 'form-control')) }}
                                        </div>
                                    </div>

                                    <div class="col-xs-6 ">
                                        <div class='form-group form-register' align="justify">
                                            {{ Form::label('direccion', 'Direccion:') }}<br>
                                            {{ Form::text('direccion', null, array('placeholder' => 'Direccion', 'class' => 'form-control')) }}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 ">
                                        <div class='form-group form-register' align="justify">
                                            {{ Form::label('telefono', 'Telefono :') }}<br>
                                            {{ Form::text('telefono', null, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}
                                        </div>
                                    </div>  
                                </div>
                                <div class='row buttons'>
                                    {{ Form::button('Limpiar', array('type' => 'reset', 'class' => 'btn btn-success')) }} 
                                    {{ Form::button('Crear', array('type' => 'submit', 'class' => 'btn btn-default')) }}                                 
                                </div>
                                {{ Form::close() }}  
                            </div>
                        </div>
                    </div>
                </div>
            </center>
        </div>


        <!-- footer -->
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
