<?php
    class Producto extends Conectar{
        public function get_producto(){
            $conectar=parent::conexion();
            parent::set_name();
            $sql="SELECT * FROM `producto` WHERE est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function get_producto_x_id($producto_id){
            $conectar=parent::conexion();
            parent::set_name();
            $sql="SELECT * FROM `producto` WHERE est=1 AND producto_id= ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$producto_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function insert_producto($producto_codigo,$producto_nombre,$producto_precio,$producto_stock,$producto_foto){
            $conectar=parent::conexion();
            parent::set_name();
            $sql="INSERT INTO `producto` (producto_id, producto_codigo, producto_nombre, producto_precio, producto_stock, producto_foto, categoria_id, usuario_id, est) VALUES (NULL, ?, ?, ?, ?, ?, '1', '1', '1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$producto_codigo);
            $sql->bindValue(2,$producto_nombre);
            $sql->bindValue(3,$producto_precio);
            $sql->bindValue(4,$producto_stock);
            $sql->bindValue(5,$producto_foto);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function update_producto($producto_id, $producto_codigo, $producto_nombre, $producto_precio, $producto_stock, $producto_foto) {
            $conectar = parent::conexion();
            parent::set_name();
            $sql = "UPDATE `producto` SET producto_codigo=?, producto_nombre=?, producto_precio=?, producto_stock=?, producto_foto=? WHERE producto_id=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $producto_codigo);
            $sql->bindValue(2, $producto_nombre);
            $sql->bindValue(3, $producto_precio);
            $sql->bindValue(4, $producto_stock);
            $sql->bindValue(5, $producto_foto);
            $sql->bindValue(6, $producto_id);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }    
           
        public function delete_producto($producto_id){
            $conectar=parent::conexion();
            parent::set_name();
            $sql = "UPDATE `producto` SET est='0' WHERE producto_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$producto_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>