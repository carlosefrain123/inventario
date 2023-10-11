<?php
header('Content-Type: application/json');
 
require_once("../config/conexion.php");
require_once('../models/Producto.php');
$producto = new Producto();

$body=json_decode(file_get_contents("php://input"),true);

switch ($_GET["op"]) { // Corregido: $_GET en lugar de $$_GET
    case 'GetAll':
        $datos = $producto->get_producto();
        echo json_encode($datos);
        break;
    case "GetId":
        $datos=$producto->get_producto_x_id($body["producto_id"]);
        echo json_encode($datos);
        break; 
}   
?>
