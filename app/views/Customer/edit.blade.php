@extends('layouts.master')
<head> 
    @section ('title')Clientes @stop
</head>
@section('header')
@parent
@stop
@section('content')
<div class="col col-sm-3 complement">   
    <h3 class="highlight nav nav-stacked ">{{Auth::user()->razon_social}}</h3>
    <br>
    <div class="comp">        
        <h2 class="til">{{ Auth::user()->representante}}  </h2>
        <h5> Nit: {{ Auth::user()->nit_cc}}  </h5>
        <h5>Telefono: {{ Auth::user()->telefono}} </h5>
        <h5>Celular: {{ Auth::user()->celular}} </h5>   
        <h5>{{ Auth::user()->otro}} </h5>       

    </div>
    <h5>{{ HTML::link('/user/'.Auth::user()->id.'/edit','Editar', array('class' => 'btn btn-link'), false)}}</h5>
    <div class="accordion" id="accordion2">
        <div class="accordion-group">
            <div class="accordion-heading"><h4>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        Correo Electronico
                    </a></h4>
            </div>
            <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <p> <h5>Email: {{ Auth::user()->email}} </h5></p>
                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading"><h4>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                        Dirección
                    </a></h4>
            </div>
            <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
                    <h5>Direccion: {{ Auth::user()->direccion}} </h5>
                    <h5> Ciudad: {{ Auth::user()->ciudad}} </h5>
                    <h5> Pais: {{ Auth::user()->pais}} </h5>
                </div>
            </div>
        </div>
        <br>
    </div> 
    <br>
    <div id="sidebar">                         
        <div class="list-group">                      
            <a href="customer/create" class="list-group-item  text-center">                           
                <h5 class="glyphicon glyphicon-plus"></h5><br/><h4>Nuevo Cliente</h4>
            </a>
           <a href="phonebook/create" class="list-group-item active  text-center">                           
                <h5 class="glyphicon glyphicon-plus"></h5><br/><h4>Nuevo Contato </h4>
            </a> 
            <a href="/phonebook" class="list-group-item  text-center">
                <h5 class="list-group-item-heading glyphicon glyphicon-earphone"></h5><h4>Contactos | Proveedor</h4>
            </a>
        </div>        
    </div>
    <div class="col-sm-8 col-md-12 not">
        <h3 class="color" > Entregas de Hoy </h3>
        <p> Pruebas </p>
    </div>

</div>  

<div class="col col-sm-9">
    <div class="row ">                             
        <!-- cho section -->
            <center>                  
                <div class="panel panel-default tam">
                    <!-- Default panel contents -->
                    <div class="panel-heading ">
                        <h3 class="glyphicon glyphicon-user color" ></h3>
                        <h4> Editar Cliente</h4> 
                    </div>
                </div>
                <div class="panel-body pancol tam">
                    <div class="com2 "></div>
                    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                    <div class="panel panel-default ">
                        {{Form::open(array('url' => '/customer/'.$customer->id,'method' => 'PUT', 'role'=>'form')) }}
                        <div class="row ">                                  
                            <div class="col-xs-6 col-md-4 imp ">
                                <div class='form-group form-register'align="justify">
                                    {{ Form::label('cliente', 'CLIENTE:') }}
                                    {{ Form::text('id', $customer->id, array('hidden' => 'true')) }} 
                                    {{ Form::text('cliente', $customer->cliente, array('placeholder' => 'Cliente', 'class' => 'form-control', 'required' => 'required')) }}
                                </div>
                            </div>
							<div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'align="justify">
                                    {{ Form::label('nit_cc', 'NIT / CC:') }}
                                    {{ Form::text('nit_cc', $customer->nit_cc, array('placeholder' => 'Nit / CC', 'class' => 'form-control')) }}
                                </div>
                            </div>
                            
                            <div class="col-xs-6 col-md-4 imp">                                     
                                <div class='form-group form-register'align="justify">
                                    {{ Form::label('tipo_cliente', 'TIPO CLIENTE:') }}
                                    {{ Form::select('tipo_cliente', array('Tipo Cliente' => array( '1' => 'Seleccionar','1' => 'Directo ', '2' => 'Tercero')),$customer->tipo_cliente ,array('class' => 'form-control')); }}
                                </div>
                                <br>
                            </div>
							<div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'align="justify">
                                    {{ Form::label('cel_contacto', 'NUMERO DE CONTACTO:') }}
                                    {{ Form::text('cel_contacto', $customer->cel_contacto, array('placeholder' => 'Celular', 'class' => 'form-control')) }}
                                </div>
                            </div>
                            
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'align="justify">
                                    {{ Form::label('empresa', 'EMPRESA:') }}
                                    {{ Form::text('empresa', $customer->empresa, array('placeholder' => 'Empresa', 'class' => 'form-control')) }}
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp ">
                                <div class='form-group form-register'align="justify">
                                    {{ Form::label('telefono', 'TELEFONO:') }}
                                    {{ Form::text('telefono', $customer->telefono, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}
                                </div>
                                <br>
                            </div>
                            <div class="col-xs-6 col-md-4 imp ">
                                <div class='form-group form-register'align="justify">
                                    {{ Form::label('direccion', 'DIRECCIÓN:') }}
                                    {{ Form::text('direccion', $customer->direccion, array('placeholder' => 'Dirección', 'class' => 'form-control')) }}
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'align="justify">
                                    {{ Form::label('ciudad', 'CIUDAD:') }}
                                    {{ Form::text('ciudad', $customer->ciudad, array('placeholder' => 'Ciudad', 'class' => 'form-control')) }}
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp ">
                                <div class='form-group form-register'align="justify">
                                    {{ Form::label('pais', 'PAIS:') }}
                                    {{ Form::text('pais', $customer->pais, array('placeholder' => 'Pais', 'class' => 'form-control')) }}
                                </div>
                                <br>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'align="justify">
                                    {{ Form::label('email', 'E-MAIL:') }}
                                    {{ Form::text('email', $customer->email, array('placeholder' => 'Email', 'class' => 'form-control')) }}
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'align="justify">
                                    {{ Form::label('pagina_web', 'PAGINA WEB:') }}
                                    {{ Form::text('pagina_web', $customer->pagina_web, array('placeholder' => 'Pagina Web', 'class' => 'form-control')) }}
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'align="justify">
                                    {{ Form::label('otro', 'OTRO:') }}
                                    {{ Form::text('otro', $customer->otro, array('placeholder' => 'Otro', 'class' => 'form-control')) }}
                                </div>
                                <br>
                            </div>
                        </div> 
                        {{ HTML::link('/customer/'.$customer->id.'/profile','Limpiar', array('class' => 'btn btn-default'), false)}}                       
                        {{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn  btn-success')) }}  

                    </div> 
                </div>
            </center>
        {{ Form::close() }}
    </div> 
</div>  
@stop

