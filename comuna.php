<?php

    //Conexion a la bASE DE DATOS
    require_once 'conexion.php';

    $variablePHP = $_GET['seleccionar'];
    
    //OBTIENE LISTADO DE COMUNAS DESDE BASE DE DATOS

    $sql = "SELECT * FROM COMUNAS WHERE REGION_ID = $variablePHP";
    $respuesta = mysqli_query($db, $sql);
    $datos = mysqli_fetch_all($respuesta,MYSQLI_ASSOC);
    
    if(!empty($datos)){
        echo json_encode($datos);
    }else{
        echo json_encode([]);
    }


?>