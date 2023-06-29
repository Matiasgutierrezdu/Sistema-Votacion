<?php
// Conexión A BASE DE DATOS
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$basededatos = 'votosDb';
$db = mysqli_connect($servidor, $usuario, $password, $basededatos);

mysqli_query($db, "SET NAMES 'utf8'");

