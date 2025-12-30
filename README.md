# MVC Framework – Estado Actual del Proyecto

Este proyecto es un mini‑framework MVC en PHP, construido de forma didáctica y progresiva durante el curso.  
Actualmente incluye:

- Router simple y funcional  
- Controladores con protección opcional por sesión  
- Sistema básico de autenticación (login, logout, registro)  
- Vistas organizadas por carpetas  
- Modelos Eloquent para acceso a base de datos  
- Flujo de trabajo claro y coherente con MVC clásico  

---

## Estructura del proyecto (simplificada)

/app
/Controllers
AuthController.php
UsuarioController.php
/Models
Usuario.php
/Views
/auth
login.php
register.php
/usuario
index.php
show.php

/core
Router.php
Controller.php
Auth.php

index.php

Código

---

## Funcionamiento del Router

El Router interpreta la URL en formato:

/controlador/método/param1/param2/...

Código

Ejemplo:

/usuario/show/5

Código

→ UsuarioController@show(5)

El Router también gestiona la protección de rutas:

Cada controlador puede definir:

protected bool $requiresAuth = true;
protected array $publicMethods = ['index'];

Código

Si un método no está en `publicMethods` y el usuario no está logueado → redirección a `/auth/login`.

---

## Sistema de Autenticación

Implementado en:

- AuthController → login, logout, register  
- Auth → gestión de sesión (check, login, logout)  
- index.php → session_start() para activar sesiones  

Flujo actual:

1. Usuario visita `/auth/login`  
2. Si POST → se valida email/contraseña  
3. Si correcto → Auth::login() guarda user_id en sesión  
4. Rutas protegidas verifican Auth::check()  
5. Logout elimina la sesión  

También se añadió registro para facilitar pruebas.

---

## Controladores actuales

### AuthController
- login()
- logout()
- register()

### UsuarioController
- index() → público
- show($id) → protegido

---

## Base Controller

Core\Controller ahora incluye:

- view()
- redirect()
- requiresAuth()
- publicMethods()

Esto permite que el Router consulte la configuración sin acceder a propiedades protegidas.

---

## Estado actual del proyecto

✔ Login funcionando  
✔ Logout funcionando  
✔ Registro funcionando  
✔ Controladores protegidos por sesión  
✔ Métodos públicos dentro de controladores protegidos  
✔ Router estable y claro  
✔ Eloquent funcionando para usuarios  
✔ Flujo MVC completo y coherente  
✔ Perfecto para empezar CRUDs reales  

---

# Next Steps (To‑Do)

Estas mejoras están previstas para implementar más adelante:

### 1. Flash Messages  
Mensajes temporales en sesión para errores, avisos y éxitos.

### 2. Helper de Auth  
Funciones tipo `auth()->check()` o `auth()->user()`.

### 3. Helper de URL  
Funciones como `url('usuario/show/5')` o `asset('css/style.css')`.

### 4. Gestión de errores global  
- Página 404  
- Página 500  
- Handler centralizado para excepciones  

### 5. Mejoras en validación  
Validaciones más completas para registro y formularios.

### 6. CRUD completo de usuarios  
Crear, editar, borrar usuarios con vistas y controladores.