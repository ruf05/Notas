<?php

/* Cargamos los archivos de Configuracion */
require_once 'config/config.php';
require_once 'model/db.php';

if(!isset($_GET["controller"])) $_GET["controller"] = constant("DEFAULT_CONTROLLER");
if(!isset($_GET["action"])) $_GET["action"] = constant("DEFAULT_ACTION");
/* Declaramos una Variable */
$controller_path ='controller/'.$_GET["controller"].'.php';

if(!file_exists($controller_path))
$controller_path = 'controller/'.constant("DEFAULT_CONTROLLER").'.php';

/* Cargamos el Controlador*/
require_once $controller_path;
$controllerName = $_GET["controller"].'Controller';
$controller = new $controllerName();

/* Chequeamos si el metodo esta definido */
$dataToView["data"] = array();
if(method_exists($controller,$_GET["action"]))
$dataToView["data"] = $controller->{$_GET["action"]}();


/* Cargamos las vista */
require_once 'view/template/header.php';
require_once 'view/'.$controller->view.'.php';
require_once 'view/template/footer.php';


?>