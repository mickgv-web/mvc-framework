<?php $title = $title ?? 'Usuarios'; ?>

<h1><?= $title ?></h1>

<ul>
    <?php foreach ($usuarios as $usuario): ?>
    <li>
        <?= $usuario->nombre ?> — <?= $usuario->email ?>
        | <a href="<?= url('usuario/show/' . $usuario->usuario_id) ?>">Ver</a>
    </li>
    <?php endforeach; ?>
</ul>

