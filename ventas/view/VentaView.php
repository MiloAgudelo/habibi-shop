<?php
$content = <<<HTML
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Registrar Nueva Venta</h3>
            <p class="mt-1 text-sm text-gray-500">
                Usuario: <?php echo htmlspecialchars($_SESSION['usuario_nombre'] ?? 'No identificado') . ''; ?>
            </p>
        </div>

        <div class="px-4 py-5 sm:p-6">
            <form action="" method="POST" id="ventaForm" class="space-y-6">
                <!-- Dynamic Product Selection -->
                <div id="productos-container">
                    <div class="mb-4">
                        <h4 class="text-sm font-medium text-gray-700 mb-3">Productos</h4>
                        <div class="producto-item grid grid-cols-12 gap-4 items-end">
                            <div class="col-span-5">
                                <label class="block text-sm font-medium text-gray-700">Producto</label>
                                <select name="productos[]" required
                                    class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="">Seleccione un producto</option>
                                    <?php foreach ($productos ?? [] as $producto): ?>
                                    <option value="<?php echo htmlspecialchars($producto['id']); ?>" 
                                            data-precio="<?php echo htmlspecialchars($producto['precio']); ?>"
                                            data-stock="<?php echo htmlspecialchars($producto['cantidad']); ?>">
                                        <?php echo htmlspecialchars($producto['nombre']); ?> - $<?php echo number_format($producto['precio'], 2); ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-span-3">
                                <label class="block text-sm font-medium text-gray-700">Cantidad</label>
                                <input type="number" name="cantidades[]" min="1" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <div class="col-span-3">
                                <label class="block text-sm font-medium text-gray-700">Subtotal</label>
                                <input type="text" readonly
                                    class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm py-2 px-3">
                            </div>
                            <div class="col-span-1">
                                <button type="button" onclick="this.closest('.producto-item').remove(); calcularTotal();"
                                    class="inline-flex items-center p-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <button type="button" onclick="agregarProducto()"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Agregar Producto
                    </button>

                    <div class="text-right">
                        <div class="text-sm text-gray-700">Total:</div>
                        <div class="text-2xl font-bold text-gray-900" id="total">$0.00</div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Registrar Venta
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function agregarProducto() {
        const container = document.getElementById('productos-container');
        const template = container.querySelector('.producto-item').cloneNode(true);
        
        // Reset values
        template.querySelector('select').value = '';
        template.querySelector('input[type="number"]').value = '';
        template.querySelector('input[readonly]').value = '';
        
        container.appendChild(template);
    }

    function calcularTotal() {
        let total = 0;
        document.querySelectorAll('.producto-item').forEach(item => {
            const select = item.querySelector('select');
            const cantidad = item.querySelector('input[type="number"]').value;
            const subtotalInput = item.querySelector('input[readonly]');
            
            if (select.value && cantidad) {
                const precio = parseFloat(select.options[select.selectedIndex].dataset.precio);
                const subtotal = precio * cantidad;
                subtotalInput.value = '$' + subtotal.toFixed(2);
                total += subtotal;
            }
        });
        
        document.getElementById('total').textContent = '$' + total.toFixed(2);
    }

    // Event delegation for dynamic elements
    document.getElementById('ventaForm').addEventListener('change', function(e) {
        if (e.target.matches('select') || e.target.matches('input[type="number"]')) {
            calcularTotal();
        }
    });

    // Validate stock before submit
    document.getElementById('ventaForm').addEventListener('submit', function(e) {
        let valid = true;
        document.querySelectorAll('.producto-item').forEach(item => {
            const select = item.querySelector('select');
            const cantidad = parseInt(item.querySelector('input[type="number"]').value);
            
            if (select.value && cantidad) {
                const stock = parseInt(select.options[select.selectedIndex].dataset.stock);
                if (cantidad > stock) {
                    alert('Stock insuficiente para ' + select.options[select.selectedIndex].text);
                    valid = false;
                }
            }
        });
        
        if (!valid) {
            e.preventDefault();
        }
    });
    </script>
HTML;

require_once __DIR__ . '/../../layout.php'; 