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
        return $this->requiresAuth ?? false;
    }

    /**
     * Getter para saber qué métodos son públicos.
     */
    public function publicMethods(): array
    {
        return $this->publicMethods ?? [];
    }

    /**
     * Carga una vista y le pasa datos
     *
     * @param string $view  Ruta de la vista (sin .php)
     * @param array  $data  Datos para la vista
     */
    protected function view(string $view, array $data = []): void
    {
        // 1. Convertir array de datos en variables (modo seguro)
        extract($data, EXTR_SKIP);

        // 2. Ruta a la vista
        $viewFile = dirname(__DIR__) . '/app/Views/' . $view . '.php';

        if (!file_exists($viewFile)) {
            throw new \Exception("❌ Vista no encontrada: $view");
        }

        require $viewFile;
    }

    /**
     * Redirección HTTP
     */
    protected function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }
}
