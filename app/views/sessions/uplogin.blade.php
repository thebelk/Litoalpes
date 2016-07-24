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
			<div class="container">
               
            </div>
            <div class="container-">     
				<nav class="navbar navbar-static" role="navigation">					  
					 <div class="nav-collapse collase">
						<div class=" navbar-left">
							<div class="bootoom">
								<h2><span class="label label-success cont">Litografia Los Alpes</span></h2>
							</div>
						</div>
						<div class=" navbar-right"> 
							<div class="bootoom">
								<!--   <button type="button" class="btn btn-primary colo"><b>Registrate</b></button>  -->
								<button type="button" class="btn btn-default btn-lg">{{ HTML::link('/user/create','Crear cuenta',array ('class' => 'colo')) }}</button>
                                <button type="button" class="btn btn-success btn-lg">{{ HTML::link('/login',' Iniciar sesion',array ('class' => 'colt')) }}</button> 

							</div>                                                          
						</div>
					</div>  
				</nav>
            </div>
        </header>
        @show        

        <div id="container">
            <center>
                <div class="row login ">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="row panel panel-default">
                            <div class="panel-body">
                                <h2 class="form-signin-heading" >Lito Alpes</h2>                                                            
                                <h4> Por favor, vuelva a introducir su contraseña. </h4>
                                <p> El correo electrónico y la contraseña que ingresaste no coinciden. Por favor, asegúrate de que el bloqueo de mayúsculas no está activado e inténtalo de nuevo. </P>
                            </div>
                        </div> 
                        <div class=" row panel panel-default"style=" padding: 25px;">
							<div class="menulog">
								{{Form::open(array('route' => 'sessions.store','role'=>'form', 'class'=>'form-signin')) }}
								<div class='form-group'>
									<label for="inputEmail3" class="col-sm-1 control-label">Email</label>
									{{ Form::email('email', null, array('placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required')) }}
								</div>
								<div class='form-group'>
									<label for="inputEmail3" class="col-sm-1 control-label">Password</label>
									{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control', 'required' => 'required')) }}
								</div>
							</div>
                            <!--  <div class='form-group'>
                            {{ Form::checkbox('remember-me', 'value')}}
                            </div>-->
                            <div class='form-group '>
                                {{ Form::button('iniciar seción', array('type' => 'submit', 'class' => 'btn btn-success')) }}  
                            </div> 
                            {{Form::close()}}
                            <p> ¿Olvidaste tu contraseña ? </p>
                            <button type="button" class="btn btn-link">Recuperar clave</button> 
                        </div>
                    </div>
                </div>
            </center>
        </div>
		 <footer>
			@section('footer')
			@parent
			@stop
        </footer>

        @show       

        <!-- script references -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="/recursos/js/bootstrap.min.js"></script>
        <script src="/recursos/js/scripts.js"></script>
        <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    </body>
</html>
