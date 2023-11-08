<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();


$routes->add('home-def', new Route(constant('URL_SUBFOLDER') . '/', array('controller' => 'HomeController', 'method' => 'indexAction', 'p' => 1), array()));
$routes->add('home-pag', new Route(constant('URL_SUBFOLDER') . '/page/{p}', array('controller' => 'HomeController', 'method' => 'indexAction', 'p' => 1), array()));

//SHOW DEL POKEMON
$routes->add('show', new Route(constant('URL_SUBFOLDER') . '/show/{id}', array('controller' => 'ShowController', 'method' => 'showAction'), array('id' => '\d+')));
