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
    <div class="row panel"> 
        <div class='row buttons'>   
            <div class="col-md-1">
                {{ Form::button('Editar', array('type' => 'reset', 'class' => 'btn btn-default')) }} 
                {{ Form::model($workorder, array('url' => array('/worklist/'.$workorder->id), 'method' => 'DELETE', 'role' => 'form')) }}
            </div>  
            <div class="col-md-1">
                {{ Form::submit('Eliminar', array('class' => 'btn  btn-success')) }}
            </div> 
        </div> 
        <center>
            <h3> Detalles del Trabajo</h3> 
            <div class="panel panel-default tam">
                <!-- Default panel contents -->
                {{Form::open(array('url' => '/workorder/','role'=>'form', 'method' => 'POST')) }}
                <div class="panel-heading row panel"> 
                    <div class="col-xs-8 col-md-9 imp">
                        <h3 class="list-group-item-heading color"> Pedido: {{ $workorder->customers_id}}  </h3>                     
                    </div>
                    <div class="col-xs-2 col-md-3 imp">                                  
                        <p><strong>No.ORDEN</strong>: {{ $workorder->no_orden}}</p>
                    </div>
                </div>
                <div class="panel-body">
                    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->                    
                    <div class="panel panel-default ">
                        <div class="row "> 
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>FECHANENTREGA:</strong> <br>  {{ $workorder->fecha_entrega}}</p>                                    
                                </div>
                            </div>                            
                            <div class="col-xs-6 col-md-4 imp">                                    
                                <div class='form-group form-register'>
                                    <p><strong>ESTADO TRABAJO:</strong><br>
                                        @if($workorder->estado_trabajo==1) Por realizar                                
                                        @elseif($workorder->estado_trabajo==2) Diseño 
                                        @elseif($workorder->estado_trabajo==3) Produccion 
                                        @elseif($workorder->estado_trabajo==3) Entregado 
                                        @endif                                       
                                </div>
                            </div> <!--                           
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>ATENDIDO:</strong><br> {{ $workorder->atendido}}</p>
                                </div>
                            </div>-->
                        </div> <!--                      
                        <div class="row ">                          
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>CLASE DE TRABAJO:</strong><br> {{ $workorder->clase_trabajo}}</p>
                                </div>
                            </div>                            
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>MATERIAL:</strong><br> {{ $workorder->tipo_material}}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">                                
                                <div class="col-xs-6 col-md-6 imp">
                                    <div class='form-group form-register'>
                                        <p><strong>CANTIDAD:</strong>:<br> {{ $workorder->cantidad}}</p>
                                    </div>
                                </div>                                
                                <div class="col-xs-6 col-md-6 imp">
                                    <div class='form-group form-register'>
                                        <p><strong>TAMAÑO:</strong><br> {{ $workorder->tamano}}</p>
                                    </div>
                                </div>
                            </div>
                        </div> --> 
                    </div>
                    <div class="panel panel-default ">
                        <div class="row ">     
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>VALOR:</strong><br> {{ $workorder->valor_trabajo}}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class="col-xs-6 col-md-6 imp">                                    
                                    <div class='form-group form-register'>
                                        <p><strong>IVA:</strong> 
                                            @if($workorder->iva==1) Si                                
                                            @elseif($workorder->iva==2) No 
                                            @endif  

                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-6 imp">                                   
                                    <div class='form-group form-register'>
                                        <p><strong>%IVA:</strong> <br>{{ $workorder->iva2}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>TOTAL</strong><br>{{ $workorder->total}}</p>
                                </div>
                            </div>
                        </div> 
                        <div class="row ">                            
                            <div class="col-xs-6 col-md-4 imp ">
                                <div class='form-group form-register'>
                                    <p><strong>ABONO:</strong><br> {{ $workorder->abono}}</p>
                                </div>
                            </div>                              
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>SALDO:</strong><br>{{ $workorder->saldo}}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>PAGO:</strong> <br>{{ $workorder->pago}}</p>
                                </div>
                            </div>
                        </div> 
                    </div>    
                    <div class="panel panel-default ">
                        <div class="row "> 
                            <div class='form-group form-register tex'>
                                <p><strong>DETALLES:</strong> <br>{{ $workorder->deetalles}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                        
            <div class="panel panel-default tam">
                <!-- Default panel contents -->
                <div class="panel-heading row panel"> <h3 class="list-group-item-heading color">Orden de Producción</h3></div>
                <div class="panel-body">
                    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->

                    <div class="panel panel-default ">
                        <div class="row ">                            
                            <div class="col-xs-6 col-md-4 imp ">
                                <div class='form-group form-register'>
                                    <p><strong>DISEÑO:</strong><br>
                                        @if( $workorder->diseño==1) Ninguno                               
                                        @elseif( $workorder->diseño==2) Correcion
                                        @elseif( $workorder->diseño==3) Arte 
                                        @endif</p>
                                </div>
                            </div>                              
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>DISEÑADOR:</strong><br> {{ $workorder->diseñador}}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>ELABORADO:</strong><br> 
                                        @if(  $workorder->tipo_elaborado==1) Ninguno                               
                                        @elseif(  $workorder->tipo_elaborado==2)Primera vez
                                        @elseif(  $workorder->tipo_elaborado==3) Igual al anterior
                                        @elseif(  $workorder->tipo_elaborado==4) Segun muestra
                                        @endif</p>
                                </div>
                            </div>
                        </div>                     
                        <div class="row "> 
                            <div class="col-xs-6 col-md-4 imp ">

                                <div class='form-group'>
                                    <p><strong>ORIGINAL:</strong>
                                        @if(  $workorder->original_todas==0) No                               
                                        @elseif(  $workorder->original_todas==1)Si
                                        @endif
                                </div>
                            </div> 
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>No.COPIAS:</strong><br> 
                                        @if(  $workorder->no_copia==1) Ninguno                               
                                        @elseif(  $workorder->no_copia==2)una copia
                                        @elseif( $workorder->no_copia==3) dos copias
                                        @elseif( $workorder->no_copia==4) tres copias 
                                        @elseif(  $workorder->no_copia==5) cuatro copias
                                        @endif </p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>  
                                    <p><strong>COPIA1:</strong><br> 
                                        @if( $workorder->copia1==1) Ninguno                               
                                        @elseif( $workorder->copia1==2)Amarillo
                                        @elseif($workorder->copia1==3) Rosado
                                        @elseif($workorder->copia1==4) Verde
                                        @elseif($workorder->copia1==5) Azul
                                        @elseif($workorder->copia1==5)Blanco
                                        @endif</p>
                                </div>
                            </div>                          
                        </div>   
                        <div class="row "> 
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>COPIA2:</strong><br>  
                                        @if( $workorder->copia2==1) Ninguno                               
                                        @elseif( $workorder->copia2==2)Amarillo
                                        @elseif($workorder->copia2==3) Rosado
                                        @elseif($workorder->copia2==4) Verde
                                        @elseif($workorder->copia2==5) Azul
                                        @elseif($workorder->copia2==5)Blanco
                                        @endif</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>COPIA3:</strong><br>
                                        @if( $workorder->copia3==1) Ninguno                               
                                        @elseif( $workorder->copia3==2)Amarillo
                                        @elseif($workorder->copia3==3) Rosado
                                        @elseif($workorder->copia3==4) Verde
                                        @elseif($workorder->copia3==5) Azul
                                        @elseif($workorder->copia3==5)Blanco
                                        @endif</p>   
                                </div>                                                          
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>COPIA4:</strong><br>
                                        @if( $workorder->copia4==1) Ninguno                               
                                        @elseif( $workorder->copia4==2)Amarillo
                                        @elseif($workorder->copia4==3) Rosado
                                        @elseif($workorder->copia4==4) Verde
                                        @elseif($workorder->copia4==5) Azul
                                        @elseif($workorder->copia4==5)Blanco
                                        @endif</p>   
                                </div>                               
                            </div>                                                      
                        </div> 
                        <div class="row "> 
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>No.TINTA:</strong><br> 
                                        @if( $workorder->no_tintas==1) Ninguno                               
                                        @elseif( $workorder->no_tintas==2)Una tinta
                                        @elseif($workorder->no_tintas==3) Dos tintas
                                        @elseif($workorder->no_tintas==4) Tres tintas
                                        @elseif($workorder->no_tintas==5)Poligromia                                        
                                        @endif</p>
                                </div>                                
                            </div> 
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>TIPO COLOR:</strong><br> 
                                        @if( $workorder->tipo_color==1) Ninguno                               
                                        @elseif( $workorder->tipo_color==2)Basico
                                        @elseif($workorder->tipo_color==3) Preparado                                     
                                        @endif</p>
                                    </p>
                                </div>                               
                            </div> 
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>COLOR1:</strong> <br>{{ $workorder->color1}}</p>
                                </div>
                            </div>

                        </div>   
                        <div class="row "> 
                            <div class="col-xs-6 col-md-4 imp ">
                                <div class='form-group form-register'>
                                    <p><strong>COLOR2:</strong><br> {{ $workorder->color2}}</p>
                                </div>
                            </div> 
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>COLOR3:</strong><br> {{ $workorder->color3}}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp"> 
                                <br>
                                <div class='form-group'>
                                    <p><strong>NUMERADO:</strong>
                                        @if( $workorder->numerador==1) No                               
                                        @elseif( $workorder->numerado==1)Si                                    
                                        @endif</p>                               
                                </div>
                            </div>                            
                        </div>
                        <div class="row "> 
                            <div class="col-xs-6 col-md-4 imp">
                                <div class="col-xs-6 col-md-6 imp">
                                    <div class='form-group form-register'>
                                        <p><strong>No.INICIAL:</strong><br> {{ $workorder->no_inicial}}</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-6 imp">
                                    <div class='form-group form-register'>
                                        <p><strong>No.FINAL:</strong><br> {{ $workorder->no_final}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp ">
                                <div class='form-group form-register'>
                                    <p><strong>HABILITA DIAN:</strong><br> {{ $workorder->habilitado_dian}}</p>
                                </div>
                            </div>                            
                            <div class="col-xs-6 col-md-4 imp ">
                                <div class='form-group form-register'>
                                    <p><strong>FECHA DIAN:</strong><br>{{ $workorder->fecha_dian}}</p>
                                </div>
                            </div>
                        </div>                    
                        <div class="row ">                                                        
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>EMBLOCADO:</strong> <br>{{ $workorder->emblocado}}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp ">
                                <br>                              
                                <div class='form-group'>
                                    <p><strong>QUEMADO:</strong> 
                                        @if( $workorder->quemado==0) No                               
                                        @elseif( $workorder->quemado==1)Si                                    
                                        @endif</p> 
                                </div>
                            </div> 
                            <div class="col-xs-6 col-md-4 imp"> 
                                <br>                              
                                <div class='form-group'>
                                    <p><strong>TIRO/RETIRO:</strong>
                                        @if($workorder->tiro_retiro==0) No                               
                                        @elseif($workorder->tiro_retiro==1)Si                                    
                                        @endif</p> 
                                </div>
                            </div>
                        </div>  
                        <div class="row ">                            
                            <div class="col-xs-6 col-md-4 imp ">
                                <div class='form-group form-register'>
                                    <p><strong>No.ORDEN</strong><br>{{ $workorder->no_orden}}</p>
                                </div>
                            </div>                              
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>No. MASTER:</strong><br> {{ $workorder->no_master}}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp"> 
                                <br>                              
                                <div class='form-group'>
                                    <p><strong>ENGOMADO:</strong>
                                        @if( $workorder->engomado==0) No                               
                                        @elseif( $workorder->engomado==1)Si                                    
                                        @endif</p> 
                                </div>
                            </div>
                        </div> 
                        <div class="row ">                            
                            <div class="col-xs-6 col-md-4 imp">  
                                <br>                              
                                <div class='form-group'>
                                    <p><strong>PERFORADO:</strong>
                                        @if($workorder->perforado==0) No                               
                                        @elseif( $workorder->perforado==1)Si                                    
                                        @endif</p> 
                                </div>                               
                            </div>                             
                            <div class="col-xs-6 col-md-4 imp"> 
                                <br>                              
                                <div class='form-group'>
                                    <p><strong>LEVANTE:</strong>
                                        @if( $workorder->levante==0) No                               
                                        @elseif(  $workorder->levante==1)Si                                    
                                        @endif</p> 
                                </div>                               
                            </div>
                            <div class="col-xs-6 col-md-4 imp">   
                                <br>                              
                                <div class='form-group'>
                                    <p><strong>ENGRAPADO:</strong>
                                        @if($workorder->engrapado==0) No                               
                                        @elseif($workorder->engrapado==1)Si                                    
                                        @endif</p> 
                                </div>                               
                            </div>
                        </div> 
                        <div class="row">
                            <div class="row ">                            
                                <div class="col-xs-6 col-md-4 imp ">
                                    <div class='form-group form-register'>
                                        <p><strong>ACABADOS:</strong> <br>
                                            @if($workorder->acabados==1) Ninguno                               
                                            @elseif($workorder->acabados==2)Por la cabeza
                                            @elseif($workorder->acabados==3) Lado izquierdo
                                            @elseif($workorder->acabados==4) Lado derecho                                       
                                            @endif</p>
                                    </div>                                   
                                </div>                              
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        <p><strong>CANTIDAD/MATERIAL:</strong><br> {{ $workorder->cantidad_material}}</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 imp">
                                    <div class='form-group form-register'>
                                        <p><strong>MAQUINA:</strong> <br>{{ $workorder->maquina}}</p>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>   
                    <div class="panel panel-default ">
                        <div class="row "> 
                            <div class='form-group form-register tex'>
                                <p><strong>OBSERVACIONES:</strong><br> {{ $workorder->observaciones}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row ">                       
                        <div class="col-xs-12 col-md-6 imp"> 
                            <div class='form-group form-register'>
                                <p><strong>REGISTRADO POR:</strong> {{ $workorder->nombre_registro_pedido}}</p>
                            </div>
                        </div>                       
                    </div>
                </div>

                {{ Form::close() }}
            </div>
        </center>
    </div>
</div>  
</div>  
@stop