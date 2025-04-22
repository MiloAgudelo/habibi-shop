# Habibi Shop - Sistema de Gestión

Un sistema de gestión de tienda moderno y completo desarrollado con PHP y Tailwind CSS.

## Características

- 👥 Gestión de Usuarios
  - Registro y administración de usuarios
  - Roles: Administrador y Usuario Básico
  - Control de acceso basado en roles

- 📦 Gestión de Productos
  - Registro y administración de productos
  - Control de inventario
  - Categorización de productos
  - Precios y cantidades

- 🏢 Gestión de Proveedores
  - Registro y administración de proveedores
  - Información detallada de contacto
  - Historial de proveedores

- 🏷️ Gestión de Categorías
  - Organización de productos por categorías
  - Descripción detallada de categorías

- 💰 Sistema de Ventas
  - Registro de ventas
  - Selección múltiple de productos
  - Cálculo automático de totales
  - Validación de stock en tiempo real

- 📊 Reportes
  - Generación de reportes de ventas
  - Filtrado por fechas
  - Resumen de ventas totales
  - Productos más vendidos
  - Promedio de ventas

## Tecnologías Utilizadas

- PHP 7.4+
- MySQL/MariaDB
- Tailwind CSS
- JavaScript
- HTML5

## Requisitos del Sistema

- Servidor web (Apache/Nginx)
- PHP 7.4 o superior
- MySQL/MariaDB
- Extensiones PHP:
  - PDO
  - PDO_MYSQL
  - session
  - json

## Instalación

1. Clone el repositorio:
```bash
git clone https://github.com/yourusername/habibi-shop.git
```

2. Configure su servidor web para apuntar al directorio del proyecto.

3. Importe la base de datos desde el archivo SQL proporcionado.

4. Configure las credenciales de la base de datos en el archivo de configuración.

5. Asegúrese de que los permisos de archivos y directorios estén correctamente configurados.

## Estructura del Proyecto

```
habibi-shop/
├── categorias/
│   └── view/
├── login/
│   └── view/
├── productos/
│   └── view/
├── proveedores/
│   └── view/
├── reportes/
│   └── view/
├── usuarios/
│   └── view/
├── ventas/
│   └── view/
├── index.php
└── layout.php
```

## Características de Seguridad

- Autenticación de usuarios
- Control de sesiones
- Protección contra SQL Injection
- Validación de datos de entrada
- Sanitización de salida HTML

## Interfaz de Usuario

- Diseño responsivo
- Interfaz moderna con Tailwind CSS
- Navegación intuitiva
- Formularios validados
- Mensajes de retroalimentación

## Contribución

Si desea contribuir al proyecto, por favor:

1. Fork el repositorio
2. Cree una rama para su característica (`git checkout -b feature/AmazingFeature`)
3. Commit sus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abra un Pull Request

## Licencia

Este proyecto está licenciado bajo la Licencia MIT - vea el archivo [LICENSE](LICENSE) para más detalles.

## Soporte

Para soporte, por favor abra un issue en el repositorio de GitHub. 