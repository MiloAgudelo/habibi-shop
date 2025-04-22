<?php
// Prepare category rows HTML
$category_rows_html = '';
foreach ($categorias ?? [] as $categoria) {
    $cat_id = htmlspecialchars($categoria['id'] ?? '');
    $cat_nombre = htmlspecialchars($categoria['nombre'] ?? '');
    $cat_descripcion = htmlspecialchars($categoria['descripcion'] ?? '');
    $edit_url = "?action=edit&id={$cat_id}";
    $delete_url = "?action=delete&id={$cat_id}";

    $category_rows_html .= "
        <tr>
            <td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>{$cat_nombre}</td>
            <td class='px-6 py-4 text-sm text-gray-500'>{$cat_descripcion}</td>
            <td class='px-6 py-4 whitespace-nowrap text-sm font-medium'>
                <a href='{$edit_url}' class='text-indigo-600 hover:text-indigo-900 mr-3'>Editar</a>
                <a href='{$delete_url}' class='text-red-600 hover:text-red-900' onclick=\"return confirm('¿Está seguro de eliminar esta categoría?')\">Eliminar</a>
            </td>
        </tr>
    ";
}

$content = <<<HTML
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
            <div class="flex justify-between items-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Gestión de Categorías</h3>
                <button type="button" onclick="document.getElementById('categoriaForm').classList.remove('hidden')"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Registrar Nueva Categoría
                </button>
            </div>
        </div>

        <!-- Category Form -->
        <div id="categoriaForm" class="hidden">
            <div class="px-4 py-5 sm:p-6">
                <form action="" method="POST" class="space-y-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6">
                            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" name="nombre" id="nombre" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <div class="col-span-6">
                            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                            <textarea name="descripcion" id="descripcion" rows="3"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="document.getElementById('categoriaForm').classList.add('hidden')"
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

        <!-- Categories Table -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                {$category_rows_html}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
HTML;

require_once __DIR__ . '/../../layout.php'; 