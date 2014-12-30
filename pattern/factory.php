<?php
class Clothes{
}
class Dress extends Clothes{
	public function __construct(){
		echo "construct dress<br>";
	}
}
class Pants extends Clothes{
	public function __construct(){
		echo "construct pants<br>";
	}
}
class Shoes extends Clothes{
	public function __construct(){
		echo "construct shoes<br>";
	}
}
interface IFactory{
	public function make();
}
class DressFactory implements IFactory{
	public function make(){
		return new Dress();
	}
}
class PantsFactory implements IFactory{
	public function make(){
		return new Pants();
	}
}
class ShoesFactory implements IFactory{
	public function make(){
		return new Shoes();
	}
}
class Girl{
	private $dresses;
	private $factory;
	public function __construct(){
		$this->dresses=array();
		echo "I am a girl.I like dressing up!<br>";
	}
	public function dressUp($factory){
		$this->factory=$factory;
		echo "Start dress up... ";
		$dress=$factory->make();
		array_push($this->dresses,$dress);
	}
}
$girl = new Girl();
$dress=new DressFactory();
$girl->dressUp($dress);
$pants=new PantsFactory();
$girl->dressUp($pants);
$shoes=new ShoesFactory();
$girl->dressUp($shoes);
?>






















