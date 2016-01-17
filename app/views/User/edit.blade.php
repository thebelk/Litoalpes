@extends('layouts.master')
<head> 
    @section ('title')Usuario @stop
</head>
@section('header')
@parent
@stop
@section('content')
<div class="col col-sm-3 complement">   
    <h3 class="highlight nav nav-stacked ">{{Auth::user()->razon_social}} <i class="glyphicon glyphicon glyphicon-print pull-right"></i></h3>
    <div class="row panel">
        <div class="col-sm-8 col-md-12">
            <h3 class="color">{{ Auth::user()->representante}}  </h3>
            <h5 class="color"> Nit: {{ Auth::user()->nit_cc}}  </h5>
            <h5>Telefono: {{ Auth::user()->telefono}} </h5>
            <h5>Celular: {{ Auth::user()->celular}} </h5>   
            <h5>{{ Auth::user()->otro}} </h5>  
        </div>                                           
    </div>
    <div class="accordion" id="accordion2">
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                    Correo Electronico
                </a>
            </div>
            <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <p> <h4>Email: {{ Auth::user()->email}} </h4></p>
                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                    Dirección
                </a>
            </div>
            <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
                    <h5>Direccion: {{ Auth::user()->direccion}} </h5>
                    <h5> Barrio: {{ Auth::user()->barrio}} </h5>
                    <h5> Ciudad: {{ Auth::user()->ciudad}} </h5>
                    <h5> Pais: {{ Auth::user()->pais}} </h5>
                </div>
            </div>
        </div>
    </div> 
    <hr>
    <div id="sidebar">  
        <div class="list-group">                        
            <a href="/workorder/create" class="list-group-item active text-center">
                <h4 class="glyphicon glyphicon-plus"></h4><br/>Nuevo Trabajo 
            </a>                        
            <a href="profile" class="list-group-item  text-center">                           
                <h4 class="glyphicon glyphicon-user"></h4><br/>Perfil
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
    <center>
        <div class="row panel">
            <div class="bhoechie-tab-content active">

                <h2 class="glyphicon glyphicon-user color" ></h2>
                <h3> Editar Usuario</h3>   

                <div class="panel-body">
                    {{Form::open(array('url' => '/user/'.Auth::user()->id,'method' => 'PUT', 'role'=>'form', 'class'=>'form-inline')) }}
                    <div class='row'>
                        <div class="col-md-6">
                            <div class='form-group form-register'>
                                {{ Form::label('razon_social', 'Razon Social:') }}<br>
                                {{ Form::text('id',Auth::user()->id, array('hidden' => 'true')) }}  
                                {{ Form::text('razon_social', Auth::user()->razon_social, array('placeholder' => 'Razon Social', 'class' => 'form-control', 'required' => 'required')) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-register">
                                {{ Form::label('nit_cc', 'Nit / CC:') }}<br>
                                {{ Form::text('nit_cc',Auth::user()->nit_cc, array('placeholder' => 'Nit / CC', 'class' => 'form-control', 'required' => 'required')) }}
                            </div>
                        </div>
                    </div>      
                    <div class='row'>
                        <div class="col-md-6">
                            <div class="form-group form-register">
                                {{ Form::label('ciudad', 'Ciudad:') }}<br>
                                {{ Form::text('ciudad', Auth::user()->ciudad, array('placeholder' => 'Ciudad', 'class' => 'form-control', 'required' => 'required')) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-register">
                                {{ Form::label('pais', 'Pais:') }}<br>
                                {{ Form::text('pais', Auth::user()->pais, array('placeholder' => 'Pais', 'class' => 'form-control', 'required' => 'required')) }}
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class="col-md-6">
                            <div class="form-group form-register">
                                {{ Form::label('direccion', 'Direccion:') }}<br>
                                {{ Form::text('direccion',Auth::user()->direccion, array('placeholder' => 'Direccion', 'class' => 'form-control', 'required' => 'required')) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-register">
                                {{ Form::label('barrio', 'Barrio:') }}<br>
                                {{ Form::text('barrio', Auth::user()->barrio, array('placeholder' => 'Barrio', 'class' => 'form-control', 'required' => 'required')) }}
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class="col-md-6">
                            <div class="form-group form-register">
                                {{ Form::label('telefono', 'Telefono:') }}<br>
                                {{ Form::text('telefono', Auth::user()->telefono, array('placeholder' => 'Telefono', 'class' => 'form-control', 'required' => 'required')) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-register">
                                {{ Form::label('celular', 'Celular:') }}<br>
                                {{ Form::text('celular',Auth::user()->celular, array('placeholder' => 'Celular', 'class' => 'form-control', 'required' => 'required')) }}
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class="col-md-6">
                            <div class="form-group form-register">
                                {{ Form::label('representante', 'Representante:') }}<br>
                                {{ Form::text('representante', Auth::user()->representante, array('placeholder' => 'Representante', 'class' => 'form-control', 'required' => 'required')) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-register">
                                {{ Form::label('otro', 'Otro:') }}<br>
                                {{ Form::text('otro', Auth::user()->otro, array('placeholder' => 'Otro', 'class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <div class='row buttons'> 
                        {{ HTML::link('/user','Cancelar', array('class' => 'btn btn-success'), false)}}                        
                        {{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn btn-default')) }}                                 
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
    </center>
</div>
</div>  
</div>  
@stop

