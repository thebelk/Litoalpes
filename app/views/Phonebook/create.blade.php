@extends('layouts.master')
<head> 
    @section ('title')Contactos @stop
</head>
@section('header')
@parent
@stop
@section('content')

@section('container1')   
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
			<a href="/phonebook/create" class="list-group-item  text-center">                           
                <h5 class="glyphicon glyphicon-plus"></h5><br/><h4 class="cel">Nuevo Contato </h4>
            </a> 
            <a href="/phonebook" class="list-group-item active text-center">                           
                <h5 class="glyphicon glyphicon-earphone"></h5><br/><h4 class="cel">Contactos | Proveedor</h4>
            </a>                    

        </div>     
    </div>
	@stop
	
    @section('container2')
	@parent
	@stop
	
  
 @section('container3')
<div class="col col-sm-9">
    <div class="row ">                             
        <!-- cho section -->
            <center><!--
                <h2 class="glyphicon glyphicon-user color" ></h2>
                <h3> Nuevo Contacto</h3>  -->  
                <div class="panel panel-default tam">
                    <!-- Default panel contents -->
                    <div class="panel-heading"> 
                        <h3 class="glyphicon glyphicon-user color" ></h3>
                        <h4> Contacto | Proveedor </h4>                             
                    </div>
                </div>
                <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->               
                <section class="tab wow fadeInLeft tam">                     
                    <header class="panel-heading tab-bg-dark-navy-blue">
                        <ul class="nav nav-tabs nav-justified ">
                            <li class="active">
                                <a data-toggle="tab" href="#contacto">
                                    <h5>CONTACTOS</h5> 
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#proveedor">
                                    <h5>PROVEEDOR</h5>  
                                </a>
                            </li>
                        </ul>
                    </header>                      
                        <div class="tab-content tasi-tab" >
                            <div id="contacto" class="tab-pane fade in active" height="100">                               
                                <article class="media">
                                    {{Form::open(array('url' => '/phonebook','role'=>'form', 'method' => 'POST')) }}
                                    <div class="panel panel-default "> 
                                        <div class="row"  align="justify">
                                            <!--    <h2  align="center"> NUEVO CONTACTO </h2>-->                                                      
                                            <div class="col-xs-4">
                                                <div class='form-group form-register'>
                                                    {{ Form::label('nombre', 'CONTACTO:') }}
                                                    {{ Form::text('tipo_contacto',1, array('hidden' => 'true')) }}
                                                    {{ Form::text('nombre', null, array('placeholder' => 'Nombre Contacto', 'class' => 'form-control', 'required' => 'required')) }}
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class='form-group form-register'>
                                                    {{ Form::label('nit', 'NIT / C.C:') }}
                                                    {{ Form::text('nit', null, array('placeholder' => 'Nit / C.C', 'class' => 'form-control')) }}
                                                </div>                                                
                                            </div>
											<div class="col-xs-4">
                                                <div class='form-group form-register'>
                                                    {{ Form::label('empresa', 'EMPRESA:') }}
                                                    {{ Form::text('empresa', null, array('placeholder' => 'Nombre de Empresa', 'class' => 'form-control')) }}
                                                </div>
												<br>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class='form-group form-register'>
                                                    {{ Form::label('telefono', 'TELEFONO:') }}
                                                    {{ Form::text('telefono', null, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}
                                                </div>
                                            </div> 
                                            <div class="col-xs-4">								
                                                <div class='form-group form-register'>
                                                    {{ Form::label('celular', 'CELULAR:') }}
                                                    {{ Form::text('celular', null, array('placeholder' => 'Celular', 'class' => 'form-control')) }}
                                                </div>
                                            </div>  
                                            <div class="col-xs-4">
                                                <div class='form-group form-register'>
                                                    {{ Form::label('email', 'E-MAIL:')}}
                                                    {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) }}
                                                </div>
                                                <br>
                                            </div>                         
                                            <div class="col-xs-4">
                                                <div class='form-group form-register'>
                                                    {{ Form::label('direccion', 'DIRECCIÓN:') }}
                                                    {{ Form::text('direccion', null, array('placeholder' => 'Direccion', 'class' => 'form-control')) }}
                                                </div>
                                            </div>                               
                                            <div class="col-xs-4">
                                                <div class='form-group form-register'>
                                                    {{ Form::label('ciudad', 'CIUDAD:') }}
                                                    {{ Form::text('ciudad', null, array('placeholder' => 'Ciudad', 'class' => 'form-control')) }}
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class='form-group form-register'>
                                                    {{ Form::label('pais', 'PAIS:') }}
                                                    {{ Form::text('pais', 'Colombia', array('placeholder' => 'País', 'class' => 'form-control')) }}
                                                </div>
                                                <br>
                                            </div>
                                            <center>
                                                {{ Form::button('Limpiar', array('type' => 'reset', 'class' => 'btn btn-default')) }} 
                                                {{ Form::button('Guardar ', array('type' => 'submit', 'class' => 'btn  btn-success')) }}
                                            </center>
                                            {{ Form::close() }}
                                        </div>
                                        <br>
                                    </div>

                                </article>                                   
                            </div>                                                       
                            <div id="proveedor"  class="tab-pane fade">                          
                                <div class="panel panel-default ">  
                                    {{Form::open(array('url' => '/phonebook','role'=>'form', 'method' => 'POST')) }}
                                    <div class="row"  align="justify">                                        
                                        <!--   <h2  align="center">NUEVO PROVEEDOR</h2>-->                                                                                  
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('nombre', 'PROVEEDOR:') }}
                                                {{ Form::text('tipo_contacto',2, array('hidden' => 'true')) }}
                                                {{ Form::text('nombre', null, array('placeholder' => 'Nombre Proveedor', 'class' => 'form-control', 'required' => 'required')) }}
                                            </div>
                                        </div>
										<div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('nit', 'NIT/C.C:') }}
                                                {{ Form::text('nit', null, array('placeholder' => 'Nit/ C.C', 'class' => 'form-control')) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('empresa', 'EMPRESA:') }}
                                                {{ Form::text('empresa', null, array('placeholder' => 'Nombre de Empresa', 'class' => 'form-control', 'required' => 'required')) }}
                                            </div>
											<br>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('telefono', 'TELEFONO:') }}
                                                {{ Form::text('telefono', null, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}
                                            </div>
                                        </div> 
                                        <div class="col-xs-4">								
                                            <div class='form-group form-register'>
                                                {{ Form::label('celular', 'CELULAR:') }}
                                                {{ Form::text('celular', null, array('placeholder' => 'Celular', 'class' => 'form-control')) }}
                                            </div>
                                        </div>  
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('email', 'E-MAIL:')}}
                                                {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) }}
                                            </div>
                                            <br>
                                        </div>                         
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('direccion', 'DIRECCIÓN:') }}
                                                {{ Form::text('direccion', null, array('placeholder' => 'Direccion', 'class' => 'form-control')) }}
                                            </div>
                                        </div>                               
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('ciudad', 'CIUDAD:') }}
                                                {{ Form::text('ciudad', null, array('placeholder' => 'Ciudad', 'class' => 'form-control')) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('pais', 'PAIS:') }}
                                                {{ Form::text('pais', 'Colombia', array('placeholder' => 'País', 'class' => 'form-control')) }}
                                            </div>
                                        </div>
											<h2>Productos  o servicio que suministra </h2>
										<div class="col-xs-4"><br>
											<div class='form-group form-register'>
												{{ Form::label('tipo_actividad ', 'ACTIVIDAD:PRODUCTO/SERVICIO') }}
												{{ Form::select('tipo_actividad',array('1' => 'Seleccionar', '2' => 'Servicio','3' => 'Producto'),null ,array('class' => 'form-control')); }}

											</div>
										</div>
                                        <div class="col-xs-8"><br>
                                            <div class='form-group form-register tex'>
                                                {{ Form::label('descripcion_actividad ', ' DESCRIPCIÓN DE ACTIVIDAD:') }}
                                                {{ Form::textarea('descripcion_actividad','Productos / Servicios:
Forma de Pago: Contado / Crédito 
Días Crédito: 
Tiempo de Entrega:
', array('rows' => '6', 'class' => 'form-control')) }}
                                            </div> 
                                        </div>
                                    </div>
                                    {{ Form::button('Limpiar', array('type' => 'reset', 'class' => 'btn btn-default')) }} 
                                    {{ Form::button('Guardar', array('type' => 'Guardar', 'class' => 'btn  btn-success')) }}
                                    {{ Form::close() }}
                                </div> 
                            </div> 
                        </div>
                </section>  
            </center>
    </div> 
</div>
@stop
@stop