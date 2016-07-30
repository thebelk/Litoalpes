@extends('layouts.master')
<head> 
    @section ('title')Trabajo @stop
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
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                    Correo Electronico
                </a>
            </div>
            <div id="collapseOne" class="accordion-body collapse in"><br>
                <div class="accordion-inner">
                    <p>Email: {{ Auth::user()->email}} </p>
                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading"><br>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                    Dirección
                </a>
            </div>
            <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
                    <br>
                    <p>Direccion: {{ Auth::user()->direccion}} </p>
                    <p> Ciudad: {{ Auth::user()->ciudad}} </p>
                    <p> Pais: {{ Auth::user()->pais}} </p>
                </div>
            </div>
        </div>
        <br>
    </div> 
    <br>
    <div id="sidebar"> 
        <div class="list-group">			
            <a href="/phonebook" class="list-group-item  text-center">
                <h5 class="list-group-item-heading glyphicon glyphicon-earphone"></h5><h5>Contactos | Proveedor</h5>
            </a>
            <a href="/workorderlist" class="list-group-item active text-center">
                <h5 class="list-group-item-heading glyphicon glyphicon-th-list"></h5><h5>Trabajos</h5>
            </a>
        </div>
    </div>
    <div class="col-sm-8 col-md-12 not">
        <h3 class="color" > Entregas de Hoy </h3>
        <p> Pruebas </p>
        <p> Pruebas </p>
    </div>  
</div>  
<div class="col col-sm-9">
    <div class="row ">
        <div class="bhoechie-tab">                     
            <!-- work section -->
            <div class="bhoechie-tab-content active  tam">
                <div class="titulo">
                    <h3 class="glyphicon glyphicon-th-list color" ></h3>
                    <h4> Trabajos por Realizar</h4>   
                </div>
                	<div class="input-group" id="adv-search">
					<input type="text" class="form-control" style="text-align:center" placeholder="Buscar Trabajos" />
					<div class="input-group-btn">
						<div class="btn-group" role="group">
							<div class="dropdown dropdown-lg">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
								<div class="dropdown-menu dropdown-menu-right" role="menu">
								  <div class="form-group">
									<label class="radio-inline">
									  <input type="radio" name="searchLocation" id="inThisLocation" value="inThisLocation" checked="checked" /> In this location
									</label>
									<label class="radio-inline">
									  <input type="radio" name="searchLocation" id="everywhere" value="everywhere" /> Everywhere
									</label>
								  </div>
								  <a ng-href="#/search/{{ $workorder }}">Advanced search</a>
								</div>
							</div>
							<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
						</div>
					</div>
				</div>

                <div class="com "><div class="com2 "></div>
                    <div id="scroll" class="panel panel-default slimScrollBar tam">
                        @foreach($workorder as $worklist)
                        @if($worklist->estado_trabajo==1)

                        <!-- Default panel contents -->                

                        <h4><strong> {{ $worklist->clase_trabajo}} / ESTADO TRABAJO
                                <span class="estilo">
                                    @if($worklist->estado_trabajo==1) Por realizar                                
                                    @elseif($worklist->estado_trabajo==2) Diseño 
                                    @elseif($worklist->estado_trabajo==3) Produccion 
                                    @elseif($worklist->estado_trabajo==3) Entregado 
                                    @endif 
                                </span>
                            </strong></h4>
                        <h5><strong>Fecha Pedido</strong>: {{  $worklist->created_at }},
                            <strong>Fecha Entrega</strong>: {{ $worklist->fecha_entrega}}, 
                            <strong>Material</strong>: {{ $worklist->clase_material }} ,
                            <strong>Cantidad</strong>: {{ $worklist->cantidad_trabajo }} ,
                            <strong>Tamaño </strong>: {{ $worklist->tamano }} </h5> 
                        <h5><strong>Valor Trabajo</strong>: {{ $worklist->total}},                         
                            <strong>Abono</strong>: {{ $worklist->abono }} ,
                            <strong>Saldo</strong>: {{ $worklist->saldo }} ,                    
                            <strong>Diseñador</strong>: {{ $worklist->diseñador}},
                            <strong>Vendedor</strong>: {{ $worklist->vendedor}}</h5>  

                        {{ HTML::link('/workorder/'.$worklist->id.'/edit','Editar', array('class' => 'btn btn-default btn-sm'), false)}}                       
                        {{ HTML::link('/worklist/'.$worklist->id.'/ver','Ver', array('class' => 'btn btn-success btn-sm'), false)}} 

                        {{ Form::close() }} 
                        <br><hr>
                        @endif 
                        @endforeach
                    </div> 
                </div>              
            </div>
        </div>
    </div>
</div>   
<script>

    $('#scroll').slimScroll({
        size: '5px',
        railColor: '#222',
        height: '1070px',
        railOpacity: 0.3,
        wheelStep: 2,
        allowPageScroll: true
    });
</script>	

@stop