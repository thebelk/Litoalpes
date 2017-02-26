@extends('layouts.master')
<head> 
    @section ('title')Ingresos @stop
</head>
@section('header')
@parent
@stop
@section('content')

@section('container1')   
    <h3 class="highlight nav nav-stacked ">{{Auth::user()->razon_social}}</h3>
    <br>
    <div class="comp">        
        <h2 class="til">{{ Auth::user()->representante}}  </h2>
        <h5> Nit: {{ Auth::user()->nit_cc}}  </h5>
        <h5>Telefono: {{ Auth::user()->telefono}} </h5>
        <h5>Celular: {{ Auth::user()->celular}} </h5>   
        <h5>{{ Auth::user()->otro}} </h5>       

    </div>
    <h5>{{ HTML::link('/user/'.Auth::user()->id.'/edit','Editar', array('class' => 'btn btn-link'), false)}}</h5> 
    <div class="accordion" id="accordion2">
        <div class="accordion-group">
            <div class="accordion-heading"><h4>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        Correo Electronico
                    </a></h4>
            </div>
            <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <p> <h5>Email: {{ Auth::user()->email}} </h5></p>
                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading"><h4>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                        Dirección
                    </a></h4>
            </div>
            <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
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
			<a href="/phonebook/create" class="list-group-item  active text-center">                           
                <h5 class="glyphicon glyphicon-plus"></h5><br/><h4 class="cel">Nuevo Contato </h4>
            </a>
            <a href="/phonebook" class="list-group-item  text-center">
                <h5 class="list-group-item-heading glyphicon glyphicon-earphone"></h5><h4 class="cel">Contactos | Proveedor</h4>
            </a>
        </div>
    </div>
	@stop
	
    @section('container2')
	@parent
	@stop
	
  
 @section('container3') 
<div class="col col-sm-9">
    <div class="row ">
        <div class="bhoechie-tab">                     
            <!-- work section -->
            <div class="bhoechie-tab-content active tam">
                <center>
                    <h3 class="glyphicon glyphicon-th-list color" ></h3>
                    <h4> Ingresos Estimados</h4>   
                </center>
                <div class="panel panel-default tam">
                    <h5> Ingresos del </h5> 
                    <div class="row"  align="justify"> 

                        <div class="col-xs-3 imp2" >
                            <h5>Día de hoy</h5>
                            <h2>0,00$</h2>
                            <h5 class="color">Iva:0,00$</h5>
                        </div>
                        <div class="col-xs-3 imp2" >
                            <h5>Ayer</h5>
                            <h2>0,00$</h2>
                            <h5 class="color">Iva:0,00$</h5>
                        </div>
                        <div class="col-xs-3 imp2" >
                            <h5>Últimos 7 días</h5>
                            <h2>0,00$</h2>
                            <h5 class="color">Iva:0,00$</h5>
                        </div>
                        <div class="col-xs-3 imp2" >
                            <h5>Últimos 30 días</h5>
                            <h2>0,00$</h2>
                            <h5 class="color">Iva:0,00$</h5>
                        </div>
                    </div>
                    <div class="row"  align="justify"> 

                        <div class="col-xs-3 imp2" >
                            <h5>Saldo actual</h5>
                            <h2>0,00$</h2>
                        </div>
                        <div class="col-xs-3 imp2" >
                            <h5>Saldo pendiente</h5>
                            <h2>0,00$</h2>
                        </div>
                        <div class="col-xs-3 imp2" >

                        </div>
                        <div class="col-xs-3 imp" >
                            <h4>Ingresos finales</h4>
                            <h2>0,00$</h2>
                        </div>
                    </div>
                </div>               
            </div>
        </div><!--
        <section class="tab wow fadeInLeft tam">                     
            <header class="panel-heading tab-bg-dark-navy-blue">
                <ul class="nav nav-tabs nav-justified ">
                    <li class="active">
                        <a data-toggle="tab" href="#reportemes">
                            <h5>INGRESOS MES</h5> 
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#reportecontacto">
                            <h5>SALDOS CLIENTES</h5>  
                        </a>
                    </li>
                </ul>
            </header>
            <div id="scroll" class="panel-body pancol slimScrollBar ">                     
                <div class="tab-content tasi-tab" >
                    <div id="reportemes" class="tab-pane fade in active" height="100">                               
                        <article class="media">								
                            <div  class="panel panel-default tam">
                                <h3><span class="estilo"> Detalles ingresos por mes</span></h3> 
                                @foreach($workorder as $worklist)
                                @if($worklist->estado_trabajo==1)

                                <!-- Default panel contents -->     <!--           
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

                            <!-- Default panel contents -->  <!--              
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
                            <h5><strong>Cliente</strong>: {{  $worklist->cliente }},
                                <strong>Fecha Pedido</strong>: {{  $worklist->created_at }},
                                <strong>Fecha Entrega</strong>: {{ $worklist->fecha_entrega}}, 
                                <strong>Material</strong>: {{ $worklist->clase_material }} ,
                                <strong>Cantidad</strong>: {{ $worklist->cantidad_trabajo }} ,
                                <strong>Tamaño </strong>: {{ $worklist->tamano }} </h5> 
                            <h5><strong>Valor Trabajo</strong>: {{ $worklist->total}},                         
                                <strong>Abono</strong>: {{ $worklist->abono }} ,
                                <strong>Saldo</strong>: {{ $worklist->saldo }} ,                    
                                <strong>Diseñador</strong>: {{ $worklist->diseñador}},
                                <strong>Vendedor</strong>: {{ $worklist->vendedor}}</h5>  
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
        </section>  -->
    </div>
</div>
<script>

    $('#scroll').slimScroll({
        size: '5px',
        railColor: '#222',
        height: '540px',
        railOpacity: 1,
        wheelStep: 2,
        allowPageScroll: true
    });
</script>

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
        switch (elIVA) {
            case "0":
                //SIN IVA
                if (valor != null)
                {
                    document.getElementById('subtotal').value = document.getElementById('valor_trabajo').value;
                    document.getElementById('total').value = document.getElementById('valor_trabajo').value;
                    document.getElementById('saldo').value = document.getElementById('valor_trabajo').value - document.getElementById('abono').value;
                    document.getElementById('valor_iva').hidden = true;
                }
                break;
            case "1":
                //MAS IVA
                if (valor != null)
                {
                    document.getElementById('total').value = Math.ceil(document.getElementById('valor_trabajo').value * 1.19);
                    document.getElementById('subtotal').value = document.getElementById('valor_trabajo').value;
                    document.getElementById('valor_iva').hidden = false;
                    document.getElementById('valor_iva').innerHTML = document.getElementById('total').value - document.getElementById('valor_trabajo').value;
                    document.getElementById('saldo').value = document.getElementById('total').value - document.getElementById('abono').value;
                }

                break;
            case "2":
                //CON IVA				
                if (valor != null)
                {
                    document.getElementById('subtotal').value = Math.ceil(document.getElementById('valor_trabajo').value / 1.19);
                    document.getElementById('valor_iva').hidden = false;
                    document.getElementById('valor_iva').innerHTML = document.getElementById('valor_trabajo').value - document.getElementById('subtotal').value;
                    document.getElementById('total').value = document.getElementById('valor_trabajo').value;
                    document.getElementById('saldo').value = document.getElementById('total').value - document.getElementById('abono').value;
                }

                break;
        }
    }
</script>      

@stop@stop