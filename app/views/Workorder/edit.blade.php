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
			<a href="/workorderlist" class="list-group-item active text-center">
                <h5 class="list-group-item-heading glyphicon glyphicon-th-list"></h5><h5> Trabajos</h5>
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
                        <h3> Editar Trabajo</h3> 
                </div>
            </div>
            <!-- Default panel contents -->                                   
            <div class="col-xs-10 col-md-9 imp">
                <!-- <div class="col-xs-2 col-md-2 imp"> 
                     {{ Form::text('no_orden', null, array('placeholder' => 'No.', 'class' => 'form-control')) }}
                 </div>
                 {{ Form::text('customers_id', $customer->id, array('hidden' => 'true')) }} -->
            </div>
            <section class="tab wow fadeInLeft tam"> 
                <header class="panel-heading tab-bg-dark-navy-blue">
                    <ul class="nav nav-tabs nav-justified ">
                        <li class="active">
                            <a data-toggle="tab" href="#ordencompra">
                                <h5>ORDEN DE COMPRA</h5> 
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#ordenproducion">
                                <h5>ORDEN PRODUCION</h5>  
                            </a>
                        </li>
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content tasi-tab" >
                        <div id="ordencompra" class="tab-pane fade in active" height="100">                               
                            <article class="media">
                                 {{Form::open(array('url' => '/workorder/'.$workorder->id,'method' => 'PUT', 'role'=>'form')) }}
                                <div class="panel panel-default ">                                           
                                    <div class="row"  align="justify">
                                        <!-- <h2  align="center"> Orden de Compra  </h2> --> 
                                        <br><br>
										{{ Form::text('customer_id', $customer->id, array('hidden' => 'true')) }} 										
                                        <div class="col-xs-6">
                                            <div class='form-group form-register'>
                                                {{ Form::label('tipo_orden', ' TIPO DE ORDEN:') }}
												{{ Form::text('customers_id', $customer->id, array('hidden' => 'true')) }}
                                                {{ Form::select('tipo_orden', array('1' => 'Seleccionar', '2' => 'Servicio','3' => 'Producto'), $workorder->tipo_orden, array('class' => 'form-control')); }}
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class='form-group form-register' align="justify">
                                                {{ Form::label('no_orden', 'NO.ORDEN:') }}
                                                {{ Form::text('no_orden', $workorder->no_orden, array('placeholder' => 'No. Orden', 'class' => 'form-control')) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class='form-group form-register' align="justify">
                                                {{ Form::label('clase_trabajo', 'NOMBRE DEL TRABAJO:') }}
                                                {{ Form::text('clase_trabajo', $workorder->clase_trabajo, array('placeholder' => 'Clase Trabajo', 'class' => 'form-control')) }}
                                            </div> 
                                            <br>
                                        </div>                                            
                                        <div class="col-xs-6">
                                            <div class='form-group form-register'>
                                                {{ Form::label('fecha_entrega', 'FECHANENTREGA:') }}
												{{ Form::input('date', 'fecha_entrega', $workorder->fecha_entrega, ['class' => 'form-control', 'placeholder' => 'Date']) }}
											
										   </div>
                                            <br>
                                        </div> 
										<div class="col-xs-12">
											<h5><b>SERVICIOS</b></h5>
											<hr>
										</div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::checkbox('encuadernado',  $workorder->encuadernado, $workorder->encuadernado == 1)}}
                                                {{ Form::label('tipo_encuadernado', 'ANILLADO/ EMPASTE') }}                                                           
                                                {{ Form::select('tipo_encuadernado',array('1' => 'Seleccionar', '2' => 'Anillado Espiral ','3' => 'Anillado Plástico ','4' => 'Anillado Doble – O','5' => 'Anillado  Velobind','6' => 'Empastado  Sencillo','7' => 'Empastado Pasta Dura ','8' => 'Empastado Pasta Dura / Marcado ','9' => 'Otros'), $workorder->tipo_encuadernado ,array('class' => 'form-control')); }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::checkbox('sublimaciones', $workorder->sublimaciones, $workorder->sublimaciones == 1)}}
                                                {{ Form::label('tipo_sublimacion', ' SUBLIMACIÓN ') }}                                                            
                                                {{ Form::select('tipo_sublimacion',array('1' => 'Seleccionar', '2' => 'Mugs','3' => 'Platos','4' => 'Camisetas','5' => 'Gorras','6' => 'Botones','7' => 'Otros'), $workorder->tipo_sublimacion, array('class' => 'form-control')); }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::checkbox('sello',  $workorder->sello, $workorder->sello == 1)}}
                                                {{ Form::label('tipo_sello', ' SELLO') }}                                                            
                                                {{ Form::select('tipo_sello',array('1' => 'Seleccionar', '2' => 'Cyrel','3' => ' Sello Seco','4' => 'Sello Madera','4' => 'Sello Printer','4' => 'Sello de Bolsillo','5' => 'Otros'), $workorder->tipo_sello, array('class' => 'form-control')); }}
                                            </div>
                                            <br> 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::checkbox('gigantografia',  $workorder->gigantografia, $workorder->gigantografia == 1)}}
                                                {{ Form::label('tipo_gigantografia', ' GIGANTOGRAFÍA') }}
                                                {{ Form::select('tipo_gigantografia',array('1' => 'Seleccionar', '2' => 'Banner','3' => 'Vinilo Blanco','4' => 'Traslucido','5' => 'Microperforado','6' => 'Acrílico','7' => 'Otros'), $workorder->tipo_gigantografia, array('class' => 'form-control')); }}
                                            </div>
                                            <br>
                                        </div>
										<div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::checkbox('impresiones', $workorder->impresiones, $workorder->impresiones == 1)}}
                                                {{ Form::label('tipo_impresiones', 'IMPRESIÓN') }}
                                                {{ Form::select('tipo_impresiones',array('1' => 'Seleccionar', '2' => 'Numeradora','3' => 'Multilith Doble Carta','4' => ' Heidelberg CTP 52','5' => 'Impresiòn Digital','6' => 'Impresiòn Blanco y Negro','7' => 'Impresiòn Burbuja','8' => 'Otros'),$workorder->tipo_impresiones,array('class' => 'form-control')); }}
                                            </div>
											<div class='form-group'>
													{{ Form::text('servicio_otro', $workorder->servicio_otro, array('placeholder' => 'Otro Servicio', 'class' => 'form-control')) }}
												</div>	
                                           
                                        </div>
                                         <div class="col-xs-9">											
											<div class="col-xs-3">
												<div class='form-group'>												
													{{ Form::checkbox('servicio_numerado',$workorder->servicio_numerado, $workorder->servicio_numerado == 1)}}
													{{ Form::label('servicio_numerado', 'NUMERADO') }}                                                            
												</div>
												<div class='form-group'>
													{{ Form::checkbox('servicio_perforado',  $workorder->servicio_perforado, $workorder->servicio_perforado == 1)}}
													{{ Form::label('servicio_perforado', 'PERFORADO') }}                                                            
												</div>	
												<div class='form-group'>
													{{ Form::checkbox('servicio_repuje',  $workorder->servicio_repuje, $workorder->servicio_repuje  == 1)}}
													{{ Form::label('servicio_repuje', 'REPUJE') }}                                                            
												</div>
											</div>
											<div class="col-xs-3">
												<div class='form-group'>												
													{{ Form::checkbox('servicio_levante',  $workorder->servicio_levante, $workorder->servicio_levante == 1)}}
													{{ Form::label('servicio_levante', 'LEVANTE') }}                                                            
												</div>
												 <div class='form-group'>
													{{ Form::checkbox('servicio_engrapado',$workorder->servicio_engrapado, $workorder->servicio_engrapado == 1)}}
													{{ Form::label('servicio_engrapado', 'ENGRAPADO') }}                                                            
												</div>
												<div class='form-group'>
													{{ Form::checkbox('servicio_grafado',  $workorder->servicio_grafado, $workorder->servicio_grafado  == 1)}}
													{{ Form::label('servicio_grafado', 'GRAFADO') }}                                                            
												</div>
											</div>
											<div class="col-xs-3">
												<div class='form-group'>
													{{ Form::checkbox('servicio_laminado', $workorder->servicio_laminado, $workorder->servicio_laminado == 1)}}
													{{ Form::label('servicio_laminado', 'LAMINADO') }}                                                            
												</div>
												<div class='form-group'>												
													{{ Form::checkbox('servicio_engomado',  $workorder->servicio_engomado, $workorder->servicio_engomado == 1)}}
													{{ Form::label('servicio_engomado', 'ENGOMADO') }}                                                            
												</div>
																							
											</div>	
											<div class="col-xs-3">												
												<div class='form-group'>
													{{ Form::checkbox('servicio_corte',  $workorder->servicio_corte, $workorder->servicio_corte == 1)}}
													{{ Form::label('servicio_corte', 'CORTE') }}                                                            
												</div>
												<div class='form-group'>
													{{ Form::checkbox('servicio_refile',  $workorder->servicio_refile, $workorder->servicio_refile == 1)}}
													{{ Form::label('servicio_refile', 'REFILE') }}                                                            
												</div>
											</div>	
										 </div>										 									 
                                        <br>
                                        <div class="col-xs-12">
											<hr>
                                            <div class='form-group form-register tex'>
                                                {{ Form::label('detalles_trabajo', 'DETALLES DEL TRABAJO:') }}
                                                {{ Form::textarea('detalles_trabajo', $workorder->detalles_trabajo, array('rows' => '4', 'placeholder' => 'Detalles', 'class' => 'form-control')) }}
                                            </div>                                                    
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('valor_trabajo', 'VALOR:') }}
                                                {{ Form::text('valor_trabajo', $workorder->valor_trabajo, array('placeholder' => 'Valor Trabajo', 'class' => 'form-control', 'onchange' => 'checkIVAType();')) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('abono', 'ABONO:') }}
                                                {{ Form::text('abono', $workorder->abono, array('placeholder' => 'Abono', 'class' => 'form-control', 'onchange' => 'checkIVAType();')) }}
                                            </div>
                                        </div>                              
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('saldo', 'SALDO:') }}
                                                {{ Form::text('saldo', $workorder->saldo, array('placeholder' => 'Saldo', 'class' => 'form-control')) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('subtotal', 'SUB TOTAL:') }}
                                                {{ Form::text('subtotal', $workorder->subtotal, array('placeholder' => 'Sub total', 'class' => 'form-control')) }}
                                            </div>
                                            <br>
                                        </div>
										 <div class="col-xs-3"> 
                                            
												<div class='form-group'style=" float:left">
													{{ Form::radio('iva', '0', true, ['hidden' => 'true']) }}
													<br>
													{{ Form::label('iva', 'MAS IVA') }}
													{{ Form::radio('iva', '1', $workorder->iva ==1, array('onclick' => 'checkIVAType();')) }}
													<br>
													{{ Form::label('iva', 'CON IVA') }}
													{{ Form::radio('iva', '2', $workorder->iva, array('onclick' => 'checkIVAType();')) }}
													<br>
												</div> <br>
												<div id="valor_iva" style="hidden:true; float:left"></div>		
												<div id="valor_iva" style="hidden:true; float:left; margin-top:28px"></div>	
										</div>
										
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_factura', 'FACTURA:') }}
                                                {{ Form::text('no_factura', $workorder->no_factura, array('placeholder' => 'No.Factura', 'class' => 'form-control')) }}
                                            </div>
                                        </div>
										<div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('total', 'TOTAL:') }}
                                                {{ Form::text('total', $workorder->total, array('placeholder' => 'Total', 'class' => 'form-control')) }}
                                            </div>
                                        </div>  
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('vendedor', 'VENDEDOR:') }}
                                                {{ Form::text('vendedor', $workorder->vendedor, array('placeholder' => 'Vendedor', 'class' => 'form-control')) }}
                                            </div>
                                        </div>                                        
                                    </div>
									<br>
									 <center>
										{{ Form::button('Resetear', array('type' => 'reset', 'class' => 'btn btn-default btn-lg')) }} 
										{{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn  btn-success btn-lg')) }}                               
                                     <center>
                                    <br><br>
                                </div>                                
                            </article> 
                        </div>                                                       
                        <div id="ordenproducion"  class="tab-pane fade">                              
                            <div class="panel panel-default ">                                           
                                <div class="row"  align="justify">                                        
                                    <!--  <h2  align="center">Orden de Producción</h2> --> 
                                    <br>
                                    <div class="col-xs-6">
                                     <h3><b>ESTADO DEL TRABAJO<b></h3>
                                    </div>
									{{ Form::text('customers_id', $customer->id, array('hidden' => 'true')) }} 									
                                    <div class="col-xs-6">
										{{ Form::select('estado_trabajo', array('Estado Trabajo' => array('1' => 'Por realizar', '2' => 'Estado Diseño', '3' => 'Estado Revisión','4' => 'Enviado para impresión ','5' => 'Estado Impresion', '6' => 'Estado Acabados','7' => 'Listo','8' => 'Entregado')), $workorder->estado_trabajo,array('class' => 'form-control')); }}
                                    <br><br><br>
                                    </div>
									   
                                    <div class="col-xs-12">
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
                                            {{ Form::text('diseñador', $workorder->diseñador, array('placeholder' => 'Diseñador', 'class' => 'form-control')) }}
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            {{ Form::label('tipo_realizado', 'TRABAJO A REALIZAR:') }}
                                            {{ Form::select('tipo_realizado', array( '1' => 'Seleccionar ','2' => 'Diseño Nuevo','3' => 'Corrección','4' => 'Quema de Master','5' => 'Diseño según Muestra','6' => 'Identidad Corporativa'), $workorder->tipo_realizado ,array('class' => 'form-control')); }}
                                        </div>
                                    </div>  
                                    <br>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            {{ Form::label('tipo_impresion', ' TIPO DE  IMPRESIÓN:') }}
                                            {{ Form::select('tipo_impresion',array('1' => 'Seleccionar', '2' => 'Digital', '3' => 'Litográfica','4' => 'Gigantografia' ,'5' => 'Sello'), $workorder->tipo_impresion,array('class' => 'form-control')); }}
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class='form-group form-register'>
                                            {{ Form::checkbox('plancha',  $workorder->plancha, $workorder->plancha == 1)}}
                                            {{ Form::label('tipo_plancha', 'PLANCHA') }}                                                        
                                            {{ Form::select('tipo_plancha',array('1' => 'Seleccionar', '2' => 'Ctp 52', '3' => 'M.Doble Carta'), $workorder->tipo_plancha,array('class' => 'form-control')); }}
                                        </div>                                                  
                                    </div>
                                    <div class="col-xs-3">
                                        <div class='form-group form-register'>
                                            {{ Form::checkbox('master',  $workorder->master, $workorder->master == 1)}}
                                            {{ Form::label('tipo_master', 'MASTER') }}                                                        
                                            {{ Form::select('tipo_master',array('1' => 'Seleccionar', '2' => 'Medio Master', '3' => 'Master Entero'), $workorder->tipo_master, array('class' => 'form-control')); }}
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
                                                {{ Form::text('no_dian', $workorder->no_dian, array('placeholder' => 'NO.Dian', 'class' => 'form-control')) }}
                                            </div> 
                                        </div> 
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('fecha_dian', 'FECHA:') }}
                                                {{ Form::text('fecha_dian', $workorder->fecha_dian, array('placeholder' =>'Fecha Dian', 'class' => 'form-control')) }}
                                            </div> 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('habilitado_dian', 'HAB:') }}
                                                {{ Form::text('habilitado_dian', $workorder->habilitado_dian, array('placeholder' => 'Hab.Dian', 'class' => 'form-control')) }}
                                            </div>
                                            <br>
                                        </div>  
                                        <div class="col-xs-12">
                                            <div class='form-group form-register tex'>
                                                {{ Form::label('observacion_diseño', ' OBSERVACIÓN DISEÑO:') }}
                                                {{ Form::textarea('observacion_diseño', $workorder->observacion_diseño, array('rows' => '3', 'placeholder' => 'Detalles', 'class' => 'form-control')) }}
                                            </div>                                                
                                        </div>
                                        <br><br>                                                     
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('fecha_reporte_diseño', 'FECHA DE REPORTE:') }}                                                
												{{ Form::input('date', 'fecha_reporte_diseño', $workorder->fecha_reporte_diseño, ['class' => 'form-control', 'placeholder' => 'Date']) }}
											</div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('revisado_diseño', 'REVISADO:') }}
                                                {{ Form::text('revisado_diseño', $workorder->revisado_diseño, array('placeholder' => 'Correcciones', 'class' => 'form-control')) }}
                                            </div>                                                
                                        </div>
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('autorizado_diseño', 'AUTORIZADO:') }}
                                                {{ Form::text('autorizado_diseño', $workorder->autorizado_diseño, array('placeholder' => 'Jefe Producción', 'class' => 'form-control')) }}
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
                                                {{ Form::text('maquina', $workorder->maquina, array('placeholder' => 'Máquina', 'class' => 'form-control')) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class='form-group form-register'>
                                                {{ Form::label('clase_material', 'CLASE DE MATERIAL:') }}
                                                {{ Form::text('clase_material', $workorder->clase_material, array('placeholder' => 'Material', 'class' => 'form-control')) }}
                                            </div>
                                        </div>  
                                        <br>                                                    
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('cantidad_trabajo', 'CANT:') }}
                                                {{ Form::text('cantidad_trabajo', $workorder->cantidad_trabajo, array('placeholder' => 'Trabajo', 'class' => 'form-control')) }}
                                            </div>                                                   
                                        </div> 
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('tamano', 'TAMAÑO:') }}
                                                {{ Form::text('tamano', $workorder->tamano, array('placeholder' => 'Trabajo', 'class' => 'form-control')) }}
                                            </div>                                                  
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('cantidad_material', 'CANT:') }}
                                                {{ Form::text('cantidad_material', $workorder->cantidad_material, array('placeholder' => 'Material', 'class' => 'form-control')) }}
                                            </div>                                                 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('corte_material', 'CORTE:') }}
                                                {{ Form::text('corte_material', $workorder->corte_material, array('placeholder' => 'Material', 'class' => 'form-control')) }}
                                            </div>                                                  
                                        </div>                                                   
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('emblocado', 'EMBLOCADO:') }}
                                                {{ Form::text('emblocado', $workorder->emblocado, array('placeholder' => 'Emblocado', 'class' => 'form-control')) }}
                                            </div>                                                  
                                        </div> 
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_inicial', 'No. INICIAL:') }}
                                                {{ Form::text('no_inicial', $workorder->no_inicial, array('placeholder' => 'Inicial', 'class' => 'form-control')) }}
                                            </div>                                                
                                        </div> 
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_final', 'No. FINAL:') }}
                                                {{ Form::text('no_final', $workorder->no_final, array('placeholder' => 'Final', 'class' => 'form-control')) }}
                                            </div>                                                
                                        </div> 
										<div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_tintas', 'No. TINTAS:') }}
                                                {{ Form::select('no_tintas', array('No.Tintas' => array('1' => 'Seleccionar','2' => 'una tinta', '3' => 'dos tintas ', '4' => 'tres tintas', '5' => 'policromía ')), $workorder->no_tintas, array('class' => 'form-control')); }}
                                            </div> 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('color_tinta', 'COLOR TINTAS:') }}
                                                {{ Form::text('color_tinta', null, array('placeholder' => 'Color1, Color2, Color3 ...', 'class' => 'form-control')) }}
                                            </div> 
                                        </div>
                                        
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('tinta_especial', 'TINTA ESPECIAL:') }}
                                                {{ Form::text('tinta_especial', $workorder->tinta_especial, array('placeholder' => 'Especial', 'class' => 'form-control')) }}
                                            </div> 
                                        </div>  
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('color_material', 'COLOR:') }}
                                                {{ Form::text('color_material', $workorder->color_material, array('placeholder' => 'Material', 'class' => 'form-control')) }}
                                            </div> 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_copia', 'NO. COPIAS:') }}
                                                {{ Form::text('no_copia', $workorder->no_copia, array('placeholder' => 'Copias', 'class' => 'form-control')) }}
                                            </div> 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>                                   
                                                {{ Form::label('copia1', 'COPIA1:') }}
                                                {{ Form::select('copia1', array('Copia 1' => array('1' => 'Color ', '2' => 'Amarillo ', '3' => 'Rosado', '4' => 'Verde','5' => 'Azul','6' => 'Blanco')), $workorder->copia1, array('class' => 'form-control')); }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('copia2', 'COPIA2:') }}
                                                {{ Form::select('copia2', array('COPIA 2' => array('1' => 'Color ', '2' => 'Amarillo ', '3' => 'Rosado', '4' => 'Verde','5' => 'Azul','6' => 'Blanco')), $workorder->copia2, array('class' => 'form-control')); }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('copia3', 'COPIA3:') }}
                                                {{ Form::select('copia3', array('COPIA 3' => array('1' => 'Color ', '2' => 'Amarillo ', '3' => 'Rosado', '4' => 'Verde','5' => 'Azul','6' => 'Blanco')), $workorder->copia3, array('class' => 'form-control')); }}
                                            </div>                                                           
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('copia4', 'COPIA4:') }}
                                                {{ Form::select('copia4', array('COPIA 4' => array('1' => 'Color ', '2' => 'Amarillo ', '3' => 'Rosado', '4' => 'Verde','5' => 'Azul','6' => 'Blanco')), $workorder->copia4, array('class' => 'form-control')); }}
                                            </div>                               
                                        </div>    
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('numerado',  $workorder->numerado, $workorder->numerado == 1)}}
                                                {{ Form::label('numerado', 'CANT. NUMERADORAS') }} 
                                                {{ Form::select('numeradoras', array('1' => 'Cat.Numeradoras ', '2 ' => '1 Numeradora', '3' => '2 Numeradoras', '4' => '3 Numeradoras','5' => '4 Numeradoras'), $workorder->numeradoras,array('class' => 'form-control')); }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <br><br>
                                            <div class='form-group'>
                                                {{ Form::checkbox('original_todas',  $workorder->original_todas, $workorder->original_todas == 1)}}
                                                {{ Form::label('original_todas', 'ORIGINAL TODAS') }}                                                           
                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <br><br>
                                            <div class='form-group'>                                                            
                                                {{ Form::checkbox('original_copia',  $workorder->original_copia, $workorder->original_copia == 1)}}
                                                {{ Form::label('original_copia', 'ORIGINAL Y COPIA') }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <br><br>
                                            <div class='form-group'>
                                                {{ Form::checkbox('tiro_retiro',  $workorder->tiro_retiro, $workorder->tiro_retiro == 1)}}
                                                {{ Form::label('tiro_retiro', 'TIRO Y RETIRO') }}  
                                                <br><br>
                                            </div>
                                        </div> 
                                        <div class="col-xs-12">
                                            <div class='form-group form-register tex'>
                                                {{ Form::label('observacion_impresion', ' OBSERVACIÓN PRE IMPRESIÓN / IMPRESIÓN:') }}
                                                {{ Form::textarea('observacion_impresion', $workorder->observacion_impresion, array('rows' => '3', 'placeholder' => 'Detalles', 'class' => 'form-control')) }}
                                            </div>                                                
                                        </div>
                                        <br><br>                                        
                                    </div>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            {{ Form::label('fecha_reporte_impresion', 'FECHA DE REPORTE:') }}
											{{ Form::input('date', 'fecha_reporte_impresion', $workorder->fecha_reporte_impresion, ['class' => 'form-control', 'placeholder' => 'Date']) }}											
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            {{ Form::label('autorizado_impresion', 'AUTORIZADO:') }}
                                            {{ Form::text('autorizado_impresion', $workorder->autorizado_impresion, array('placeholder' => 'Jefe Producción', 'class' => 'form-control')) }}
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
                                                {{ Form::checkbox('levante',  $workorder->levante, $workorder->levante == 1)}}
                                                {{ Form::label('levante', 'LEVANTE') }}                                                            
                                            </div>
                                        </div>   
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('engrapado',  $workorder->engrapado, $workorder->engrapado == 1)}}
                                                {{ Form::label('engrapado', 'ENGRAPADO') }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('laminado',  $workorder->laminado, $workorder->laminado == 1)}}
                                                {{ Form::label('laminado', 'LAMINADO') }}

                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('plastificadouv',  $workorder->plastificadouv, $workorder->plastificadouv == 1)}}
                                                {{ Form::label('plastificadouv', 'PLAST.UV') }}                                                            
                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('engomado',  $workorder->engomado, $workorder->engomado == 1)}}
                                                {{ Form::label('engomado', 'ENGOMADO') }}

                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('corte',  $workorder->corte_refile, $workorder->corte == 1)}}
                                                {{ Form::label('corte', 'CORTE') }}

                                            </div>
                                        </div>                                                     
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('refile',  $workorder->refile, $workorder->refile == 1)}}
                                                {{ Form::label('refile', 'REFILE') }}

                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('plastificadomate',  $workorder->plastificadomate, $workorder->plastificadomate == 1)}}
                                                {{ Form::label('plastificadomate', 'PLAST. MATE') }}

                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('perforado',  $workorder->perforado, $workorder->perforado == 1)}}
                                                {{ Form::label('perforado', 'PERFORADO') }}

                                            </div>
                                        </div>                                                    
                                        <div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('argollado',  $workorder->argollado, $workorder->argollado == 1)}}
                                                {{ Form::label('argollado', 'ARGOLLADO') }}

                                            </div>
                                        </div>  
                                        <div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('servicio_grafado',  $workorder->servicio_grafado, $workorder->servicio_grafado == 1)}}
                                                {{ Form::label('servicio_grafado', 'GRAFADO') }}

                                            </div>
                                        </div>                                           
                                        <div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('plastificadoreserva',  $workorder->plastificadoreserva, $workorder->plastificadoreserva == 1)}}
                                                {{ Form::label('plastificadoreserva', 'PLAST.RESERVA') }}
                                                <br><br>
                                            </div>
                                        </div> 
										<div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('empastado', $workorder->empastado, $workorder->empastado == 1)}}
                                                {{ Form::label('empastado', 'EMPASTADO') }}                                                
                                            </div>
                                        </div>
										<div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('tapaclinto',  $workorder->tapaclinto, $workorder->tapaclinto == 1)}}
                                                {{ Form::label('tapaclinto', 'TAPA CLINTÒN') }}                                               
                                            </div>
                                        </div> 
										<div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('tapanormal',  $workorder->tapanormal, $workorder->tapanormal == 1)}}
                                                {{ Form::label('tapanormal', 'TAPA NORMAL') }}                                               
                                            </div>
                                        </div>
										<div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('hojassueltas', $workorder->hojassueltas, $workorder->hojassueltas == 1)}}
                                                {{ Form::label('hojassueltas', 'HOJAS SUELTAS') }}  
												<br>
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
                                                {{ Form::textarea('observacion_acabados', $workorder->observacion_acabados, array('rows' => '3', 'placeholder' => 'Detalles', 'class' => 'form-control')) }}
                                            </div>                                                
                                        </div>
                                        <br><br>                                        
                                    </div>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            {{ Form::label('fecha_reporte_acabados', 'FECHA DE REPORTE:') }}
											{{ Form::input('date', 'fecha_reporte_acabados', $workorder->fecha_reporte_acabados, ['class' => 'form-control', 'placeholder' => 'Date']) }}											
                                         <!---->
										</div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            {{ Form::label('autorizado_acabados', 'AUTORIZADO:') }}
                                            {{ Form::text('autorizado_acabados', $workorder->autorizado_acabados, array('placeholder' => 'Jefe Producción', 'class' => 'form-control')) }}
                                        </div>
										<br><br>
                                    </div>
									<div class="button"align="center">
										{{ Form::button('Reset', array('type' => 'reset', 'class' => 'btn btn-default btn-lg')) }} 
										{{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn  btn-success btn-lg')) }}                               
                                    </div>
										<br><br>									
                                </div>

                            </div> 
                            
                        </div>
                        {{ Form::close() }}

                    </div>
                </div>                       
            </section>
        </div>
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