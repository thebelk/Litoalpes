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
            <a href="phonebook/create" class="list-group-item active text-center">                           
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
            <div class="titulo">
                <h3 class="glyphicon glyphicon-user color" ></h3>
                <h4> Lista de Clientes</h4>  
            </div>
              
				{{ Form::open(['route' => 'customer.index', 'method' => 'GET', 'class' => 'input-group','id' => 'adv-search', 'role' => 'search ']) }}
                {{ Form::text('buscar', null, ['class' => 'form-control','style' => 'text-align:center', 'placeholder' => 'Buscar Clientes']) }}
               <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            {{ Form::button('<span class="caret"></span>', array('data-toggle' => 'dropdown','aria-expanded' => 'false','class' => 'btn btn-default dropdown-toggle ')) }}
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
								<div class="form-group">
									<label class="radio-inline">
									  <input type="radio" name="searchType" id="directo" value="directo"/> Directos 
									</label>
									<label class="radio-inline">
									  <input type="radio" name="searchType" id="tercero" value="tercero" /> Terceros
									</label>
									<label class="radio-inline">
									  <input type="radio" name="searchType" id="empresa" value="empresa" /> Empresa 
									</label>
								</div>
								<form id="dateRangeForm" method="post" class="form-horizontal">
									<div class="form-group">											
										<div class="col-xs-6 date">	
											<label class="col-xs-3 control-label"><h6>Fecha Inicial</h6></label>
											<input type='date' id='fecha_inicial' name='fecha_inicial' class='form-control '/>
										</div>
										<div class="col-xs-6 date">	
											<label class="col-xs-3 control-label"> <h6>Fecha Final</h6></label>
											<input type='date' id='fecha_final' name='fecha_final' class='form-control '/>
										</div>
									</div>
								</form>	
                            </div>
                        </div>
                        {{ Form::button('<span class="glyphicon glyphicon-search" aria-hidden="true"></span>', array('type' => 'submit','class' => 'btn btn-primary')) }}
                    </div>
                </div>
				{{ Form::close() }}
            
			
            <div class="com "><div class="com2 "></div>
                <div id="scroll" class="panel panel-default slimScrollBar tam">                  
                    <div class="panel-body ">                       
                        @foreach($customer as $custlist)                      
                        <h4><strong> 
                                @if($custlist->empresa=="")
                                {{ $custlist->cliente }} 
                                @endif
                                {{ $custlist->empresa }} 
                                {{ $custlist->nit_cc }}</strong>
                        </h4>
                        <h5>
                            <strong>Cliente </strong>: 
                            @if($custlist->tipo_cliente==1) Directo
                            @elseif($custlist->tipo_cliente==2) Tercero                             
                            @endif,
                            <strong>Nombre </strong>: {{ $custlist->cliente }} ,                                               
                            <strong>Celular</strong>: {{ $custlist->cel_contacto }},
                            <strong>Telefono</strong>: {{ $custlist->telefono }}, 
                            <strong>E-mail </strong>: {{ $custlist->email }}, 
							<strong>Direccion</strong>: {{ $custlist->direccion }},
                            <strong>Ciudad </strong>: {{ $custlist->ciudad }},
                            <strong>Pais </strong>: {{ $custlist->pais}}</h5> 

                        {{ HTML::link('/customer/'.$custlist->id.'/edit','Editar', array('class' => 'btn btn-default btn-sm'), false)}}  

                        {{ HTML::link('/customer/'.$custlist->id.'/profile','Ver', array('class' => 'btn btn-success btn-sm'), false)}} 

                        <br>
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
        railOpacity: 0.3,
        wheelStep: 2,
        allowPageScroll: true
    });
	
	
</script> 
 
@stop