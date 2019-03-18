<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
</head>
<body>
    <h2>Estimado, {{$name}}</h2>
    <h2><strong>Usted ha sido registrado como usuario Sistema Condor</strong></h2>
    <p>Por favor confirma tu correo electrónico.</p>
    <p>Para ello simplemente debes hacer click en el siguiente enlace:</p>
    <a href="{{ url('/register/verify/'. $url ) }}">
        Clic para confirmar tu email
    </a>
    <p>Para poder acceder a esta aplicaciòn requieres de los siguientes datos:</p>
    <p>usuario: {{$user}} o su cédula de identidad</p>
    <p>contraseña: {{$password}}</p>



</body>
</html>