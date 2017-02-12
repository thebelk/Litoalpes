<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- If you delete this meta tag, Half Life 3 will never be released. -->
<meta name="viewport" content="width=device-width" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Bienvenido a LitoApp!</title>
<link rel="stylesheet" type="text/css" href="email.css" />

</head>

<body>
	<div class="container">
		<div class="content-email">
			<div id="page1-div" style="position:relative;width:918px;height:1188px;">
				<p style="position:absolute;top:254px;left:61px;white-space:nowrap" class="ft00"><i>Cartagena&#160;de Indias,{{Auth::user()->created_at }}</i></p>
				<p style="position:absolute;top:311px;left:61px;white-space:nowrap" class="ft01"><i>Señores:</i></p>
				<p style="position:absolute;top:338px;left:61px;white-space:nowrap" class="ft02"><b>@if($empresa==null){{ $cliente }}.  @else {{ $empresa }}. @endif </b></p>
				<p style="position:absolute;top:332px;left:61px;white-space:nowrap" class="ft02"><b>Nit/C.C.&#160;{{ $nit_cc }}.</b></p>
				<p style="position:absolute;top:393px;left:61px;white-space:nowrap" class="ft01"><i>Contacto:{{ $cel_contacto }},{{ $telefono }}</p><br><br> 				
				<p style="position:absolute;top:438px;left:61px;white-space:nowrap" class="ft05">Estimado/a {{ $cliente }},de acuerdo a su amable solicitud de cotización.</p>
				<p style="position:absolute;top:549px;left:88px;white-space:nowrap" class="ft08">{{ $clase_trabajo }}</p>
				<p style="position:absolute;top:652px;left:88px;white-space:nowrap" class="ft08">{{ $especificaciones }}</p><br>
				<p style="position:absolute;top:620px;left:88px;white-space:nowrap" class="ft08">Enviamos la siguiente cotización:</p>
				<p style="position:absolute;top:51px;left:88px;white-space:nowrap" class="ft08"> {{ $cotizacion }} </p><br><br>
				<p style="position:absolute;top:981px;left:61px;white-space:nowrap" class="ft04">En&#160;espera de su respuesta</p>
				<p style="position:absolute;top:1029px;left:61px;white-space:nowrap" class="ft00"><i>Atentamente,{{Auth::user()->razon_social}}</i></p>				
				<p style="position:absolute;top:1119px;left:266px;white-space:nowrap" class="ft06"><i>{{Auth::user()->direccion}},{{Auth::user()->telefono}},{{Auth::user()->celular}}</i></p>
				<p style="position:absolute;top:1138px;left:265px;white-space:nowrap" class="ft06"><i>{{Auth::user()->email}}&#160;, {{Auth::user()->otro}}</i></p>
				<p style="position:absolute;top:1158px;left:355px;white-space:nowrap" class="ft06"><i>{{Auth::user()->ciudad}} - {{Auth::user()->pais}}</i></p>
				
				</br><!--
				<h3>Estimado/a {{ $cliente }},</h3>
				</br>
				<p><b>NIT/CC:</b> {{ $nit_cc }}</p>
				<p><b>Contacto:</b> {{ $cel_contacto }}</p>
				<p><b>Empresa:</b> {{ $empresa }}</p>			
				<p><b>Telefono:</b> {{ $telefono }}</p>			
				<h3>COTIZACIÓN:</h3>	
				</br>
				<p><b>Clase de Trabajo:</b></p>
				<p>{{ $clase_trabajo }}</p>
				<p><b>Especificaciones:</b></p>			
				<p>{{ $especificaciones }}</p>
				<h4><b>Cotización:</b></h4>
				<p>{{ $cotizacion }}</p>-->
				
				<p class="lead">Envío de Cotización electrónica LitoAPP.</p>
			</div>
		</div> <!-- /content -->
	</div>
</body>
</html>