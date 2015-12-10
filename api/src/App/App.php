<?php
namespace ATM\App;

use \Klein\Klein;

class App {

    public $dir;
    public $klein;

    public function __construct($dir){
        $this->dir = $dir;
        $this->klein = new Klein();
        $this->routes();
    }

    public function routes(){
        $this->_route('/api', 'Api');
    }

    public function initialize(){
        $this->klein->dispatch();
    }

    protected function _route($route, $name){
        $file = $this->dir . DS . 'src' . DS . 'Controllers' . DS . $name . '.php';
        if(file_exists($file)){
            return $this->klein->with($route, $file);
        } else {
            return false;
        }
    }
}
