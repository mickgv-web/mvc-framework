# Backlog

Lista ligera de ideas, mejoras y tareas para el framework.  
No es un compromiso, solo un sitio donde aparcar buenas ideas.

---

## ✔ Hecho recientemente (progreso real)

- [x] Crear helpers globales, solo para casos concretos de necesidades de vistas.
- [x] Definir prioridades claras para helpers críticos del front
- [x] Aclarar dependencias entre flash messages, old(), session() y redirect()->with()
- [x] Decidir que el CRUD de usuarios será el campo de pruebas principal
- [x] Establecer que AJAX será soportado para acciones atómicas (like, favorito, seguir…)
- [x] Incluir View Transition API como mejora futura del MPA
- [x] Crear backlog.md como memoria externa ligera
- [x] Acordar que helpers deben nacer de necesidades reales, no teoría
- [x] Validar que el framework crecerá desde el uso, no desde la especulación

---

## 🟩 Prioridad Alta (para el front inmediato)

- [ ] Flash messages (errores, éxito)
- [ ] Helper `old()` para repoblar formularios
- [ ] Helper `session()` para leer datos de sesión
- [ ] `redirect()->with()` para flujo POST → redirect → GET

---

## 🟨 Prioridad Media (ergonomía y expresividad)

- [ ] Mejorar `view()` (compact(), objetos, múltiples argumentos)
- [ ] Helper `route()` para generar URLs limpias
- [ ] Caso de uso CRUD completo (usuarios + contactos)

---

## 🟦 Experimentos / Modernización

- [ ] Implementar `json()` helper para endpoints AJAX
- [ ] Caso de uso AJAX: Like / Favorito / Seguir
- [ ] Probar View Transition API para navegación suave
- [ ] Documentar ejemplo AJAX + transición visual

---

## 🟪 Ideas futuras (cuando el framework respire)

- [ ] Unit Testing para el core del MVC y helpers criticos
- [ ] Sistema ligero de layouts / secciones
- [ ] Parciales (`partial()`)
- [ ] Configuración centralizada (`config()`)
- [ ] Paginación simple
- [ ] Filtros y ordenación en listados
- [ ] BBDD más compleja para probar escalabilidad

---

## 📝 Notas sueltas (inbox de ideas)

- Helpers deben nacer de necesidades reales, no teoría o dogmas
- Mantener el framework ligero y expresivo
- Documentar decisiones arquitectónicas previas cuando se estabilice la base del MVC
