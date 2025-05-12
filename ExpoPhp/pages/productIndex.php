<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Productos</title>
    <link rel="stylesheet" href="../assets/css/producto/products.css">
</head>
<body>
    <div class="container">
        <h1>Gestión de Productos</h1>

        <form id="productForm" method="post" action="../actions/ProductActions.php">
            <input type="hidden" name="id" id="product_id">
            <input type="text" name="name" id="product_name" placeholder="Nombre del Producto" required>
            <input type="text" name="price" id="product_price" placeholder="Precio" pattern="^\d+(\.\d{1,2})?$" required>
            <input type="number" name="stock" id="product_stock" placeholder="Stock" required>
            <button type="submit" name="action" value="add" id="submitButton">Agregar Producto</button>
        </form>

        <div id="message" class="message" style="display: none;"></div>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
            <?php
            require_once '../includes/ProductDAO.php';
            $productDAO = new ProductDAO();
            $products = $productDAO->getAllProducts();
            foreach ($products as $product) {
                echo "<tr>";
                echo "<td>{$product['id']}</td>";
                echo "<td>{$product['name']}</td>";
                echo "<td>\${$product['price']}</td>";
                echo "<td>{$product['stock']}</td>";
                echo "<td class='actions'>
                        <button onclick=\"editProduct({$product['id']},'{$product['name']}',{$product['price']},{$product['stock']})\">Editar</button>
                        <button onclick=\"deleteProduct({$product['id']})\">Eliminar</button>
                     </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <script>
        function editProduct(id, name, price, stock) {
            document.getElementById('product_id').value = id;
            document.getElementById('product_name').value = name;
            document.getElementById('product_price').value = price;
            document.getElementById('product_stock').value = stock;
            document.getElementById('submitButton').textContent = 'Actualizar Producto';
            document.getElementById('submitButton').value = 'update';
            hideMessage();
        }

        function deleteProduct(id) {
            hideMessage();
            if(confirm('¿Estás seguro de que deseas eliminar este producto?')) {
                fetch(`../actions/ProductActions.php?action=delete&id=${id}`)
                .then(response => response.text())
                .then(data => {
                    if (data.includes('ERROR:')) {
                        showMessage('Error al eliminar. El producto está asociado a órdenes y no puede ser eliminado.');
                    } else if (data.trim() === "Producto eliminado correctamente") {
                        showMessage('Producto eliminado correctamente.', 'success');
                        setTimeout(() => window.location.reload(), 2000);
                    } else {
                        showMessage('Error desconocido al eliminar el producto.');
                    }
                });
            }
        }

        function showMessage(message, type = 'error') {
            const messageDiv = document.getElementById('message');
            messageDiv.textContent = message;
            messageDiv.className = type === 'success' ? 'message success' : 'message error';
            messageDiv.style.display = 'block';
        }

        function hideMessage() {
            document.getElementById('message').style.display = 'none';
        }

    </script>
</body>
</html>
