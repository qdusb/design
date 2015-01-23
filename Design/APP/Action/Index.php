<?php

namespace App\Action;

class Index {
    private static $instance;
    private function __construct(){

    }
    public static function getInstance(){
        if(empty(self::$instance)){
           self::$instance=new Index();
        }
        return self::$instance;
    }
    public function display(){
        echo "display";
    }
} 