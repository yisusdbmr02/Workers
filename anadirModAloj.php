<?php
include_once 'con_desc_db.php';
$dbname="workers";
try{  
    $mysqli = conectar($dbname);
            if(isset($_POST['idAloj'])&&isset($_POST['alojamiento'])&&isset($_POST['nombre'])&&isset($_POST['responsable'])&&isset($_POST['direccion'])&&isset($_POST['distancia'])){
                $idAloj=$_POST['idAloj'];
                $alojamiento=$_POST['alojamiento'];
                $nombre=$_POST['nombre'];
                $responsable=$_POST['responsable'];
                $distancia=$_POST['distancia'];
                $direccion=$_POST['direccion'];
                if($idAloj=='0'){
                    $insertaloj = "Insert into alojamiento (alojamiento, nombrecompleto,responsable,direccion,distancia) values ('$alojamiento','$nombre','$responsable','$direccion','$distancia');";
                    $mysqli->query($insertaloj);
                    header('Location: index.php?msg=1');
                }else{
                    $updatealoj = "Update alojamiento set alojamiento='$alojamiento', nombrecompleto='$nombre',responsable='$responsable',
                    direccion='$direccion',distancia='$distancia' where numaloj='$idAloj';";
                    $mysqli->query($updatealoj);
                    header('Location: index.php?msg=1');
                }
            }
            desconectar($mysqli);
}
catch(exception $e){
        $e->getMessage();
    }
?>