<?php

class router
{
     public function getController(string $uri): array
    {
        $explodeUri = explode('/',$uri);
        $controller= $explodeUri[1] ? : 'home';
        $action=$explodeUri[2] ?? 'page';

        if($controller === 'home'){
            $action = 'home';
        }

        if($controller === 'login'){
            $action = 'login';
        }

        $id = $explodeUri[3]?? null;

        $controller.= 'Controller';

        return [
            'controller' => $controller,
            'action' => $action,
            'id' => $id,
        ];
    }
}