@extends('layouts.master')
<head> 
    @section ('title')Clientes @stop
</head>
@section('header')
@parent
@stop
@section('content')
<div class="col col-sm-3 complement">   
    <h3 class="highlight nav nav-stacked ">{{Auth::user()->razon_social}} <i class="glyphicon glyphicon glyphicon-print pull-right"></i></h3>
    <br>
    <div class="row panel">
        <div class="col-sm-8 col-md-12">
            <h2 class="color">{{ Auth::user()->representante}}  </h2><br>
            <h4 class="color"> Nit: {{ Auth::user()->nit_cc}}  </h4>
            <h4>Telefono: {{ Auth::user()->telefono}} </h4>
            <h4>Celular: {{ Auth::user()->celular}} </h4>   
            <h4>{{ Auth::user()->otro}} </h4>  
        </div>         
        <h4>{{ HTML::link('/user/'.Auth::user()->id.'/edit','Editar', array('class' => 'btn btn-link'), false)}}</h4>     
    </div>
    <br><br>
    <div class="accordion" id="accordion2">
        <div class="accordion-group">
            <div class="accordion-heading"><h4>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        Correo Electronico
                    </a></h4>
            </div>
            <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <br>
                    <p> <h4>Email: {{ Auth::user()->email}} </h4></p>
                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading"><br><h4>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                        Dirección
                    </a></h4>
            </div>
            <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
                    <br>
                    <h4>Direccion: {{ Auth::user()->direccion}} </h4>
                    <h4> Ciudad: {{ Auth::user()->ciudad}} </h4>
                    <h4> Pais: {{ Auth::user()->pais}} </h4>
                </div>
            </div>
        </div>
        <br>
    </div> 
    <hr>
    <div id="sidebar">                         
        <div class="list-group">                        
            <a href="create" class="list-group-item active text-center">                           
                <h4 class="glyphicon glyphicon-plus"></h4><br/><h4>Nuevo Cliente</h4>
            </a>                         
            <a href="/customer" class="list-group-item text-center">
                <h4 class="glyphicon glyphicon-user "></h4><br/><h4>Listar Clientes</h4>
            </a>
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
    <div class="row ">                             
        <!-- cho section -->
        <center> 
            <div class="bhoechie-tab-content active">
                <div class="panel panel-default tam">
                    <!-- Default panel contents -->
                    <div class="panel-heading row panel"> <h3 class="list-group-item-heading color">
                            <h2 class="glyphicon glyphicon-user color" ></h2>
                            <h3> Nuevo Cliente</h3> 
                    </div>
                </div>
        </center> 
        <div class="panel-body tam">
            <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
            <div class="panel panel-default ">
                {{Form::open(array('url' => '/customer','role'=>'form', 'method' => 'POST')) }}
                <div class="row ">                                  
                    <div class="col-xs-6 col-md-4 imp ">
                        <div class='form-group form-register'align="justify">
                            {{ Form::label('cliente', 'CLIENTE:') }}
                            {{ Form::text('cliente', null, array('placeholder' => 'Cliente', 'class' => 'form-control', 'required' => 'required')) }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 imp">
                        <div class='form-group form-register'align="justify">
                            {{ Form::label('cel_contacto', 'NUMERO DE CONTACTO:') }}
                            {{ Form::text('cel_contacto', null, array('placeholder' => 'Telefonos', 'class' => 'form-control', 'required' => 'required')) }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 imp">                                     
                        <div class='form-group form-register'align="justify">
                            {{ Form::label('tipo_cliente', 'TIPO CLIENTE:') }}
                            {{ Form::select('tipo_cliente', array('Tipo Cliente' => array( '1' => 'Seleccionar','1' => 'Directo ', '2' => 'Servicio')),null ,array('class' => 'form-control')); }}
                        </div>
                        <br>
                    </div>
                    <div class="col-xs-6 col-md-4 imp">
                        <div class='form-group form-register'align="justify">
                            {{ Form::label('nit_cc', 'NIT / CC:') }}
                            {{ Form::text('nit_cc', null, array('placeholder' => 'Nit / CC', 'class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 imp">
                        <div class='form-group form-register'align="justify">
                            {{ Form::label('empresa', 'EMPRESA:') }}
                            {{ Form::text('empresa', null, array('placeholder' => 'Empresa', 'class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 imp ">
                        <div class='form-group form-register'align="justify">
                            {{ Form::label('telefono', 'TELEFONO:') }}
                            {{ Form::text('telefono', null, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}
                        </div>
                        <br>
                    </div>
                    <div class="col-xs-6 col-md-4 imp ">
                        <div class='form-group form-register'align="justify">
                            {{ Form::label('direccion', 'DIRECCIÓN:') }}
                            {{ Form::text('direccion', null, array('placeholder' => 'DirecciÓn', 'class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 imp">
                        <div class='form-group form-register'align="justify">
                            {{ Form::label('ciudad', 'CIUDAD:') }}
                            {{ Form::text('ciudad', null, array('placeholder' => 'Ciudad', 'class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 imp ">
                        <div class='form-group form-register'align="justify">
                            {{ Form::label('pais', 'PAIS:') }}
                            {{ Form::text('pais', null, array('placeholder' => 'Pais', 'class' => 'form-control')) }}
                        </div>
                        <br>
                    </div>
                    <div class="col-xs-6 col-md-4 imp">
                        <div class='form-group form-register'align="justify">
                            {{ Form::label('email', 'E-MAIL:') }}
                            {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 imp">
                        <div class='form-group form-register'align="justify">
                            {{ Form::label('pagina_web', 'PAGINA WEB:') }}
                            {{ Form::text('pagina_web', null, array('placeholder' => 'Pagina Web', 'class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 imp">
                        <div class='form-group form-register'align="justify">
                            {{ Form::label('otro', 'OTRO:') }}
                            {{ Form::text('otro', null, array('placeholder' => 'Otro', 'class' => 'form-control')) }}
                        </div>
                        <br>
                    </div>
                </div> 
                <center>
                    {{ Form::button('Resetear', array('type' => 'reset', 'class' => 'btn btn-default')) }} 
                    {{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn  btn-success')) }}
                </center>
                <br>
            </div>
        </div>

    </div>
    {{ Form::close() }}


</div>  
</div>  
@stop

