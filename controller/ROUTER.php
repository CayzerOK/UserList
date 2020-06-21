<?php

class ROUTER {

    function route($params) {

        $controllerName = 'index';
        $actionName = 'index';

        $root = $_SERVER['DOCUMENT_ROOT'];
        if (!empty($params['path'])) {
            $routes = explode('/', $params['path']);
        } else {
            $routes = [
                "index"
            ];
        }


        if ( !empty($routes[0]) ) {
            $controllerName = $routes[0];
        }
        if ( !empty($routes[1]) ) {
            $actionName = $routes[1];
        }

        $controllerName = 'ctrl_'.$controllerName;

        $controller = $controllerName.'.php';
        $controllerPath = $root."/controller/site/".$controller;
        if(file_exists($controllerPath)) {
            include $controllerPath;
        } else {
            $this->error404($controllerPath);
            return;
        }
        session_start();
        if (empty($_SESSION)) {
            $_SESSION = [
                'lang' => 'rus',
                'admin' => false,
                'user_id' => 0,
                'login' => "guest",
                'email' => '',
                'guest' => true
            ];
        }
        if(!$_SESSION['lang']) {
            $_SESSION['lang'] = 'eng';
        }

        $controller = new $controllerName;

        if(method_exists($controller, $actionName)) {
            if (method_exists($controller, $actionName.'_valid')) {
                $validFunc = $actionName.'_valid';
                if ($controller->$validFunc()) {
                    $controller->$actionName();
                }
            } else {
                $controller->$actionName();
            }
        } else {
            $controller->index($actionName);
            return;
        }
    }

    function error404($path = null)
    {
        TMP::add('404', $path);
        TMP::exec();
    }
}

function __autoload( $className ) {
    $className = str_replace( "..", "", $className );
    require_once( $_SERVER['DOCUMENT_ROOT']."/controller/{$className}.php" );
}
