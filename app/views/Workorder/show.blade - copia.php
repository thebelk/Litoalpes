@extends('layouts.master')
<head> 
    @section ('title')Trabajos @stop
</head>
@section('header')
@parent
@stop
@section('content')
<div class="col col-sm-3 complement">   
   <h3 class="highlight nav nav-stacked ">
         @if($customer->empresa=="")
        {{ $customer->cliente }} 
        @endif
        {{$customer->empresa}}
        <i class="glyphicon glyphicon glyphicon glyphicon-user"></i></h3>
    <br>
    <div class="row panel">        
        <div class="col-sm-8 col-md-12">
            <h3 class="color">{{$customer->cliente}}&nbsp(Cliente)  </h3><br>
            <h4>Contacto: {{$customer->contacto}} </h4> 
            <h4>Telefono: {{$customer->telefono}} </h4> 
            <h4 class="color">Cliente:          
                @if($customer->tipo_cliente==1) Directo
                @elseif($customer->tipo_cliente==2) Servicio                              
                @endif
            </h4>
            <h4 class="color"> Nit: {{ $customer->nit_cc}}  </h4>
			<h4>{{ $customer->pagina_web}} </h4>
            <h4>{{ $customer->otro}} </h4>  
        </div>         
        <h4>{{ HTML::link('/customer/'.$customer->id.'/edit','Editar', array('class' => 'btn btn-link'), false)}}</h4>    
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
                <br>
                <p> <h4>Email: {{ $customer->email}} </h4>				
				</p>             
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
                    <h4>Direccion: {{$customer->direccion}} </h4>
                    <h4> Ciudad: {{$customer->ciudad}} </h4>
                    <h4> Pais: {{$customer->pais}} </h4>
                </div>
            </div>
        </div>
    </div> 
    <hr>
     <div id="sidebar">                           
        <div class="list-group">    
            <a href="/customer/{{$customer->id}}/workorder/create" class="list-group-item active text-center">
                <h4 class="glyphicon glyphicon-plus"></h4><br/><h4>Nuevo Trabajo</h4> 
            </a>
            <a href="/customer/{{$customer->id}}/profile" class="list-group-item  text-center">                           
                <h4 class="glyphicon glyphicon-user"></h4><br/><h4>
					@if($customer->empresa=="")
					{{ $customer->cliente }} 
					@endif
					{{$customer->empresa}}
				</h4> 
            </a>                       
        </div>                     
    </div>
    <hr>
    <div class="row ">
        <div class="col-sm-8 col-md-12">
            <h3 class="color" > Entregas de Hoy </h3>
            <p> Pruebas </p>
        </div>
    </div>
