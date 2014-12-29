<?php
class Drink{
	public $price;
	public function cost(){
		return $this->price;
	}
}
Class Tea extends Drink{
	public function __construct(){
		$this->price=3;
	}
}
Class Coffee extends Drink{
	public function __construct(){
		$this->price=5;
	}
}
Class Milk extends Drink{
	public function __construct(){
		$this->price=4;
	}
}
Class Seasoning extends Drink{
	public $drink;
	public function __construct($drink){
		$this->drink=$drink;
	}

	public function cost(){
		return $this->price+$this->drink->cost();
	}
	public function getPrice(){
		 return $this->price;
	}
}
Class Suger extends Seasoning{
	public $drink;
	public function __construct($drink){
		$this->drink=$drink;
		$this->price=0.5;
	}


}
Class Lemon extends Seasoning{
	public $drink;
	public function __construct($drink){
		$this->drink=$drink;
		$this->price=1.5;
	}
}
Class Strawberry extends Seasoning{
	public $drink;
	public function __construct($drink){
		$this->drink=$drink;
		$this->price=2.5;
	}
}
$tea=new Tea();
echo "tea cost $".$tea->cost()."<br>";
$coffee=new Coffee();
echo "coffee cost $".$coffee->cost()."<br>";
$milk=new Milk();
echo "milk cost $".$milk->cost()."<br>";

$suger=new Suger(null);
echo "suger cost $".$suger->getPrice()."<br>";


$lemonTea=new Lemon($tea);

echo "lemon cost $".$lemonTea->getPrice()."<br>";

echo "lemon tea cost $".$lemonTea->cost()."<br>";

$sugerLemonTea=new Suger($lemonTea);
echo "suger lemon tea cost $".$sugerLemonTea->cost()."<br>";
?>