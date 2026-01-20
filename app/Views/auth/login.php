<?php $title = $title ?? 'Iniciar sesión'; ?>

<h1><?= $title ?></h1>

<?php $error = $error ?? null; ?>
<?php if ($error): ?>
    <p style="color:red;"><?= $error ?></p>
<?php endif; ?>

<form method="POST" action="<?= url('auth/login') ?>">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Entrar</button>
</form>

<p>
    <a href="<?= url('auth/register') ?>">Registrarse</a>
</p>
