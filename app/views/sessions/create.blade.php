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
                        <div class=" navbar-left">
                            <div class="bootoom">
                                <h2><span class="label label-success cont">Litografia Los Alpes</span></h2>
                            </div>
                        </div>
                        <div class=" navbar-right"> 
                            <div class="bootoom">
                                <button type="button" class="btn btn-default btn-lg">{{ HTML::link('/user/create','Registrate',array ('class' => 'colo')) }}</button>
                                <button type="button" class="btn btn-success btn-lg">{{ HTML::link('/login',' Iniciar sección',array ('class' => 'colt')) }}</button> 

                            </div>                                                          
                        </div>
                    </div>                
                </nav>
            </div>
        </header>
        @show        

        <div id="container">
            <center>
                <div class="row">
                    <div class="col-md-7 col-md-offset-3">
                        <div class="row panel panel-default">
                            <div class="panel-body">
                                <h2 class="form-signin-heading" >Lito Alpes</h2>                                                            
                                <h4> Crear una cuenta. </h4>
                                <p> Registra la siguiente información y en breve podrás acceder a nuestros servicios. </P>

                            </div>                        
                            {{Form::open(array('route' => 'user.store','role'=>'form', 'class'=>'form-inline')) }}
                            <div class='row'>
                                <div class="col-md-6">
                                    <div class='form-group form-register'>
                                        {{ Form::label('razon_social', 'Razon Social:') }}<br>
                                        {{ Form::text('razon_social', null, array('placeholder' => 'Razon Social', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-register">
                                        {{ Form::label('nit_cc', 'Nit / CC:') }}<br>
                                        {{ Form::text('nit_cc',null, array('placeholder' => 'Nit / CC', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-md-6">
                                    <div class='form-group form-register'>
                                        {{ Form::label('email', 'Email:') }}<br>
                                        {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required', 'pattern' => '[A-Za-z]*[0-9]*@gmail.com|[A-Za-z]*[0-9]*@hotmail.com|[A-Za-z]*[0-9]*@yahoo.es|[A-Za-z]*[0-9]*@outlook.com' ,'title' => 'Must be @hotmail.com or @gmail.com')) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class='form-group form-register'>
                                        {{ Form::label('confiremail', 'Confirmar Email:') }}<br>
                                        {{ Form::email('confiremail', null, array('placeholder' => 'Confirm Email', 'class' => 'form-control', 'pattern' => '[A-Za-z]*[0-9]*@gmail.com|[A-Za-z]*[0-9]*@hotmail.com|[A-Za-z]*[0-9]*@yahoo.es|[A-Za-z]*[0-9]*@outlook.com' ,'title' => 'Must be @hotmail.com or @gmail.com')) }}
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-md-6">
                                    <div class="form-group form-register">
                                        {{ Form::label('password', 'Password:') }}<br>
                                        {{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-register">
                                        {{ Form::label('confirpassword', 'Confirmar Password:') }}<br>
                                        {{ Form::password('confirpassword', array('placeholder' => 'Confirmar Password', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-md-6">
                                    <div class="form-group form-register">
                                        {{ Form::label('ciudad', 'Ciudad:') }}<br>
                                        {{ Form::text('ciudad', null, array('placeholder' => 'Ciudad', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-register">
                                        {{ Form::label('pais', 'Pais:') }}<br>
                                        {{ Form::text('pais', null, array('placeholder' => 'Pais', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-md-6">
                                    <div class="form-group form-register">
                                        {{ Form::label('direccion', 'Direccion:') }}<br>
                                        {{ Form::text('direccion', null, array('placeholder' => 'Direccion', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-register">
                                        {{ Form::label('barrio', 'Barrio:') }}<br>
                                        {{ Form::text('barrio', null, array('placeholder' => 'Barrio', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-md-6">
                                    <div class="form-group form-register">
                                        {{ Form::label('telefono', 'Telefono:') }}<br>
                                        {{ Form::text('telefono', null, array('placeholder' => 'Telefono', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-register">
                                        {{ Form::label('celular', 'Celular:') }}<br>
                                        {{ Form::text('celular', null, array('placeholder' => 'Celular', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-md-6">
                                    <div class="form-group form-register">
                                        {{ Form::label('representante', 'Representante:') }}<br>
                                        {{ Form::text('representante', null, array('placeholder' => 'Representante', 'class' => 'form-control', 'required' => 'required')) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-register">
                                        {{ Form::label('otro', 'Otro:') }}<br>
                                        {{ Form::text('otro', null, array('placeholder' => 'Otro', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>
                            <div class='row buttons'>                                
                                {{ Form::button('Reset', array('type' => 'reset', 'class' => 'btn btn-success')) }} 
                                {{ Form::button('Crear', array('type' => 'submit', 'class' => 'btn btn-default')) }}                                 
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </center>
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
