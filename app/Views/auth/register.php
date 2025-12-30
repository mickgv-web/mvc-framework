<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Crear cuenta</h1>

    <?php if (!empty($error)): ?>
        <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="<?= BASE_URL ?>/auth/register">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Contraseña:</label>
        <input type="password" name="password" required>

        <button type="submit">Registrarse</button>
    </form>

    <p><a href="<?= BASE_URL ?>/auth/login">Ya tengo cuenta</a></p>
</body>
</html>
