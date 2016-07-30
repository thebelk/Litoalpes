@extends('layouts.master')
<head> 
    @section ('title')Cotizar @stop
</head>
@section('header')
@parent
@stop
@section('content')
<div class="col col-sm-3 complement">   
    <h3 class="highlight nav nav-stacked ">{{Auth::user()->razon_social}}</h3>
    <br>
    <div class="comp">        
        <h2>{{ Auth::user()->representante}}  </h2>
        <h5> Nit: {{ Auth::user()->nit_cc}}  </h5>
        <h5>Telefono: {{ Auth::user()->telefono}} </h5>
        <h5>Celular: {{ Auth::user()->celular}} </h5>   
        <h5>{{ Auth::user()->otro}} </h5>       

    </div>
    <h5>{{ HTML::link('/user/'.Auth::user()->id.'/edit','Editar', array('class' => 'btn btn-link'), false)}}</h5>
    <div class="accordion" id="accordion2">
        <div class="accordion-group">
            <div class="accordion-heading"><h5>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        Correo Electronico
                    </a></h5>
            </div>
            <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <br>
                    <p> <h5>Email: {{ Auth::user()->email}} </h5></p>
                </div>
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
            <a href="quotation/create" class="list-group-item  text-center">
                <h5 class="glyphicon glyphicon-plus"></h5><br/><h5>Nueva Cotización</h5> 
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
            <div class="titulo">
                <h3 class="glyphicon glyphicon-pencil color" ></h3>
                <h4> Listar Cotización</h4> 
            </div>
                 <div class="input-group" id="adv-search">
                <input type="text" class="form-control" style="text-align:center" placeholder="Buscar Trabajos" />
               <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                              <div class="form-group">
                                <label class="radio-inline">
                                  <input type="radio" name="searchLocation" id="inThisLocation" value="inThisLocation" checked="checked" /> In this location
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="searchLocation" id="everywhere" value="everywhere" /> Everywhere
                                </label>
                              </div>
                                     <a ng-href="#/search/">Advanced search</a>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
            <div class="com "><div class="com2 "></div>
                <div id="scroll" class="panel panel-default slimScrollBar tam">                
                    <div class="panel-body">                   
                        @foreach($quotation as $quotlist)                    
                        <h4><strong> {{ $quotlist->clase_trabajo }} / Cotizacion:
                                <span class="estilo">
                                    @if($quotlist->estado_cotizacion==1) Espera
                                    @elseif($quotlist->estado_cotizacion==2) Elaborada
                                    @elseif($quotlist->estado_cotizacion==3) Enviado 
                                    @elseif($quotlist->estado_cotizacion==4) Autorizado 
                                    @endif 
                                </span>
                            </strong></h4>
                        <h5><strong>Cliente</strong>: {{ $quotlist->cliente}},                        
                            <strong>Celular</strong>: {{ $quotlist->cel_contacto }} ,
                            <strong>Empresa </strong>: {{ $quotlist->empresa }},
                            <strong>Telefono</strong>: {{ $quotlist->telefono }},
                            <strong>Direccion</strong>: {{ $quotlist->direccion}}.</h5>
                        <h5> <strong>Especificaciones</strong>: {{ $quotlist->especificaciones }}</h5> 
                        <h5> <strong>Cotizacion</strong>: {{ $quotlist->cotizacion }}</h5> 
                        {{ HTML::link('/quotation/'.$quotlist->id.'/edit','Editar', array('class' => 'btn btn-default btn-sm'), false)}}                       
                        {{ Form::submit('Eliminar', array('class' => 'btn  btn-success btn-sm')) }}

                        {{ Form::model($quotation, array('url' => array('/quotation/'.$quotlist->id), 'method' => 'DELETE', 'role' => 'form')) }}
                        {{ Form::close() }}  							
                        <hr>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>  
<script>

    $('#scroll').slimScroll({
        size: '5px',
        railColor: '#222',
        height: '1070px',
        railOpacity: 0.3,
        wheelStep: 2,
        allowPageScroll: true
    });
</script>
@stop