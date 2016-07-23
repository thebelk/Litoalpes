@extends('layouts.master')
<head> 
    @section ('title')Ingresos @stop
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
            <a href="/phonebook" class="list-group-item  text-center">
                <h4 class="list-group-item-heading glyphicon glyphicon-earphone"></h4><h4>Contactos | Proveedor</h4>
            </a>
			<a href="/workorderlist" class="list-group-item active text-center">
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
        <div class="bhoechie-tab">                     
            <!-- work section -->
            <div class="bhoechie-tab-content active tam">
                <center>
                    <h2 class="glyphicon glyphicon-th-list color" ></h2>
                    <h3> Ingresos Estimados</h3>   
                </center>
                <div class="panel panel-default tam">
                   <h4> Ingresos del </h4> 
				   <div class="row"  align="justify"> 
					
						<div class="col-xs-3" >
							<h4>Día de hoy</h4>
							<h2>0,00$</h2>
							<h5 class="color">Iva:0,00$</h5>
						</div>
						<div class="col-xs-3" >
							<h4>Ayer</h4>
							<h2>0,00$</h2>
							<h5 class="color">Iva:0,00$</h5>
						</div>
						<div class="col-xs-3" >
							<h4>Últimos 7 días</h4>
							<h2>0,00$</h2>
							<h5 class="color">Iva:0,00$</h5>
						</div>
						<div class="col-xs-3" >
							<h4>Últimos 30 días</h4>
							<h2>0,00$</h2>
							<h5 class="color">Iva:0,00$</h5>
					</div>
				   </div>
				    <div class="row"  align="justify"> 
					
						<div class="col-xs-3" >
							<h4>Saldo actual</h4>
							<h2>0,00$</h2>
						</div>
						<div class="col-xs-3" >
							<h4>Saldo pendiente</h4>
							<h2>0,00$</h2>
						</div>
						<div class="col-xs-3" >
							
						</div>
						<div class="col-xs-3" >
							<h3>Ingresos finales</h3>
							<h2>0,00$</h2>
					</div>
				   </div>
                </div>               
            </div>
        </div>
		<section class="tab wow fadeInLeft tam">                     
                    <header class="panel-heading tab-bg-dark-navy-blue">
                        <ul class="nav nav-tabs nav-justified ">
                            <li class="active">
                                <a data-toggle="tab" href="#reportemes">
                                    <h4>REPORTE MES</h4> 
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#reportecontacto">
                                    <h4>REPORTE CLIENTES</h4>  
                                </a>
                            </li>
                        </ul>
                    </header>
                    <div class="panel-body">                       
                        <div class="tab-content tasi-tab" >
                            <div id="reportemes" class="tab-pane fade in active" height="100">                               
                                <article class="media">								
                                    <div class="panel panel-default tam">
										<h3><span class="estilo"> Detalles ingresos por mes</span></h3> 
										@foreach($workorder as $worklist)
										@if($worklist->estado_trabajo==1)

										<!-- Default panel contents -->                
										<hr>                     
										<h3><strong> {{ $worklist->clase_trabajo}} / ESTADO TRABAJO
												<span class="estilo">
													@if($worklist->estado_trabajo==1) Por realizar                                
													@elseif($worklist->estado_trabajo==2) Diseño 
													@elseif($worklist->estado_trabajo==3) Produccion 
													@elseif($worklist->estado_trabajo==3) Entregado 
													@endif 
												</span>
											</strong></h3>
										 <h4><strong>Fecha Pedido</strong>: {{  $worklist->created_at }},
										<strong>Fecha Entrega</strong>: {{ $worklist->fecha_entrega}}, 
										<strong>Material</strong>: {{ $worklist->clase_material }} ,
										<strong>Cantidad</strong>: {{ $worklist->cantidad_trabajo }} ,
										<strong>Tamaño </strong>: {{ $worklist->tamano }} </h4> 
									<h4><strong>Valor Trabajo</strong>: {{ $worklist->total}},                         
										<strong>Abono</strong>: {{ $worklist->abono }} ,
										<strong>Saldo</strong>: {{ $worklist->saldo }} ,                    
										<strong>Diseñador</strong>: {{ $worklist->diseñador}},
										<strong>Vendedor</strong>: {{ $worklist->vendedor}}</h4>  
										<br><br>
										<div class="col-md-1">
											{{ HTML::link('/workorder/'.$worklist->id.'/edit','Editar', array('class' => 'btn btn-default'), false)}}                       
										</div>  
										
										<div class="col-md-1">
											{{ HTML::link('/worklist/'.$worklist->id.'/ver','Ver', array('class' => 'btn btn-success'), false)}} 
										</div> 
											{{ Form::close() }} 
											<br> <br>
											<hr>
											@endif 
											@endforeach
									</div> 
                                </article>                                   
                            </div>                                                       
                            <div id="reportecontacto"  class="tab-pane fade">                          
								<div class="panel panel-default tam">
										<h3><span class="estilo"> Saldo pendiente clientes</span></h3> 
										@foreach($workorder as $worklist)
										@if($worklist->estado_trabajo==1)

										<!-- Default panel contents -->                
										<hr>                     
										<h3><strong> {{ $worklist->clase_trabajo}} / ESTADO TRABAJO
												<span class="estilo">
													@if($worklist->estado_trabajo==1) Por realizar                                
													@elseif($worklist->estado_trabajo==2) Diseño 
													@elseif($worklist->estado_trabajo==3) Produccion 
													@elseif($worklist->estado_trabajo==3) Entregado 
													@endif 
												</span> 
											</strong></h3>
										 <h4><strong>Cliente</strong>: {{  $worklist->cliente }},
										 <strong>Fecha Pedido</strong>: {{  $worklist->created_at }},
										<strong>Fecha Entrega</strong>: {{ $worklist->fecha_entrega}}, 
										<strong>Material</strong>: {{ $worklist->clase_material }} ,
										<strong>Cantidad</strong>: {{ $worklist->cantidad_trabajo }} ,
										<strong>Tamaño </strong>: {{ $worklist->tamano }} </h4> 
									<h4><strong>Valor Trabajo</strong>: {{ $worklist->total}},                         
										<strong>Abono</strong>: {{ $worklist->abono }} ,
										<strong>Saldo</strong>: {{ $worklist->saldo }} ,                    
										<strong>Diseñador</strong>: {{ $worklist->diseñador}},
										<strong>Vendedor</strong>: {{ $worklist->vendedor}}</h4>  
										<br><br>
										<div class="col-md-1">
											{{ HTML::link('/workorder/'.$worklist->id.'/edit','Editar', array('class' => 'btn btn-default'), false)}}                       
										</div>  
										
										<div class="col-md-1">
											{{ HTML::link('/worklist/'.$worklist->id.'/ver','Ver', array('class' => 'btn btn-success'), false)}} 
										</div> 
											{{ Form::close() }} 
											<br> <br>
											<hr>
											@endif 
											@endforeach
									</div> 
                            </div> 
                        </div>
                    </div> 
                </section> 
    </div>
