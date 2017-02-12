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
				<p style="position:absolute;top:254px;left:61px;white-space:nowrap"><i>Cartagena&#160;de Indias,{{Auth::user()->created_at }}</i></p>
				<p style="position:absolute;top:311px;left:61px;white-space:nowrap"><i>Señores:</i></p>
				<p style="position:absolute;top:338px;left:61px;white-space:nowrap"><b>@if($empresa==null){{ $cliente }}.  @else {{ $empresa }}. @endif </b></p>
				<p style="position:absolute;top:332px;left:61px;white-space:nowrap"><b>Nit/C.C.&#160;{{ $nit_cc }}.</b></p>
				<p style="position:absolute;top:393px;left:61px;white-space:nowrap"><i>Teléfonos: {{ $cel_contacto }} - {{ $telefono }}.</p><br><br> 				
				<p style="position:absolute;top:438px;left:61px;white-space:nowrap">Estimado/a {{ $cliente }}, de acuerdo a su amable solicitud de cotización.</p>
				<p style="position:absolute;top:549px;left:88px;white-space:nowrap">{{ $clase_trabajo }}.</p>
				<p style="position:absolute;top:652px;left:88px;white-space:nowrap">{{ $especificaciones }}</p><br>
				<p style="position:absolute;top:620px;left:88px;white-space:nowrap">Enviamos la siguiente cotización:</p>
				<p style="position:absolute;top:51px;left:88px;white-space:nowrap"> {{ $cotizacion }} </p><br><br>
				<p style="position:absolute;top:981px;left:61px;white-space:nowrap">En&#160;espera de su respuesta</p>
				<p style="position:absolute;top:1029px;left:61px;white-space:nowrap"><i>Atentamente,{{Auth::user()->razon_social}}</i></p>				
				<p style="position:absolute;top:1119px;left:266px;white-space:nowrap"><i> Direc.{{Auth::user()->direccion}}, Tels.{{Auth::user()->telefono}}-{{Auth::user()->celular}}.</i></p>
				<p style="position:absolute;top:1138px;left:265px;white-space:nowrap"><i>E-mail:{{Auth::user()->email}} , {{Auth::user()->otro}}</i></p>
				<p style="position:absolute;top:1158px;left:355px;white-space:nowrap"><i>{{Auth::user()->ciudad}} - {{Auth::user()->pais}}</i></p>
				
				</br>
				
				<p class="lead">Envío de Cotización electrónica LitoAPP.</p>
			</div>
		</div> <!-- /content -->
	</div>
</body>
</html>