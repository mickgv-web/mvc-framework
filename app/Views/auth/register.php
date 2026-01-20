<?php $title = $title ?? 'Registro'; ?>

<h1><?= $title ?></h1>

<?php $error = $error ?? null; ?>
<?php if ($error): ?>
    <p style="color:red;"><?= $error ?></p>
<?php endif; ?>

<form method="POST" action="<?= url('auth/register') ?>">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Crear cuenta</button>
</form>

<p>
    <a href="<?= url('auth/login') ?>">Volver al login</a>
</p>
