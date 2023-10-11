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
        
    }
?>