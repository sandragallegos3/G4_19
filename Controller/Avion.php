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
    require_once("../Models/Avion.php");
    $Avion=new Aviones();

   $body = json_decode(file_get_contents("php://input"), true);

   switch ($_GET["op"]) {

    case "get_aviones":
        $datos=$Avion->get_aviones();
        echo json_encode($datos);
        
    break;


    case "get_idaviones":
        $datos=$Avion->get_idaviones($body["NumeroAvion"]);
        echo json_encode($datos);
        
        
    break; 

    case "insert_aviones":
        $datos=$Avion->insert_aviones($body["NumeroAvion"],$body["TipoAvion"],$body["HorasVuelo"],$body["CapacidadPasajeros"],$body["FechaPrimerVuelo"],$body["PaisConstruccion"],$body["CantidadVuelos"]);

        echo json_encode("Avión insertado correctamente");
        
        
    break; 

    
    case "update_aviones":
        $datos=$Avion->update_aviones($body["NumeroAvion"],$body["TipoAvion"],$body["HorasVuelo"],$body["CapacidadPasajeros"],$body["FechaPrimerVuelo"],$body["PaisConstruccion"],$body["CantidadVuelos"]);

        echo json_encode("Datos actualizados corectamente");
        
        
    break; 

    case "delete_aviones":
        $datos=$Avion->delete_aviones($body["NumeroAvion"]);
        echo json_encode("Avión borrado correctamente ");

    break;
    }

?>