</div>  
<div class="col col-sm-9">
	<div class="row ">                             
        <!-- cho section -->
        <div class="bhoechie-tab-content active tam">
            <!--
                <h2 class="glyphicon glyphicon-user color" ></h2>
                <h3> Nuevo Contacto</h3>  -->  

            <!-- Default panel contents -->
            <div class="panel panel-default">
                <div class="panel-heading row panel  tam " align="center"> <h3 class="list-group-item-heading color">
                        <h2 class="glyphicon glyphicon-plus color" ></h2>
                        <h3> Detalles Trabajo</h3> 
                </div>
            </div>
            <!-- Default panel contents -->                                   
            <div class="col-xs-10 col-md-9 imp">
                <!-- <div class="col-xs-2 col-md-2 imp"> 
                     {{ Form::text('no_orden', null, array('placeholder' => 'No.', 'class' => 'form-control')) }}
                 </div>
                 {{ Form::text('customers_id', $customer->id, array('hidden' => 'true')) }} -->
            </div>
                            <div class="panel-body">                                                   
                            
                                 {{Form::open(array('url' => '/workorder/'.$workorder->id,'method' => 'PUT', 'role'=>'form')) }}
                                <div class="panel panel-default ">                                           
                                    <div class="row"  align="justify">
                                        <!-- <h2  align="center"> Orden de Compra  </h2> --> 
										{{ Form::text('customer_id', $customer->id, array('hidden' => 'true')) }} 
                                        <br><br>																				
                                        <div class="col-xs-6">
                                            <div class='form-group form-register'>
                                                <h3><strong>{{ Form::label('tipo_orden', ' TIPO DE ORDEN:') }}</strong></h3>
												{{ Form::text('customers_id', $customer->id, array('hidden' => 'true')) }}
													@if($workorder->tipo_orden==1)                                 
													@elseif($workorder->tipo_orden==2) Servicio 
													@elseif($workorder->tipo_orden==3) Producto
													@endif 
                                            </div>
                                        </div>
										
										{{ Form::text('customers_id', $customer->id, array('hidden' => 'true')) }} 									
										<div class="col-xs-6">
											<h3><b>ESTADO DEL TRABAJO<b></h3>
											@if($workorder->estado_trabajo==1) Por realizar	                                
											@elseif($workorder->estado_trabajo==2) Estado Diseño
											@elseif($workorder->estado_trabajo==3) Estado Revisión
											@elseif($workorder->estado_trabajo==4) Enviado para impresión
											@elseif($workorder->estado_trabajo==5) Estado Impresion
											@elseif($workorder->estado_trabajo==6) Estado Acabados 
											@elseif($workorder->estado_trabajo==7) Disponible para Entrega
											@elseif($workorder->estado_trabajo==8) Entregado
											@endif  
										</div>
                                        <div class="col-xs-6">
                                            <div class='form-group form-register' align="justify">

                                                {{ Form::label('no_orden', 'NO.ORDEN:') }}
                                                 <p>{{ $workorder->no_orden}}</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class='form-group form-register' align="justify">
												   {{ Form::label('clase_trabajo', 'NOMBRE DEL TRABAJO:') }}
                                                <p>{{ $workorder->clase_trabajo }}</p>
												<h4><strong>Fecha Pedido</strong>: {{  $workorder->created_at }},</h4>
                                            </div> 
                                            <br>
                                        </div>  

											  
											  
                                        <div class="col-xs-6">
                                            <div class='form-group form-register'>
                                                {{ Form::label('fecha_entrega', 'FECHANENTREGA:') }}
												{{ $workorder->fecha_entrega}}
                                            </div>
                                            <br>
                                        </div> 
										<div class="col-xs-12">
											<h4><b>SERVICIOS</b></h4>
											<hr>
										</div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::checkbox('servicio',  $workorder->servicio, $workorder->servicio == 1)}}
                                                {{ Form::label('tipo_servicio', 'ANILLADO/ EMPASTE') }}                                                           
                                                
												@if($workorder->tipo_servicio==1)                                
												@elseif($workorder->tipo_servicio==2) Anillado Espiral 
												@elseif($workorder->tipo_servicio==3) Anillado Plástico
												@elseif($workorder->tipo_servicio==4) Anillado Anillado Doble – O 
												@elseif($workorder->tipo_servicio==5) Anillado  Velobind
												@elseif($workorder->tipo_servicio==6) Empastado  Sencillo 
												@elseif($workorder->tipo_servicio==7) Empastado Pasta Dura
												@elseif($workorder->tipo_servicio==8) Empastado Pasta Dura / Marcado
												@endif
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::checkbox('sublimaciones', $workorder->sublimaciones, $workorder->sublimaciones == 1)}}
                                                {{ Form::label('tipo_sublimacion', ' SUBLIMACIÓN ') }}                                                            
                                                
												@if($workorder->tipo_sublimacion==1)                              
												@elseif($workorder->tipo_sublimacion==2) Mugs
												@elseif($workorder->tipo_sublimacion==3) Plato
												@elseif($workorder->tipo_sublimacion==4) Camiseta 
												@elseif($workorder->tipo_sublimacion==5) Gorra
												@elseif($workorder->tipo_sublimacion==6) Botones 
												@elseif($workorder->tipo_sublimacion==7) Otros
												@endif
                                            </div>											
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::checkbox('sello',  $workorder->tipo_sello, $workorder->tipo_sello == 1)}}
                                                {{ Form::label('tipo_sello', ' SELLO') }}                                                            
                                                												
												@if($workorder->tipo_sello==1)                                
												@elseif($workorder->tipo_sello==2) Cyrel
												@elseif($workorder->tipo_sello==3) Sello Seco
												@elseif($workorder->tipo_sello==4) Sello Madera 
												@elseif($workorder->tipo_sello==5) Sello Printer
												@elseif($workorder->tipo_sello==6) Sello de Bolsillo 
												@elseif($workorder->tipo_sello==7) Otros
												@endif
                                            </div>
                                            <br> 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::checkbox('gigantografia',  $workorder->gigantografia, $workorder->gigantografia == 1)}}
                                                {{ Form::label('tipo_gigantografia', ' GIGANTOGRAFÍA') }}
                                                
												@if($workorder->tipo_gigantografia==1)                                
												@elseif($workorder->tipo_gigantografia==2) Banner
												@elseif($workorder->tipo_gigantografia==3) Vinilo Blanco
												@elseif($workorder->tipo_gigantografia==4) Traslucido
												@elseif($workorder->tipo_gigantografia==5) Microperforado
												@elseif($workorder->tipo_gigantografia==6) Acrílico 
												@elseif($workorder->tipo_gigantografia==7) Otros
												@endif
                                            </div>
                                            <br>
                                        </div>
										<div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::checkbox('gigantografia',  1, false)}}
                                                {{ Form::label('tipo_gigantografia', 'IMPRESIÓN') }}
                                                {{ Form::select('tipo_gigantografia',array('1' => 'Seleccionar', '2' => 'Numeradora','3' => 'Multilith Doble Carta','4' => ' Heidelberg CTP 52','5' => 'Impresiòn Digital','6' => 'Impresiòn Blanco y Negro','7' => 'Impresiòn Burbuja','8' => 'Otros'),null ,array('class' => 'form-control')); }}
                                            </div>
                                           
                                        </div>
                                         <div class="col-xs-9">											
											<div class="col-xs-3">
												<div class='form-group'>												
													{{ Form::checkbox('<!--servicio_numerado-->',  1, false)}}
													{{ Form::label('<!--servicio_numerado-->', 'NUMERADO') }}                                                            
												</div>
												<div class='form-group'>
													{{ Form::checkbox('<!--servicio_perforado-->',  1, false)}}
													{{ Form::label('<!--servicio_perforado-->', 'PERFORADO') }}                                                            
												</div>												
											</div>
											<div class="col-xs-3">
												<div class='form-group'>												
													{{ Form::checkbox('<!--servicio_levante-->',  1, false)}}
													{{ Form::label('<!--servicio_levante-->', 'LEVANTE') }}                                                            
												</div>
												 <div class='form-group'>
													{{ Form::checkbox('<!--servicio_engrapado-->',  1, false)}}
													{{ Form::label('<!--servicio_engrapado-->', 'ENGRAPADO') }}                                                            
												</div>
												<!--
												<div class='form-group'>
													{{ Form::checkbox('<!--servicio_grafado--><!--',  1, false)}}
													{{ Form::label('<!--servicio_grafado--><!--', 'GRAFADO') }}                                                            
												</div>	-->											
											</div>
											<div class="col-xs-3">
												<div class='form-group'>
													{{ Form::checkbox('<!--servicio_laminado-->',  1, false)}}
													{{ Form::label('<!--servicio_laminado-->', 'LAMINADO') }}                                                            
												</div>
												<div class='form-group'>												
													{{ Form::checkbox('<!--servicio_engomado-->',  1, false)}}
													{{ Form::label('<!--servicio_engomado-->', 'ENGOMADO') }}                                                            
												</div>												
											</div>	
											<div class="col-xs-3">												
												<div class='form-group'>
													{{ Form::checkbox('<!--servicio_corte-->',  1, false)}}
													{{ Form::label('<!--servicio_corte-->', 'CORTE') }}                                                            
												</div>
												<div class='form-group'>
													{{ Form::checkbox('<!--servicio_refile-->',  1, false)}}
													{{ Form::label('<!--servicio_refile-->', 'REFILE') }}                                                            
												</div>
											</div>	
										 </div>										 									 
                                        <br>
                                        <div class="col-xs-12">
											<hr>
                                            <div class='form-group form-register tex'>
                                                {{ Form::label('detalles_trabajo', 'DETALLES DEL TRABAJO:') }}
                                                {{ $workorder->detalles_trabajo }}
                                            </div>                                                    
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('valor_trabajo', 'VALOR:') }}
                                                {{ $workorder->valor_trabajo}}
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('abono', 'ABONO:') }}
                                                {{ $workorder->abono }}
                                            </div>
                                        </div>                              
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('saldo', 'SALDO:') }}
                                                {{ $workorder->saldo }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('pago', 'PAGO:') }}
                                                {{ $workorder->pago }}
                                            </div>
                                            <br>
                                        </div> 
                                        <div class="col-xs-3"> 
                                            <br>
                                            <div class='form-group'>
                                                {{ Form::checkbox('iva',  $workorder->iva, $workorder->iva == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('iva', 'PAGO IVA') }}                                                            
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_factura', 'FACTURA:') }}
                                                {{  $workorder->no_factura }}
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class='form-group form-register'>
                                                {{ Form::label('vendedor', 'VENDEDOR:') }}
                                                {{ $workorder->vendedor }}
                                            </div>
                                        </div>                                        
                                   <br><br>                                          
                                <div class="row"  align="justify">                                        
                                    <!--  <h2  align="center">Orden de Producción</h2> --> 
									 <h4>ORDEN PRODUCION</h4> 
                                    <br>
                                    

								   <br>
                                    </div>																		
                                    <div class="col-xs-12">
									<hr><br>
                                        <div class='form-group form-register' align="justify">                                                                         
                                            <h3><b>DISEÑO</b></h3><br><!--
                                            {{ Form::select('estado_trabajo', array('Estado Trabajo' => array('1' => 'Por realizar', '2' => 'Diseño', '3' => 'Impresion','4' => 'Acabados', '5' => 'Disponible','6' => 'Entregado')),null ,array('class' => 'form-control')); }}
                                       --> 
									</div>
                                    </div>
                                    <br> <br>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            {{ Form::label('diseñador', 'DISEÑADOR:') }}
                                            {{ $workorder->diseñador}}
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            {{ Form::label('tipo_realizado', 'TRABAJO A REALIZAR:') }}
											
												@if($workorder->tipo_realizado==1)	                             
												@elseif($workorder->tipo_realizado==2) Diseño Nuevo
												@elseif($workorder->tipo_realizado==3) Corrección
												@elseif($workorder->tipo_realizado==4) Quema de Master
												@elseif($workorder->tipo_realizado==5) Diseño según Muestra
												@elseif($workorder->tipo_realizado==6) Identidad Corporativa
												@endif
                                        </div>
                                    </div>  
                                    <br>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            {{ Form::label('tipo_impresion', ' TIPO DE  IMPRESIÓN:') }}
                                            											
												@if($workorder->tipo_impresion==1)	                             
												@elseif($workorder->tipo_impresion==2) Digital 
												@elseif($workorder->tipo_impresion==3) Litográfica
												@elseif($workorder->tipo_impresion==4) Gigantografia
												@elseif($workorder->tipo_impresion==5) Sello
												@endif
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class='form-group form-register'>
                                            {{ Form::checkbox('plancha',  $workorder->plancha, $workorder->plancha == 1,['disabled' => 'disabled'])}}
                                            {{ Form::label('tipo_plancha', 'PLANCHA') }}                                                        
                                            
											@if($workorder->tipo_plancha==1)	                          
											@elseif($workorder->tipo_plancha==2) Ctp 52
											@elseif($workorder->tipo_plancha==3) M.Doble Carta
											@endif
                                        </div>                                                  
                                    </div>
                                    <div class="col-xs-3">
                                        <div class='form-group form-register'>
                                            {{ Form::checkbox('master',  $workorder->master, $workorder->master == 1,['disabled' => 'disabled'])}}
                                            {{ Form::label('tipo_master', 'MASTER') }}
											
											@if($workorder->tipo_master==1)	                              
											@elseif($workorder->tipo_master==2) Medio Master
											@elseif($workorder->tipo_master==3) Master Entero
											@endif
                                        </div>
                                        <br>
                                    </div>
                                    <hr>
                                    <div class="row"  align="justify"> 
                                        <div class="col-xs-12">
                                            <h5>Facturas Reg.Común</h5>
                                            <br>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_dian', 'NO.DIAN:') }}
                                                {{ $workorder->no_dian}}
                                            </div> 
                                        </div> 
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('fecha_dian', 'FECHA:') }}
                                                {{ $workorder->fecha_dian }}
                                            </div> 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('habilitado_dian', 'HAB:') }}
                                                {{ $workorder->habilitado_dian }}
                                            </div>
                                            <br>
                                        </div>  
                                       <div class="col-xs-12">
                                            <div class='form-group form-register tex'>
                                                {{ Form::label('observacion_diseño', ' OBSERVACIÓN DISEÑO:') }}
                                                {{ Form::textarea('observacion_diseño', $workorder->observacion_diseño, array('rows' => '3', 'placeholder' => 'Detalles', 'class' => 'form-control','disabled')) }}
                                            </div>                                                
                                        </div>
                                        <br><br>                                                     
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('fecha_reporte_diseño', 'FECHA DE REPORTE:') }}
												{{ $workorder->fecha_reporte_diseño}}                                               
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('revisado_diseño', 'REVISADO:') }}
                                                {{ $workorder->revisado_diseño }}
                                            </div>                                                
                                        </div>
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('autorizado_diseño', 'AUTORIZADO:') }}
                                                {{ $workorder->autorizado_diseño}}
                                            </div>
											<br>											
                                        </div>								
                                    </div>
                                    <div class="row"  align="left">                                                      
                                        <div class='form-group form-register' align="justify">
											<hr>
                                            <div class="col-xs-12">
                                                <br>  <br>
                                                <h3><b>PRE IMPRESIÓN /  IMPRESIÓN</b></h3><br><!--
                                                {{ Form::select('estado_trabajo', array('Estado Trabajo' => array('1' => 'Por realizar', '2' => 'Diseño', '3' => 'Impresion','4' => 'Acabados', '5' => 'Disponible','6' => 'Entregado')),null ,array('class' => 'form-control')); }}
                                                <br> -->
                                            </div>  
                                        </div>

                                        <div class="col-xs-6">
                                            <div class='form-group form-register'>
                                                {{ Form::label('maquina', 'MÁQUINA:') }}
                                                {{ $workorder->maquina }}
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class='form-group form-register'>
                                                {{ Form::label('clase_material', 'CLASE DE MATERIAL:') }}
                                                {{ $workorder->clase_material}}
                                            </div>
                                        </div>  
                                        <br>                                                    
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('cantidad_trabajo', 'CANT:') }}
                                                {{ $workorder->cantidad_trabajo }}
                                            </div>                                                   
                                        </div> 
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('tamano', 'TAMAÑO:') }}
                                                {{ $workorder->tamano }}
                                            </div>                                                  
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('cantidad_material', 'CANT:') }}
                                                {{ $workorder->cantidad_material }}
                                            </div>                                                 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('corte', 'MONTAJE:') }}
                                                {{ $workorder->corte }}
                                            </div>                                                  
                                        </div>                                                   
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('emblocado', 'EMBLOCADO:') }}
                                                {{ $workorder->emblocado }}
                                            </div>                                                  
                                        </div> 
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_inicial', 'No. INICIAL:') }}
                                                {{ $workorder->no_inicial}}
                                            </div>                                                
                                        </div> 
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_final', 'No. FINAL:') }}
                                                {{ $workorder->no_final }}
                                            </div>                                                
                                        </div> 
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('color_tinta', 'COLOR:') }}
                                                {{ $workorder->color_tinta}}
                                            </div> 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_tintas', 'No. TINTA:') }}

												@if($workorder->no_tintas==1)	                             
												@elseif($workorder->no_tintas==2) una tinta
												@elseif($workorder->no_tintas==3) dos tintas 
												@elseif($workorder->no_tintas==4) tres tintas
												@elseif($workorder->no_tintas==5) policromía  
												@endif
                                            </div> 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('tinta_especial', 'TINTA :') }}
												{{ $workorder->tinta_especial }}
                                            </div> 
                                        </div>  
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('color_material', 'COLOR:') }}
                                                {{ $workorder->color_material }}
                                            </div> 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_copia', 'NO. COPIAS:') }}
                                                {{ $workorder->no_copia}}
                                            </div> 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>                                   
                                                {{ Form::label('copia1', 'COPIA1:') }}
                                                												
												@if($workorder->copia1==1)	                             
												@elseif($workorder->copia1==2) Color 
												@elseif($workorder->copia1==3) Amarillo 
												@elseif($workorder->copia1==4) Rosado
												@elseif($workorder->copia1==5) Verde 
												@elseif($workorder->copia1==6) Azul 
												@elseif($workorder->copia1==7) Blanco
												@endif
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('copia2', 'COPIA2:') }}
                                               
												@if($workorder->copia2==1)	                             
												@elseif($workorder->copia2==2) Color 
												@elseif($workorder->copia2==3) Amarillo 
												@elseif($workorder->copia2==4) Rosado
												@elseif($workorder->copia2==5) Verde 
												@elseif($workorder->copia2==6) Azul 
												@elseif($workorder->copia2==7) Blanco
												@endif
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('copia3', 'COPIA3:') }}
                                                
												@if($workorder->copia3==1)	                             
												@elseif($workorder->copia3==2) Color 
												@elseif($workorder->copia3==3) Amarillo 
												@elseif($workorder->copia3==4) Rosado
												@elseif($workorder->copia3==5) Verde 
												@elseif($workorder->copia3==6) Azul 
												@elseif($workorder->copia3==7) Blanco
												@endif
                                            </div>                                                           
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('copia4', 'COPIA4:') }}
                                                
												@if($workorder->copia4==1)	                             
												@elseif($workorder->copia4==2) Color 
												@elseif($workorder->copia4==3) Amarillo 
												@elseif($workorder->copia4==4) Rosado
												@elseif($workorder->copia4==5) Verde 
												@elseif($workorder->copia4==6) Azul 
												@elseif($workorder->copia4==7) Blanco
												@endif
                                            </div>                               
                                        </div>    
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('numerado',  $workorder->numerado, $workorder->numerado == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('numerado', 'NUMERADO') }} 
												
												@if($workorder->numeradoras==1)	                             
												@elseif($workorder->numeradoras==2) 1 Numeradora
												@elseif($workorder->numeradoras==3) 2 Numeradoras
												@elseif($workorder->numeradoras==4) 3 Numeradoras
												@elseif($workorder->numeradoras==5) 4 Numeradoras  
												@endif
											
											</div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <br><br>
                                            <div class='form-group'>
                                                {{ Form::checkbox('original_todas',  $workorder->original_todas, $workorder->original_todas == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('original_todas', 'ORIGINAL TODAS') }}                                                           
                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <br><br>
                                            <div class='form-group'>                                                            
                                                {{ Form::checkbox('original_copia',  $workorder->original_copia, $workorder->original_copia == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('original_copia', 'ORIGINAL Y COPIA') }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <br><br>
                                            <div class='form-group'>
                                                {{ Form::checkbox('tiro_retiro',  $workorder->tiro_retiro, $workorder->tiro_retiro == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('tiro_retiro', 'TIRO Y RETIRO') }}  
                                                <br><br>
                                            </div>
                                        </div> 
                                        <div class="col-xs-12">
                                            <div class='form-group form-register tex'>
                                                {{ Form::label('observacion_impresion', ' OBSERVACIÓN PRE IMPRESIÓN / IMPRESIÓN:') }}
                                                {{ Form::textarea('observacion_impresion', $workorder->observacion_impresion, array('rows' => '3', 'placeholder' => 'Detalles', 'class' => 'form-control','disabled')) }}
                                            </div>                                                
                                        </div>
                                        <br><br>                                        
                                    </div>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            {{ Form::label('fecha_reporte_impresion', 'FECHA DE REPORTE:') }}
											 {{ $workorder->fecha_reporte_impresion}}
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            {{ Form::label('autorizado_impresion', 'AUTORIZADO:') }}
                                            {{ $workorder->autorizado_impresion}}
                                        <br>
										</div>
										
                                    </div><!-- 
										<div class="button"align="center">
											{{ Form::button('Resetear', array('type' => 'reset', 'class' => 'btn btn-default btn-lg')) }} 
											{{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn  btn-success btn-lg')) }}                               
										</div>   -->                          
                                     	
                                   
                                    <div class="row"  align="justify">                                           
                                        <div class='form-group form-register' align="justify">
										<hr>
                                            <div class="col-xs-12">
                                                <br><br><br>
                                                <h3><b>ACABADOS</b></h3><br><!--
                                                {{ Form::select('estado_trabajo', array('Estado Trabajo' => array('1' => 'Por realizar', '2' => 'Diseño', '3' => 'Impresion','4' => 'Acabados', '5' => 'Disponible','6' => 'Entregado')),null ,array('class' => 'form-control')); }}
                                                <br>-->
                                            </div>                                                       
                                        </div>                                                    
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('levante',  $workorder->levante, $workorder->levante == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('levante', 'LEVANTE') }}                                                            
                                            </div>
                                        </div>   
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('engrapado',  $workorder->engrapado, $workorder->engrapado == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('engrapado', 'ENGRAPADO') }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('laminado',  $workorder->laminado, $workorder->laminado == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('laminado', 'LAMINADO') }}

                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('plastificadouv',  $workorder->plastificadouv, $workorder->plastificadouv == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('plastificadouv', 'PLAST.UV') }}                                                            
                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('engomado',  $workorder->engomado, $workorder->engomado == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('engomado', 'ENGOMADO') }}

                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('corte_refile',  $workorder->corte_refile, $workorder->corte_refile == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('corte_refile', 'CORTE') }}

                                            </div>
                                        </div>                                                     
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('estampado',  $workorder->estampado, $workorder->estampado == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('estampado', 'REFILE') }}

                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('plastificadomate',  $workorder->plastificadomate, $workorder->plastificadomate == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('plastificadomate', 'PLAST. MATE') }}

                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('perforado',  $workorder->perforado, $workorder->perforado == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('perforado', 'PERFORADO') }}

                                            </div>
                                        </div>                                                    
                                        <div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('argollado',  $workorder->argollado, $workorder->argollado == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('argollado', 'ARGOLLADO') }}

                                            </div>
                                        </div>  
                                        <div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('sublimacion',  $workorder->sublimacion, $workorder->sublimacion == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('sublimacion', 'GRAFADO') }}

                                            </div>
                                        </div>                                           
                                        <div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('plastificadoreserva',  $workorder->plastificadoreserva, $workorder->plastificadoreserva == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('plastificadoreserva', 'PLAST.RESERVA') }}
                                                <br><br>
                                            </div>
                                        </div> 

                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('otro_acabados', 'OTRO:') }}
                                                {{ Form::text('otro_acabados', $workorder->otro_acabados, array('placeholder' => 'Cual?', 'class' => 'form-control')) }}
                                            </div>
                                            <br><br>
                                        </div> 
                                        <div class="col-xs-9">
                                            <div class='form-group form-register'>
                                                {{ Form::label('recomendaciones', 'RECOMENDACIONES:') }}
                                                {{ Form::text('recomendaciones', $workorder->recomendaciones, array('placeholder' => 'Trabajo', 'class' => 'form-control')) }}
                                            </div>
                                            <br><br>
                                        </div> 
                                        <div class="col-xs-12">
                                            <div class='form-group form-register tex'>
                                                {{ Form::label('observacion_acabados', ' OBSERVACIÓN DE ACABADOS:') }}
                                                {{ Form::textarea('observacion_acabados', $workorder->observacion_acabados, array('rows' => '3', 'placeholder' => 'Detalles', 'class' => 'form-control','disabled')) }}
                                            </div>                                                
                                        </div>
                                        <br><br>                                        
                                    </div>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            {{ Form::label('fecha_reporte_acabados', 'FECHA DE REPORTE:') }}
											{{ $workorder->fecha_reporte_acabados}}
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            {{ Form::label('autorizado_acabados', 'AUTORIZADO:') }}
                                            {{ $workorder->autorizado_acabados}}
                                        </div>
										<br><br>
                                    </div>
									<div class='row buttons'>   
										<div class="col-md-1">
											{{ Form::button('Editar', array('type' => 'reset', 'class' => 'btn btn-default')) }} 
											{{ Form::model($workorder, array('url' => array('/worklist/'.$workorder->id), 'method' => 'DELETE', 'role' => 'form')) }}
										</div>  
										<div class="col-md-1">
											{{ Form::submit('Eliminar', array('class' => 'btn  btn-success')) }}
										</div> 
									</div>  
										<br><br>									
                                </div>

                            </div>
                      
                        {{ Form::close() }}
                </div>   
        </div>
    </div>
</div>  
 
@stop