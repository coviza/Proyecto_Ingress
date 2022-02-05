<?php
require_once "../vendor/autoload.php";

use App\Core\Dispatcher;
use App\Core\Request;
use App\Core\RouteCollection;

//Para que la aplicacion utilice sesiones pongo en marcha la sesion en el punto de entrada de la app que es este fichero (index.php)
session_start();
$routes = new RouteCollection();
$request = new Request();
$dispatcher = new Dispatcher($routes, $request);