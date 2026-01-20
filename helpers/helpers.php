<?php

// Helper para generar URL base
function url(string $path = ''): string
{
    if (!defined('BASE_URL')) {
        throw new RuntimeException('BASE_URL no está definido.');
    }

    $base = rtrim(BASE_URL, '/');
    $path = ltrim($path, '/');

    return $path === '' ? $base : $base . '/' . $path;
}

// Helper para cargar assets (CSS, JS)
function asset(string $path): string
{
    if (!defined('BASE_URL')) {
        throw new RuntimeException('BASE_URL no está definido.');
    }

    $base = rtrim(BASE_URL, '/');
    $path = ltrim($path, '/');
    return $base . '/assets/' . $path;
}

// Helper para abortar y mostrar error
function abort(int $code = 404, string $message = ''): void
{
    header("Content-Type: text/html; charset=UTF-8");
    http_response_code($code);

    // Ruta a la vista de error personalizada
    $view = dirname(__DIR__) . "/app/Views/errors/$code.php";

    // Si existe una vista específica → usarla
    if (file_exists($view)) {
        require $view;
        exit;
    }

    // Si no existe → fallback plano
    if ($message === '') {
        $message = match ($code) {
            404 => 'Página no encontrada',
            500 => 'Error interno del servidor',
            default => 'Ha ocurrido un error'
        };
    }

    echo "<h1>Error $code</h1>";
    echo "<p>$message</p>";
    exit;
}

// Helper para redirección
function redirect(string $path, int $code = 302): void
{
    if (!defined('BASE_URL')) {
        throw new RuntimeException('BASE_URL no está definido.');
    }

    $location = url($path);
    http_response_code($code);
    header("Location: $location");
    exit;
}
