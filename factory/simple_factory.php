<?php
//simple web factory 
class WebFactory{
	public function productWeb($type){
		switch (strtolower($type))
		{
			case 'news':
				return new NewsWeb();
			case 'display':
				return new DisplayWeb();
		}
	}
}

//product
class Web{
	public $type="base";
	public $data;
	public function loadData($data){
		$this->data=$data;
	}
	public function display(){
		echo $this->type." web<br>".$this->data."<br>";
	}
}
class NewsWeb extends Web{
	function NewsWeb(){
		$this->type="news";
	}
}
class PicWeb extends Web{
	function PicWeb(){
		$this->type="pic";
	}
}
class HRWeb extends Web{
	function HRWeb(){
		$this->type="hr";
	}
}
class MessageWeb extends Web{
	function MessageWeb(){
		$this->type="message";
	}
}
class DisplayWeb extends Web{
	function DisplayWeb(){
		$this->type="display";
	}
}
class SimpleWeb{
	public $webs;
	public $web_factory;
	function SimpleWeb(){
		$this->webs=array("news","display");

	}
	function createWeb(){
		$this->web_factory=new WebFactory();
		foreach($this->webs as $key=>$val){
			$web=$this->web_factory->productWeb($val);
			$web->loadData("the ".($key+1)." web");
			$web->display();
		}

	}
}
$web=new SimpleWeb();
$web->createWeb();

