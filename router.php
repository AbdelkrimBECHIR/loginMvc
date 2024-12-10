<?php

class Router
{
     public function getController(string $uri): array
    {
        $explodeUri = explode('/',trim($uri,'/'));
        
        $controller = !empty($explodeUri[0]) ? ucfirst($explodeUri[0]) : 'Home';
        $action = $explodeUri[1] ?? 'page';
        $id = $explodeUri[2]?? null;

        $controller.= 'Controller';

        return [
            'controller' => $controller,
            'action' => $action,
            'id' => $id,
        ];
    }
}