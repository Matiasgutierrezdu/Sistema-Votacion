<?php

require_once 'conexion.php';

    //OBTIENE LISTADO DE CANDIDATOS DESDE BASE DE DATOS

    $sql = "SELECT * FROM CANDIDATOS";
    $respuesta = mysqli_query($db, $sql);
    $datos = mysqli_fetch_all($respuesta,MYSQLI_ASSOC);
    
    if(!empty($datos)){
        echo json_encode($datos);
    }else{
        echo json_encode([]);
    }

?>