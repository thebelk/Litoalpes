@extends('layouts.master')
<head> 
    @section ('title')Contactos @stop
</head>
<a href="../Customer/edit.blade.php"></a>
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
            <a href="/phonebook/create" class="list-group-item active text-center">
            <a href="/phonebook" class="list-group-item active text-center">                           
                <h4 class="glyphicon glyphicon-earphone"></h4><br/><h4>Contactos | Proveedor</h4>
            </a>
			<a href="/workorderlist" class="list-group-item active  text-center">
                <h4 class="list-group-item-heading glyphicon glyphicon-th-list"></h4><h4>Trabajos</h4>
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
        <div class="bhoechie-tab-content active">
            <center><!--
                <h2 class="glyphicon glyphicon-user color" ></h2>
                <h3> Nuevo Contacto</h3>  -->  
                <div class="panel panel-default tam">
                    <!-- Default panel contents -->
                    <div class="panel-heading row panel"> <h3 class="list-group-item-heading color">
                            <h2 class="glyphicon glyphicon-user color" ></h2>
                            <h3> Contacto / Proveedor </h3>                             
                    </div>
                </div>
                <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->               
                <section class="tab wow fadeInLeft tam">                     
                    <header class="panel-heading tab-bg-dark-navy-blue">
                        <ul class="nav nav-tabs nav-justified ">
                            <li class="active">
                                <a data-toggle="tab" href="#contacto">
                                    <h4>CONTACTOS</h4> 
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#proveedor">
                                    <h4>PROVEEDOR</h4>  
                                </a>
                            </li>
                        </ul>
                    </header>
                    <div class="panel-body">                       
                        <div class="tab-content tasi-tab" >
                            @if($phonebook->tipo_contacto==1) 
                            <div id="contacto" class="tab-pane fade in active" height="100"> 
                                @elseif($phonebook->tipo_contacto==2) 
                                <div id="contacto" class="tab-pane fade"> 
                                    @endif
                                    <article class="media">
                                        {{Form::open(array('url' => '/phonebook/'.$phonebook->id,'method' => 'PUT', 'role'=>'form')) }}
                                        <div class="panel panel-default "> 
                                            <div class="row"  align="justify">
                                                <!--    <h2  align="center"> NUEVO CONTACTO </h2>-->                                                      
                                                <div class="col-xs-4">
                                                    <div class='form-group form-register'>
                                                        {{ Form::label('nombre', 'CONTACTO:') }}                                                    
                                                        {{ Form::text('tipo_contacto',1, array('hidden' => 'true')) }}
                                                        {{ Form::text('tipo_actividad',0, array('hidden' => 'true')) }}
                                                        {{ Form::text('descripcion_actividad',"", array('hidden' => 'true')) }}
                                                        {{ Form::text('id', $phonebook->id, array('hidden' => 'true')) }}
                                                        {{ Form::text('nombre', $phonebook->nombre, array('placeholder' => 'Nombre del Contacto', 'class' => 'form-control', 'required' => 'required')) }}
                                                    </div>
                                                </div>
                                                <div class="col-xs-4">
                                                    <div class='form-group form-register'>
                                                        {{ Form::label('empresa', 'EMPRESA:') }}
                                                        {{ Form::text('empresa', $phonebook->empresa, array('placeholder' => 'Nombre de Empresa', 'class' => 'form-control')) }}
                                                    </div>
                                                </div>
                                                <div class="col-xs-4">
                                                    <div class='form-group form-register'>
                                                        {{ Form::label('nit', 'NIT:') }}
                                                        {{ Form::text('nit', $phonebook->nit, array('placeholder' => 'NIT.Empresa', 'class' => 'form-control')) }}
                                                    </div>
                                                    <br>
                                                </div>
                                                <div class="col-xs-4">
                                                    <div class='form-group form-register'>
                                                        {{ Form::label('telefono', 'TELEFONO:') }}
                                                        {{ Form::text('telefono', $phonebook->telefono, array('placeholder' => 'Email', 'class' => 'form-control')) }}
                                                    </div>
                                                </div> 
                                                <div class="col-xs-4">								
                                                    <div class='form-group form-register'>
                                                        {{ Form::label('celular', 'CELULAR:') }}
                                                        {{ Form::text('celular', $phonebook->celular, array('placeholder' => 'Celular', 'class' => 'form-control')) }}
                                                    </div>
                                                </div>  
                                                <div class="col-xs-4">
                                                    <div class='form-group form-register'>
                                                        {{ Form::label('email', 'E-MAIL:')}}
                                                        {{ Form::text('email', $phonebook->email, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}
                                                    </div>
                                                    <br>
                                                </div>                         
                                                <div class="col-xs-4">
                                                    <div class='form-group form-register'>
                                                        {{ Form::label('direccion', 'DIRECCIÓN:') }}
                                                        {{ Form::text('direccion', $phonebook->direccion, array('placeholder' => 'Direccion', 'class' => 'form-control')) }}
                                                    </div>
                                                </div>                               
                                                <div class="col-xs-4">
                                                    <div class='form-group form-register'>
                                                        {{ Form::label('ciudad', 'CIUDAD:') }}
                                                        {{ Form::text('ciudad', $phonebook->ciudad, array('placeholder' => 'Ciudad', 'class' => 'form-control')) }}
                                                    </div>
                                                </div>
                                                <div class="col-xs-4">
                                                    <div class='form-group form-register'>
                                                        {{ Form::label('pais', 'PAIS:') }}
                                                        {{ Form::text('pais', $phonebook->pais, array('placeholder' => 'País', 'class' => 'form-control')) }}
                                                    </div>
                                                    <br>
                                                </div>
                                                <center>                                                
                                                    {{ HTML::link('/phonebook/'.$phonebook->id.'/profile','Resetear', array('class' => 'btn btn-default'), false)}}                       
                                                    {{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn  btn-success')) }} 
                                                </center>
                                                {{ Form::close() }}
                                            </div>
                                            <br>
                                        </div>

                                    </article>                                   
                                </div>  
                                    @if($phonebook->tipo_contacto==1)
                                    <div id="proveedor" class="tab-pane fade"> 
                                        @elseif($phonebook->tipo_contacto==2) 
                                        <div id="proveedor"  class="tab-pane fade in active" height="100"> 
                                            @endif
                                            <div class="panel panel-default ">  
                                                {{Form::open(array('url' => '/phonebook/'.$phonebook->id,'method' => 'PUT', 'role'=>'form')) }}
                                                <div class="row"  align="justify">                                        
                                                    <!--   <h2  align="center">NUEVO PROVEEDOR</h2>-->                                                                                  
                                                    <div class="col-xs-4">
                                                        <div class='form-group form-register'>
                                                            {{ Form::label('nombre', 'PROVEEDOR:') }}
                                                            {{ Form::text('tipo_contacto',2, array('hidden' => 'true')) }}
                                                            {{ Form::text('id', $phonebook->id, array('hidden' => 'true')) }}
                                                            {{ Form::text('nombre', $phonebook->nombre, array('placeholder' => 'Nombre del Proveedor', 'class' => 'form-control', 'required' => 'required')) }}
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <div class='form-group form-register'>
                                                            {{ Form::label('empresa', 'EMPRESA:') }}
                                                            {{ Form::text('empresa', $phonebook->empresa, array('placeholder' => 'Nombre de Empresa', 'class' => 'form-control', 'required' => 'required')) }}
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <div class='form-group form-register'>
                                                            {{ Form::label('nit', 'NIT:') }}
                                                            {{ Form::text('nit', $phonebook->nit, array('placeholder' => 'NIT.Empresa', 'class' => 'form-control')) }}
                                                        </div>
                                                        <br>
                                                    </div>
                                                    <div class="col-xs-4"><br>
                                                        <div class='form-group form-register'>
                                                            {{ Form::label('tipo_actividad ', 'TIPO DE ACTIVIDAD:') }}
                                                            {{ Form::select('tipo_actividad',array('1' => 'Seleccionar', '2' => 'Servicio','3' => 'Producto'),$phonebook->tipo_actividad ,array('class' => 'form-control')); }}

                                                        </div>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <div class='form-group form-register tex'>
                                                            {{ Form::label('descripcion_actividad ', ' DESCRIPCIÓN DE ACTIVIDAD:') }}
                                                            {{ Form::textarea('descripcion_actividad', $phonebook->descripcion_actividad, array('rows' => '2', 'placeholder' => 'Detalles de Actividad', 'class' => 'form-control')) }}
                                                        </div> 
                                                        <br>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <div class='form-group form-register'>
                                                            {{ Form::label('telefono', 'TELEFONO:') }}
                                                            {{ Form::text('telefono', $phonebook->telefono, array('placeholder' => 'Email', 'class' => 'form-control')) }}
                                                        </div>
                                                    </div> 
                                                    <div class="col-xs-4">								
                                                        <div class='form-group form-register'>
                                                            {{ Form::label('celular', 'CELULAR:') }}
                                                            {{ Form::text('celular', $phonebook->celular, array('placeholder' => 'Celular', 'class' => 'form-control')) }}
                                                        </div>
                                                    </div>  
                                                    <div class="col-xs-4">
                                                        <div class='form-group form-register'>
                                                            {{ Form::label('email', 'E-MAIL:')}}
                                                            {{ Form::text('email', $phonebook->email, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}
                                                        </div>
                                                        <br>
                                                    </div>                         
                                                    <div class="col-xs-4">
                                                        <div class='form-group form-register'>
                                                            {{ Form::label('direccion', 'DIRECCIÓN:') }}
                                                            {{ Form::text('direccion', $phonebook->direccion, array('placeholder' => 'Direccion', 'class' => 'form-control')) }}
                                                        </div>
                                                    </div>                               
                                                    <div class="col-xs-4">
                                                        <div class='form-group form-register'>
                                                            {{ Form::label('ciudad', 'CIUDAD:') }}
                                                            {{ Form::text('ciudad', $phonebook->ciudad, array('placeholder' => 'Ciudad', 'class' => 'form-control')) }}
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <div class='form-group form-register'>
                                                            {{ Form::label('pais', 'PAIS:') }}
                                                            {{ Form::text('pais', $phonebook->pais, array('placeholder' => 'País', 'class' => 'form-control')) }}
                                                        </div>
                                                        <br>
                                                    </div> 
                                                </div>
                                                {{ HTML::link('/phonebook/'.$phonebook->id.'/profile','Resetear', array('class' => 'btn btn-default'), false)}}                       
                                                {{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn  btn-success')) }}   
                                                {{ Form::close() }}
                                            </div> 
                                        </div> 
                                    </div>
                                </div> 
                                </section>  
                                </center>
                            </div>
                        </div> 




                    </div>  
                    @stop