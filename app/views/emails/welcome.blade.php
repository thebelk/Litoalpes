<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- If you delete this meta tag, Half Life 3 will never be released. -->
<meta name="viewport" content="width=device-width" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Bienvenido a Litoalpes!</title>

<link rel="stylesheet" type="text/css" href="email.css" />

</head>

<body>
	<div class="container">
		<div class="content">
			<p class="lead">Envío de Cotización electrónica.</p>
			</br>
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
			<p>{{ $cotizacion }}</p>
		</div> <!-- /content -->
	</div>
</body>
</html>