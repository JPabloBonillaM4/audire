<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo mensaje de contacto</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">
    <h2 style="color:#00b3a4;">Nuevo mensaje desde el formulario de contacto</h2>

    <p><strong>Nombre:</strong> {{ $contactName }}</p>
    <p><strong>Email:</strong> {{ $contactEmail }}</p>
    <p><strong>Asunto:</strong> {{ $contactSubject }}</p>

    <hr>

    <p><strong>Mensaje:</strong></p>
    <p style="white-space: pre-wrap;">{{ $contactMessage }}</p>
</body>
</html>
