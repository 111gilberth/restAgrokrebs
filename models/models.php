<?php
require 'connect.php';

    class models{
        
        public function insertFormContact($idContacto,$nombre,$correo,$mensaje,$ciudad,$estado,$cp){
            $con  = new connect();
            $conn = $con -> conectar();

            $find = $conn -> query ( "SELECT Nombre FROM contact WHERE Nombre = '$nombre' " );

            $match = $find -> num_rows;
            /*only for test */
            //printf("Result set has %d rows.\n", $find);
            if($match > 0){
                echo "row does exist";
                }else{
                        $query = $conn -> query ( "INSERT INTO contact(idContacto,Nombre,Correo,Mensaje,idMunicipio,idEstado,Cp)VALUES('$idContacto','$nombre','$correo','$mensaje','$ciudad','$estado','$cp');" );
                        $ins = new models();
                        $result = $ins -> insertFormRegion($idContacto,$ciudad,$estado,$cp);
                        if($query || $result){
                            return "true";
                        }else{
                            return "false";
                        }
                             
            }

            $find -> close();
         
        }

        public function insertFormRegion($idContacto,$ciudad,$estado,$cp){
            $con = new connect();
            $conn = $con -> conectar();

            $query = $conn -> query ( "INSERT INTO region(ciudad,estado,cp,idContacto)VALUES('$ciudad','$estado','$cp','$idContacto');" );

            if($query){
                 return "true";
            }else{
                 return "false";
            }

        }
    }
   
   /*$a = new models();
    $nombre = 'nombre15';
    $correo = 'correo';
    $mensaje = 'mensaje';
    $ciudad = 'ciudad';
    $estado = 'estado';
    $cp = 'cp';
    $b = $a -> insertFormContact($nombre,$correo,$mensaje,$ciudad,$estado,$cp);
    echo $b;*/

?>