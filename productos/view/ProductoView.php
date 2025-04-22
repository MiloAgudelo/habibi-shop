<?php
// Prepare category options HTML
$category_options_html = '';
foreach ($categorias ?? [] as $categoria) {
    $cat_id = htmlspecialchars($categoria['id']);
    $cat_nombre = htmlspecialchars($categoria['nombre']);
    $category_options_html .= "<option value='{$cat_id}'>{$cat_nombre}</option>";
}

// Prepare product rows HTML
$product_rows_html = '';
foreach ($productos ?? [] as $producto) {
    $prod_id = htmlspecialchars($producto['id'] ?? '');
    $prod_nombre = htmlspecialchars($producto['nombre'] ?? '');
    $prod_precio = number_format($producto['precio'] ?? 0, 2);
    $prod_cantidad = htmlspecialchars($producto['cantidad'] ?? '');
    $prod_categoria = htmlspecialchars($producto['categoria_nombre'] ?? '');
    $edit_url = "?action=edit&id={$prod_id}";
    $delete_url = "?action=delete&id={$prod_id}";

    $product_rows_html .= "
        <tr>
            <td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>{$prod_nombre}</td>
            <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>\${$prod_precio}</td>
            <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>{$prod_cantidad}</td>
            <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>{$prod_categoria}</td>
            <td class='px-6 py-4 whitespace-nowrap text-sm font-medium'>
                <a href='{$edit_url}' class='text-indigo-600 hover:text-indigo-900 mr-3'>Editar</a>
                <a href='{$delete_url}' class='text-red-600 hover:text-red-900' onclick=\"return confirm('¿Está seguro de eliminar este producto?')\">Eliminar</a>
            </td>
        </tr>
    ";
}

$content = <<<HTML
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
            <div class="flex justify-between items-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Gestión de Productos</h3>
                <button type="button" onclick="document.getElementById('productoForm').classList.remove('hidden')"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Registrar Nuevo Producto
                </button>
            </div>
        </div>

        <!-- Product Form -->
        <div id="productoForm" class="hidden">
            <div class="px-4 py-5 sm:p-6">
                <form action="" method="POST" class="space-y-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" name="nombre" id="nombre" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" name="precio" id="precio" required min="0" step="0.01"
                                    class="block w-full pl-7 pr-12 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad" required min="0"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                            <select id="categoria_id" name="categoria_id" required
                                class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                {$category_options_html}
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="document.getElementById('productoForm').classList.add('hidden')"
                            class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancelar
                        </button>
                        <button type="submit"
                            class="bg-indigo-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Products Table -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                {$product_rows_html}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
HTML;

require_once __DIR__ . '/../../layout.php'; 