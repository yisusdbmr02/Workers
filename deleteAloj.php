<?php
include_once 'con_desc_db.php';
$dbname="workers";
try{  
    $mysqli = conectar($dbname);
                $id=$_GET['id'];
                echo $id;
                $deletealoj = "delete from alojamiento where numaloj='$id' ";
                $mysqli->query($deletealoj);
                header('Location: index.php?msg=1');
            
            desconectar($mysqli);
}
catch(exception $e){
        $e->getMessage();
    }
        ?>