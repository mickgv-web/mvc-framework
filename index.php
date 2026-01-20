<?php
declare(strict_types=1);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();

require_once __DIR__ . '/helpers/helpers.php';

require_once __DIR__ . '/vendor/autoload.php';

// Cargar las constantes clásicas 
require_once __DIR__ . '/config.php';

// Configuración de la aplicación
require_once __DIR__ . '/config/app.php';

// Inicialización de servicios
require_once __DIR__ . '/bootstrap/database.php';

use Core\Router;

$router = new Router();
$router->dispatch();
