<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar Navigation -->
        <aside class="bg-gray-800 text-white w-64 min-h-screen flex flex-col">
            <div class="p-4 bg-gray-900">
                <h1 class="text-2xl font-semibold">Sistema de Gestión</h1>
            </div>
            <nav class="flex-1 p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="/usuarios/view/UsuarioView.php" class="flex items-center p-2 rounded-lg hover:bg-gray-700">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            Usuarios
                        </a>
                    </li>
                    <li>
                        <a href="/proveedores/view/ProveedorView.php" class="flex items-center p-2 rounded-lg hover:bg-gray-700">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            Proveedores
                        </a>
                    </li>
                    <li>
                        <a href="/productos/view/ProductoView.php" class="flex items-center p-2 rounded-lg hover:bg-gray-700">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            Productos
                        </a>
                    </li>
                    <li>
                        <a href="/categorias/view/CategoriaView.php" class="flex items-center p-2 rounded-lg hover:bg-gray-700">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            Categorías
                        </a>
                    </li>
                    <li>
                        <a href="/ventas/view/VentaView.php" class="flex items-center p-2 rounded-lg hover:bg-gray-700">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Ventas
                        </a>
                    </li>
                    <li>
                        <a href="/reportes/view/ReporteView.php" class="flex items-center p-2 rounded-lg hover:bg-gray-700">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Reportes
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="p-4 border-t border-gray-700">
                <a href="/login/view/LoginView.php?logout=true" class="flex items-center p-2 rounded-lg hover:bg-gray-700">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Cerrar Sesión
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <?php echo $content ?? ''; ?>
        </main>
    </div>
</body>
</html> 