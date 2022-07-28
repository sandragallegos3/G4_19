<?php


   class Vuelos  extends Conectar{


    public function get_Vuelos(){

        $conectar = parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM vuelos";
        $sql= $conectar->prepare($sql);
        $sql->execute();
 
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function get_Servivuelos($CodigoVuelo){

        $conectar = parent::conexion();
        parent::set_names();
        $sql= "SELECT * FROM vuelos where CodigoVuelo=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $CodigoVuelo);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);


    }


    public function insert_vuelos($CodigoVuelo, $CiudadOrigen, $CiudadDestino, $FechaVuelo, $CantidadPasajeros,$TipoAvion, $DistanciaKM){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="INSERT INTO vuelos(CodigoVuelo,CiudadOrigen,CiudadDestino,FechaVuelo,CantidadPasajeros,TipoAvion,DistanciaKM)
        VALUES (?,?,?,?,?,?,?);";

        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $CodigoVuelo);
        $sql->bindValue(2, $CiudadOrigen);
        $sql->bindValue(3, $CiudadDestino);
        $sql->bindValue(4, $FechaVuelo);
        $sql->bindValue(5, $CantidadPasajeros);
        $sql->bindValue(6, $TipoAvion);
        $sql->bindValue(7, $DistanciaKM);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }



    public function update_vuelos($CodigoVuelo, $CiudadOrigen, $CiudadDestino, $FechaVuelo, $CantidadPasajeros,$TipoAvion, $DistanciaKM){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="UPDATE  vuelos SET CiudadOrigen=?,CiudadDestino=?,FechaVuelo=?,CantidadPasajeros=?,TipoAvion=?,DistanciaKM=?
        WHERE CodigoVuelo=?";

        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $CiudadOrigen);
        $sql->bindValue(2, $CiudadDestino);
        $sql->bindValue(3, $FechaVuelo);
        $sql->bindValue(4, $CantidadPasajeros);
        $sql->bindValue(5, $TipoAvion);
        $sql->bindValue(6, $DistanciaKM);
        $sql->bindValue(7, $CodigoVuelo);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


   public function delete_vuelos($CodigoVuelo){

        $conectar = parent::conexion();
        parent::set_names();
        $sql= "DELETE  FROM vuelos where CodigoVuelo=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $CodigoVuelo);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);


    }
}

?>