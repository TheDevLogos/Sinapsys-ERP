# Auditoría Completa del Sistema ERP - Resumen Ejecutivo

## Fecha: 2026-04-07

---

## 1. Arquitectura del Sistema

### Stack Tecnológico
- **Backend**: PHP 8.x con PDO/SQLSRV
- **Base de Datos**: SQL Server (Azure/On-Premise)
- **Frontend**: HTML5 + CSS3 + JavaScript vanilla + jQuery
- **APIs**: RESTful endpoint en `erp-api.php`
- **Frameworks UI**: Bootstrap 5 + FullCalendar + Chart.js + Leaflet (GIS)

### Estructura de Directorios
```
sistema/
├── api/
│   └── erp-api.php           # API REST centralizada
├── assets/
│   ├── css/                  # Estilos ERP
│   ├── js/                   # JavaScript módulos
│   └── image/                # Recursos gráficos
├── config/
│   └── menu-config.php       # Configuración de menús
├── database/                 # Scripts SQL
├── modulo/
│   ├── admin/                # Módulos administrativos
│   ├── header/               # Header, sidebar
│   └── usuario/              # Módulos de usuario
└── data/
    ├── config.php            # Configuración BD
    └── conexion.php          # Conexión PDO
```

---

## 2. Módulos Implementados

### Módulos ERP Core
| Módulo | Estado | Archivo Principal |
|--------|--------|------------------|
| Dashboard | ✅ Funcional | `dashboard.php` |
| Calendario | ✅ Funcional | `calendario.php` |
| Proyectos | ✅ Funcional | `proyectos.php` |
| Tareas | ✅ Funcional | `tareas.php` |
| Metas | ✅ Funcional | `metas.php` |
| Organización | ✅ Funcional | `organizacion.php` |
| Portafolio | ✅ Funcional | `portafolio.php` |
| GIS/SIG | ✅ Funcional | `gis.php` |

### Módulos MIR/Desempeño
| Módulo | Estado |
|--------|--------|
| Status MIR | ✅ Funcional |
| Avance Trimestral | ✅ Funcional |
| ODS 20-30 | ✅ Funcional |
| Competitividad Urbana | ✅ Funcional |
| Guía Desempeño Municipal | ✅ Funcional |
| PMTODU | ✅ Funcional |

---

## 3. Modelo de Datos - Entidades

### Tablas Principales
```
dbo.Entidades (clave VARCHAR(120), entidad NVARCHAR(255))
├── dbo.User_Data (id, username, nombre, clave_entidad, rol)
├── erp_proyectos (id, nombre, estado, clave_entidad, ...)
├── erp_tareas (id, titulo, estado, proyecto_id, clave_entidad, ...)
├── erp_metas (id, titulo, valor_objetivo, clave_entidad, ...)
├── erp_eventos (id, titulo, fecha, publico, clave_entidad, ...)
├── erp_actividad (id, tipo, descripcion, clave_entidad, ...)
├── erp_organizacion (...)
└── erp_portafolios / erp_portafolio_items (...)
```

### Relaciones
- `User_Data.clave_entidad` → `Entidades.clave`
- Tablas ERP con `clave_entidad` → `Entidades.clave`
- Proyectos ↔ Tareas (1:N)
- Proyectos ↔ Metas (1:N)
- Proyectos/Tareas/Metas ↔ Eventos (deadlines)

---

## 4. Control de Accesos (RBAC)

### Roles
| Rol | Descripción | Acceso |
|-----|-------------|-------|
| `admin` | Administrador | Full (CRUD en todo) |
| `editor` | Editor | Lectura + Edición limitada |
| `user` | Usuario | Lectura + Propios |
| `view` | Visitante | Solo lectura |

### Filtros por Entidad
- Admin ve todas las entidades (selector disponible)
- Otros roles ven solo datos de su entidad
- `$_SESSION['user']->clave_entidad` como fuente de verdad

---

## 5. Correcciones Realizadas (2026-04-07)

### Problema: Inconsistencia de campos de entidad
**Síntoma**: Usuarios no podían ver datos de su entidad al hacer login.

**Causa raíz**:
- `User_Data` usa `clave_entidad`
- Tablas ERP usaban `entidad_clave` o `clave` inconsistemente

**Solución implementada**:
1. API actualizadas con detección dinámica de columnas
2. Prioridad: `clave_entidad` > `entidad_clave` > `clave`
3. Helper functions para generación de consultas

### Archivos Modificados
- `sistema/api/erp-api.php`

### Script de Migración
- `sistema/database/sqlserver_final_entidad_fix.sql`

---

## 6. Pendientes de Ejecución

### Scripts SQL por ejecutar
1. **`sqlserver_final_entidad_fix.sql`** - Script completo con:
   - Conversión de `Entidades.clave` a VARCHAR
   - Agregar `clave_entidad` a tablas ERP
   - Migrar datos existentes
   - Insertar 5+ proyectos, 6+ tareas, 5+ metas, 6+ eventos

### Verificaciones Post-Ejecución
1. Login como usuario no-admin
2. Verificar que Dashboard muestra datos de su entidad
3. Verificar que Tareas/Metas filtran correctamente
4. Probar CRUD desde Admin con selector de entidad

---

## 7. Métricas del Sistema

| Métrica | Valor |
|---------|-------|
| Total archivos PHP | ~80 |
| Scripts SQL | 15+ |
| Módulos ERP | 8 |
| Líneas de código (API) | ~2500 |
| Roles soportados | 4 |
| Entidades en BD | 20+ |

---

## 8. Recomendaciones

### Corto Plazo
1. ✅ Ejecutar script de migración
2. ✅ Probar flujo completo de usuarios
3. ✅ Validar Dashboard con datos reales

### Mediano Plazo
1. Implementar sistema de auditoría/logs
2. Agregar notificaciones por email
3. Exportación PDF/Excel para reportes
4. Módulo de adjuntos/evidencias

### Largo Plazo
1. Migración a framework moderno (Laravel/Symfony)
2. Implementar GraphQL
3. WebSockets para notificaciones real-time
4. Dockerización del ambiente

---

## 9. Archivos Clave para Referencia

| Archivo | Descripción |
|---------|-------------|
| `GEMINI.md` | Contexto y backlog del proyecto |
| `todo.md` | Bitácora de desarrollo |
| `ERP_DATA_MODEL.md` | Diagrama del modelo de datos |
| `copilot-instructions.md` | Instrucciones de desarrollo |

---

*Auditoría realizada: 2026-04-07*
*Herramienta: Kilo Code + VS Code*
