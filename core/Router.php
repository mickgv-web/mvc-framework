<?php

namespace Core;

class Router
{
    public function dispatch(): void
    {
        // 1. Obtener la URL
        $url = $_GET['url'] ?? '';
        $url = trim($url, '/');
        $segments = $url === '' ? [] : explode('/', $url);

        // 2. Controlador, método y parámetros
        $controllerName = !empty($segments[0])
            ? ucfirst($segments[0]) . 'Controller'
            : 'HomeController';

        $method = $segments[1] ?? 'index';
        $params = array_slice($segments, 2);

        // 3. Resolver clase del controlador
        $controllerClass = 'App\\Controllers\\' . $controllerName;

        if (!class_exists($controllerClass)) {
            throw new \Exception("❌ Controlador no encontrado: $controllerClass");
        }

        $controller = new $controllerClass();

        if (!method_exists($controller, $method)) {
            throw new \Exception("❌ Método $method no existe en $controllerClass");
        }

        // Gestionar autenticación si es necesario
        if ($controller->requiresAuth()) {

            // Si el método está en la lista de públicos → dejar pasar
            if (!in_array($method, $controller->publicMethods(), true)) {

                // Si NO está autenticado → redirigir a login
                if (!\Core\Auth::check()) {
                    header("Location: " . BASE_URL . "/auth/login");
                    exit;
                }
            }
        }

        // 4. Ejecutar controlador y método
        call_user_func_array([$controller, $method], $params);
    }
}
