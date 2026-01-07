<?php
declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;
use Core\Auth;
use App\Models\Usuario;

class AuthController extends Controller
{
    protected bool $requiresAuth = false;
    protected array $publicMethods = ['login', 'register'];

    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('auth/login');
            return;
        }

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!Auth::attempt($email, $password)) {
            $this->view('auth/login', ['error' => 'Credenciales incorrectas']);
            return;
        }

        redirect('/');
    }

    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('auth/register');
            return;
        }

        $nombre = trim($_POST['nombre'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($nombre === '' || $email === '' || $password === '') {
            $this->view('auth/register', ['error' => 'Todos los campos son obligatorios']);
            return;
        }

        if (Usuario::where('email', $email)->exists()) {
            $this->view('auth/register', ['error' => 'El email ya está registrado']);
            return;
        }

        $usuario = Usuario::create([
            'nombre' => $nombre,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        Auth::login($usuario->usuario_id);
        redirect('/');
    }

    public function logout(): void
    {
        Auth::logout();
        redirect('auth/login');
    }
}
