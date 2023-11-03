<?php 

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();

$routes->add('home', new Route(constant('URL_SUBFOLDER') . '/{p}', array('controller' => 'HomeController', 'method'=>'indexAction', 'p' => 1), array()));
?>