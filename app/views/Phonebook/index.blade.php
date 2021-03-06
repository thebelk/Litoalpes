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
			<a href="/phonebook/create" class="list-group-item  active text-center">                           
                <h5 class="glyphicon glyphicon-plus"></h5><br/><h4 class="cel">Nuevo Contato </h4>
            </a>
            <a href="/phonebook" class="list-group-item  text-center">
                <h5 class="list-group-item-heading glyphicon glyphicon-earphone"></h5><h4 class="cel">Contactos | Proveedor</h4>
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
        <div class="bhoechie-tab-content active tam">
			@if(Session::has('message'))
					<p class="alert alert-info">{{ Session::get('message') }}</p>
			@endif
		
            <div class="titulo">
                <h3 class="glyphicon glyphicon-pencil color" ></h3>
                <h4>  Contactos & Provedor </h4>  
            </div> 
            {{ Form::open(['route' => 'phonebook.index', 'method' => 'GET', 'class' => 'input-group','id' => 'adv-search', 'role' => 'search ']) }}
			{{ Form::text('buscar', null, ['class' => 'form-control','style' => 'text-align:center', 'placeholder' => 'Buscar Proveedores']) }}  
               <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                              <div class="form-group">
                                <label class="radio-inline">
                                  <input type="radio" name="searchType" id="contacto" value="contacto" /> Contactos
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="searchType" id="proveedor" value="proveedor" /> Provedor
                                </label>
                              </div>
                                   <!--  <a ng-href="#/search/">Advanced search</a>-->
                            </div>
                        </div>
                        {{ Form::button('<span class="glyphicon glyphicon-search" aria-hidden="true"></span>', array('type' => 'submit','class' => 'btn btn-primary')) }}
                    </div>
                </div>
            {{ Form::close() }}
            <div class="com "><div class="com2 "></div>
                <div id="scroll" class="panel panel-default slimScrollBar tam">                    
                    @foreach($phonebook as $phonlist)                      
                    <h4 class="color"><strong>
							{{ $phonlist->nombre }}&nbsp<span class="estilo">
                            @if($phonlist->tipo_contacto==1) CONTACTO                                
                            @elseif($phonlist->tipo_contacto==2) PROVEEDOR
                            @endif 
                        </span>
						</strong></h4>
                    <h5> 
                        @if($phonlist->tipo_contacto==2)
                        <strong>Actividad:</strong>                         
                        @if($phonlist->tipo_actividad==1) NO SELECCIONADO                                 
                        @elseif($phonlist->tipo_actividad==2)SERVICIO 
                        @elseif($phonlist->tipo_actividad==3) PRODUCTO
                        @endif  &nbsp
                        <strong>Detalle: </strong>&nbsp{{ $phonlist->descripcion_actividad}}
                        @endif </h5> 
                    <h5><strong>Empresa</strong>: {{ $phonlist->empresa}},
                        <strong> Nit/C.C</strong>:{{ $phonlist->nit}} ,
                        <strong>Telefono</strong>: {{ $phonlist->telefono }} ,
                        <strong>Celular </strong>: {{ $phonlist->celular }},
                        <strong>E-mail </strong>: {{ $phonlist->email }},
						<strong>Dirección </strong>: {{ $phonlist->direccion }},
                        <strong>Ciudad </strong>: {{ $phonlist->ciudad }}
                        <strong>Pais </strong>: {{ $phonlist->pais }}</h5> 

					{{ Form::model($phonebook, array('url' => array('/phonebook/'.$phonlist->id), 'method' => 'DELETE', 'role' => 'form')) }}                    
					{{ Form::submit('Eliminar', array('class' => 'btn  btn-success')) }}  
					
                    {{ HTML::link('/phonebook/'.$phonlist->id.'/edit','Editar', array('class' => 'btn btn-default btn-sm'), false)}}                       

                    <hr>
                    @endforeach
                </div>
            </div> 
        </div>
    </div>
</div>  

<script>

    $('#scroll').slimScroll({
        size: '5px',
        railColor: '#222',
        height: '1140px',
        railOpacity: 2,
        wheelStep: 10,
        allowPageScroll: true
    });
</script>
@stop
@stop