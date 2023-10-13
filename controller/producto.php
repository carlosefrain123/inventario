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
    case "Insert":
        $datos=$producto->insert_producto($body["producto_codigo"],$body["producto_nombre"],$body["producto_precio"],$body["producto_stock"],$body["producto_foto"]);
        echo json_encode ("Insert Correcto");
        break; 
    case "Update":
        $datos=$producto->update_producto($body["producto_id"],$body["producto_codigo"],$body["producto_nombre"],$body["producto_precio"],$body["producto_stock"],$body["producto_foto"]);
        echo json_encode ("Update Correcto");
        break; 
    case "Delete":
        $datos=$producto->delete_producto($body["producto_id"]);
        echo json_encode ("Delete Correcto");
        break; 
}   
?>
