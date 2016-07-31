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

                        <div class=" navbar-right" style="margin: 30px" > 
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badgeadmin"><i class="glyphicon glyphicon-user"></i> </span> </a>
                            <ul class="dropdown-menu" >
                                <form class="form-horizontal" action="signup" method="post">
                                    <div class="center-text adm">
                                        <span class="error-message color-red"> Admin</span>
                                    </div>
                                    <div style="margin-bottom: 10px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                                        <!-- USERNAME OR EMAIL ADDRESS -->
                                        <input id="username " type="text" class="form-control  " name="username"  placeholder="username" pattern="[a-zA-Z0-9]{5,}" title="Minimum 5 letters or numbers." oninvalid="this.setCustomValidity('Enter User Name Here')" oninput="setCustomValidity('')" required>                                        
                                    </div>
                                    <div class="center-text adm">
                                        <span class="error-message color-red"> password</span>
                                    </div>
                                    <div style="margin-bottom: 10px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                                        <!--  PASSWORD  -->
                                        <input id="passwords" type="password" class="form-control" name="passwords" placeholder="password" pattern=".{5,}" title="Minmimum 5 letters or numbers." oninvalid="this.setCustomValidity('Enter a password')" oninput="setCustomValidity('')" required>
                                    </div><!--
                                    <div class="center-textb adm">
                                        <label><input id="login-remember" type="checkbox" name="remember" value="1"> Remember me</label>
                                    </div>-->

                                    <div style="margin-top:10px" class="form-group">
                                        <!-- Button -->
                                        <div class="col-sm-12 controls center-text adm">
                                            <button  type="submit" class="btn btn-block btn-success">Login</button>
                                            <!--<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>-->
                                        </div>
                                    </div>  
                                </form>
                            </ul>
                        </div> 
                    </div>  
                </nav>
            </div>
        </header>
        @show        
        <div id="container">
            <div class="row login ">
                <div class="col-xs-6">
                    <center>
                        <h1>Bienvenido  </h1>
                        <h4>
                            Registra las órdenes de trabajo de tus clientes. Obtén actualizaciones inmediatas  de los trabajos de mayor interés y 
                            Cotiza  
                        </h4> 
                        <br><br>
                        {{ HTML::image('recursos/img/logo.png', 'a picture') }}
                    </center>
                </div>
                <center>
                    <div class="col-xs-6">
                        <div class="row panel panel-default "style=" padding: 25px; border-radius: 8px ">
                            <div class="panel-body">
                                <h2 class="form-signin-heading" >Lito Alpes</h2>                                                            
                                <h4> Acceder a la cuenta. </h4>
                                <p> Ingresar el correo electrónico y la contraseña. Por favor, asegúrate de que el bloqueo de mayúsculas no está activado. </P>
                            </div>
                            {{Form::open(array('route' => 'sessions.store','role'=>'form', 'class'=>'form-signin')) }}
                            <div class="menulog">
                                <div class='form-group'>
                                    <label for="inputEmail3" class="col-sm-1 control-label">Email</label>
                                    {{ Form::email('email', null, array('placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required')) }}
                                </div>
                                <div class='form-group'>
                                    <label for="inputEmail3" class="col-sm-1 control-label">Password</label>
                                    {{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control', 'required' => 'required')) }}
                                </div>
                            </div>	
                            <div class='form-group '>
                                <!--    <label for="remember" >Recordar mis datos </label>
                                   {{ Form::input('checkbox','remember','on') }}
                           </div>
                          <div class='form-group'>
                                   {{ Form::checkbox('remember-me', 'value')}}
                           </div>-->
                                <div class='form-group '>
                                    {{ Form::button('Iniciar Sesión', array('type' => 'submit', 'class' => 'btn btn-success')) }}  
                                </div> 

                                {{Form::close()}}
                                <p> ¿Olvidaste tu contraseña ? </p>
                                <button type="button" class="btn btn-link">Recuperar clave</button>                          
                            </div>    

                        </div>
                    </div> 
                </center>			
            </div>
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

        <script type="text/javascript">
       
        session_start();

        // Obtengo los datos cargados en el formulario de login.
        $username = $_POST['username'];
        $password = $_POST['passwords'];

        // Esto se puede remplazar por un usuario real guardado en la base de datos.
        if ($username == 'thebelk' && $passwords == 'admin2016') {
            
            header("signup");
            header("Location: user.create.php");    
        } 
        </script>
    </body>
</html>
