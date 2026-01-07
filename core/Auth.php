<?php
declare(strict_types=1);

namespace Core;

use App\Models\Usuario;

class Auth
{

    public static function check(): bool
    {
        return isset($_SESSION['user_id']);
    }

    public static function userId(): ?int
    {
        return $_SESSION['user_id'] ?? null;
    }

    public static function user(): ?Usuario
    {
        $id = self::userId();
        return $id ? Usuario::find($id) : null;
    }

    public static function login(int $userId): void
    {
        $_SESSION['user_id'] = $userId;
    }

    public static function logout(): void
    {
        unset($_SESSION['user_id']);
    }

    public static function attempt(string $email, string $password): bool
    {
        $usuario = Usuario::where('email', $email)->first();

        if (!$usuario) {
            return false;
        }

        if (!password_verify($password, $usuario->password)) {
            return false;
        }

        self::login($usuario->usuario_id);
        return true;
    }
}
