<?php 
// Configuramos el autoload de los archivos
spl_autoload_register(function ($class)
{
    $config = Config::singleton();
    $directories = ["_class", "controllers", "entities", "models", "views"];

    foreach ($directories as $dir) {
        $pathFile = "{$config->get($dir)}{$class}.php";
        if(is_file($pathFile)){
            require_once $pathFile;
            break;
        }
    }
});

?>