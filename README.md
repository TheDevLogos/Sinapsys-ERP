# SINAPSYS ERP

**Sistema Integral de Administración, Planeación y Seguimiento para el Municipio de Delicias**

SINAPSYS ERP es una plataforma institucional desarrollada para centralizar la administración de información, proyectos, metas, indicadores, actividades, calendarios, evaluaciones y visualización geoespacial de las distintas entidades del Municipio de Delicias. Su objetivo principal es resolver la dispersión operativa y la falta de control unificado sobre la información estratégica de gobierno, proporcionando una base sólida para la toma de decisiones, el seguimiento de resultados y la coordinación entre dependencias.

---

## Descripción del proyecto

El desarrollo de SINAPSYS ERP nació de una necesidad real: no existía un sistema único capaz de administrar de forma ordenada la información operativa y estratégica de todas las entidades municipales, ni de ofrecer trazabilidad sobre proyectos, metas, indicadores, avances y reportes para más de 232 usuarios con acceso al sistema. Esta situación generaba duplicidad de esfuerzos, falta de visibilidad, dificultad para consolidar datos y limitaciones para evaluar resultados de manera oportuna.

A partir de este problema, se diseñó una solución web institucional con arquitectura modular, enfoque por entidad, control de accesos por rol y una lógica orientada a la planeación estratégica, el seguimiento de desempeño y la gestión documental-operativa. El resultado es un ERP municipal que integra gestión, evaluación y visualización de información en un solo entorno.

---

## Problema que resuelve

Antes de SINAPSYS ERP, la información del municipio se encontraba distribuida entre múltiples fuentes, archivos aislados, procesos manuales y reportes sin unificador central. Esto provocaba:

- Dificultad para concentrar información por entidad.
- Falta de visibilidad en proyectos, metas y avances.
- Poca trazabilidad sobre actividades y responsables.
- Consulta fragmentada de indicadores y resultados.
- Ausencia de una plataforma integral para usuarios operativos, administrativos y de evaluación.

SINAPSYS ERP fue creado para resolver ese vacío mediante una arquitectura centralizada, escalable y funcional.

---

## Objetivos del sistema

- Centralizar la información institucional en una sola plataforma.
- Administrar proyectos, tareas, metas e indicadores por entidad.
- Dar seguimiento a resultados, avances y cumplimiento.
- Facilitar la consulta de dashboards y reportes ejecutivos.
- Integrar módulos de evaluación, planeación y georreferenciación.
- Controlar accesos mediante roles y entidades.
- Mejorar la eficiencia operativa de los equipos municipales.

---

## Alcance institucional

El sistema fue diseñado para operar dentro del ecosistema administrativo del Municipio de Delicias, dando soporte a:

- Dependencias y entidades municipales.
- Usuarios operativos y administrativos.
- Procesos de planeación estratégica.
- Evaluación de desempeño.
- Seguimiento de metas e ինտérpretes de resultados.
- Visualización de información territorial mediante SIG/Mapas.

Actualmente, la plataforma da servicio a más de 232 usuarios con diferentes niveles de acceso y responsabilidades.

---

## Arquitectura tecnológica

SINAPSYS ERP fue desarrollado con un enfoque pragmático, estable y compatible con infraestructura gubernamental existente.

- **Backend:** PHP 8.x con PDO/SQLSRV.
- **Base de datos:** SQL Server, en entornos Azure y on-premise.
- **Frontend:** HTML5, CSS3, JavaScript vanilla y jQuery.
- **API central:** `erp-api.php`.
- **UI y componentes:** Bootstrap 5, FullCalendar, Chart.js y Leaflet.

Esta combinación permitió construir un sistema robusto, ligero y adaptable a requerimientos institucionales.

---

## Estructura del proyecto

```text
sistema/
├── api/
│   └── erp-api.php
├── assets/
│   ├── css/
│   ├── js/
│   └── image/
├── config/
│   └── menu-config.php
├── database/
├── modulo/
│   ├── admin/
│   ├── header/
│   └── usuario/
└── data/
    ├── config.php
    └── conexion.php
```

---

## Módulos implementados

### ERP Core
- Dashboard.
- Calendario.
- Proyectos.
- Tareas.
- Metas.
- Organización.
- Portafolio.
- SIG / Mapas.

