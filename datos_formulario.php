<?php   
if (isset($_POST)) {


    //Conexion a la bd
    require_once 'conexion.php';

    // Recibe los datos del formulario y los ingresa a variables

    $nombre    = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $alias     = isset($_POST['alias']) ? $_POST['alias'] : false;
    $rut       = isset($_POST['rut']) ? $_POST['rut'] : false;
    $email     = isset($_POST['email']) ? $_POST['email'] : false;
    $region    = isset($_POST['region']) ? $_POST['region'] : false;
    $comuna    = isset($_POST['comuna']) ? $_POST['comuna'] : false;
    $candidato = isset($_POST['candidato']) ? $_POST['candidato'] : false;
    $nosotros  = isset($_POST['nosotros']) ? $_POST['nosotros'] : false;
    
    // echo "tu nombre es: ".$nombre; 
    // echo "alias es: ".$alias;
    // echo "rut es: ".$rut;
    // echo "email es: ".$email;
    // echo "region es: ".$region;
    // echo "comuna es: ".$comuna;
    // echo "candidatos es: ".$candidato;
    $nos="";  

    $errores = array();

    // Validaciones de php sobre datos vacios

    if (!empty($nombre) ) {
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "Nombre no valido";
        echo $errores['nombre'];
    }

    if (!empty($alias) ) {
        $alias_validado = true;
    } else {
        $alias_validado = false;
        $errores['alias'] = "Alias no valido";
        echo $errores['alias'];
    }

    if (!empty($rut) ) {
        $rut_validado = true;
    } else {
        $rut_validado = false;
        $errores['rut'] = "Rut no valido";
        echo $errores['rut'];
    }

    if (!empty($email) ) {
        $email_validado = true;
    } else {
        $email_validado = false;
        $errores['email'] = "Email no valido";
        echo $errores['email'];
    }


    if (!empty($region) ) {
        $region_validado = true;
    } else {
        $region_validado = false;
        $errores['region'] = "Region no valido";
        echo $errores['region'];
    }

    if (!empty($comuna) ) {
        $comuna_validado = true;
    } else {
        $comuna_validado = false;
        $errores['comuna'] = "Comuna no valido";
        echo $errores['comuna'];
    }

    if (!empty($candidato) ) {
        $candidato_validado = true;
    } else {
        $candidato_validado = false;
        $errores['candidato'] = "Candidato no valido";
        echo $errores['candidato'];
    }


    if (!empty($nosotros) ) {
        $nosotros_valido = true;
    } else {
        $nosotros_valido = false;
        $errores['nosotros'] = "Nosotros no valido";
        echo $errores['nosotros'];
    }

    //CONSULTA SI EXISTEN ERRORES NO ENVIA DATOS A BASE DE DATOS
    if(count($errores) == 0 ){

        //OBTIENE LOS VALORES DE LOS CHECKBOX Y LOS ALMACENA EN LA VARIABLE $NOS
        foreach($nosotros as $item){
               
            $nos .= $item.",";  
        }
        
        //INSERTA LOS DATOS OBTENIDOS A BASE DE DATOS TABLA VOTOS
        $sql = "INSERT INTO votos VALUES(null,'$nombre','$alias','$rut','$email','$region','$comuna','$candidato','$nos');";
        $guardar = mysqli_query($db, $sql);

        
        if ($guardar) {
            $_SESSION['completado'] = "El registro se ha completado con exito";
            header("refresh:5;url=index.html");

        } else {
            $_SESSION['errores']['general'] = "Fallo al guardar usuario";
            header("refresh:5;url=index.html");

        }
        
    
    }
    else{
        header("refresh:5;url=index.html");
    }
  

}
?>