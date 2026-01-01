<?php

function url(string $path = ''): string
{
    $base = rtrim(BASE_URL, '/');
    $path = ltrim($path, '/');

    return $path === '' ? $base : $base . '/' . $path;
}

function asset(string $path): string
{
    $base = rtrim(BASE_URL, '/');
    $path = ltrim($path, '/');
    return $base . '/assets/' . $path;
}

function abort(int $code = 404, string $message = ''): void
{
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

function redirect(string $path, int $code = 302): void
{
    $location = url($path);
    http_response_code($code);
    header("Location: $location");
    exit;
}
