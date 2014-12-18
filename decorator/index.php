<html>
<head>
<title>Head First Decorator</title>
</head>
<body>
Decorator<br>
<?php
abstract class Desk{
	public $description;
	public $price;
	public $size=1;
	const BIG_SIZE=1.5;
	const NORMAL_SIZE=1;
	const SMALL_SIZE=0.5;

	public function getDescription(){
		return $this->description;
	}

	public function cost(){
		return $this->price*$this->size;
	}
	public function setSize($size){
		$this->size=$size;
	}
}
//被装饰
class SquareDesk extends Desk{
	public function SquareDesk(){
		$this->price=200;
		$this->description="SquareDesk";
	}

}
class CircularDesk extends Desk{
	public function CircularDesk(){
		$this->price=220;
		$this->description="CircularDesk";
	}
}
class TriangleDesk extends Desk{
	public function TriangleDesk(){
		$this->price=180;
		$this->description="TriangleDesk";
	}
}
class LongDesk extends Desk{
	public function LongDesk(){
		$this->price=260;
		$this->description="LongDesk";
	}
}
//被装饰
class DecorateDesk extends Desk{
	public $desk;
	public function DecorateDesk($desk){
		$this->desk=$desk;
	}
	public function cost(){

		return $this->price+$this->desk->cost();
	}
}

class ColorDesk extends DecorateDesk{
	public function ColorDesk($desk){
		$this->desk=$desk;
		$this->price=120;
	}

}

class AdronDesk extends DecorateDesk{
	public function AdronDesk($desk){
		$this->desk=$desk;
		$this->price=380;
	}

}

$desk=new LongDesk();
$desk->setSize(Desk::BIG_SIZE);
echo "Long Desk price $".$desk->cost();
echo "<br>";
$colorDesk=new ColorDesk($desk);
echo "The colorfull long desk price $".$colorDesk->cost();
echo "<br>";
$adronDesk=new AdronDesk($desk);
echo "The adron long desk price $".$adronDesk->cost();
echo "<br>";
$adronDesk=new AdronDesk($colorDesk);
echo "The colorfull adron long desk price $".$adronDesk->cost();
echo "<br>";

?>
</body>
</html>