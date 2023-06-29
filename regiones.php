<?php

require_once 'conexion.php';

    //OBTIENE LISTADO DE REGIONES DESDE BASE DE DATOS

    $sql = "SELECT * FROM REGIONES";
    $respuesta = mysqli_query($db, $sql);
    $datos = mysqli_fetch_all($respuesta,MYSQLI_ASSOC);
    
    if(!empty($datos)){
        echo json_encode($datos);
    }else{
        echo json_encode([]);
    }


?>