</div>

<script type="text/javascript">
    // my custom script
	function checkIVAType() {		
		var radios = document.getElementsByName('iva');
		var elIVA = "0";
		for (var i = 0, length = radios.length; i < length; i++) {
			if (radios[i].checked) {				
				elIVA = radios[i].value;
				break;
			}
		}
		var valor = document.getElementById('valor_trabajo');		
		switch(elIVA){
			case "0":
			//SIN IVA
				if(valor != null)
				{
					document.getElementById('subtotal').value = document.getElementById('valor_trabajo').value;
					document.getElementById('total').value = document.getElementById('valor_trabajo').value;
					document.getElementById('saldo').value = document.getElementById('valor_trabajo').value - document.getElementById('abono').value;
					document.getElementById('valor_iva').hidden = true;
				}				
			break;
			case "1":
			//MAS IVA
				if(valor != null)
				{
					document.getElementById('total').value = Math.ceil(document.getElementById('valor_trabajo').value * 1.16);
					document.getElementById('subtotal').value = document.getElementById('valor_trabajo').value;					
					document.getElementById('valor_iva').hidden = false;
					document.getElementById('valor_iva').innerHTML = document.getElementById('total').value - document.getElementById('valor_trabajo').value;
					document.getElementById('saldo').value = document.getElementById('total').value - document.getElementById('abono').value;
				}
				
			break;
			case "2":
			//CON IVA				
				if(valor != null)
				{
					document.getElementById('subtotal').value = Math.ceil(document.getElementById('valor_trabajo').value / 1.16);					
					document.getElementById('valor_iva').hidden = false;
					document.getElementById('valor_iva').innerHTML = document.getElementById('valor_trabajo').value - document.getElementById('subtotal').value;
					document.getElementById('total').value = document.getElementById('valor_trabajo').value;
					document.getElementById('saldo').value = document.getElementById('total').value - document.getElementById('abono').value;
				}				
				
			break;
		}
    }
</script>      

@stop