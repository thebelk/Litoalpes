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
                @if($customer->tipo_cliente==1) Directo
                @elseif($customer->tipo_cliente==2) Intermediario                             
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
            <a href="/customer/{{$customer->id}}/profile" class="list-group-item  text-center">                           
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
            <h3> Editar Trabajo</h3>                    
            <div class="panel panel-default tam">
                <!-- Default panel contents -->
                 {{Form::open(array('url' => '/workorder/'.$workorder->id,'method' => 'PUT', 'role'=>'form')) }}                
                 <!--  'worklist/1' -->
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
                    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->                    
                    <div class="panel panel-default ">
                        <div class="row "> 
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    {{ Form::label('fecha_entrega', 'FECHANENTREGA:') }}
                                   {{Form::input('date', 'fecha_entrega', $workorder->fecha_entrega, ['id' => 'fecha_entrega', 'class' => 'form-control', 'placeholder' => 'Fecha Entrega']);}}
                                </div>
                            </div>                            
                            <div class="col-xs-6 col-md-4 imp">                                    
                                <div class='form-group form-register'>
                                    {{ Form::label('estado_trabajo', 'ESTADO TRABAJO:') }}
                                    {{ Form::select('estado_trabajo', array('Estado Trabajo' => array('1' => 'Por realizar', '2' => 'Diseño', '3' => 'Produccion', '4' => 'Entregado')),$workorder->estado_trabajo ,array('class' => 'form-control')); }}
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
                                        {{ Form::select('iva', array('iva' => array('1' => 'Ninguno', '2' => 'Si', '3' => 'No')),$workorder->iva ,array('class' => 'form-control')); }}
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
                <!-- Default panel contents -->
                <div class="panel-heading row panel"> <h3 class="list-group-item-heading color">Orden de Producción</h3></div>
                <div class="panel-body">
                    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                    
                    <div class="panel panel-default ">
                        <div class="row ">                            
                            <div class="col-xs-6 col-md-4 imp ">
                                <div class='form-group form-register'>
                                    {{ Form::label('diseño', 'DISEÑO:') }}
                                    {{ Form::select('diseño', array('Tipo Diseño' => array('1' => 'Ninguno', '2' => 'Correcion', '3' => 'Arte')),$workorder->diseño ,array('class' => 'form-control')); }}
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
                                    {{ Form::select('tipo_elaborado', array('Tipo Elaborado' => array('1' => 'Ninguno', '2' => 'primera vez', '3' => 'igual al anterior','4' => 'segun muestra')),$workorder->tipo_elaborado ,array('class' => 'form-control')); }}
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
                                    {{ Form::select('no_copia', array('Seleccionar Copia' => array('1' => 'Ninguno','2' => 'una copia', '3' => 'dos copias ', '4' => 'tres copias ', '5' => 'cuatro copias')),$workorder->no_copia ,array('class' => 'form-control')); }}
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>                                   
                                    {{ Form::label('copia1', 'COPIA1:') }}
                                    {{ Form::select('copia1', array('Copia 1' => array('1' => 'Ninguno ', '2' => 'Amarillo ', '3' => 'Rosado', '4' => 'Verde','5' => 'Azul','6' => 'Blanco')),$workorder->copia1 ,array('class' => 'form-control')); }}
                                </div>
                            </div>                          
                        </div>   
                        <div class="row "> 
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    {{ Form::label('copia2', 'COPIA2:') }}
                                    {{ Form::select('copia2', array('COPIA 2' => array('1' => 'Ninguno ', '2' => 'Amarillo ', '3' => 'Rosado', '4' => 'Verde','5' => 'Azul','6' => 'Blanco')),$workorder->copia2 ,array('class' => 'form-control')); }}
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    {{ Form::label('copia3', 'COPIA3:') }}
                                    {{ Form::select('copia3', array('COPIA 3' => array('1' => 'Ninguno ', '2' => 'Amarillo ', '3' => 'Rosado', '4' => 'Verde','5' => 'Azul','6' => 'Blanco')),$workorder->copia3 ,array('class' => 'form-control')); }}
                                </div>                                                           
                            </div>
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    {{ Form::label('copia4', 'COPIA4:') }}
                                    {{ Form::select('copia4', array('COPIA 4' => array('1' => 'Ninguno ', '2' => 'Amarillo ', '3' => 'Rosado', '4' => 'Verde','5' => 'Azul','6' => 'Blanco')),$workorder->copia4 ,array('class' => 'form-control')); }}
                                </div>                               
                            </div>                                                      
                        </div> 
                        <div class="row "> 
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    {{ Form::label('no_tintas', 'No.TINTA:') }}
                                    {{ Form::select('no_tintas', array('No.Tintas' => array('1' => 'Ninguno','2' => 'una tinta', '3' => 'dos tintas ', '4' => 'tres tintas', '5' => 'poligromia ')),$workorder->no_tintas ,array('class' => 'form-control')); }}
                                </div>                                
                            </div> 
                            <div class="col-xs-6 col-md-4 imp">
                                <div class='form-group form-register'>
                                    {{ Form::label('tipo_color', 'TIPO COLOR:') }}
                                    {{ Form::select('tipo_color', array('Estado Trabajo' => array('1' => 'Ninguno','2' => 'basico', '2' => 'preparado')),$workorder->tipo_color ,array('class' => 'form-control')); }}
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
                                        {{ Form::select('acabados', array('Acabados' => array('1' => 'Ninguno', '2' => 'Por la cabeza', '3' => 'Lado izquierdo', '4' => 'Lado derecho ')),$workorder->acabados ,array('class' => 'form-control')); }}
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