<?php 
class AppController{

    public static function main(){
        // Archivos de Configuración
        require_once 'appserver/_class/Config.php';
        require_once 'config.php';
        require_once 'autoload.php';

        // Archivos del Servidor
        require_once "{$config->get('controllers')}IController.php";
        require_once "{$config->get('models')}IModel.php";
        require_once "{$config->get('models')}SPDO.php";
        require_once "{$config->get('views')}View.php";

        // Obtenermos el Controllador y la funcion a reaizar
        $controllerName = isset($_REQUEST['controller']) ? ucfirst(strtolower($_REQUEST['controller']))."Controller" : "IndexController";
        $action = isset($_REQUEST['action']) ? strtolower($_REQUEST['action']) : "index";

        // Creamos el path del controlador
        $controllerPath = "{$config->get('controllers')}{$controllerName}.php";

        // Verificamos si existe el controllador
        if(is_file($controllerPath)){
            self::requestController($controllerName, $action);
        }else{
            die("El controllador {$controllerName} no existe");
        }
    }

    private function requestController($controllerName, $action){
        if(is_callable(array($controllerName, $action))){
            $controller = new $controllerName();

            if(is_a($controller, "IController")){
                $controller->$action();
            }else{
                die("El controllador {$controllerName} no es una instancia de IController");
            }
        }else{
            die("No se encontro la función {$controllerName}->{$action}()");
        }
    } 
    
}
?>