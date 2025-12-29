<?php
declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        $data = [
            'title' => 'Bienvenido',
            'subtitle' => 'Mini‑framework MVC en PHP',
            'description' => 'Este es el punto de entrada genérico de tu aplicación.'
        ];

        $this->view('home/index', $data);
    }
}
