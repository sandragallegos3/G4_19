
<?php

class Pasajeros  extends Conectar{

    public function get_pasajeros(){

        $conectar = parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM Pasajero";
        $sql= $conectar->prepare($sql);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function get_idpasajeros($CodigoPasajero){

        $conectar = parent::conexion();
        parent::set_names();
        $sql= "SELECT * FROM pasajero where CodigoPasajero=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $CodigoPasajero);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_pasajeros($CodigoPasajero, $Nombres, $Apellidos, $FechaRegistro, $Nacionalidad,$NumeroTelefono, $Email){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="INSERT INTO pasajero(CodigoPasajero,Nombres,Apellidos,FechaRegistro,Nacionalidad,NumeroTelefono,Email)
        VALUES (?,?,?,?,?,?,?);";

        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $CodigoPasajero);
        $sql->bindValue(2, $Nombres);
        $sql->bindValue(3, $Apellidos);
        $sql->bindValue(4, $FechaRegistro);
        $sql->bindValue(5, $Nacionalidad);
        $sql->bindValue(6, $NumeroTelefono);
        $sql->bindValue(7, $Email);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_pasajeros($CodigoPasajero, $Nombres, $Apellidos, $FechaRegistro, $Nacionalidad,$NumeroTelefono, $Email){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="UPDATE  pasajero SET Nombres=?,Apellidos=?,FechaRegistro=?,Nacionalidad=?,NumeroTelefono=?,Email=?
        WHERE CodigoPasajero=?";

     $sql=$conectar->prepare($sql);
       
        $sql->bindValue(1, $Nombres);
        $sql->bindValue(2, $Apellidos);
        $sql->bindValue(3, $FechaRegistro);
        $sql->bindValue(4, $Nacionalidad);
        $sql->bindValue(5, $NumeroTelefono);
        $sql->bindValue(6, $Email);
        $sql->bindValue(7, $CodigoPasajero);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

   }

   public function delete_pasajeros($CodigoPasajero){

    $conectar = parent::conexion();
    parent::set_names();
    $sql= "DELETE FROM pasajero where CodigoPasajero=?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $CodigoPasajero);
    $sql->execute();

    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

}

?>