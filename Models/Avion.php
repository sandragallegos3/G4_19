<?php

class Aviones  extends Conectar{

    public function get_aviones(){

        $conectar = parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM avion";
        $sql= $conectar->prepare($sql);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    public function get_idaviones($NumeroAvion){

        $conectar = parent::conexion();
        parent::set_names();
        $sql= "SELECT * FROM Avion where NumeroAvion=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $NumeroAvion);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);


    }

    public function insert_aviones($NumeroAvion, $TipoAvion, $HorasVuelo, $CapacidadPasajeros, $FechaPrimerVuelo,$PaisConstruccion, $CantidadVuelos){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="INSERT INTO avion(NumeroAvion,TipoAvion,HorasVuelo,CapacidadPasajeros,FechaPrimerVuelo,PaisConstruccion,CantidadVuelos)
        VALUES (?,?,?,?,?,?,?);";

        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $NumeroAvion);
        $sql->bindValue(2, $TipoAvion);
        $sql->bindValue(3, $HorasVuelo);
        $sql->bindValue(4, $CapacidadPasajeros);
        $sql->bindValue(5, $FechaPrimerVuelo);
        $sql->bindValue(6, $PaisConstruccion);
        $sql->bindValue(7, $CantidadVuelos);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function update_aviones($NumeroAvion, $TipoAvion, $HorasVuelo, $CapacidadPasajeros, $FechaPrimerVuelo,$PaisConstruccion, $CantidadVuelos){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="UPDATE avion SET TipoAvion=?,HorasVuelo=?,CapacidadPasajeros=?,FechaPrimerVuelo=?,PaisConstruccion=?,CantidadVuelos=?
        WHERE NumeroAvion=?;";

        $sql=$conectar->prepare($sql);  
        $sql->bindValue(1, $TipoAvion);
        $sql->bindValue(2, $HorasVuelo);
        $sql->bindValue(3, $CapacidadPasajeros);
        $sql->bindValue(4, $FechaPrimerVuelo);
        $sql->bindValue(5, $PaisConstruccion);
        $sql->bindValue(6, $CantidadVuelos);
        $sql->bindValue(7, $NumeroAvion);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_aviones($NumeroAvion){

        $conectar = parent::conexion();
        parent::set_names();
        $sql= "DELETE  FROM Avion where NumeroAvion=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $NumeroAvion);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);


    }



}

?>
