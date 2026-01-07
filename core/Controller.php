<?php

declare(strict_types=1);

namespace Core;

class Controller
{
    /**
     * Indica si el controlador requiere autenticación.
     * Por defecto: no.
     */
    protected bool $requiresAuth = false;

    /**
     * Lista de métodos públicos (no requieren login)
     * Solo se usa si $requiresAuth es true.
     */
    protected array $publicMethods = [];

    /**
     * Getter para saber si el controlador requiere auth.
     */
    public function requiresAuth(): bool
    {
        return $this->requiresAuth;
    }

    /**
     * Getter para saber qué métodos son públicos.
     */
    public function publicMethods(): array
    {
        return $this->publicMethods;
    }

    /**
     * Carga una vista y le pasa datos
     *
     * @param string $view  Ruta de la vista (sin .php)
     * @param array  $data  Datos para la vista
     */
    protected function view(string $view, array $data = [], string $layout = 'layouts/main'): void
    {
        extract($data, EXTR_SKIP);

        $basePath = __DIR__ . '/../app/Views/';

        $viewFile = $basePath . $view . '.php';

        if (!file_exists($viewFile)) {
            abort(500, "Vista no encontrada: $view");
        }

        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        $layoutFile = $basePath . $layout . '.php';

        if (!file_exists($layoutFile)) {
            abort(500, "Layout no encontrado: $layout");
        }

        require $layoutFile;
    }



    /**
     * Redirección HTTP usando helper global
     */
    protected function redirect(string $path): void
    {
        redirect($path);
    }
}
