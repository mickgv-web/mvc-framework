<?php $title = $title ?? 'Detalle de usuario'; ?>

<h1><?= $title  ?></h1>

<p><strong>ID:</strong> <?= $usuario->usuario_id ?></p>
<p><strong>Nombre:</strong> <?= $usuario->nombre ?></p>
<p><strong>Email:</strong> <?= $usuario->email ?></p>

<p><a href="<?= url('usuario/index') ?>">Volver al listado</a></p>