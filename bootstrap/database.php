<?php

use Illuminate\Database\Capsule\Manager as Capsule;

// Cargar configuración
$db = require __DIR__ . '/../config/database.php';

// Crear instancia de Eloquent
$capsule = new Capsule;

$capsule->addConnection($db);
$capsule->setAsGlobal();
$capsule->bootEloquent();
