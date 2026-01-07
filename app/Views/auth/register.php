<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Registro</h1>

    <?php if (!empty($error)): ?>
        <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="<?= BASE_URL ?>/auth/register">
        <label>Nombre:</label><br>
        <input type="text" name="nombre"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email"><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password"><br><br>

        <button type="submit">Crear cuenta</button>
    </form>

    <p><a href="<?= url('auth/login') ?>">Volver al login</a></p>
</body>
</html>
