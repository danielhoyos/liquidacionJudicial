<?php 
class IndexController implements IController{
    private $view;

    public function __construct(){
        $this->view = new View();
    }

    public function index(){    
        $this->view->load('index');
    }
}
?>