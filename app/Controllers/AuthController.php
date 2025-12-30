<?php
declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;
use Core\Auth;
use App\Models\Usuario;

class AuthController extends Controller
{
    public function login(): void
    {
        // Si es GET → mostrar formulario
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('auth/login');
            return;
        }

        // Si es POST → procesar login
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $usuario = Usuario::where('email', $email)->first();

        if (!$usuario || !password_verify($password, $usuario->password)) {
            $this->view('auth/login', [
                'error' => 'Credenciales incorrectas'
            ]);
            return;
        }

        Auth::login($usuario->usuario_id);

        $this->redirect(BASE_URL . '/');
    }

    public function logout(): void
    {
        Auth::logout();
        $this->redirect(BASE_URL . '/auth/login');
    }
}
