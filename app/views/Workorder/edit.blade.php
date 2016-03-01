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
                <h4 class="glyphicon glyphicon-plus"></h4><br/>Nuevo Trabajo 
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
        <div class="bhoechie-tab-content active tam">
            <!--
                <h2 class="glyphicon glyphicon-user color" ></h2>
                <h3> Nuevo Contacto</h3>  -->  

            <!-- Default panel contents -->
            <div class="panel panel-default">
                <div class="panel-heading row panel  tam " align="center"> <h3 class="list-group-item-heading color">
                        <h2 class="glyphicon glyphicon-plus color" ></h2>
                        <h3> Nuevo Trabajo</h3> 
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
                                <h4>ORDEN DE COMPRA</h4> 
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#ordenproducion">
                                <h4>ORDEN PRODUCION</h4>  
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
										{{ Form::text('customers_id', $customer->id, array('hidden' => 'true')) }} 
                                        <div class="col-xs-6">
                                            <div class='form-group form-register'>
                                                {{ Form::label('tipo_orden', ' TIPO DE ORDEN:') }}
												{{ Form::text('customers_id', $customer->id, array('hidden' => 'true')) }}
                                                {{ Form::select('tipo_orden',array('1' => 'Seleccionar', '2' => 'Servicio','3' => 'Producto'),null ,array('class' => 'form-control')); }}
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class='form-group form-register' align="justify">
                                                {{ Form::label('no_orden', 'NO.ORDEN:') }}
                                                {{ Form::text('no_orden', null, array('placeholder' => 'No. Orden', 'class' => 'form-control')) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class='form-group form-register' align="justify">
                                                {{ Form::label('clase_trabajo', 'NOMBRE DEL TRABAJO:') }}
                                                {{ Form::text('clase_trabajo', null, array('placeholder' => 'Clase Trabajo', 'class' => 'form-control')) }}
                                            </div> 
                                            <br>
                                        </div>                                            
                                        <div class="col-xs-6">
                                            <div class='form-group form-register'>
                                                {{ Form::label('fecha_entrega', 'FECHANENTREGA:') }}
                                                <input type='date' id='fecha_entrega' name='fecha_entrega' class='form-control'/>
                                            </div>
                                            <br>
                                        </div> 
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::checkbox('servicio',  1, false)}}
                                                {{ Form::label('tipo_servicio', ' SERVICIO') }}                                                           
                                                {{ Form::select('tipo_servicio',array('1' => 'Seleccionar', '2' => 'Numerado','3' => 'Perforado','4' => 'Argollado','5' => 'Egrapado','6' => 'Levante','7' => 'Grafado','8' => 'Laminado'),null ,array('class' => 'form-control')); }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::checkbox('sublimaciones',  1, false)}}
                                                {{ Form::label('tipo_sublimacion', ' SUBLIMACIÓN ') }}                                                            
                                                {{ Form::select('tipo_sublimacion',array('1' => 'Seleccionar', '2' => 'Mugs','3' => 'Plato','4' => 'Camiseta','5' => 'Gorra'),null ,array('class' => 'form-control')); }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::checkbox('sello',  1, false)}}
                                                {{ Form::label('tipo_sello', ' SELLO') }}                                                            
                                                {{ Form::select('tipo_sello',array('1' => 'Seleccionar', '2' => 'Cyrel','3' => ' Sello Seco','4' => 'Sello Madera','4' => 'Sello Printer','4' => 'Sello de Bolsillo'),null ,array('class' => 'form-control')); }}
                                            </div>
                                            <br> 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::checkbox('gigantografia',  1, false)}}
                                                {{ Form::label('tipo_gigantografia', ' GIGANTOGRAFÍA') }}
                                                {{ Form::select('tipo_gigantografia',array('1' => 'Seleccionar', '2' => 'Banner','3' => 'Vinilo Blanco','4' => 'Traslucido','5' => 'Microperforado','6' => 'Acrílico'),null ,array('class' => 'form-control')); }}
                                            </div>
                                            <br>
                                        </div>
                                        <br>
                                        <div class="col-xs-12">
                                            <div class='form-group form-register tex'>

                                                {{ Form::label('detalles_trabajo', 'DETALLES DEL TRABAJO:') }}
                                                {{ Form::textarea('detalles_trabajo', null, array('rows' => '4', 'placeholder' => 'Detalles', 'class' => 'form-control')) }}
                                            </div>                                                    
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('valor_trabajo', 'VALOR:') }}
                                                {{ Form::text('valor_trabajo', null, array('placeholder' => 'Valor Trabajo', 'class' => 'form-control')) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('abono', 'ABONO:') }}
                                                {{ Form::text('abono', null, array('placeholder' => 'Abono', 'class' => 'form-control')) }}
                                            </div>
                                        </div>                              
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('saldo', 'SALDO:') }}
                                                {{ Form::text('saldo', null, array('placeholder' => 'Saldo', 'class' => 'form-control')) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('pago', 'PAGO:') }}
                                                {{ Form::text('pago', null, array('placeholder' => 'Pago', 'class' => 'form-control')) }}
                                            </div>
                                            <br>
                                        </div> 
                                        <div class="col-xs-3"> 
                                            <br>
                                            <div class='form-group'>
                                                {{ Form::checkbox('iva',  1, false)}}
                                                {{ Form::label('iva', 'PAGO IVA') }}                                                            
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_factura', 'FACTURA:') }}
                                                {{ Form::text('no_factura', null, array('placeholder' => 'No.Factura', 'class' => 'form-control')) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class='form-group form-register'>
                                                {{ Form::label('vendedor', 'VENDEDOR:') }}
                                                {{ Form::text('vendedor', null, array('placeholder' => 'Vendedor', 'class' => 'form-control')) }}
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
                                <center>                                    
                               {{ Form::close() }}
                                </center>
                            </article> 
                        </div>                                                       
                        <div id="ordenproducion"  class="tab-pane fade"> 
                             {{Form::open(array('url' => '/workorder/'.$workorder->id,'method' => 'PUT', 'role'=>'form')) }} 
                            <div class="panel panel-default ">                                           
                                <div class="row"  align="justify">                                        
                                    <!--  <h2  align="center">Orden de Producción</h2> --> 
                                    <br>
                                    <div class="col-xs-6" align="right">
                                     <h3><b>ESTADO DEL TRABAJO<b></h3>
                                    </div>
                                    <div class="col-xs-6">

                                         {{ Form::select('estado_trabajo', array('Estado Trabajo' => array('1' => 'Por realizar', '2' => 'Diseño', '3' => 'Impresion','4' => 'Acabados', '5' => 'Disponible','6' => 'Entregado')),null ,array('class' => 'form-control')); }}
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
                                            {{ Form::text('diseñador', null, array('placeholder' => 'Diseñador', 'class' => 'form-control')) }}
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            {{ Form::label('tipo_realizado', 'TRABAJO A REALIZAR:') }}
                                            {{ Form::select('tipo_realizado', array( '1' => 'Seleccionar ','2' => 'Diseño Nuevo','3' => 'Corrección','4' => 'Quema de Master','5' => 'Diseño según Muestra','6' => 'Identidad Corporativa'),null ,array('class' => 'form-control')); }}
                                        </div>
                                    </div>  
                                    <br>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            {{ Form::label('tipo_impresion', ' TIPO DE  IMPRESIÓN:') }}
                                            {{ Form::select('tipo_impresion',array('1' => 'Seleccionar', '2' => 'Digital', '3' => 'Litográfica','4' => 'Gigantografia' ,'5' => 'Sello','6' => 'Plancha / Mater'),null ,array('class' => 'form-control')); }}
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class='form-group form-register'>
                                            {{ Form::checkbox('plancha',  1, false)}}
                                            {{ Form::label('tipo_plancha', 'PLANCHA') }}                                                        
                                            {{ Form::select('tipo_plancha',array('1' => 'Seleccionar', '2' => 'Ctp 52', '3' => 'M.Doble Carta'),null ,array('class' => 'form-control')); }}
                                        </div>                                                  
                                    </div>
                                    <div class="col-xs-3">
                                        <div class='form-group form-register'>
                                            {{ Form::checkbox('master',  1, false)}}
                                            {{ Form::label('tipo_master', 'MASTER') }}                                                        
                                            {{ Form::select('tipo_master',array('1' => 'Seleccionar', '2' => 'Medio Master', '3' => 'Master Entero'),null ,array('class' => 'form-control')); }}
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
                                                {{ Form::text('no_dian', null, array('placeholder' => 'NO.Dian', 'class' => 'form-control')) }}
                                            </div> 
                                        </div> 
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('fecha_dian', 'FECHA:') }}
                                                {{ Form::text('fecha_dian', null, array('placeholder' =>'Fecha Dian', 'class' => 'form-control')) }}
                                            </div> 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('habilitado_dian', 'HAB:') }}
                                                {{ Form::text('habilitado_dian', null, array('placeholder' => 'Hab.Dian', 'class' => 'form-control')) }}
                                            </div>
                                            <br>
                                        </div>  
                                        <div class="col-xs-12">
                                            <div class='form-group form-register tex'>
                                                {{ Form::label('observacion_diseño', ' OBSERVACIÓN DISEÑO:') }}
                                                {{ Form::textarea('observacion_diseño', null, array('rows' => '3', 'placeholder' => 'Detalles', 'class' => 'form-control')) }}
                                            </div>                                                
                                        </div>
                                        <br><br>                                                     
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('fecha_reporte_diseño', 'FECHA DE REPORTE:') }}
                                                <input type='date' id='fecha_reporte_diseño' name='fecha_reporte_diseño' class='form-control'/>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('revisado_diseño', 'REVISADO:') }}
                                                {{ Form::text('revisado_diseño', null, array('placeholder' => 'Correcciones', 'class' => 'form-control')) }}
                                            </div>                                                
                                        </div>
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('autorizado_diseño', 'AUTORIZADO:') }}
                                                {{ Form::text('autorizado_diseño', null, array('placeholder' => 'Jefe Producción', 'class' => 'form-control')) }}
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
                                                {{ Form::text('maquina', null, array('placeholder' => 'Máquina', 'class' => 'form-control')) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class='form-group form-register'>
                                                {{ Form::label('clase_material', 'CLASE DE MATERIAL:') }}
                                                {{ Form::text('clase_material', null, array('placeholder' => 'Material', 'class' => 'form-control')) }}
                                            </div>
                                        </div>  
                                        <br>                                                    
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('cantidad_trabajo', 'CANT:') }}
                                                {{ Form::text('cantidad_trabajo', null, array('placeholder' => 'Trabajo', 'class' => 'form-control')) }}
                                            </div>                                                   
                                        </div> 
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('tamano', 'TAMAÑO:') }}
                                                {{ Form::text('tamano', null, array('placeholder' => 'Trabajo', 'class' => 'form-control')) }}
                                            </div>                                                  
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('cantidad_material', 'CANT:') }}
                                                {{ Form::text('cantidad_material', null, array('placeholder' => 'Material', 'class' => 'form-control')) }}
                                            </div>                                                 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('corte', 'MONTAJE:') }}
                                                {{ Form::text('corte', null, array('placeholder' => 'Trabajo', 'class' => 'form-control')) }}
                                            </div>                                                  
                                        </div>                                                   
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('emblocado', 'EMBLOCADO:') }}
                                                {{ Form::text('emblocado', null, array('placeholder' => 'Emblocado', 'class' => 'form-control')) }}
                                            </div>                                                  
                                        </div> 
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_inicial', 'No. INICIAL:') }}
                                                {{ Form::text('no_inicial', null, array('placeholder' => 'Inicial', 'class' => 'form-control')) }}
                                            </div>                                                
                                        </div> 
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_final', 'No. FINAL:') }}
                                                {{ Form::text('no_final', null, array('placeholder' => 'Final', 'class' => 'form-control')) }}
                                            </div>                                                
                                        </div> 
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('color_tinta', 'COLOR:') }}
                                                {{ Form::text('color_tinta', null, array('placeholder' => 'Tinta', 'class' => 'form-control')) }}
                                            </div> 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_tintas', 'No. TINTA:') }}
                                                {{ Form::select('no_tintas', array('No.Tintas' => array('1' => 'Seleccionar','2' => 'una tinta', '3' => 'dos tintas ', '4' => 'tres tintas', '5' => 'policromía ')),null ,array('class' => 'form-control')); }}
                                            </div> 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('tinta_especial', 'TINTA :') }}
                                                {{ Form::text('tinta_especial', null, array('placeholder' => 'Especial', 'class' => 'form-control')) }}
                                            </div> 
                                        </div>  
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('color_material', 'COLOR:') }}
                                                {{ Form::text('color_material', null, array('placeholder' => 'Material', 'class' => 'form-control')) }}
                                            </div> 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_copia', 'NO. COPIAS:') }}
                                                {{ Form::text('no_copia', null, array('placeholder' => 'Copias', 'class' => 'form-control')) }}
                                            </div> 
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>                                   
                                                {{ Form::label('copia1', 'COPIA1:') }}
                                                {{ Form::select('copia1', array('Copia 1' => array('1' => 'Color ', '2' => 'Amarillo ', '3' => 'Rosado', '4' => 'Verde','5' => 'Azul','6' => 'Blanco')),null ,array('class' => 'form-control')); }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('copia2', 'COPIA2:') }}
                                                {{ Form::select('copia2', array('COPIA 2' => array('1' => 'Color ', '2' => 'Amarillo ', '3' => 'Rosado', '4' => 'Verde','5' => 'Azul','6' => 'Blanco')),null ,array('class' => 'form-control')); }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('copia3', 'COPIA3:') }}
                                                {{ Form::select('copia3', array('COPIA 3' => array('1' => 'Color ', '2' => 'Amarillo ', '3' => 'Rosado', '4' => 'Verde','5' => 'Azul','6' => 'Blanco')),null ,array('class' => 'form-control')); }}
                                            </div>                                                           
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('copia4', 'COPIA4:') }}
                                                {{ Form::select('copia4', array('COPIA 4' => array('1' => 'Color ', '2' => 'Amarillo ', '3' => 'Rosado', '4' => 'Verde','5' => 'Azul','6' => 'Blanco')),null ,array('class' => 'form-control')); }}
                                            </div>                               
                                        </div>    
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('numerado',  1, false)}}
                                                {{ Form::label('numerado', 'NUMERADO') }} 
                                                {{ Form::select('numeradoras', array('1' => 'Cat.Numeradoras ', '2 ' => '1 Numeradora', '3' => '2 Numeradoras', '4' => '3 Numeradoras','5' => '4 Numeradoras'),null ,array('class' => 'form-control')); }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <br><br>
                                            <div class='form-group'>
                                                {{ Form::checkbox('original_todas',  1, false)}}
                                                {{ Form::label('original_todas', 'ORIGINAL TODAS') }}                                                           
                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <br><br>
                                            <div class='form-group'>                                                            
                                                {{ Form::checkbox('original_copia',  1, false)}}
                                                {{ Form::label('original_copia', 'ORIGINAL Y COPIA') }}
                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <br><br>
                                            <div class='form-group'>
                                                {{ Form::checkbox('tiro_retiro',  1, false)}}
                                                {{ Form::label('tiro_retiro', 'TIRO Y RETIRO') }}  
                                                <br><br>
                                            </div>
                                        </div> 
                                        <div class="col-xs-12">
                                            <div class='form-group form-register tex'>
                                                {{ Form::label('observacion_impresion', ' OBSERVACIÓN PRE IMPRESIÓN / IMPRESIÓN:') }}
                                                {{ Form::textarea('observacion_impresion', null, array('rows' => '3', 'placeholder' => 'Detalles', 'class' => 'form-control')) }}
                                            </div>                                                
                                        </div>
                                        <br><br>                                        
                                    </div>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            {{ Form::label('fecha_reporte_impresion', 'FECHA DE REPORTE:') }}
                                            <input type='date' id='fecha_reporte_impresion' name='fecha_reporte_impresion' class='form-control'/>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            {{ Form::label('autorizado_impresion', 'AUTORIZADO:') }}
                                            {{ Form::text('autorizado_impresion', null, array('placeholder' => 'Jefe Producción', 'class' => 'form-control')) }}
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
                                                {{ Form::checkbox('levante',  1, false)}}
                                                {{ Form::label('levante', 'LEVANTE') }}                                                            
                                            </div>
                                        </div>   
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('engrapado',  1, false)}}
                                                {{ Form::label('engrapado', 'ENGRAPADO') }}

                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('laminado',  1, false)}}
                                                {{ Form::label('laminado', 'LAMINADO') }}

                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('plastificadouv',  1, false)}}
                                                {{ Form::label('plastificadouv', 'PLAST.UV') }}                                                            
                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('engomado',  1, false)}}
                                                {{ Form::label('engomado', 'ENGOMADO') }}

                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('corte_refile',  1, false)}}
                                                {{ Form::label('corte_refile', 'CORTE/REFILE') }}

                                            </div>
                                        </div>                                                     
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('estampado',  1, false)}}
                                                {{ Form::label('estampado', 'ESTAMPADO') }}

                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('plastificadomate',  1, false)}}
                                                {{ Form::label('plastificadomate', 'PLAST. MATE') }}

                                            </div>
                                        </div>
                                        <div class="col-xs-3"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('perforado',  1, false)}}
                                                {{ Form::label('perforado', 'PERFORADO') }}

                                            </div>
                                        </div>                                                    
                                        <div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('argollado',  1, false)}}
                                                {{ Form::label('argollado', 'ARGOLLADO') }}

                                            </div>
                                        </div>  
                                        <div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('sublimacion',  1, false)}}
                                                {{ Form::label('sublimacion', 'SUBLIMACIÓN') }}

                                            </div>
                                        </div>                                           
                                        <div class="col-xs-3">
                                            <div class='form-group'>
                                                {{ Form::checkbox('plastificadoreserva',  1, false)}}
                                                {{ Form::label('plastificadoreserva', 'PLAST.RESERVA') }}
                                                <br><br>
                                            </div>
                                        </div> 

                                        <div class="col-xs-3">
                                            <div class='form-group form-register'>
                                                {{ Form::label('otro_acabados', 'OTRO:') }}
                                                {{ Form::text('otro_acabados', null, array('placeholder' => 'Cual?', 'class' => 'form-control')) }}
                                            </div>
                                            <br><br>
                                        </div> 
                                        <div class="col-xs-9">
                                            <div class='form-group form-register'>
                                                {{ Form::label('recomendaciones', 'RECOMENDACIONES:') }}
                                                {{ Form::text('recomendaciones', null, array('placeholder' => 'Trabajo', 'class' => 'form-control')) }}
                                            </div>
                                            <br><br>
                                        </div> 
                                        <div class="col-xs-12">
                                            <div class='form-group form-register tex'>
                                                {{ Form::label('observacion_acabados', ' OBSERVACIÓN DE ACABADOS:') }}
                                                {{ Form::textarea('observacion_acabados', null, array('rows' => '3', 'placeholder' => 'Detalles', 'class' => 'form-control')) }}
                                            </div>                                                
                                        </div>
                                        <br><br>                                        
                                    </div>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            {{ Form::label('fecha_reporte_acabados', 'FECHA DE REPORTE:') }}
                                            <input type='date' id='fecha_reporte_acabados' name='fecha_reporte_acabados' class='form-control'/>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            {{ Form::label('autorizado_acabados', 'AUTORIZADO:') }}
                                            {{ Form::text('autorizado_acabados', null, array('placeholder' => 'Jefe Producción', 'class' => 'form-control')) }}
                                        </div>
										<br><br>
                                    </div>
									<div class="button"align="center">
										{{ Form::button('Resetear', array('type' => 'reset', 'class' => 'btn btn-default btn-lg')) }} 
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

                                                                        @stop


                                                                        <!--
                                                                        <div class="row panel">                           
                                                                        <!-- work order -->  <!--          
                                                                        <center><!--
                                                                            <h3 class="glyphicon glyphicon-th-list " ></h3>
                                                                            <h3> Editar Trabajo</h3>                    
                                                                            <div class="panel panel-default tam">
                                                                                <!-- Default panel contents --><!--
                                                                                {{Form::open(array('url' => '/workorder/'.$workorder->id,'method' => 'PUT', 'role'=>'form')) }}                
                                                                                <!--  'worklist/1' --><!--
                                                                                <div class="panel-heading row panel"> 
                                                                                    <div class="col-xs-8 col-md-9 imp">
                                                                                        <h3 class="list-group-item-heading color">Pedido</h3>
                                                                                        {{ Form::text('customers_id', $workorder->customers_id, array('hidden' => 'true')) }} 
                                                                                    </div>
                                                                                    <div class="col-xs-2 col-md-3 imp"> 
                                                                                        {{ Form::text('id',$workorder->id, array('hidden' => 'true')) }}   
                                                                                        {{ Form::text('no_orden', $workorder->no_orden, array('placeholder' => 'No.ORDEN', 'class' => 'form-control')) }}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="panel-body">
                                                                                    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->  <!--                  
                                                                                    <div class="panel panel-default ">
                                                                                        <div class="row "> 
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('fecha_entrega', 'FECHANENTREGA:') }}
                                                                                                    {{Form::input('date', 'fecha_entrega', $workorder->fecha_entrega, ['id' => 'fecha_entrega', 'class' => 'form-control', 'placeholder' => 'Fecha Entrega']) }}
                                                                                                </div>
                                                                                            </div>                            
                                                                                            <div class="col-xs-6 col-md-4 imp">                                    
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('estado_trabajo', 'ESTADO TRABAJO:') }}
                                                                                                    {{ Form::select('estado_trabajo', array('Estado Trabajo' => array('1' => 'Por realizar', '2' => 'Diseño', '3' => 'Produccion', '4' => 'Entregado')),$workorder->estado_trabajo ,array('class' => 'form-control'))  }}
                                                                                                </div>
                                                                                            </div>                            
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('atendido', 'ATENDIDO:') }}
                                                                                                    {{ Form::text('atendido', $workorder->atendido, array('placeholder' => 'Atendido por', 'class' => 'form-control')) }}
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>                       
                                                                                        <div class="row ">                          
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('clase_trabajo', 'CLASE DE TRABAJO:') }}
                                                                                                    {{ Form::text('clase_trabajo', $workorder->clase_trabajo, array('placeholder' => 'Clase Trabajo', 'class' => 'form-control')) }}
                                                                                                </div>
                                                                                            </div>                            
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('tipo_material', 'MATERIAL:') }}
                                                                                                    {{ Form::text('tipo_material', $workorder->tipo_material, array('placeholder' => 'Tipo Material', 'class' => 'form-control')) }}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-xs-6 col-md-4 imp">                                
                                                                                                <div class="col-xs-4 col-md-6 imp">
                                                                                                    <div class='form-group form-register'>
                                                                                                        {{ Form::label('cantidad', 'CANTIDAD:') }}
                                                                                                        {{ Form::text('cantidad', $workorder->cantidad, array('placeholder' => 'Cantidad ', 'class' => 'form-control')) }}
                                                                                                    </div>
                                                                                                </div>                                
                                                                                                <div class="col-xs-6 col-md-6 imp">
                                                                                                    <div class='form-group form-register'>
                                                                                                        {{ Form::label('tamano', 'TAMAÑO:') }}
                                                                                                        {{ Form::text('tamano', $workorder->tamano, array('placeholder' => 'Tamaño', 'class' => 'form-control')) }}
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>  
                                                                                    </div>
                                                                                    <div class="panel panel-default ">
                                                                                        <div class="row ">     
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('valor_trabajo', 'VALOR:') }}
                                                                                                    {{ Form::text('valor_trabajo', $workorder->valor_trabajo, array('placeholder' => 'Valor Trabajo', 'class' => 'form-control')) }}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class="col-xs-6 col-md-6 imp">                                    
                                                                                                    <div class='form-group form-register'>
                                                                                                        {{ Form::label('iva', 'IVA:') }}
                                                                                                        {{ Form::select('iva', array('iva' => array('1' => 'Ninguno', '2' => 'Si', '3' => 'No')),$workorder->iva ,array('class' => 'form-control'))  }}
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-xs-6 col-md-6 imp">                                   
                                                                                                    <div class='form-group form-register'>
                                                                                                        {{ Form::label('iva2', '%IVA:') }}
                                                                                                        {{ Form::text('iva2', $workorder->iva2, array('placeholder' => '%iva', 'class' => 'form-control')) }}
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('total', 'TOTAL:') }}
                                                                                                    {{ Form::text('total', $workorder->total, array('placeholder' => 'Total', 'class' => 'form-control')) }}
                                                                                                </div>
                                                                                            </div>
                                                                                        </div> 
                                                                                        <div class="row ">                            
                                                                                            <div class="col-xs-6 col-md-4 imp ">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('abono', 'ABONO:') }}
                                                                                                    {{ Form::text('abono', $workorder->abono, array('placeholder' => 'Abono', 'class' => 'form-control')) }}
                                                                                                </div>
                                                                                            </div>                              
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('saldo', 'SALDO:') }}
                                                                                                    {{ Form::text('saldo', $workorder->saldo, array('placeholder' => 'Saldo', 'class' => 'form-control')) }}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('pago', 'PAGO:') }}
                                                                                                    {{ Form::text('pago', $workorder->pago, array('placeholder' => 'Pago', 'class' => 'form-control')) }}
                                                                                                </div>
                                                                                            </div>
                                                                                        </div> 
                                                                                    </div>                    
                                                                                    <div class="row "> 
                                                                                        <div class='form-group form-register tex'>
                                                                                            {{ Form::label('deetalles', 'DETALLES:') }}
                                                                                            {{ Form::textarea('deetalles', $workorder->deetalles, array('rows' => '4', 'placeholder' => 'Detalles', 'class' => 'form-control')) }}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='row buttons'> 
                                                                                    {{ HTML::link('/user','Cancelar', array('class' => 'btn btn-default'), false)}}
                                                                                    {{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn  btn-success')) }}                    
                                                                                </div>

                                                                            </div>                        
                                                                            <div class="panel panel-default tam">
                                                                                <!-- Default panel contents --><!--
                                                                                <div class="panel-heading row panel"> <h3 class="list-group-item-heading color">Orden de Producción</h3></div>
                                                                                <div class="panel-body">
                                                                                    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop --><!--

                                                                                    <div class="panel panel-default ">
                                                                                        <div class="row ">                            
                                                                                            <div class="col-xs-6 col-md-4 imp ">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('diseño', 'DISEÑO:') }}
                                                                                                    {{ Form::select('diseño', array('Tipo Diseño' => array('1' => 'Ninguno', '2' => 'Correcion', '3' => 'Arte')),$workorder->diseño ,array('class' => 'form-control'))  }}
                                                                                                </div>
                                                                                            </div>                              
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('diseñador', 'DISEÑADOR:') }}
                                                                                                    {{ Form::text('diseñador', $workorder->diseñador, array('placeholder' => 'Diseñador', 'class' => 'form-control')) }}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('tipo_elaborado', 'ELABORADO:') }}
                                                                                                    {{ Form::select('tipo_elaborado', array('Tipo Elaborado' => array('1' => 'Ninguno', '2' => 'primera vez', '3' => 'igual al anterior','4' => 'segun muestra')),$workorder->tipo_elaborado ,array('class' => 'form-control'))  }}
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>                     
                                                                                        <div class="row "> 
                                                                                            <div class="col-xs-6 col-md-4 imp ">
                                                                                                <br>                              
                                                                                                <div class='form-group'>
                                                                                                    {{ Form::label('original_todas', 'ORIGINAL:') }}
                                                                                                    {{ Form::checkbox('original_todas',  1, $workorder->original_todas)}}                                    

                                                                                                </div>
                                                                                            </div> 
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('no_copia', 'No.COPIAS:') }} 
                                                                                                    {{ Form::select('no_copia', array('Seleccionar Copia' => array('1' => 'Ninguno','2' => 'una copia', '3' => 'dos copias ', '4' => 'tres copias ', '5' => 'cuatro copias')),$workorder->no_copia ,array('class' => 'form-control'))  }}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>                                   
                                                                                                    {{ Form::label('copia1', 'COPIA1:') }}
                                                                                                    {{ Form::select('copia1', array('Copia 1' => array('1' => 'Ninguno ', '2' => 'Amarillo ', '3' => 'Rosado', '4' => 'Verde','5' => 'Azul','6' => 'Blanco')),$workorder->copia1 ,array('class' => 'form-control'))  }}
                                                                                                </div>
                                                                                            </div>                          
                                                                                        </div>   
                                                                                        <div class="row "> 
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('copia2', 'COPIA2:') }}
                                                                                                    {{ Form::select('copia2', array('COPIA 2' => array('1' => 'Ninguno ', '2' => 'Amarillo ', '3' => 'Rosado', '4' => 'Verde','5' => 'Azul','6' => 'Blanco')),$workorder->copia2 ,array('class' => 'form-control'))  }}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('copia3', 'COPIA3:') }}
                                                                                                    {{ Form::select('copia3', array('COPIA 3' => array('1' => 'Ninguno ', '2' => 'Amarillo ', '3' => 'Rosado', '4' => 'Verde','5' => 'Azul','6' => 'Blanco')),$workorder->copia3 ,array('class' => 'form-control'))  }}
                                                                                                </div>                                                           
                                                                                            </div>
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('copia4', 'COPIA4:') }}
                                                                                                    {{ Form::select('copia4', array('COPIA 4' => array('1' => 'Ninguno ', '2' => 'Amarillo ', '3' => 'Rosado', '4' => 'Verde','5' => 'Azul','6' => 'Blanco')),$workorder->copia4 ,array('class' => 'form-control'))  }}
                                                                                                </div>                               
                                                                                            </div>                                                      
                                                                                        </div> 
                                                                                        <div class="row "> 
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('no_tintas', 'No.TINTA:') }}
                                                                                                    {{ Form::select('no_tintas', array('No.Tintas' => array('1' => 'Ninguno','2' => 'una tinta', '3' => 'dos tintas ', '4' => 'tres tintas', '5' => 'poligromia ')),$workorder->no_tintas ,array('class' => 'form-control'))  }}
                                                                                                </div>                                
                                                                                            </div> 
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('tipo_color', 'TIPO COLOR:') }}
                                                                                                    {{ Form::select('tipo_color', array('Estado Trabajo' => array('1' => 'Ninguno','2' => 'basico', '2' => 'preparado')),$workorder->tipo_color ,array('class' => 'form-control'))  }}
                                                                                                </div>                               
                                                                                            </div> 
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('color1', 'COLOR1:') }}
                                                                                                    {{ Form::text('color1', $workorder->color1, array('placeholder' => 'color 1', 'class' => 'form-control')) }}
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>   
                                                                                        <div class="row "> 
                                                                                            <div class="col-xs-6 col-md-4 imp ">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('color2', 'COLOR2:') }}
                                                                                                    {{ Form::text('color2', $workorder->color2, array('placeholder' => 'color 2', 'class' => 'form-control')) }}
                                                                                                </div>
                                                                                            </div> 
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('color3', 'COLOR3:') }}
                                                                                                    {{ Form::text('color3', $workorder->color3, array('placeholder' => 'color 3', 'class' => 'form-control')) }}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-xs-6 col-md-4 imp"> 
                                                                                                <br>
                                                                                                <div class='form-group'>
                                                                                                    {{ Form::label('numerado', 'NUMERADO:') }}
                                                                                                    {{ Form::checkbox('numerado',  1, $workorder->numerado)}}

                                                                                                </div>
                                                                                            </div>                            
                                                                                        </div>
                                                                                        <div class="row "> 
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class="col-xs-6 col-md-6 imp">
                                                                                                    <div class='form-group form-register'>
                                                                                                        {{ Form::label('no_inicial', 'No.INICIAL:') }}
                                                                                                        {{ Form::text('no_inicial', $workorder->no_inicial, array('placeholder' => 'No.inicial', 'class' => 'form-control')) }}
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-xs-6 col-md-6 imp">
                                                                                                    <div class='form-group form-register'>
                                                                                                        {{ Form::label('no_final', 'No.FINAL:') }}
                                                                                                        {{ Form::text('no_final', $workorder->no_final, array('placeholder' => 'No. final', 'class' => 'form-control')) }}
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-xs-6 col-md-4 imp ">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('habilitado_dian', 'HABILITA DIAN:') }}
                                                                                                    {{ Form::text('habilitado_dian', $workorder->habilitado_dian, array('placeholder' => 'No. Dian', 'class' => 'form-control')) }}
                                                                                                </div>
                                                                                            </div>                            
                                                                                            <div class="col-xs-6 col-md-4 imp ">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('fecha_dian', 'FECHA DIAN:') }}
                                                                                                    {{ Form::text('fecha_dian', $workorder->fecha_dian, array('placeholder' => 'Fecha Dian', 'class' => 'form-control')) }}
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>                    
                                                                                        <div class="row ">                                                        
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('emblocado', 'EMBLOCADO:') }}
                                                                                                    {{ Form::text('emblocado', $workorder->emblocado, array('placeholder' => 'Emblocado', 'class' => 'form-control')) }}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-xs-6 col-md-4 imp ">
                                                                                                <br>                              
                                                                                                <div class='form-group'>
                                                                                                    {{ Form::label('quemado', 'QUEMADO:') }}
                                                                                                    {{ Form::checkbox('quemado', 1, $workorder->quemado)}}                                    
                                                                                                </div>
                                                                                            </div> 
                                                                                            <div class="col-xs-6 col-md-4 imp"> 
                                                                                                <br>                              
                                                                                                <div class='form-group'>
                                                                                                    {{ Form::label('tiro_retiro', 'TIRO/RETIRO:') }}
                                                                                                    {{ Form::checkbox('tiro_retiro', 1, $workorder->tiro_retiro)}}                                    
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>  
                                                                                        <div class="row ">                            
                                                                                            <div class="col-xs-6 col-md-4 imp ">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('no_plancha', 'No. PLANCHA:') }}
                                                                                                    {{ Form::text('no_plancha', $workorder->no_plancha, array('placeholder' => 'No. Plancha', 'class' => 'form-control')) }}
                                                                                                </div>
                                                                                            </div>                              
                                                                                            <div class="col-xs-6 col-md-4 imp">
                                                                                                <div class='form-group form-register'>
                                                                                                    {{ Form::label('no_master', 'No. MASTER:') }}
                                                                                                    {{ Form::text('no_master', $workorder->no_master, array('placeholder' => 'No. Master', 'class' => 'form-control')) }}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-xs-6 col-md-4 imp"> 
                                                                                                <br>                              
                                                                                                <div class='form-group'>
                                                                                                    {{ Form::label('engomado', 'ENGOMADO:') }}
                                                                                                    {{ Form::checkbox('engomado', 1, $workorder->engomado)}}                                    
                                                                                                </div>
                                                                                            </div>
                                                                                        </div> 
                                                                                        <div class="row ">                            
                                                                                            <div class="col-xs-6 col-md-4 imp">  
                                                                                                <br>                              
                                                                                                <div class='form-group'>
                                                                                                    {{ Form::label('perforado', 'PERFORADO:') }}
                                                                                                    {{ Form::checkbox('perforado',  1, $workorder->perforado)}}                                    
                                                                                                </div>                               
                                                                                            </div>                             
                                                                                            <div class="col-xs-6 col-md-4 imp"> 
                                                                                                <br>                              
                                                                                                <div class='form-group'>
                                                                                                    {{ Form::label('levante', 'LEVANTE:') }}
                                                                                                    {{ Form::checkbox('levante',  1, $workorder->levante)}}                                    
                                                                                                </div>                               
                                                                                            </div>
                                                                                            <div class="col-xs-6 col-md-4 imp">   
                                                                                                <br>                              
                                                                                                <div class='form-group'>
                                                                                                    {{ Form::label('engrapado', 'ENGRAPADO:') }}
                                                                                                    {{ Form::checkbox('engrapado',  1, $workorder->engrapado)}}                                    
                                                                                                </div>                               
                                                                                            </div>
                                                                                        </div> 
                                                                                        <div class="row">
                                                                                            <div class="row ">                            
                                                                                                <div class="col-xs-6 col-md-4 imp ">
                                                                                                    <div class='form-group form-register'>
                                                                                                        {{ Form::label('acabados', 'ACABADOS:') }}
                                                                                                        {{ Form::select('acabados', array('Acabados' => array('1' => 'Ninguno', '2' => 'Por la cabeza', '3' => 'Lado izquierdo', '4' => 'Lado derecho ')),$workorder->acabados ,array('class' => 'form-control'))  }}
                                                                                                    </div>                                   
                                                                                                </div>                              
                                                                                                <div class="col-xs-6 col-md-4 imp">
                                                                                                    <div class='form-group form-register'>
                                                                                                        {{ Form::label('cantidad_material', 'CANTIDAD/MATERIAL:') }}
                                                                                                        {{ Form::text('cantidad_material', $workorder->cantidad_material, array('placeholder' => 'Cantidad Material', 'class' => 'form-control')) }}
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-xs-6 col-md-4 imp">
                                                                                                    <div class='form-group form-register'>
                                                                                                        {{ Form::label('maquina', 'MAQUINA:') }}
                                                                                                        {{ Form::text('maquina', $workorder->maquina, array('placeholder' => 'maquina', 'class' => 'form-control')) }}
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div> 
                                                                                        </div>
                                                                                    </div>                    
                                                                                    <div class="row "> 
                                                                                        <div class='form-group form-register tex'>
                                                                                            {{ Form::label('observaciones', 'OBSERVACIONES:') }}
                                                                                            {{ Form::textarea('observaciones', $workorder->observaciones, array('rows' => '4', 'placeholder' => 'Observaciones', 'class' => 'form-control')) }}
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row ">                       
                                                                                        <div class="col-xs-12 col-md-6 imp"> 
                                                                                            <div class='form-group form-register'>
                                                                                                {{ Form::label('nombre_registro_pedido', 'REGISTRADO POR:') }}
                                                                                                {{ Form::text('nombre_registro_pedido', $workorder->nombre_registro_pedido, array('placeholder' => 'Quien Registro Pedido', 'class' => 'form-control')) }}
                                                                                            </div>
                                                                                        </div>                       
                                                                                    </div>
                                                                                </div>
                                                                                <div class='row buttons'>                                
                                                                                    {{ HTML::link('/user','Cancelar', array('class' => 'btn btn-default'), false)}}
                                                                                    {{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn  btn-success')) }}                    
                                                                                </div>
                                                                                {{ Form::close() }}
                                                                            </div>
                                                                        </center>
                                                                        </div>

                                                                        -->