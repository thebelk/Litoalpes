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
			<h3>Estimado/a {{ $cliente }},</h3>
			<p class="lead">Envío de Cotización electrónica.</p>
			</br>
			<h4>Datos de Contacto:</h4>
			</br>
			<p>NIT/CC: {{ $nit_cc }}</p>
			</br>
			<p>Empresa: {{ $empresa }}</p>
			</br>
			<p>Número de Contacto: {{ $cel_contacto }}</p>
			</br>
			<p>Telefono: {{ $telefono }}</p>
			</br>
			<p>Dirección: {{ $direccion }}</p>
			</br>
			<p>Ciudad: {{ $ciudad }}</p>
			</br>
			<p>País: {{ $pais }}</p>
			</br>
			<h4>Especificaciones de Cotización:</h4>
			</br>
			<p>Clase de Trabajo: {{ $clase_trabajo }}</p>
			</br>
			<p>Estado de Cotización: {{ $estado_cotizacion }}</p>
			</br>
			<p>{{ $especificaciones }}</p>
			</br>
			<h4>Cotización:</h4>
			</br>
			<p>{{ $cotizacion }}</p>
		</div> <!-- /content -->
	</div>
</body>
</html>