<?php

session_start();


require_once 'router.php';
require_once 'config/constant.php';
require_once 'config/db.php';
require_once 'config/repository.php';
require_once 'config/models.php';
require_once 'config/controllers.php';

// mon routeur
$router= new Router();
// je récupere l'URL dans la fonction de mon routeur
$elements= $router->getController($_SERVER['REQUEST_URI']);


// j'appel l'element 2 de l'URL pour mon conroller
$controller=$elements['controller'];
// j'appel l'element 3 de l'URL pour mon action
$action= $elements['action'];
// j'appel l'element 4  de l'URL pour mon id
$id =$elements['id'];

// j'initialise une instance de mon controller avec la bdd en parametre
$cont= new $controller($dbh);


if (method_exists($cont, $action)) {
    $cont->$action($id);
} else {
    echo "Erreur : action introuvable.";
}




