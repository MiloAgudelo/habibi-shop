<?
require_once "../../conexion.php";
require_once "../modelo/ProductoModel.php";

$conn = new Conexion("localhost", "dbmodular", "root", "");
$productos = new ProductoModel($conn);