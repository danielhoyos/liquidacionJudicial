<?php 
class Config{
    private $var;
    private static $instance = false;

    public function _construct(){
        $this->var = array();
    }

    public function get($key){
        if(isset($this->var[$key])){
            return $this->var[$key];
        }
        return false;
    }
    public function set($key, $value){
        if(!isset($this->var[$key])){
            $this->var[$key] = $value;
        }
    }
    public static function singleton(){
        if(!self::$instance){
            $class = __CLASS__;
            self::$instance = new $class;
        }
        return self::$instance;
    }

    private function __clone(){
        trigger_error("La clonación no esta permitida", E_USER_ERROR);
    }
}
?>