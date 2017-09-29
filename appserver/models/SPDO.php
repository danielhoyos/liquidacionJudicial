<?php
    class SPDO extends PDO{
        private static $instance = false;
        private $config;

        public function __construct(){
            $this->config = Config::singleton();

            if(!self::$instance){
                try{
                    parrent::__construct("mysql:
                                            host={$this->config->get('dbhost')}; dbname={$this->config->get('dbname')}; charset={$this->config->get('charset')}",
                                            $this->config->get('user'), $this->config->get('pass'),
                                            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false)
                                        );
                }catch(PDOException $e){
                    die('Error: '.$e->getMessage());
                }   
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