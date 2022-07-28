<?php
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
  }
    header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');


    require_once("../Config/Conexion.php");
    require_once("../Models/Pasajeros.php");
    $Pasajeros=new Pasajeros();

   $body = json_decode(file_get_contents("php://input"), true);

   switch ($_GET["op"]) {

    case "GetPasajeros":
        $datos=$Pasajeros->get_pasajeros();
        echo json_encode($datos);
        
    break;

    case "get_idpasajeros":
        $datos=$Pasajeros->get_idpasajeros($body["CodigoPasajero"]);
        echo json_encode($datos);
        
    break;

    case "insert_pasajeros":
        $datos=$Pasajeros->insert_pasajeros($body["CodigoPasajero"],$body["Nombres"],$body["Apellidos"],
        $body["FechaRegistro"],$body["Nacionalidad"],$body["NumeroTelefono"],$body["Email"]);
        echo json_encode("Pasajero Insertado :) ");
        
    break;

    case "update_pasajeros":
        $datos=$Pasajeros->update_pasajeros($body["CodigoPasajero"],$body["Nombres"],$body["Apellidos"],$body["FechaRegistro"],$body["Nacionalidad"],$body["NumeroTelefono"],$body["Email"]);
        echo json_encode("Pasajero Actualizado :) ");
        
    break;

    case "delete_pasajeros":
        $datos=$Pasajeros->delete_pasajeros($body["CodigoPasajero"]);
        echo json_encode("Pasajero Borrado :) ");
        
    break;

    } 
?>