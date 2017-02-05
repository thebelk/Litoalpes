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
            <h2 class="til">{{$customer->cliente}}&nbsp </h2></a>
        <h5>Contacto: {{$customer->cel_contacto}} </h5> 
        <h5>Telefono: {{$customer->telefono}} </h5> 
        <h5>Cliente:          
            @if($customer->tipo_cliente==1) Directo
            @elseif($customer->tipo_cliente==2) Tercero                               
            @endif
        </h5>
        <h5> Nit: {{ $customer->nit_cc}}  </h5>
        <h5>{{ $customer->pagina_web}} </h5>
        <h5>{{ $customer->otro}} </h5>  
    </div>       
    <h5>{{ HTML::link('/customer/'.$customer->id.'/edit','Editar', array('class' => 'btn btn-link'), false)}}</h5>    
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
                    <p> <h5>Email: {{ Auth::user()->email}} </h5></p>
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
            <a href="/customer/{{$customer->id}}/profile" class="list-group-item  text-center">                           
                <h5 class="glyphicon glyphicon-user"></h5><br/><h5>
                    @if($customer->empresa=="")
                    {{ $customer->cliente }} 
                    @endif
                    {{$customer->empresa}}
                </h5> 
            </a> 
            <a href="/workorderlist" class="list-group-item active  text-center">
                <h5 class="list-group-item-heading glyphicon glyphicon-th-list"></h5><h4>Trabajos</h4>
            </a>
            <a href="/phonebook" class="list-group-item  text-center">                           
                <h5 class="glyphicon glyphicon-earphone"></h5><br/><h4>Contactos | Proveedor</h4>
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
            <!--
                <h2 class="glyphicon glyphicon-user color" ></h2>
                <h3> Nuevo Contacto</h3>  -->  

            <!-- Default panel contents --><!--
            <div class="panel panel-default tam ">
                <div class="panel-heading " align="center"> 
                    <h3 class="glyphicon glyphicon-plus color" ></h3>
                    <h4> Detalles Trabajo</h4> 
                </div>
            </div>-->
            <!-- Default panel contents -->                                   
            <div class="col-xs-10 col-md-9 imp">
                <!-- <div class="col-xs-2 col-md-2 imp"> 
                     {{ Form::text('no_orden', null, array('placeholder' => 'No.', 'class' => 'form-control')) }}
                 </div>
                 {{ Form::text('customers_id', $customer->id, array('hidden' => 'true')) }} -->
            </div>
            {{Form::open(array('url' => '/workorder/'.$workorder->id,'method' => 'PUT', 'role'=>'form')) }}
            <div class="panel-body pancol tam ">
                <!--<div class="com2 "></div>-->
                <div class="panel panel-default "> 
                    <div class="row"  align="justify">                       
                            <div class="col-xs-12">
                                {{ Form::label('fecha_pedido', 'FECHA Y HORA DE SOLICITUD ') }}
                                {{  $workorder->created_at }}<br>
                            </div>
                            <!-- <h2  align="center"> Orden de Compra  </h2> --> 
                            {{ Form::text('customer_id', $customer->id, array('hidden' => 'true')) }}

                            <div class="col-xs-10"align="center" style="margin-left:45px">
                                <br><h2><b>ORDEN DE PRODUCCIÓN</b></h2><br>
                            </div>
                            <div class="col-xs-3">
                                <div class='form-group form-register' align="justify">
                                    <h5><strong> {{ Form::label('no_orden', 'NO. ORDEN') }}</strong><br>
                                        {{ $workorder->no_orden}}</h5>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class='form-group form-register'>
                                    <h5><strong>ORDEN DE</strong><br>
                                        {{ Form::text('customers_id', $customer->id, array('hidden' => 'true')) }}
                                        @if($workorder->tipo_orden==1)                                 
                                        @elseif($workorder->tipo_orden==2) SERVICIO 
                                        @elseif($workorder->tipo_orden==3) PRODUCTO
                                        @endif </h5>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <h5><strong>TRABAJO</strong><br>
                                    @if($workorder->estado_trabajo==1) Por realizar	                                
                                    @elseif($workorder->estado_trabajo==2) Estado Diseño
                                    @elseif($workorder->estado_trabajo==3) Estado Revisión
                                    @elseif($workorder->estado_trabajo==4) Enviado para impresión
                                    @elseif($workorder->estado_trabajo==5) Estado Impresion
                                    @elseif($workorder->estado_trabajo==6) Estado Acabados 
                                    @elseif($workorder->estado_trabajo==7) Listo
                                    @elseif($workorder->estado_trabajo==8) Entregado
                                    @endif  </h5>	
                            </div>
                            <div class="col-xs-3">
                                <div class='form-group form-register'>
                                    {{ Form::label('fecha_entrega', 'FECHA ENTREGA') }}<br>
                                    {{ $workorder->fecha_entrega}}  
                                </div>
                            </div>
                       
                        <div class="col-xs-12"><hr>
                            <div class="com3"><h4><b>SERVICIOS</b></h4><br></div>
                            <br>
                            <div class="col-xs-3">
                                <div class=' form-group form-register'>
                                    @if($workorder->tipo_encuadernado==1)
                                    {{ Form::checkbox('encuadernado',  $workorder->encuadernado, $workorder->encuadernado == 1,['disabled' => 'disabled'])}}
                                    {{ Form::label('tipo_encuadernado', 'ANILLAR/EMPASTE') }}   
                                    @elseif($workorder->tipo_encuadernado==2)
                                    {{ Form::checkbox('encuadernado',  $workorder->encuadernado, $workorder->encuadernado == 1,['disabled' => 'disabled'])}}
                                    {{ Form::label('tipo_encuadernado', 'ANILLADO') }}<br>   Espiral 
                                    @elseif($workorder->tipo_encuadernado==3)
                                    {{ Form::checkbox('encuadernado',  $workorder->encuadernado, $workorder->encuadernado == 1,['disabled' => 'disabled'])}}
                                    {{ Form::label('tipo_encuadernado', 'ANILLADO') }}<br>  Plástico
                                    @elseif($workorder->tipo_encuadernado==4)
                                    {{ Form::checkbox('encuadernado',  $workorder->encuadernado, $workorder->encuadernado == 1,['disabled' => 'disabled'])}}
                                    {{ Form::label('tipo_encuadernado', 'ANILLADO') }}<br>  Doble – O 
                                    @elseif($workorder->tipo_encuadernado==5)
                                    {{ Form::checkbox('encuadernado',  $workorder->encuadernado, $workorder->encuadernado == 1,['disabled' => 'disabled'])}}
                                    {{ Form::label('tipo_encuadernado', 'ANILLADO') }}<br>  Velobind
                                    @elseif($workorder->tipo_encuadernado==6)
                                    {{ Form::checkbox('encuadernado',  $workorder->encuadernado, $workorder->encuadernado == 1,['disabled' => 'disabled'])}}
                                    {{ Form::label('tipo_encuadernado', 'ANILLADO') }}<br>  Sencillo 
                                    @elseif($workorder->tipo_encuadernado==7)
                                    {{ Form::checkbox('encuadernado',  $workorder->encuadernado, $workorder->encuadernado == 1,['disabled' => 'disabled'])}}
                                    {{ Form::label('tipo_encuadernado', 'EMPASTE') }}<br>  Pasta Dura
                                    @elseif($workorder->tipo_encuadernado==8)
                                    {{ Form::checkbox('encuadernado',  $workorder->encuadernado, $workorder->encuadernado == 1,['disabled' => 'disabled'])}}
                                    {{ Form::label('tipo_encuadernado', 'EMPASTE') }}<br>   Pasta Dura / Marcado
                                    @endif

                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class='form-group form-register'>
                                    {{ Form::checkbox('sublimaciones', $workorder->sublimaciones, $workorder->sublimaciones == 1,['disabled' => 'disabled'])}}
                                    {{ Form::label('tipo_sublimacion', ' SUBLIMACIÓN ') }}  <br>                                                          

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
                                    {{ Form::label('tipo_impresiones', 'IMPRESIÓN') }}<br>  

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
                                    {{ Form::checkbox('sello',  $workorder->tipo_sello, $workorder->tipo_sello == 1,['disabled' => 'disabled'])}}
                                    {{ Form::label('tipo_sello', ' SELLO') }}  <br>                                                            

                                    @if($workorder->tipo_sello==1)                                
                                    @elseif($workorder->tipo_sello==2) Cyrel
                                    @elseif($workorder->tipo_sello==3) Seco
                                    @elseif($workorder->tipo_sello==4) Madera 
                                    @elseif($workorder->tipo_sello==5) Printer
                                    @elseif($workorder->tipo_sello==6) Bolsillo 
                                    @elseif($workorder->tipo_sello==7) Otros
                                    @endif
                                </div>
                            </div>                        
                            <div class="col-xs-3">
                                <div class='form-group'>												
                                    {{ Form::checkbox('servicio_numerado',$workorder->servicio_numerado, $workorder->servicio_numerado == 1,['disabled' => 'disabled'])}}
                                    {{ Form::label('servicio_numerado', 'NUMERADO') }}                                                            
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class='form-group'>
                                    {{ Form::checkbox('servicio_perforado',  $workorder->servicio_perforado, $workorder->servicio_perforado == 1,['disabled' => 'disabled'])}}
                                    {{ Form::label('servicio_perforado','PERFORADO') }}                                                            
                                </div>
                            </div>                        
                            <div class="col-xs-3">
                                <div class='form-group'>
                                    {{ Form::checkbox('servicio_engrapado',  $workorder->servicio_engrapado, $workorder->servicio_engrapado == 1,['disabled' => 'disabled'])}}
                                    {{ Form::label('servicio_engrapado','ENGRAPADO') }}                                                            
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class='form-group'>
                                    {{ Form::checkbox('servicio_grafado',  $workorder->servicio_grafado, $workorder->servicio_grafado  == 1 , ['disabled' => 'disabled'])}}
                                    {{ Form::label('servicio_grafado', 'GRAFADO') }}                                                            
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
                                    {{ Form::checkbox('servicio_repuje',  $workorder->servicio_repuje, $workorder->servicio_repuje  == 1,['disabled' => 'disabled'])}}
                                    {{ Form::label('servicio_repuje', 'REPUJE') }}                                                            
                                </div>	
                            </div>
                            <div class="col-xs-3">
                                <div class='form-group'>												
                                    {{ Form::checkbox('servicio_levante',  $workorder->servicio_levante, array($workorder->servicio_levante == 1),['disabled' => 'disabled'])}}
                                    {{ Form::label('servicio_levante', 'LEVANTE') }}                                                            
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class='form-group'>
                                    {{ Form::checkbox('servicio_laminado', $workorder->servicio_laminado, $workorder->servicio_laminado == 1,['disabled' => 'disabled'])}}
                                    {{ Form::label('servicio_laminado', 'LAMINADO') }}                                                            
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
                                    {{ Form::label('servicio_otro', 'OTRO:') }}	 											
                                    {{ $workorder->servicio_otro }}
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class='form-group'>
                                    {{ Form::checkbox('servicio_refile',  $workorder->servicio_refile, $workorder->servicio_refile == 1,['disabled' => 'disabled'])}}
                                    {{ Form::label('servicio_refile', 'REFILE') }}                                                            
                                </div>	
                            </div>
                            <div class="col-xs-3">
                                <div class='form-group form-register'>
                                    {{ Form::checkbox('gigantografia',  $workorder->gigantografia, $workorder->gigantografia == 1,['disabled' => 'disabled'])}}
                                    {{ Form::label('tipo_gigantografia', ' GIGANTOGRAFÍA') }} <br>

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
                        </div>
                        <br>
                        <div class="col-xs-12">
                            <div class="col-xs-12"><hr>
                                <div class="com3 "><h4><strong>{{$workorder->clase_trabajo}} </strong></h4></div><br><!--
                                <div class='form-group form-register' align="justify">
                                    <h3 class="color"><strong>{{ $workorder->clase_trabajo }}</strong></h3>												
                                </div>-->
                            </div>
                            <div class="col-xs-12">									
                                <div class='form-group form-register tex'>
                                    {{ Form::textarea('detalles_trabajo', $workorder->detalles_trabajo, array('rows' => '3', 'placeholder' => 'Detalles', 'class' => 'form-control','disabled')) }}
                                </div><br>                                                      
                            </div>
                            <br>
                            <div class="col-xs-12">
                                <p>
                                    <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#diseno" aria-expanded="false" aria-controls="collapseExample">
                                        DISEÑO
                                    </button>
                                    <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#impresion" aria-expanded="false" aria-controls="collapseExample">
                                        IMPRESIÓN
                                    </button>
                                    <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#acabados" aria-expanded="false" aria-controls="collapseExample">
                                        ACABADOS
                                    </button>
                                </p><hr>
                            </div>
                        </div>
                        <div class=""  align="justify">                                        
                            <!--  <h2  align="center">Orden de Producción</h2> --> 
                            <div class="collapse" id="diseno">
                                <div class="card card-block">
                                </div>
                                <div class="col-xs-12">
                                    <div class="com3 "><h4><b>DISEÑO</b></h4><br></div>
                                    <br>
                                    <br>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            <h4>
                                                {{ Form::label('diseñador', 'DISEÑADOR:') }}
                                                {{ $workorder->diseñador}} 
                                            </h4> 
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class='form-group form-register'>
                                            <h4>
                                                {{ Form::label('tipo_realizado', 'TRABAJO:') }}

                                                @if($workorder->tipo_realizado==1)	                             
                                                @elseif($workorder->tipo_realizado==2) Diseño Nuevo
                                                @elseif($workorder->tipo_realizado==3) Corrección
                                                @elseif($workorder->tipo_realizado==4) Quema de Master
                                                @elseif($workorder->tipo_realizado==5) Diseño según Muestra
                                                @elseif($workorder->tipo_realizado==6) Identidad Corporativa
                                                @endif
                                            </h4>
                                            <br>
                                        </div>
                                    </div>  
                                    <div class="col-xs-4">
                                        <div class='form-group form-register'>
                                            {{ Form::label('tipo_impresion', ' MPRESIÓN') }}<br>

                                            @if($workorder->tipo_impresion==1)	                             
                                            @elseif($workorder->tipo_impresion==2) Digital 
                                            @elseif($workorder->tipo_impresion==3) Litográfica
                                            @elseif($workorder->tipo_impresion==4) Gigantografia
                                            @elseif($workorder->tipo_impresion==5) Sello
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class='form-group form-register'>
                                            {{ Form::checkbox('plancha',  $workorder->plancha, $workorder->plancha == 1,['disabled' => 'disabled'])}}
                                            {{ Form::label('tipo_plancha', 'PLANCHA') }} <br>                                                       

                                            @if($workorder->tipo_plancha==1)	                          
                                            @elseif($workorder->tipo_plancha==2) Ctp 52
                                            @elseif($workorder->tipo_plancha==3) M.Doble Carta
                                            @endif
                                        </div>                                                  
                                    </div>
                                    <div class="col-xs-4">
                                        <div class='form-group form-register'>
                                            {{ Form::checkbox('master',  $workorder->master, $workorder->master == 1,['disabled' => 'disabled'])}}
                                            {{ Form::label('tipo_master', 'MASTER') }}<br>

                                            @if($workorder->tipo_master==1)	                              
                                            @elseif($workorder->tipo_master==2) Medio Master
                                            @elseif($workorder->tipo_master==3) Master Entero
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row2"  align="justify"> 
                                        <div class="col-xs-12"><hr>
                                            <h5><strong>Facturas Reg.Común</strong></h5>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_dian', 'NO.DIAN:') }}
                                                {{ $workorder->no_dian}}
                                            </div> 
                                        </div> 
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('fecha_dian', 'FECHA:') }}
                                                {{ $workorder->fecha_dian }}
                                            </div> 
                                        </div>
                                        <div class="col-xs-4">
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
                                                {{ Form::label('fecha_reporte_diseño', 'FECHA DE REPORTE:') }}<br>
                                                {{ $workorder->fecha_reporte_diseño}}                                               
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('revisado_diseño', 'REVISADO:') }}<br>
                                                {{ $workorder->revisado_diseño }}
                                            </div>                                                
                                        </div>
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('autorizado_diseño', 'AUTORIZADO:') }}<br>
                                                {{ $workorder->autorizado_diseño}}
                                            </div><br><br>											
                                        </div>								
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="collapse" id="impresion">
                            <div class="row2"  align="left">                                                      
                                <div class='form-group form-register' align="justify">
                                    <div class="col-xs-12">
                                        <div class="com3 "><h4><b>PRE IMPRESIÓN /  IMPRESIÓN</b></h4><br></div> <br><br>
                                        <!--
                                         {{ Form::select('estado_trabajo', array('Estado Trabajo' => array('1' => 'Por realizar', '2' => 'Diseño', '3' => 'Impresion','4' => 'Acabados', '5' => 'Disponible','6' => 'Entregado')),null ,array('class' => 'form-control')); }}
                                         <br> -->

                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('maquina', 'MÁQUINA:') }}<br>
                                                {{ $workorder->maquina }}
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('clase_material', 'CLASE DE MATERIAL:') }}<br>
                                                {{ $workorder->clase_material}}
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('cantidad_material', 'CANT. MATERIAL:') }}<br>
                                                {{ $workorder->cantidad_material }}
                                            </div>                                                 
                                        </div>
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('corte_material', 'CORTE MATERIAL:') }}<br>
                                                {{ $workorder->corte_material }}
                                            </div>                                                  
                                        </div>

                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('cantidad_trabajo', 'CANT. TRABAJO:') }}<br>
                                                {{ $workorder->cantidad_trabajo }}
                                            </div>                                                   
                                        </div> 
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('tamano', 'TAMAÑO:') }}<br>
                                                {{ $workorder->tamano }}
                                            </div>                                                  
                                        </div>

                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('emblocado', 'EMBLOCADO:') }}<br>
                                                {{ $workorder->emblocado }}
                                            </div>                                                  
                                        </div>

                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_inicial', 'No. INICIAL:') }}<br>
                                                {{ $workorder->no_inicial}}
                                            </div>                                                
                                        </div> 
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_final', 'No. FINAL:') }}<br>
                                                {{ $workorder->no_final }}
                                            </div>                                                
                                        </div>                                        
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_tintas', 'No. TINTA:') }}<br>

                                                @if($workorder->no_tintas==1)	                             
                                                @elseif($workorder->no_tintas==2) una tinta
                                                @elseif($workorder->no_tintas==3) dos tintas 
                                                @elseif($workorder->no_tintas==4) tres tintas
                                                @elseif($workorder->no_tintas==5) policromía  
                                                @endif
                                            </div> 
                                        </div>
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('color_tinta', 'COLOR TINTA:') }}<br>
                                                {{ $workorder->color_tinta}}
                                            </div> 
                                        </div>
                                        <div class="col-xs-4"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('servicio_numerado',  $workorder->servicio_numerado, $workorder->servicio_numerado == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('numerado', 'CANT:') }} <br>

                                                @if($workorder->numeradoras==1)	                             
                                                @elseif($workorder->numeradoras==2) 1 Numeradora
                                                @elseif($workorder->numeradoras==3) 2 Numeradoras
                                                @elseif($workorder->numeradoras==4) 3 Numeradoras
                                                @elseif($workorder->numeradoras==5) 4 Numeradoras  
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('tinta_especial', 'TINTA ESPECIAL :') }}<br>
                                                {{ $workorder->tinta_especial }}
                                            </div> 
                                        </div>  
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('color_material', 'COLOR MATERIAL:') }}<br>
                                                {{ $workorder->color_material }}
                                            </div> 
                                        </div>
                                        <div class="col-xs-4">
                                            <div class='form-group form-register'>
                                                {{ Form::label('no_copia', 'NO. COPIAS:') }}<br>
                                                {{ $workorder->no_copia}} 
                                            </div>  
                                        </div>
                                        <div class="col-xs-12"><hr>
                                            <div class="col-xs-3">
                                                <div class='form-group form-register'>                                   
                                                    {{ Form::label('copia1', 'COPIA1:') }}<br>

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
                                                    {{ Form::label('copia2', 'COPIA2:') }}<br>

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
                                                    {{ Form::label('copia3', 'COPIA3:') }}<br>

                                                    @if($workorder->copia3==1)
                                                    @elseif($workorder->copia3==2) Amarillo 
                                                    @elseif($workorder->copia3==3) Rosado
                                                    @elseif($workorder->copia3==4) Verde 
                                                    @elseif($workorder->copia3==5) Azul 
                                                    @elseif($workorder->copia3==6) Blanco
                                                    @endif
                                                </div>                                                           
                                            </div>
                                            <div class="col-xs-">
                                                <div class='form-group form-register'>
                                                    {{ Form::label('copia4', 'COPIA4:') }}<br>

                                                    @if($workorder->copia4==1)
                                                    @elseif($workorder->copia4=2) Amarillo 
                                                    @elseif($workorder->copia4==3) Rosado
                                                    @elseif($workorder->copia4==4) Verde 
                                                    @elseif($workorder->copia4==5) Azul 
                                                    @elseif($workorder->copia4==6) Blanco
                                                    @endif
                                                </div>                              
                                            </div> <hr>
                                        </div> 
                                        <div class="col-xs-4"> 
                                            <div class='form-group'>                                                            
                                                {{ Form::checkbox('original_copia',  $workorder->original_copia, $workorder->original_copia == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('original_copia', 'ORIGINAL Y COPIA') }}
                                            </div>
                                        </div>
                                        <div class="col-xs-4"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('original_todas',  $workorder->original_todas, $workorder->original_todas == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('original_todas', 'ORIGINAL TODAS') }}                                                           
                                            </div>
                                        </div>
                                        <div class="col-xs-4"> 
                                            <div class='form-group'>
                                                {{ Form::checkbox('tiro_retiro',  $workorder->tiro_retiro, $workorder->tiro_retiro == 1,['disabled' => 'disabled'])}}
                                                {{ Form::label('tiro_retiro', 'TIRO Y RETIRO') }}  
                                            </div>
                                        </div> 
                                        <div class="col-xs-12">
                                            <hr>
                                            <div class='form-group form-register tex'>
                                                {{ Form::label('observacion_impresion', ' OBSERVACIÓN PRE IMPRESIÓN / IMPRESIÓN:') }}
                                                {{ Form::textarea('observacion_impresion', $workorder->observacion_impresion, array('rows' => '3', 'placeholder' => 'Detalles', 'class' => 'form-control','disabled')) }}
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
                                            </div><br><br>
                                        </div> 
                                    </div>
                                </div>
                            </div><!-- 
                            <div class="button"align="center">
                                    {{ Form::button('Resetear', array('type' => 'reset', 'class' => 'btn btn-default btn-lg')) }} 
                                    {{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn  btn-success btn-lg')) }}                               
                            </div>   -->   
                        </div>
                        <div class="collapse" id="acabados"> 
                            <div class="row2"  align="justify">                                           
                                <div class='form-group form-register' align="justify">
                                    <div class="col-xs-12">
                                        <div class="com3 "><h4><b>ACABADOS</b></h4><br></div> <br><br>
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
                                        <div class="col-xs-6">
                                            <div class='form-group form-register'>
                                                {{ Form::label('fecha_reporte_acabados', 'FECHA DE REPORTE:') }}
                                                {{ $workorder->fecha_reporte_acabados}}
                                            </div><br>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class='form-group form-register'>
                                                {{ Form::label('autorizado_acabados', 'AUTORIZADO:') }}
                                                {{ $workorder->autorizado_acabados}}
                                            </div>
                                            <br><br><br>
                                        </div>
                                    </div>  
                                </div> 
                            </div>
                        </div>
                        <div class="col-xs-12  panel-default">
                            <div class="com3 tam "><h4><b>PAGOS</b></h4><br></div> <br>
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
                            </div>
                        </div>       
                    </div>
                    <center>
                        {{ HTML::link('/workorder/'.$workorder->id.'/edit','Editar', array('class' => 'btn btn-default'), false)}} 
                        {{ Form::model($workorder, array('url' => array('/worklist/'.$workorder->id), 'method' => 'DELETE', 'role' => 'form')) }}

                        {{ Form::submit('Eliminar', array('class' => 'btn  btn-success')) }}  
                    </center>
                    <br><br>									
                </div>
            </div>
     

        {{ Form::close() }}

    </div>
</div>


@stop