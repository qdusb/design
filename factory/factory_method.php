<?php
interface IWebFactory{
	public function productWeb($type);
}
//simple web factory 
class SimpleWebFactory implements IWebFactory{
	public function productWeb($type){
		switch (strtolower($type))
		{
			case 'news':
				return new NewsWeb();
			case 'display':
				return new DisplayWeb();
			case 'pic':
				return new PicWeb();
			case 'hr':
				return new HRWeb();
			case 'message':
				return new MessageWeb();
		}
	}
}
class ComplexWebFactory implements IWebFactory{

	public function productWeb($type){
		switch (strtolower($type))
		{
			case 'news':
				return new NewsWeb();
			case 'display':
				return new DisplayWeb();
			case 'pic':
				return new PicWeb();
			case 'hr':
				return new HRWeb();
			case 'message':
				return new MessageWeb();
		}
	}
}
//product
class Web{
	public $type="base";
	public $data;
	public $head;
	public function loadData($data){
		$this->data=$data;
	}
	public function setHead($head){
		$this->head=$head;
	}
	public function display(){
		if($this->head){
			echo "the web head is".$this->head."<br>";
		}
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
	public $type;
	public $web_factory;
	function SimpleWeb(){
		$this->web_factory=new SimpleWebFactory();
	}
	function createWeb($type){
		$this->type=$type;
		$web=$this->web_factory->productWeb($this->type);
		$web->loadData("the simple web factory create simple web");
		$web->display();
	}
}
class ComplexWeb{
	public $type;
	public $web_factory;
	function ComplexWeb(){
		$this->web_factory=new ComplexWebFactory();
	}
	function createWeb($type){
		$this->type=$type;
		$web=$this->web_factory->productWeb($this->type);
		$web->setHead("Complex Web");
		$web->loadData("the complex web factory create complex web");
		$web->display();
	}
}
$web=new SimpleWeb();
$web->createWeb("news");
echo "<hr>";
$web=new ComplexWeb();
$web->createWeb("hr");

