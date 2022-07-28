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
    require_once("../Models/Vuelos.php");
    $Vuelos=new Vuelos();

   $body = json_decode(file_get_contents("php://input"), true);

   switch ($_GET["op"]) {

    case "GetVuelos":
        $datos=$Vuelos->get_Vuelos();
        echo json_encode($datos);
        
    break;


    case "ServiVuelos":
        $datos=$Vuelos->get_Servivuelos($body["CodigoVuelo"]);
        echo json_encode($datos);
        
        
    break; 

    case "InsertVuelos":
        $datos=$Vuelos->insert_vuelos($body["CodigoVuelo"],$body["CiudadOrigen"],$body["CiudadDestino"],$body["FechaVuelo"],$body["CantidadPasajeros"],$body["TipoAvion"],$body["DistanciaKm"]);
        echo json_encode("Vuelo agregado correctamente ");
        
    break; 

    case "update_vuelos":
        $datos=$Vuelos->update_vuelos($body["CodigoVuelo"],$body["CiudadOrigen"],$body["CiudadDestino"],$body["FechaVuelo"],$body["CantidadPasajeros"],$body["TipoAvion"],$body["DistanciaKm"]);
        echo json_encode("Vuelo actualizado correctamente ");

    break;

    case "delete_vuelos":
        $datos=$Vuelos->delete_vuelos($body["CodigoVuelo"]);
        echo json_encode("Vuelo borrado correctamente ");

    break;

   }

?>