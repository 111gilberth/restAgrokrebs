<?php
header("Access-Control-Allow-Origin: *");
require '../models/models.php';

    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
        case 'insertFormData':
            $inst = new models();
            $idContacto = $_POST['idContacto'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $mensaje = $_POST['mensaje'];
            $ciudad = $_POST['ciudad'];
            $estado = $_POST['estado'];
            $cp = $_POST['cp'];
            $resp = $inst ->insertFormContact($idContacto,$nombre,$correo,$mensaje,$ciudad,$estado,$cp);
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


?>