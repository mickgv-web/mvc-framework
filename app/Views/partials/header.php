<header class="ui menu">
    <div class="ui container">

        <a href="<?= url('/') ?>" class="header item">
            Inicio
        </a>

        <a href="<?= url('contacto') ?>" class="item">
            Contactos
        </a>

        <div class="right menu">
            <?php if (\Core\Auth::check()): ?>
                <a href="<?= url('auth/logout') ?>" class="item">
                    Salir
                </a>
            <?php else: ?>
                <a href="<?= url('auth/login') ?>" class="item">
                    Entrar
                </a>
            <?php endif; ?>
        </div>

    </div>
</header>
