<?php $title = $title ?? 'Iniciar sesión'; ?>

<h2 class="ui header"><?= $title ?></h2>

<?php if (!empty($error)): ?>
    <div class="ui negative message">
        <div class="header">Error</div>
        <p><?= $error ?></p>
    </div>
<?php endif; ?>

<form class="ui form" method="POST" action="<?= url('auth/login') ?>">

    <div class="field">
        <label>Email</label>
        <input type="email" name="email" required>
    </div>

    <div class="field">
        <label>Contraseña</label>
        <input type="password" name="password" required>
    </div>

    <button class="ui primary button" type="submit">
        Entrar
    </button>
</form>

<div class="ui divider"></div>

<a href="<?= url('auth/register') ?>" class="ui small button">
    Crear cuenta
</a>
