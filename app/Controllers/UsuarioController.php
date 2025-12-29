<?php
declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * Lista todos los usuarios usando Eloquent
     */
    public function index(): void
    {
        // Consulta real a la BBDD
        $usuarios = Usuario::all();

        $this->view('usuario/index', [
            'title' => 'Listado de usuarios',
            'usuarios' => $usuarios
        ]);
    }

    /**
     * Muestra un usuario concreto
     */
    public function show(int $id): void
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            throw new \Exception("Usuario no encontrado");
        }

        $this->view('usuario/show', [
            'title' => "Detalle del usuario",
            'usuario' => $usuario
        ]);
    }
}
