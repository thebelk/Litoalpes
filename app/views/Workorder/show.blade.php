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
    <div class="comp"> 
			<a href="/customer/{{$customer->id}}/profile"> 
            <h3>{{$customer->cliente}}&nbsp(Cliente)  </h3></a><br>
            <h5>Contacto: {{$customer->cel_contacto}} </h5> 
            <h5>Telefono: {{$customer->telefono}} </h5> 
            <h5>Cliente:          
                @if($customer->tipo_cliente==1) Directo
                @elseif($customer->tipo_cliente==2) Servicio                              
                @endif
            </h5>
            <h5> Nit: {{ $customer->nit_cc}}  </h5>
            <h5>{{ $customer->pagina_web}} </h5>
            <h5>{{ $customer->otro}} </h5>  
        </div>       
        <h5>{{ HTML::link('/customer/'.$customer->id.'/edit','Editar', array('class' => 'btn btn-link'), false)}}</h5>    
   
    <div class="accordion" id="accordion2">
        <div class="accordion-group">
            <div class="accordion-heading"><h5>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        Correo Electronico
                    </a></h5>
            </div>
            <div id="collapseOne" class="accordion-body collapse in">
                <br>
                <p> <h5>Email: {{ $customer->email}} </h5>
				</p>             
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
                    <h5>Direccion: {{$customer->direccion}} </h5>
                    <h5> Ciudad: {{$customer->ciudad}} </h5>
                    <h5> Pais: {{$customer->pais}} </h5>
                </div>
            </div>
        </div>
    </div> 
    <br>
     <div id="sidebar">                           
        <div class="list-group">
            <a href="/customer/{{$customer->id}}/profile" class="list-group-item  text-center">                           
                <h5 class="glyphicon glyphicon-user"></h5><br/><h5>
					@if($customer->empresa=="")
					{{ $customer->cliente }} 
					@endif
					{{$customer->empresa}}
				</h5> 
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
										<div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                <h3><strong>ORDEN DE</strong>
												{{ Form::text('customers_id', $customer->id, array('hidden' => 'true')) }}
														@if($workorder->tipo_orden==1)                                 
														@elseif($workorder->tipo_orden==2) SERVICIO 
														@elseif($workorder->tipo_orden==3) PRODUCTO
													@endif </h3>
                                            </div>	
											<div class='form-group form-register'>
												{{ Form::label('fecha_pedido', 'FECHA PEDIDO') }}
												{{  $workorder->created_at }}  
                                            </div>
                                        </div>
										<div class="col-xs-3">
                                            <div class='form-group form-register' align="justify">

                                               <h3><strong> {{ Form::label('no_orden', 'NO. ORDEN') }}</strong>
                                                 {{ $workorder->no_orden}}</h3>
                                            </div>
											{{ Form::label('fecha_entrega', 'FECHA ENTREGA') }}
												{{ $workorder->fecha_entrega}}
                                        </div>
										
										<div class="col-xs-5">
											<h3><strong>ESTADO DE TRABAJO</strong>
												@if($workorder->estado_trabajo==1) Por realizar	                                
												@elseif($workorder->estado_trabajo==2) Estado Diseño
												@elseif($workorder->estado_trabajo==3) Estado Revisión
												@elseif($workorder->estado_trabajo==4) Enviado para impresión
												@elseif($workorder->estado_trabajo==5) Estado Impresion
												@elseif($workorder->estado_trabajo==6) Estado Acabados 
												@elseif($workorder->estado_trabajo==7) Listo
												@elseif($workorder->estado_trabajo==8) Entregado
												@endif  </h3>	
										</div>
										<div class="col-xs-12"><hr><br>
											<h5><b>SERVICIOS</b></h5><br>
										</div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
												@if($workorder->tipo_encuadernado==1)
													{{ Form::checkbox('encuadernado',  $workorder->encuadernado, $workorder->encuadernado == 1,['disabled' => 'disabled'])}}
													{{ Form::label('tipo_encuadernado', 'ANILLADO/ EMPASTE') }} 
												@elseif($workorder->tipo_encuadernado==2)
													{{ Form::checkbox('encuadernado',  $workorder->encuadernado, $workorder->encuadernado == 1,['disabled' => 'disabled'])}}
													{{ Form::label('tipo_encuadernado', 'ANILLADO') }} Espiral 
												@elseif($workorder->tipo_encuadernado==3)
													{{ Form::checkbox('encuadernado',  $workorder->encuadernado, $workorder->encuadernado == 1,['disabled' => 'disabled'])}}
													{{ Form::label('tipo_encuadernado', 'ANILLADO') }}Plástico
												@elseif($workorder->tipo_encuadernado==4)
													{{ Form::checkbox('encuadernado',  $workorder->encuadernado, $workorder->encuadernado == 1,['disabled' => 'disabled'])}}
													{{ Form::label('tipo_encuadernado', 'ANILLADO') }}Doble – O 
												@elseif($workorder->tipo_encuadernado==5)
													{{ Form::checkbox('encuadernado',  $workorder->encuadernado, $workorder->encuadernado == 1,['disabled' => 'disabled'])}}
													{{ Form::label('tipo_encuadernado', 'ANILLADO') }}Velobind
												@elseif($workorder->tipo_encuadernado==6)
													{{ Form::checkbox('encuadernado',  $workorder->encuadernado, $workorder->encuadernado == 1,['disabled' => 'disabled'])}}
													{{ Form::label('tipo_encuadernado', 'ANILLADO') }}Sencillo 
												@elseif($workorder->tipo_encuadernado==7)
													{{ Form::checkbox('encuadernado',  $workorder->encuadernado, $workorder->encuadernado == 1,['disabled' => 'disabled'])}}
													{{ Form::label('tipo_encuadernado', 'EMPASTE') }}Pasta Dura
												@elseif($workorder->tipo_encuadernado==8)
													{{ Form::checkbox('encuadernado',  $workorder->encuadernado, $workorder->encuadernado == 1,['disabled' => 'disabled'])}}
													{{ Form::label('tipo_encuadernado', 'EMPASTE') }} Pasta Dura / Marcado
												@endif
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::checkbox('sublimaciones', $workorder->sublimaciones, $workorder->sublimaciones == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('tipo_sublimacion', ' SUBLIMACIÓN ') }}                                                            
                                                
												@if($workorder->tipo_sublimacion==1)                              
												@elseif($workorder->tipo_sublimacion==2) Mugs
												@elseif($workorder->tipo_sublimacion==3) Platos
												@elseif($workorder->tipo_sublimacion==4) Camisetas 
												@elseif($workorder->tipo_sublimacion==5) Gorras
												@elseif($workorder->tipo_sublimacion==6) Botones 
												@elseif($workorder->tipo_sublimacion==7) Otros
												@endif
                                            </div>											
                                        </div>
										<div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::checkbox('impresiones',$workorder->impresiones, $workorder->impresiones == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('tipo_impresiones', 'IMPRESIÓN') }}
												
												@if($workorder->tipo_impresiones==1)                                
												@elseif($workorder->tipo_impresiones==2) Numeradora'
												@elseif($workorder->tipo_impresiones==3) Multilith Doble Carta
												@elseif($workorder->tipo_impresiones==4) Heidelberg CTP 52
												@elseif($workorder->tipo_impresiones==5) Digital
												@elseif($workorder->tipo_impresiones==6) Blanco y Negro 
												@elseif($workorder->tipo_impresiones==7) Burbuja
												@endif
                                            </div>											
                                        </div>                                        
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::checkbox('gigantografia',  $workorder->gigantografia, $workorder->gigantografia == 1,['disabled' => 'disabled'])}}
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
                                        </div>
										<div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::checkbox('sello',  $workorder->tipo_sello, $workorder->tipo_sello == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('tipo_sello', ' SELLO') }}                                                            
                                                												
												@if($workorder->tipo_sello==1)                                
												@elseif($workorder->tipo_sello==2) Cyrel
												@elseif($workorder->tipo_sello==3) Seco
												@elseif($workorder->tipo_sello==4) Madera 
												@elseif($workorder->tipo_sello==5) Printer
												@elseif($workorder->tipo_sello==6) Bolsillo 
												@elseif($workorder->tipo_sello==7) Otros
												@endif
                                            </div>
											<div class='form-group'>
													{{ Form::label('servicio_otro', 'OTRO:') }}												
													{{ $workorder->servicio_otro }}
												</div>
                                             
                                        </div>
                                         <div class="col-xs-9">											
											<div class="col-xs-2">
												<div class='form-group'>												
													{{ Form::checkbox('servicio_numerado',$workorder->servicio_numerado, $workorder->servicio_numerado == 1,['disabled' => 'disabled'])}}
													{{ Form::label('servicio_numerado', 'NUMERADO') }}                                                            
												</div>
												<div class='form-group'>
													{{ Form::checkbox('servicio_perforado',  $workorder->servicio_perforado, $workorder->servicio_perforado == 1,['disabled' => 'disabled'])}}
													{{ Form::label('servicio_perforado','PERFORADO') }}                                                            
												</div>
											</div>
											<div class="col-xs-2">												
												<div class='form-group'>
													{{ Form::checkbox('servicio_repuje',  $workorder->servicio_repuje, $workorder->servicio_repuje  == 1,['disabled' => 'disabled'])}}
													{{ Form::label('servicio_repuje', 'REPUJE') }}                                                            
												</div>										
												<div class='form-group'>												
													{{ Form::checkbox('servicio_levante',  $workorder->servicio_levante, array($workorder->servicio_levante == 1),['disabled' => 'disabled'])}}
													{{ Form::label('servicio_levante', 'LEVANTE') }}                                                            
												</div>
											</div>
											<div class="col-xs-2">
												 <div class='form-group'>
													{{ Form::checkbox('servicio_engrapado',  $workorder->servicio_engrapado, $workorder->servicio_engrapado == 1,['disabled' => 'disabled'])}}
													{{ Form::label('servicio_engrapado','ENGRAPADO') }}                                                            
												</div>
												
												<div class='form-group'>
													{{ Form::checkbox('servicio_grafado',  $workorder->servicio_grafado, $workorder->servicio_grafado  == 1 , ['disabled' => 'disabled'])}}
													{{ Form::label('servicio_grafado', 'GRAFADO') }}                                                            
												</div>												
											</div>
											<div class="col-xs-2">
												<div class='form-group'>
													{{ Form::checkbox('servicio_laminado', $workorder->servicio_laminado, $workorder->servicio_laminado == 1,['disabled' => 'disabled'])}}
													{{ Form::label('servicio_laminado', 'LAMINADO') }}                                                            
												</div>
												<div class='form-group'>												
													{{ Form::checkbox('servicio_engomado',  $workorder->servicio_engomado, $workorder->servicio_engomado == 1,['disabled' => 'disabled'])}}
													{{ Form::label('servicio_engomado', 'ENGOMADO') }}                                                            
												</div>
												
											</div>	
											<div class="col-xs-2">												
												<div class='form-group'>
													{{ Form::checkbox('servicio_corte',  $workorder->servicio_corte, $workorder->servicio_corte == 1,['disabled' => 'disabled'])}}
													{{ Form::label('servicio_corte', 'CORTE') }}                                                            
												</div>
												<div class='form-group'>
													{{ Form::checkbox('servicio_refile',  $workorder->servicio_refile, $workorder->servicio_refile == 1,['disabled' => 'disabled'])}}
													{{ Form::label('servicio_refile', 'REFILE') }}                                                            
												</div>
												
											</div>	
											
										 </div>										 									 
                                        <br>
										<div class="col-xs-12">
											<br>
											<p>
											  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#diseno" aria-expanded="false" aria-controls="collapseExample">
												ORDEN DISEÑO
											  </button>
											  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#impresion" aria-expanded="false" aria-controls="collapseExample">
												ORDEN IMPRESIÓN
											  </button>
											  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#acabados" aria-expanded="false" aria-controls="collapseExample">
												ORDEN ACABADOS
											  </button>
											</p><hr><br>
                                            <div class='form-group form-register' align="justify">
                                                <h3><strong>{{ $workorder->clase_trabajo }}</strong></h3>												
                                            </div> 
                                        </div>
                                        <div class="col-xs-12">									
                                            <div class='form-group form-register tex'>
                                                {{ Form::textarea('detalles_trabajo', $workorder->detalles_trabajo, array('rows' => '3', 'placeholder' => 'Detalles', 'class' => 'form-control','disabled')) }}
                                            </div><br>                                                    
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
                                                {{ Form::label('subtotal', 'SUB TOTAL:') }}
                                                {{ $workorder->subtotal }}
                                            </div>
                                        </div> 
                                        <div class="col-xs-3"> 
											
											@if($workorder->iva==0) 
												<div class='form-group'>
													{{ Form::label('iva', 'SIN IVA') }}
													{{ Form::radio('iva',$workorder->iva == 0,$workorder->iva,['disabled' => 'disabled'], array('onclick' => 'checkIVAType();')) }}
													<div id="valor_iva" style="hidden:true"></div>
												</div>
												
											@elseif($workorder->iva==1)
												<div class='form-group'style=" float:left">
													{{ Form::label('iva', 'MAS IVA') }}
													{{ Form::radio('iva',$workorder->iva == 1,$workorder->iva,['disabled' => 'disabled'], array('onclick' => 'checkIVAType();')) }}
													<div id="valor_iva" style="hidden:true; float:left"></div>
												</div>
											
											@elseif($workorder->iva==2) 
												<div class='form-group'style=" float:left">
													{{ Form::label('iva', 'CON IVA') }}
													{{ Form::radio('iva', $workorder->iva == 2,$workorder->iva,['disabled' => 'disabled'], array('onclick' => 'checkIVAType();')) }}
													<div id="valor_iva" style="hidden:true"></div>
												</div>
											@endif 
											<div id="valor_iva" style="hidden:true; float:left"></div>
											
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_factura', 'FACTURA:') }}
                                                {{  $workorder->no_factura }}
                                            </div>
                                        </div>
										<div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('total', 'TOTAL:') }}
                                                {{  $workorder->total }}
                                            </div>
                                        </div> 
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('vendedor', 'VENDEDOR:') }}
                                                {{ $workorder->vendedor }}
                                            </div>
											 <br><br>
                                        </div>                                   
                                <div class="row"  align="justify">                                        
                                    <!--  <h2  align="center">Orden de Producción</h2> --> 
									<div class="collapse" id="diseno">
									  <div class="card card-block">
										<br>
                                    </div>																		
                                    <div class="col-xs-12">
									<hr><br><br>
                                        <div class='form-group form-register' align="justify">                                                                         
                                            <h3><b>DISEÑO</b></h3><!--
                                            {{ Form::select('estado_trabajo', array('Estado Trabajo' => array('1' => 'Por realizar', '2' => 'Diseño', '3' => 'Impresion','4' => 'Acabados', '5' => 'Disponible','6' => 'Entregado')),null ,array('class' => 'form-control')); }}
                                       --> 
									</div>
                                    </div>
                                    <br>
                                    <div class="col-xs-3">
                                        <div class='form-group form-register'>
                                            {{ Form::label('diseñador', 'DISEÑADOR:') }}
                                            {{ $workorder->diseñador}}
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
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
                                    <div class="col-xs-2">
                                        <div class='form-group form-register'>
                                            {{ Form::label('tipo_impresion', ' MPRESIÓN') }}
                                            											
												@if($workorder->tipo_impresion==1)	                             
												@elseif($workorder->tipo_impresion==2) Digital 
												@elseif($workorder->tipo_impresion==3) Litográfica
												@elseif($workorder->tipo_impresion==4) Gigantografia
												@elseif($workorder->tipo_impresion==5) Sello
												@endif
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-xs-2">
                                        <div class='form-group form-register'>
                                            {{ Form::checkbox('plancha',  $workorder->plancha, $workorder->plancha == 1,['disabled' => 'disabled'])}}
                                            {{ Form::label('tipo_plancha', 'PLANCHA') }} <br>                                                       
                                            
											@if($workorder->tipo_plancha==1)	                          
											@elseif($workorder->tipo_plancha==2) Ctp 52
											@elseif($workorder->tipo_plancha==3) M.Doble Carta
											@endif
                                        </div>                                                  
                                    </div>
                                    <div class="col-xs-2">
                                        <div class='form-group form-register'>
                                            {{ Form::checkbox('master',  $workorder->master, $workorder->master == 1,['disabled' => 'disabled'])}}
                                            {{ Form::label('tipo_master', 'MASTER') }}<br>
											
											@if($workorder->tipo_master==1)	                              
											@elseif($workorder->tipo_master==2) Medio Master
											@elseif($workorder->tipo_master==3) Master Entero
											@endif
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row"  align="justify"> 
                                        <div class="col-xs-12">
                                            <h5><strong>Facturas Reg.Común</strong></h5>
                                        </div>
                                        <div class="col-xs-3">
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
                                        </div>  
                                       <div class="col-xs-12">
									   <hr><br>
                                            <div class='form-group form-register tex'>
                                                {{ Form::label('observacion_diseño', ' OBSERVACIÓN DISEÑO:') }}
                                                {{ Form::textarea('observacion_diseño', $workorder->observacion_diseño, array('rows' => '3', 'placeholder' => 'Detalles', 'class' => 'form-control','disabled')) }}
                                            </div>                                                
                                        </div>
                                        <hr><br>                                                     
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
                                        </div>								
                                    </div>
								</div>
								<div class="collapse" id="impresion">
                                    <div class="row"  align="left">                                                      
                                        <div class='form-group form-register' align="justify">
											<hr>
                                            <div class="col-xs-12">
                                                <hr><br><br>
                                                <h3><b>PRE IMPRESIÓN /  IMPRESIÓN</b></h3><br><!--
                                                {{ Form::select('estado_trabajo', array('Estado Trabajo' => array('1' => 'Por realizar', '2' => 'Diseño', '3' => 'Impresion','4' => 'Acabados', '5' => 'Disponible','6' => 'Entregado')),null ,array('class' => 'form-control')); }}
                                                <br> -->
                                            </div>  
                                        </div>

                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('maquina', 'MÁQUINA:') }}
                                                {{ $workorder->maquina }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('clase_material', 'CLASE DE MATERIAL:') }}
                                                {{ $workorder->clase_material}}
                                            </div>
                                        </div>
										<div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('cantidad_material', 'CANT. MATERIAL:') }}
                                                {{ $workorder->cantidad_material }}
                                            </div>                                                 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('corte_material', 'CORTE MATERIAL:') }}
                                                {{ $workorder->corte_material }}
                                            </div>                                                  
                                        </div>
                                                                                           
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('cantidad_trabajo', 'CANT. TRABAJO:') }}
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
                                                {{ Form::label('emblocado', 'EMBLOCADO:') }}
                                                {{ $workorder->emblocado }}
                                            </div>                                                  
                                        </div>
										<div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('servicio_numerado',  $workorder->servicio_numerado, $workorder->servicio_numerado == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('numerado', 'CANT. NUMERADORAS:') }} 
												
												@if($workorder->numeradoras==1)	                             
												@elseif($workorder->numeradoras==2) 1 Numeradora
												@elseif($workorder->numeradoras==3) 2 Numeradoras
												@elseif($workorder->numeradoras==4) 3 Numeradoras
												@elseif($workorder->numeradoras==5) 4 Numeradoras  
												@endif
											
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
                                                {{ Form::label('color_tinta', 'COLOR TINTA:') }}
                                                {{ $workorder->color_tinta}}
                                            </div> 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('tinta_especial', 'TINTA ESPECIAL :') }}
												{{ $workorder->tinta_especial }}
                                            </div> 
                                        </div>  
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('color_material', 'COLOR MATERIAL:') }}
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
												@elseif($workorder->copia1==2) Amarillo 
												@elseif($workorder->copia1==3) Rosado
												@elseif($workorder->copia1==4) Verde 
												@elseif($workorder->copia1==5) Azul 
												@elseif($workorder->copia1==6) Blanco
												@endif
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('copia2', 'COPIA2:') }}
                                               
												@if($workorder->copia2==1)
												@elseif($workorder->copia2==2) Amarillo 
												@elseif($workorder->copia2==3) Rosado
												@elseif($workorder->copia2==4) Verde 
												@elseif($workorder->copia2==5) Azul 
												@elseif($workorder->copia2==6) Blanco
												@endif
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('copia3', 'COPIA3:') }}
                                                
												@if($workorder->copia3==1)
												@elseif($workorder->copia3==2) Amarillo 
												@elseif($workorder->copia3==3) Rosado
												@elseif($workorder->copia3==4) Verde 
												@elseif($workorder->copia3==5) Azul 
												@elseif($workorder->copia3==6) Blanco
												@endif
                                            </div>                                                           
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('copia4', 'COPIA4:') }}
                                                
												@if($workorder->copia4==1)
												@elseif($workorder->copia4=2) Amarillo 
												@elseif($workorder->copia4==3) Rosado
												@elseif($workorder->copia4==4) Verde 
												@elseif($workorder->copia4==5) Azul 
												@elseif($workorder->copia4==6) Blanco
												@endif
                                            </div>                               
                                        </div>    
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>                                                            
                                                {{ Form::checkbox('original_copia',  $workorder->original_copia, $workorder->original_copia == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('original_copia', 'ORIGINAL Y COPIA') }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('original_todas',  $workorder->original_todas, $workorder->original_todas == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('original_todas', 'ORIGINAL TODAS') }}                                                           
                                            </div>
                                        </div>
                                        
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('tiro_retiro',  $workorder->tiro_retiro, $workorder->tiro_retiro == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('tiro_retiro', 'TIRO Y RETIRO') }}  
                                            </div>
											<br>
                                        </div> 
                                        <div class="col-xs-12">
											<hr>
                                            <div class='form-group form-register tex'>
                                                {{ Form::label('observacion_impresion', ' OBSERVACIÓN PRE IMPRESIÓN / IMPRESIÓN:') }}
                                                {{ Form::textarea('observacion_impresion', $workorder->observacion_impresion, array('rows' => '3', 'placeholder' => 'Detalles', 'class' => 'form-control','disabled')) }}
                                            </div>                                                
                                        </div>                                     
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
										</div>
										
                                    </div><!-- 
										<div class="button"align="center">
											{{ Form::button('Resetear', array('type' => 'reset', 'class' => 'btn btn-default btn-lg')) }} 
											{{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn  btn-success btn-lg')) }}                               
										</div>   -->                          
                                     	
                                </div>
								<div class="collapse" id="acabados"> 
                                    <div class="row"  align="justify">                                           
                                        <div class='form-group form-register' align="justify">
										<hr>
                                            <div class="col-xs-12">
                                               <hr><br><br>
                                                <h3><b>ACABADOS</b></h3><br><!--
                                                {{ Form::select('estado_trabajo', array('Estado Trabajo' => array('1' => 'Por realizar', '2' => 'Diseño', '3' => 'Impresion','4' => 'Acabados', '5' => 'Disponible','6' => 'Entregado')),null ,array('class' => 'form-control')); }}
                                                <br>-->
                                            </div>                                                       
                                        </div>                                                    
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('servicio_levante',  $workorder->servicio_levante, $workorder->servicio_levante == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('servicio_levante', 'LEVANTE') }}                                                            
                                            </div>
                                        </div>   
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('servicio_engrapado',  $workorder->servicio_engrapado, $workorder->servicio_engrapado == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('servicio_engrapado', 'ENGRAPADO') }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('servicio_laminado',  $workorder->servicio_laminado, $workorder->servicio_laminado == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('servicio_laminado', 'LAMINADO') }}

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
                                                {{ Form::checkbox('servicio_engomado',  $workorder->servicio_engomado, $workorder->servicio_engomado == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('servicio_engomado', 'ENGOMADO') }}

                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('servicio_corte',  $workorder->servicio_corte, $workorder->servicio_corte == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('servicio_corte', 'CORTE') }}
                                            </div>
                                        </div>                                                     
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('servicio_refile',  $workorder->servicio_refile, $workorder->servicio_refile == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('servicio_refile', 'REFILE') }}
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
                                                {{ Form::checkbox('servicio_perforado',  $workorder->servicio_perforado, $workorder->servicio_perforado == 1,['disabled' => 'disabled'])}}
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
                                                {{ Form::checkbox('servicio_grafado',  $workorder->servicio_grafado, $workorder->servicio_grafado == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('servicio_grafado', 'GRAFADO') }}
                                            </div>
                                        </div>                                           
                                        <div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('plastificadoreserva',  $workorder->plastificadoreserva, $workorder->plastificadoreserva == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('plastificadoreserva', 'PLAST.RESERVA') }}
                                             </div>
                                        </div> 
										<div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('empastado', $workorder->empastado, $workorder->empastado == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('empastado', 'EMPASTADO') }}                                                
                                            </div>
                                        </div>
										<div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('tapaclinto',  $workorder->tapaclinto, $workorder->tapaclinto == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('tapaclinto', 'TAPA CLINTÒN') }}                                               
                                            </div>
                                        </div> 
										<div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('tapanormal',  $workorder->tapanormal, $workorder->tapanormal == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('tapanormal', 'TAPA NORMAL') }}                                               
                                            </div>
                                        </div>
										<div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('hojassueltas', $workorder->hojassueltas, $workorder->hojassueltas == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('hojassueltas', 'HOJAS SUELTAS') }}  
											</div>
											<br>
                                        </div>

                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('servicio_otro', 'OTRO:') }}
                                                {{  $workorder->servicio_otro }}
                                            </div>
                                        </div> 
                                        <div class="col-xs-9">
                                            <div class='form-group form-register'>
                                                {{ Form::label('recomendaciones', 'RECOMENDACIONES:') }}
                                                {{  $workorder->recomendaciones }}
                                            </div>
                                        </div> 
                                        <div class="col-xs-12">
											<hr>
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
								</div>
									</div>
										<div class='row buttons '>   
											<div class="col-md-3">											
												{{ HTML::link('/workorder/'.$workorder->id.'/edit','Editar', array('class' => 'btn btn-default'), false)}} 
												{{ Form::model($workorder, array('url' => array('/worklist/'.$workorder->id), 'method' => 'DELETE', 'role' => 'form')) }}
											
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