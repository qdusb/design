<?php
class Hand{
	private static $instance;
	private function __construct(){
		echo "single contruct<br>";
	}
	public static function getInstance(){
		if(!self::$instance){
			self::$instance=new self;
		}
		return self::$instance;
	}
	public function display(){
		echo __CLASS__." I am singleton <br>";
	}
	public function __clone(){
		trigger_error("this is singleton,can not be cloned");
	}
}

$hand=Hand::getInstance();
$hand->display();

$hand1=Hand::getInstance();
$hand1->display();