### Evaluación y desempeño
- Sistema de Evaluación.
- Status MIR.
- Avance Trimestral.
- ODS 20-30.
- Competitividad Urbana.
- Guía Consultiva de Desempeño Municipal.
- PMTODU.

---

## Modelo de datos

El diseño de datos se construyó con enfoque multientidad, permitiendo que cada registro quede asociado a una entidad municipal.

### Tablas principales
- `dbo.Entidades`
- `dbo.User_Data`
- `erp_proyectos`
- `erp_tareas`
- `erp_metas`
- `erp_eventos`
- `erp_actividad`
- `erp_organizacion`
- `erp_portafolios`
- `erp_portafolio_items`

### Relaciones clave
- `User_Data.clave_entidad` → `Entidades.clave`
- Tablas ERP con `clave_entidad` → `Entidades.clave`
- Proyectos ↔ Tareas
- Proyectos ↔ Metas
- Proyectos/Tareas/Metas ↔ Eventos

Este modelo permitió mantener el orden lógico de la información y evitar cruces incorrectos entre entidades.

---

## Control de acceso

El sistema implementa control de acceso basado en roles:

| Rol | Descripción | Acceso |
|---|---|---|
| `admin` | Administrador | Acceso total |
| `editor` | Editor | Lectura y edición limitada |
| `user` | Usuario | Acceso a su información |
| `view` | Visitante | Solo lectura |

Además, la lógica por entidad asegura que cada usuario vea únicamente la información correspondiente a su dependencia, salvo el rol administrador, que puede visualizar todas las entidades.

---

## Lógica de solución

Uno de los retos más importantes fue resolver la inconsistencia en los campos usados para identificar entidades dentro de la base de datos. Durante la auditoría se detectó que algunos procesos utilizaban `clave_entidad`, mientras otros usaban `entidad_clave` o `clave`, lo que ocasionaba fallas de visibilidad y filtros incorrectos.

Para resolverlo se implementó una estrategia de normalización y detección dinámica de columnas, priorizando la consistencia entre usuarios, entidades y tablas operativas. Esto permitió:

- Corregir accesos por entidad.
- Alinear la estructura de datos.
- Reducir errores de filtrado.
- Mejorar la confiabilidad del ERP.
- Consolidar una fuente de verdad para la sesión del usuario.

---

## Valor funcional

SINAPSYS ERP no solo administra información; también transforma datos operativos en información útil para la gestión pública.

Permite:
- Seguir proyectos desde su planeación hasta su cierre.
- Medir avances y resultados.
- Consultar información geoespacial en mapas.
- Organizar actividades por entidad.
- Vincular metas con responsables y fechas.
- Visualizar indicadores para la toma de decisiones.

---

## Métricas del sistema

- Más de 80 archivos PHP.
- Más de 15 scripts SQL.
- 8 módulos ERP principales.
- Aproximadamente 2,500 líneas en la API central.
- 4 roles de acceso.
- Más de 20 entidades registradas en la base de datos.

---

## Impacto

SINAPSYS ERP fue desarrollado para atender una necesidad real de gestión pública: pasar de procesos dispersos y manuales a una plataforma integrada, medible y escalable. Su implementación mejora el control administrativo, fortalece la planeación institucional y facilita el seguimiento de resultados en múltiples dependencias del municipio.

En términos prácticos, el sistema representa una base tecnológica para ordenar la operación municipal, consolidar la información y mejorar la trazabilidad de los procesos internos.

---

## Estado actual

El sistema cuenta con módulos funcionales de gestión, evaluación y visualización. La auditoría confirmó que la arquitectura base está operativa, y también identificó ajustes pendientes relacionados con la migración definitiva de estructura de entidades y validaciones de datos.

---

## Recomendaciones futuras

- Implementar auditoría de acciones y logs.
- Agregar exportación PDF/Excel.
- Incluir notificaciones automáticas.
- Incorporar adjuntos y evidencias.
- Evolucionar a un framework moderno.
- Añadir WebSockets para información en tiempo real.
- Contenerizar el entorno con Docker.

---

## Autor

Desarrollado por **Alonso Villalobos Lara**  
Enfoque profesional en análisis de datos, planeación estratégica, BI y desarrollo de soluciones institucionales.

---

## Licencia

Uso institucional y académico.  
La distribución o reutilización debe respetar la autoría y el contexto del proyecto.
