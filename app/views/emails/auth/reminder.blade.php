<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Password Reset</h2>

		<div>
			Para restablecer su contraseña, rellene este formulario: {{ URL::to('password/reset', array($token)) }}.<br/>
			Este enlace expirará en{{ Config::get('auth.reminder.expire', 60) }} minutos.
		</div>
	</body>
</html>
