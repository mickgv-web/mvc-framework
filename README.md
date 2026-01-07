# MVC Framework – Estado Actual del Proyecto

Mini‑framework MVC en PHP desarrollado de forma didáctica y progresiva durante el curso.  
El objetivo es construir una base clara, modular y extensible que permita crear aplicaciones web con un flujo MVC clásico y una arquitectura limpia.

---

## Características actuales

- Router simple y estable  
- Controladores con protección opcional por sesión  
- Sistema básico de autenticación (login, logout, registro)  
- Vistas organizadas por módulos  
- Modelos Eloquent para acceso a base de datos  
- Helpers globales para URL, redirecciones y errores  
- Flujo MVC completo y coherente  
- Estructura clara y fácil de extender  

---

## Estructura del proyecto

mvc-framework  
├── README.md  
├── app  
│   ├── Controllers  
│   │   ├── AuthController.php  
│   │   ├── HomeController.php  
│   │   └── UsuarioController.php  
│   ├── Models  
│   │   ├── Contacto.php  
│   │   └── Usuario.php  
│   └── Views  
│       ├── auth  
│       │   ├── login.php  
│       │   └── register.php  
│       ├── home  
│       │   └── index.php  
│       ├── layouts  
│       │   └── main.php  
│       ├── partials  
│       │   ├── footer.php  
│       │   └── header.php  
│       └── usuario  
│           ├── index.php  
│           └── show.php  
├── bootstrap  
│   └── database.php  
├── composer.json  
├── composer.lock  
├── config  
│   ├── app.php  
│   └── database.php  
├── config.php  
├── core  
│   ├── Auth.php  
│   ├── Controller.php  
│   └── Router.php  
├── helpers  
│   └── helpers.php  
├── index.php  
└── sql  
    └── schema.sql  

---

## Router

El Router interpreta URLs con el formato:

/controlador/método/param1/param2/...

Ejemplo:

/usuario/show/5  
→ Ejecuta: UsuarioController@show(5)

### Protección de rutas

Cada controlador puede definir:

protected bool $requiresAuth = true;  
protected array $publicMethods = ['index'];

Si requiresAuth es true y el método no está en publicMethods y el usuario no está autenticado → redirección a /auth/login.

---

## Sistema de Autenticación

Implementado mediante:

- AuthController → login, logout, register  
- Core\Auth → gestión de sesión  
- index.php → session_start()  

Flujo:

1. Usuario visita /auth/login  
2. Si POST → se valida email/contraseña  
3. Si correcto → Auth::login() guarda user_id en sesión  
4. Rutas protegidas verifican Auth::check()  
5. Logout elimina la sesión  

Incluye registro básico para facilitar pruebas.

---

## Controladores actuales

AuthController  

- login()  
- logout()  
- register()  

UsuarioController

- index() → público  
- show($id) → protegido  

HomeController  

- index() → público  

---

## Base Controller

Core\Controller ofrece:

- view()  
- redirect()  
- requiresAuth()  
- publicMethods()  

El Router consulta esta configuración sin acceder a propiedades protegidas.

---

## Helpers globales

Ubicados en helpers/helpers.php y cargados por Composer.

Incluyen:

- url()  
- asset()  
- redirect()  
- abort()  

Disponibles en toda la aplicación sin imports.

---

## Estado actual del proyecto

✔ Login funcionando  
✔ Logout funcionando  
✔ Registro funcionando  
✔ Rutas protegidas por sesión  
✔ Métodos públicos dentro de controladores protegidos  
✔ Router estable y claro  
✔ Eloquent funcionando  
✔ Helpers globales operativos  
✔ Flujo MVC completo  
✔ Listo para CRUDs reales  

---

## Next Steps (To‑Do)

1. Flash Messages  
   Mensajes temporales en sesión para errores, avisos y éxitos.  
   Base necesaria para mejorar UX y validaciones.

2. Gestión de errores global  
   - Página 404  
   - Página 500  
   - Handler centralizado de excepciones  
   Aporta robustez y evita pantallas en blanco.

3. Helper de Auth  
   Funciones tipo auth()->check() y auth()->user() para mejorar expresividad en controladores y vistas.

4. Validación mejorada  
   Reglas más completas para formularios y registro, aprovechando flash messages.

5. CRUD completo de usuarios  
   Crear, editar, actualizar y borrar usuarios.  
   Primer CRUD real para consolidar el framework.

---

## Ideas Futuras (Posibles mejoras si escala)

Estas mejoras podrían aportar ergonomía y expresividad sin convertir el framework en algo pesado:

- route() helper para generar URLs por nombre.  
- view() más flexible (compact, objetos, etc.).  
- redirect()->with() para flash messages expresivos.  
- session() helper para leer/escribir sesión de forma más limpia.  
- dd() y dump() para depuración rápida.  
- old() para repoblar formularios tras errores.  
- config() para acceder a configuración con sintaxis simple.  
- abort_if() y abort_unless() para control de flujo más limpio.  
- asset_versioned() para cache busting en desarrollo.  
- partial() para cargar vistas parciales por convención.
