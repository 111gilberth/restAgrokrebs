<?php
require 'connect.php';

    class models{
        
        public function insertFormContact($idContacto,$nombre,$correo,$mensaje,$idMunicipio,$idEstado,$cp){
            $con  = new connect();
            $conn = $con -> conectar();

            $find = $conn -> query ( "SELECT Nombre FROM contact WHERE Nombre = '$nombre' " );

            $match = $find -> num_rows;
            /*only for test */
            //printf("Result set has %d rows.\n", $find);
            if($match > 0){
                echo "row does exist";
                }else{
                        $ins = new models();
                        $result = $ins -> insertFormRegion($idContacto,$idMunicipio,$idEstado,$cp);
                        $query = $conn -> query ( "INSERT INTO contact(idContacto,Nombre,Correo,Mensaje,idMunicipio,idEstado,Cp)VALUES('$idContacto','$nombre','$correo','$mensaje','$idMunicipio','$idEstado','$cp');" );
                        if($query || $result){
                            return "true";
                        }else{
                            return "false";
                        }
                             
            }

            $find -> close();
         
        }

        public function insertFormRegion($idContacto,$idMunicipio,$idEstado,$cp){
            $con = new connect();
            $conn = $con -> conectar();

            $query = $conn -> query ( "INSERT INTO region(idMunicipio,idEstado,cp,idContacto)VALUES('$idMunicipio','$idEstado','$cp','$idContacto');" );

            if($query){
                 return "true";
            }else{
                 return "false";
            }

        }
    }
   
    $a = new models();
    $idContacto = mt_rand();
    $nombre = 'ari';
    $correo = 'correo';
    $mensaje = 'mensaje';
    $idMunicipio = 1;
    $idEstado = 2;
    $cp = 'cp';
    $b = $a -> insertFormContact($idContacto,$nombre,$correo,$mensaje,$idMunicipio,$idEstado,$cp);
    echo $b;

?>