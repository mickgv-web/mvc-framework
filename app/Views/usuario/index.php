<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Usuarios' ?></title>
</head>
<body>
    <h1><?= $title ?? 'Usuarios' ?></h1>

    <ul>
        <?php foreach ($usuarios as $usuario): ?>
            <li>
                <?= $usuario->nombre ?> — <?= $usuario->email ?>
                | <a href="<?= BASE_URL ?>/usuario/show/<?= $usuario->usuario_id ?>">Ver</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
