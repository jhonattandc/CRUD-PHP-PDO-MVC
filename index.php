<?php

require_once 'model/conexion.php'; //Requerimos del archivo database.php, con la opcion requiere_once validamos que el earchivo sea leido una sola vez  
$controller = 'persona'; // Una buena practica es llamar al controlador con el nombre de la tabla de la base de datos 

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c'])) 
{
    require_once "controller/$controller.controller.php"; 
    $controller = ucwords($controller) . 'Controller'; 
    $controller = new $controller; 
    $controller->Index();    
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']); 
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index'; 

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php"; 
    $controller = ucwords($controller) . 'Controller'; 
    $controller = new $controller; 

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}
?>