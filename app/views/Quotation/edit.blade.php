@extends('layouts.master')
<head> 
    @section ('title')Cotizacion  @stop
</head>
@section('header')  
@parent
@stop
@section('content')
<div class="col col-sm-3 complement">   
   <h3 class="highlight nav nav-stacked ">{{Auth::user()->razon_social}}</h3>
     <br>
    <div class="comp">        
            <h2>{{ Auth::user()->representante}}  </h2>
            <h5> Nit: {{ Auth::user()->nit_cc}}  </h5>
            <h5>Telefono: {{ Auth::user()->telefono}} </h5>
            <h5>Celular: {{ Auth::user()->celular}} </h5>   
            <h5>{{ Auth::user()->otro}} </h5>       
            
    </div>
    <h5>{{ HTML::link('/user/'.Auth::user()->id.'/edit','Editar', array('class' => 'btn btn-link'), false)}}</h5>
    <div class="accordion" id="accordion2">
        <div class="accordion-group">
            <div class="accordion-heading"><h5>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        Correo Electronico
                    </a></h5>
            </div>
            <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <br>
                    <p> <h5>Email: {{ Auth::user()->email}} </h5></p>
                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading"><br><h5>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                        Dirección
                    </a></h5>
            </div>
            <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
                    <br>
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
            <a href="/quotation" class="list-group-item  text-center">                           
                <h5 class="glyphicon glyphicon-pencil "></h5><br/><h5>Listar Cotización</h5>
            </a>
			<a href="/workorderlist" class="list-group-item active  text-center">
                <h5 class="list-group-item-heading glyphicon glyphicon-th-list"></h5><h5>Trabajos</h5>
            </a>
			<a href="/phonebook" class="list-group-item  text-center">                           
                <h5 class="glyphicon glyphicon-earphone"></h5><br/><h5>Contactos | Proveedor</h5>
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
        <div class="bhoechie-tab-content active">
            <center>                 
                <div class="panel panel-default tam">
                    <!-- Default panel contents -->
                    <div class="panel-heading ">                       
                        <h3 class="glyphicon glyphicon-pencil color" ></h3>
                        <h4> Editar Cotización</h4> 
                    </div>
                </div>
            </center>
            <div class="panel-body tam pancol">
				<div class="com2 "></div>
                <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                <div class="panel panel-default ">
                    {{Form::open(array('url' => '/quotation/'.$quotation->id,'method' => 'PUT', 'role'=>'form')) }}
                    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                    <div class="row ">
                        <div class="col-xs-6 col-md-4 imp ">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('cliente', 'CLIENTE:') }}
                                {{ Form::text('id', $quotation->id, array('hidden' => 'true')) }}
                                {{ Form::text('cliente', $quotation->cliente, array('placeholder' => 'Cliente', 'class' => 'form-control', 'required' => 'required')) }}
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4 imp">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('cel_contacto', 'NUMERO DE CONTACTO:') }}
                                {{ Form::text('cel_contacto', $quotation->cel_contacto, array('placeholder' => 'Celular', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4 imp">                                     
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('tipo_cliente', 'TIPO CLIENTE:') }}
                                {{ Form::select('tipo_cliente', array('Tipo Cliente' => array( '1' => 'Seleccionar', '2' => 'Servicio','3' => 'Producto')),$quotation->tipo_cliente ,array('class' => 'form-control')); }}
                            </div>
                            <br>
                        </div>
                        <div class="col-xs-6 col-md-4 imp">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('nit_cc', 'NIT / CC:') }}
                                {{ Form::text('nit_cc', $quotation->nit_cc, array('placeholder' => 'Nit / CC', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4 imp">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('empresa', 'EMPRESA:') }}
                                {{ Form::text('empresa', $quotation->empresa, array('placeholder' => 'Empresa', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4 imp ">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('telefono', 'TELEFONO:') }}
                                {{ Form::text('telefono', $quotation->telefono, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}
                            </div>
                            <br>
                        </div>
                        <div class="col-xs-6 col-md-4 imp ">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('direccion', 'DIRECCIÓN:') }}
                                {{ Form::text('direccion', $quotation->direccion, array('placeholder' => 'DirecciÓn', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4 imp">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('ciudad', 'CIUDAD:') }}
                                {{ Form::text('ciudad', $quotation->ciudad, array('placeholder' => 'Ciudad', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4 imp ">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('pais', 'PAIS:') }}
                                {{ Form::text('pais', $quotation->pais, array('placeholder' => 'Pais', 'class' => 'form-control')) }}
                            </div>
                            <br>
                        </div>
                        <div class="col-xs-6 col-md-4 imp">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('email', 'E-MAIL:') }}
                                {{ Form::text('email', $quotation->email, array('placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required')) }}
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4 imp">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('pagina_web', 'PAGINA WEB:') }}
                                {{ Form::text('pagina_web', $quotation->pagina_web, array('placeholder' => 'Pagina Web', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4 imp">
                            <div class='form-group form-register'align="justify">
                                {{ Form::label('otro', 'OTRO:') }}
                                {{ Form::text('otro', $quotation->otro, array('placeholder' => 'Otro', 'class' => 'form-control')) }}
                            </div>
                            <br>
                        </div>                        
                    </div> 
                </div>
                <div class="panel panel-default ">
                    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                    <div class="row ">                            
                        <div class="col-xs-12 col-md-6 imp ">                                   
                            <div class='form-group form-register'>
                                {{ Form::label('clase_trabajo', 'CLASE DE TRABAJO:') }}
                                {{ Form::text('clase_trabajo', $quotation->clase_trabajo, array('placeholder' => 'Clase Trabajo', 'class' => 'form-control', 'required' => 'required')) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 imp">                                     
                            <div class='form-group form-register'>
                                {{ Form::label('estado_cotizacion', 'ESTADO DE COTIZACIÓN:') }}
                                {{ Form::select('estado_cotizacion', array('Estado Cotizacion' => array('1' => 'Espera', '2' => 'Elaborado', '3' => 'Enviado', '4' => 'Autorizado')),$quotation->estado_cotizacion ,array('class' => 'form-control')); }}
                            </div>
                        </div>

                        <div class="col-xs-12 imp">  
                            <div class='form-group form-register tex'>
                                {{ Form::label('especificaciones', 'ESPECIFICACIONES:') }}
                                {{ Form::textarea('especificaciones', $quotation->especificaciones, array('rows' => '4', 'placeholder' => 'Especificaciones', 'class' => 'form-control', 'required' => 'required')) }}
                            </div>
                        </div>
                        <div class="button col-xs-12"align="right">
                            {{ Form::button('Resetear', array('type' => 'reset', 'class' => 'btn btn-default')) }} 
                            {{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn  btn-success')) }}  
                        </div>
                        <div class="col-xs-12  imp"> 
                            <br>
                            <div class='form-group form-register tex'>
                                {{ Form::label('cotizacion', 'COTIZACIÓN:') }}
                                {{ Form::textarea('cotizacion', $quotation->cotizacion, array('rows' => '4', 'placeholder' => 'Cotización', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="button  "align="center">                      
                            {{ Form::button('Enviar', array('type' => 'submit', 'class' => 'btn  btn-success')) }}
                        </div>
                        <br>
                    </div>	
                </div>
            </div>
        </div> 
        {{ Form::close() }}
    </div> 
</div>
@stop
