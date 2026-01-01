<header>
    <nav>
        <a href="<?= url('/') ?>">Inicio</a>
        <a href="<?= url('contacto') ?>">Contactos</a>

        <?php if (\Core\Auth::check()): ?>
            <a href="<?= url('auth/logout') ?>">Salir</a>
        <?php else: ?>
            <a href="<?= url('auth/login') ?>">Entrar</a>
        <?php endif; ?>
    </nav>
</header>
