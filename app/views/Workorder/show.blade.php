@extends('layouts.master')
<head> 
    @section ('title')Trabajos @stop
</head>
@section('header')
@parent
@stop
@section('content')
<div class="col col-sm-3 complement">   
    <h3 class="highlight nav nav-stacked ">{{$customer->cliente}}  <i class="glyphicon glyphicon glyphicon glyphicon-user"></i></h3>
    <div class="row panel">
        <div class="col-sm-8 col-md-12">
            <h3 class="color">Cliente:          
                @if($customer->tipo_cliente==1) Seleccionar
                @elseif($customer->tipo_cliente==2) Directo
                @elseif($customer->tipo_cliente==3) Intermediario                
                @endif
            </h3>            
            <h5 class="color"> Nit: {{ $customer->nit_cc}}  </h5>           
            <h5>Telefono: {{$customer->telefono}} </h5>   
            <h5>Repsponsable: {{$customer->repsponsable}} </h5> 
            <h5>Contacto: {{$customer->contacto}} </h5> 
            <h5>{{ $customer->otro}} </h5>  
        </div>                                           
    </div>
    <div class="accordion" id="accordion2">
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                    Correo Electronico
                </a>
            </div>
            <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <p> <h4>Email: {{ $customer->email}} </h4></p>
                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                    Dirección
                </a>
            </div>
            <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
                    <h5>Direccion: {{$customer->direccion}} </h5>
                    <h5> Barrio: {{ $customer->barrio}} </h5>
                    <h5> Ciudad: {{$customer->ciudad}} </h5>
                    <h5> Pais: {{$customer->pais}} </h5>
                </div>
            </div>
        </div>
    </div> 
    <hr>
    <div id="sidebar">                           
        <div class="list-group">    
            <a href="create" class="list-group-item active text-center">
                <h4 class="glyphicon glyphicon-plus"></h4><br/>Nuevo Trabajo 
            </a>
            <a href="/customer/profile" class="list-group-item  text-center">                           
                <h4 class="glyphicon glyphicon-user"></h4><br/> Perfil
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
    <div class="row panel">                           
        <!-- work order -->            
        <center>
            <h3 class="glyphicon glyphicon-th-list " ></h3>
            <h3> Nuevo Trabajo</h3>                    
            <div class="panel panel-default tam">
                <!-- Default panel contents -->
                {{Form::open(array('url' => '/workorder/','role'=>'form', 'method' => 'POST')) }}
                <div class="panel-heading row panel"> 
                    <div class="col-xs-8 col-md-9 imp">
                        <h3 class="list-group-item-heading color">Pedido</h3>                       
                        <p><strong>id</strong>: {{ $workorder->customers_id}}</p>
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
                                    <p><strong>FECHANENTREGA:</strong>: {{ $workorder->fecha_entrega}}</p>                                    
                                </div>
                            </div>                            
                            <div class="col-xs-6 col-md-4 imp">                                    
                                <div class='form-group form-register'>
                                    <p><strong>ESTADO TRABAJO:</strong>: {{ $workorder->estado_trabajo}}</p>
                                </div>
                            </div>                            
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>ATENDIDO:</strong>: {{ $workorder->atendido}}</p>
                                </div>
                            </div>
                        </div>                       
                        <div class="row ">                          
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>CLASE DE TRABAJO:</strong>: {{ $workorder->clase_trabajo}}</p>
                                </div>
                            </div>                            
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>MATERIAL:</strong>: {{ $workorder->tipo_material}}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">                                
                                <div class="col-xs-6 col-md-6 imp">
                                    <div class='form-group form-register'>
                                        <p><strong>CANTIDAD:</strong>: {{ $workorder->cantidad}}</p>
                                    </div>
                                </div>                                
                                <div class="col-xs-6 col-md-6 imp">
                                    <div class='form-group form-register'>
                                        <p><strong>TAMAÑO:</strong>: {{ $workorder->tamano}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="panel panel-default ">
                        <div class="row ">     
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>VALOR:</strong>: {{ $workorder->valor_trabajo}}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class="col-xs-6 col-md-6 imp">                                    
                                    <div class='form-group form-register'>
                                        <p><strong>IVA:</strong>: {{ $workorder->iva}}</p>
                                   </div>
                                </div>
                                <div class="col-xs-6 col-md-6 imp">                                   
                                    <div class='form-group form-register'>
                                        <p><strong>%IVA:</strong>: {{ $workorder->iva2}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>TOTAL</strong>: {{ $workorder->total}}</p>
                                </div>
                            </div>
                        </div> 
                        <div class="row ">                            
                            <div class="col-xs-6 col-md-4 imp ">
                                <div class='form-group form-register'>
                                    <p><strong>ABONO:</strong>: {{ $workorder->abono}}</p>
                                </div>
                            </div>                              
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>SALDO:</strong>: {{ $workorder->saldo}}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>PAGO:</strong>: {{ $workorder->pago}}</p>
                                </div>
                            </div>
                        </div> 
                    </div>                    
                    <div class="row "> 
                        <div class='form-group form-register tex'>
                            <p><strong>DETALLES:</strong>: {{ $workorder->deetalles}}</p>
                        </div>
                    </div>
                </div>
                <div class='row buttons'>                                
                    {{ Form::button('Reset', array('type' => 'reset', 'class' => 'btn btn-default')) }} 
                    {{ Form::button('Save', array('type' => 'submit', 'class' => 'btn  btn-success')) }}                    
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
                                    <p><strong>DISEÑO:</strong>: {{ $workorder->diseño}}</p>
                                </div>
                            </div>                              
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>DISEÑADOR:</strong>: {{ $workorder->diseñador}}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>ELABORADO:</strong>: {{ $workorder->tipo_elaborado}}</p>
                                </div>
                            </div>
                        </div>                     
                        <div class="row "> 
                            <div class="col-xs-6 col-md-4 imp ">
                                <br>                              
                                <div class='form-group'>
                                    <p><strong>ORIGINAL:</strong>: {{ $workorder->original_todas}}</p>
                                </div>
                            </div> 
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>No.ORDEN:</strong>: {{ $workorder->no_orden}}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>  
                                    <p><strong>COPIA1:</strong>: {{ $workorder->copia1}}</p>
                                </div>
                            </div>                          
                        </div>   
                        <div class="row "> 
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>COPIA2:</strong>: {{ $workorder->copia2}}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>No.ORDEN</strong>: {{ $workorder->copia3}}</p>
                                </div>                                                           
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>COPIA4:</strong>: {{ $workorder->copia4}}</p>
                                </div>                               
                            </div>                                                      
                        </div> 
                        <div class="row "> 
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>No.TINTA:</strong>: {{ $workorder->no_tintas}}</p>
                                </div>                                
                            </div> 
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>TIPO COLOR:</strong>: {{ $workorder->tipo_color}}</p>
                                </div>                               
                            </div> 
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>COLOR1:</strong>: {{ $workorder->color1}}</p>
                                </div>
                            </div>

                        </div>   
                        <div class="row "> 
                            <div class="col-xs-6 col-md-4 imp ">
                                <div class='form-group form-register'>
                                    <p><strong>COLOR2:</strong>: {{ $workorder->color2}}</p>
                                </div>
                            </div> 
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>COLOR3:</strong>: {{ $workorder->color3}}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp"> 
                                <div class='form-group'>
                                    <p><strong>NUMERADO:</strong>: {{ $workorder->numerado}}</p>                                  
                                </div>
                            </div>                            
                        </div>
                        <div class="row "> 
                            <div class="col-xs-6 col-md-4 imp">
								<div class='form-group form-register'>
									<p><strong>No. INICIAL:</strong>: {{ $workorder->no_inicial}}</p>
								</div>
							</div>
                            <div class="col-xs-6 col-md-4 imp">
								<div class='form-group form-register'>
									<p><strong>No. FINAL:</strong>: {{ $workorder->no_final}}</p>
								</div>
							</div>
						</div>
						<div class="row "> 
                            <div class="col-xs-6 col-md-4 imp ">
                                <div class='form-group form-register'>
                                    <p><strong>HABILITA DIAN:</strong>: {{ $workorder->habilitado_dian}}</p>
                                </div>
                            </div>                            
                            <div class="col-xs-6 col-md-4 imp ">
                                <div class='form-group form-register'>
                                    <p><strong>FECHA DIAN:</strong>: {{ $workorder->fecha_dian}}</p>
                                </div>
                            </div>
                        </div>                    
                        <div class="row ">                                                        
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>EMBLOCADO:</strong>: {{ $workorder->emblocado}}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp ">                                
                                <div class='form-group'>
                                    <p><strong>QUEMADO:</strong>: {{ $workorder->quemado}}</p>
                                </div>
                            </div> 
                            <div class="col-xs-6 col-md-4 imp">                                 
                                <div class='form-group'>
                                    <p><strong>TIRO/RETIRO:</strong>: {{ $workorder->tiro_retiro}}</p>
                                </div>
                            </div>
                        </div>  
                        <div class="row ">                                                        
							<div class="col-xs-6 col-md-4 imp ">
                                <div class='form-group form-register'>
                                    <p><strong>No.PLANCHA</strong>: {{ $workorder->no_plancha}}</p>                                    
                                </div>
                            </div>                              
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>No. MASTER:</strong>: {{ $workorder->no_master}}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">                                 
                                <div class='form-group'>
                                    <p><strong>ENGOMADO:</strong>: {{ $workorder->engomado}}</p>
                                </div>
                            </div>
                        </div> 
                        <div class="row ">                            
                            <div class="col-xs-6 col-md-4 imp">                                  
                                <div class='form-group'>
                                    <p><strong>PERFORADO:</strong>: {{ $workorder->perforado}}</p>
                                </div>                               
                            </div>                             
                            <div class="col-xs-6 col-md-4 imp">                                 
                                <div class='form-group'>
                                    <p><strong>LEVANTE:</strong>: {{ $workorder->levante}}</p>
                                </div>                               
                            </div>
                            <div class="col-xs-6 col-md-4 imp">                                   
                                <div class='form-group'>
                                    <p><strong>ENGRAPADO:</strong>: {{ $workorder->engrapado}}</p>
                                </div>                               
                            </div>
                        </div> 
                        <div class="row">                            
                            <div class="col-xs-6 col-md-4 imp ">
                                <div class='form-group form-register'>
                                    <p><strong>ACABADOS:</strong>: {{ $workorder->acabados}}</p>
                                </div>                                   
                            </div>                              
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>CANTIDAD/MATERIAL:</strong>: {{ $workorder->cantidad_material}}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    <p><strong>MAQUINA:</strong>: {{ $workorder->maquina}}</p>
                                </div>
                            </div>                            
                        </div>
                    </div>                    
                    <div class="row "> 
                        <div class='form-group form-register tex'>
                            <p><strong>OBSERVACIONES:</strong>: {{ $workorder->observaciones}}</p>
                        </div>
                    </div>
                    <div class="row ">                       
                        <div class="col-xs-12 col-md-6 imp"> 
                            <div class='form-group form-register'>
                                <p><strong>REGISTRADO POR:</strong>: {{ $workorder->nombre_registro_pedido}}</p>
                            </div>
                        </div>                       
                    </div>
                </div>
                <div class='row buttons'>     
                    <p><strong>No.ORDEN</strong>: {{ $workorder->no_orden}}</p>
                    {{ Form::button('Reset', array('type' => 'reset', 'class' => 'btn btn-default')) }} 
                    {{ Form::button('Save', array('type' => 'submit', 'class' => 'btn  btn-success')) }}                    
                </div>
                {{ Form::close() }}
            </div>           
            <hr>                          
            <!-- menu-->
            <div class="list-group">                
                <h4>Menu</h4>   
                <a href="/user" class="list-group-item ">
                    <h3 class="color"> <i class="glyphicon glyphicon-home"></i> <i class="glyphicon glyphicon-chevron-down"></i></h3>
                    <h3 class="color">Home</h3>
                </a>
                <a href="/customer" class="list-group-item ">
                    <h3 class="glyphicon glyphicon-user"></h3>
                    <h3>Clientes</h3>
                </a>   
                <a href="/quotation" class="list-group-item ">
                    <h3 class="glyphicon glyphicon-pencil"></h3>
                    <h3>Cotizar</h3>
                </a>
                <a href="#" class="list-group-item ">
                    <h3 class="glyphicon glyphicon-bell"></h3>
                    <h3>Notificaciones</h3>
                </a>                   
            </div>
        </center>
    </div>
</div>  
</div>  
@stop