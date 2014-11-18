<?php
//simple web factory 
class WebFactory{
	public function productWeb($type){
		switch (strtolower($type))
		{
			case 'news':
				return new NewsWeb();
			case 'pic':
				return new PicWeb();
			case 'display':
				return new DisplayWeb();
			default:
				return new Web();
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
class DisplayWeb extends Web{
	function DisplayWeb(){
		$this->type="display";
	}
}
$webs=array("pic","news","display","info");
foreach($webs as $key=>$val){
	$factory=new WebFactory();
	$web=$factory->productWeb($val);
	$web->loadData("the ".($key+1)." web");
	$web->display();
}

