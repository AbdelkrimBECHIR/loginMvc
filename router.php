<?php

class Router
{
     public function getController(string $uri): array
    {
        $explodeUri = explode('/',trim($uri,'/'));
        
        $controller = !empty($explodeUri[1]) ? ucfirst($explodeUri[1]) : 'Home';
        $action = $explodeUri[2] ?? 'page';
        $id = $explodeUri[3]?? null;

        $controller.= 'Controller';

        return [
            'controller' => $controller,
            'action' => $action,
            'id' => $id,
        ];
    }
}