<?php

namespace Core;

class Router
{
    public function dispatch(): void
    {
        // 1. Obtener la URL limpia
        $url = $_GET['url'] ?? '';
        $url = trim($url, '/');
        $segments = $url === '' ? [] : explode('/', $url);

        // 2. Resolver controlador, método y parámetros
        $controllerName = !empty($segments[0])
            ? ucfirst($segments[0]) . 'Controller'
            : 'HomeController';

        $method = $segments[1] ?? 'index';
        $params = array_slice($segments, 2);

        // 3. Resolver clase del controlador
        $controllerClass = 'App\\Controllers\\' . $controllerName;

        if (!class_exists($controllerClass)) {
            abort(404, "Controlador no encontrado: $controllerClass");
        }

        $controller = new $controllerClass();

        // 4. Verificar método
        if (!method_exists($controller, $method)) {
            abort(404, "Método '$method' no existe en $controllerClass");
        }

        // 5. Gestión de autenticación
        if ($controller->requiresAuth()) {

            // Si el método NO es público
            if (!in_array($method, $controller->publicMethods(), true)) {

                // Y el usuario NO está autenticado
                if (!\Core\Auth::check()) {
                    redirect('auth/login');
                }
            }
        }

        // 6. Ejecutar el método del controlador
        try {
            call_user_func_array([$controller, $method], $params);
        } catch (\Throwable $e) {
            // Cualquier error interno → 500
            abort(500, $e->getMessage());
        }
    }
}
