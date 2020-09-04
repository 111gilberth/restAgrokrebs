<?php
header("Access-Control-Allow-Origin: *");
require '../models/models.php';

    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
        case 'insertFormData':
            $inst = new models();
            $idContacto = mt_rand();
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $mensaje = $_POST['mensaje'];
            $idMunicipio = $_POST['ciudad'];
            $idEstado = $_POST['estado'];
            $cp = $_POST['cp'];
            $resp = $inst ->insertFormContact($idContacto,$nombre,$correo,$mensaje,$idMunicipio,$idEstado,$cp);
                if($resp){
                    echo $resp;
                }else{
                    echo "error";
                }
        break;
        default:
            echo "Bad Command";
        break;
        }
    }
    else{
        echo "No command";
    }

//echo mt_rand();

?>