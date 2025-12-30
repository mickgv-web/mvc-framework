<?php
declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    protected bool $requiresAuth = true;
    protected array $publicMethods = ['index'];

    /**
     * Lista todos los usuarios usando Eloquent
     */
    public function index(): void
    {
        $usuarios = Usuario::all();

        $this->view('usuario/index', [
            'title' => 'Listado de usuarios',
            'usuarios' => $usuarios
        ]);
    }

    /**
     * Muestra un usuario concreto
     * El parámetro es opcional para evitar errores fatales
     */
    public function show(int $id = null): void
    {
        // Si no se pasa ID → redirigir o lanzar error controlado
        if ($id === null) {
            // Puedes redirigir a index o mostrar una vista de error
            $this->redirect('/usuario/index');
        }

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
