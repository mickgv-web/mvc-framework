<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <h1>Iniciar sesión</h1>

    <?php if (!empty($error)): ?>
        <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="<?= BASE_URL ?>/auth/login">
        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Contraseña:</label>
        <input type="password" name="password" required>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>
