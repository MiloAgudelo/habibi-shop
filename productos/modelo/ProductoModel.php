<?
class ProductoModel {
    private $id_producto;
    private $nombre;
    private $precio;
    private $cantidad;
    private $id_categoria;
    private $id_proveedor;
    private $connection;

    public function __construct($conn) {
        $this->connection = $conn;
    }

    public function set_Product($nombre, $precio, $cantidad, $id_categoria, $id_proveedor): bool {
        try {
            $stmt = $this->connection->prepare("INSERT INTO productos() VALUES($nombre, $precio, $cantidad, $id_categoria, $id_proveedor)");
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Error: ". $e->getMessage();
            return false;
        }

        return true;
    }

    public function get_Products() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM productos");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Error: ". $e->getMessage();
            return [];
        }

        return $data;
    }

    public function update_product($id_producto, $nombre, $precio, $cantidad, $id_categoria, $id_proveedor): bool {
        if (!$id_producto || !$id_categoria || !$id_proveedor) {
            echo "<script>console.log('Debe contener id_producto, id_categoria y id_proveedor'); </script>";
            return false;
        }

        try {
            $stmt = $this->connection->prepare("UPDATE `productos` SET `nombre`='$nombre',`precio`='$precio',`cantidad`='$cantidad',`id_categoria`='$id_categoria',`id_proveedor`='$id_proveedor' WHERE `id_producto`=$id_producto");
            $stmt->execute();
            return true;            
        } catch(PDOException $e) {
            echo "Error: ". $e->getMessage();
            return false;
        }
    }

    public function delete_product($id_producto): bool {
        try {
            $stmt = $this->connection->prepare("DELETE FROM productos WHERE id_producto = $id_producto");
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Error: ". $e->getMessage();
            return false;
        }

        return true;
    }
}