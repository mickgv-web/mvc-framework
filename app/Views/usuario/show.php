<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Detalle de usuario' ?></title>
</head>
<body>
    <h1><?= $title ?? 'Detalle de usuario' ?></h1>

    <p><strong>ID:</strong> <?= $usuario->usuario_id ?></p>
    <p><strong>Nombre:</strong> <?= $usuario->nombre ?></p>
    <p><strong>Email:</strong> <?= $usuario->email ?></p>

    <p><a href="<?= BASE_URL ?>/usuario/index">Volver al listado</a></p>
</body>
</html>
