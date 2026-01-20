<?php $title = $title ?? 'Registro'; ?>

<h2 class="ui header"><?= $title ?></h2>

<?php if (!empty($error)): ?>
    <div class="ui negative message">
        <div class="header">Error</div>
        <p><?= $error ?></p>
    </div>
<?php endif; ?>

<form class="ui form" method="POST" action="<?= url('auth/register') ?>">

    <div class="field">
        <label>Nombre</label>
        <input type="text" name="nombre" required>
    </div>

    <div class="field">
        <label>Email</label>
        <input type="email" name="email" required>
    </div>

    <div class="field">
        <label>Contraseña</label>
        <input type="password" name="password" required>
    </div>

    <button class="ui primary button" type="submit">
        Crear cuenta
    </button>
</form>

<div class="ui divider"></div>

<a href="<?= url('auth/login') ?>" class="ui small button">
    Volver al login
</a>
