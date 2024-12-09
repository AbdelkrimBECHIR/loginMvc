<?php


// mon routeur
$router= new Router();
// je récupere l'URL dans la fonction de mon routeur
$elements= $router->getController($_SERVER['REQUEST_URI']);

// j'appel l'element 2 de l'URL pour mon conroller
$contoller=$elements['controller'];

// j'initialise une instance de mon controller avec la bdd en parametre
$cont= new $controller($dbh);

// j'appel l'element 2 de l'URL pour mon action
$action= $elements['action'];
$cont->$action();

// j'appel l'element  de l'URL pour mon id
$id =$elements['id'];
$cont->$id();
