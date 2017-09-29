<?php 
class View{
    private $config;

    public function __construct(){
        $this->config = Config::singleton();
    }

    public function load($template, $vars = array()){
        $templatePath = "{$this->config->get('views')}{$template}.php";

        if(is_file($templatePath)){
            extract($vars);
            require_once $templatePath;
        }else{
            trigger_error("La view \"{$templatePath}\" no existe - 404 file not exit", E_USER_ERROR);
        }
    }
}
?>