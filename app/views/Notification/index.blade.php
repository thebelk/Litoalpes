@extends('layouts.master')
<head> 
    @section ('title')Trabajos @stop
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
            <a href="/phonebook" class="list-group-item  text-center">
                <h5 class="list-group-item-heading glyphicon glyphicon-earphone"></h5><h4>Contactos | Proveedor</h4>
            </a> 
			<a href="/workorderlist" class="list-group-item active text-center">
                <h5 class="list-group-item-heading glyphicon glyphicon-th-list"></h5><h4>Trabajos</h4>

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
        <div class="bhoechie-tab-content active tam">
            <center>
                <h3 class="glyphicon glyphicon-th-list color" ></h3>
                <h4> Listar Notificaciones</h4>   
            </center>
			<div class="com "><div class="com2 "></div>
				<div id="scroll" class="panel panel-default slimScrollBar tam">
					<!-- Default panel contents -->                
					<br>                      
					@foreach($notifications as $notification)                    
					<h3><strong>{{ $notification->subject}}</strong></h3>
					<h5>
						{{ $notification->body}}
					</h5>
					<div class="col-md-3">
						{{ HTML::link('/notification/'.$notification->id.'/ver','Ver', array('class' => 'btn btn-success'), false)}} 
					</div>
					<br> <br>
					<hr>
					@endforeach
				</div>
			</div>
        </div>
    </div>
</div>  
<script>
  $('#scroll').slimScroll({
	 
	height: '1070px;',
	size: '5px',
	railColor: '#222',
	height: '1180px',
	railOpacity: 0.3,
	wheelStep: 2,
	allowPageScroll: true		  
			  });
</script>

@stop