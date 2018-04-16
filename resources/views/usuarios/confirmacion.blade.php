<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
</head>
<body>
    <h2>Hola {{ $name }}, gracias por registrarte en <strong>CoinClub</strong>!</h2><br>
    <p>Por favor confirma tu correo electronico.</p>
    <p>Para ello simplemente debes hacer click en el siguiente enlace:</p><br>

    <h3><a href="{{ url('/confirmacion/' . $codigo) }}">
        Clic para confirmar tu email
    </a></h3>
</body>
</html>