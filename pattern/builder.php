<?php

class TollCar{
	private $material;
	private $color;
	private $shape;
	public function setMaterail($material){
		$this->material=$material;
		echo "the toll materail is ".$material."<br>";
	}
	public function setColor($color){
		$this->color=$color;
		echo "the toll color is ".$color."<br>";
	}
	public function setShape($shape){
		$this->shape=$shape;
		echo "the toll shape is ".$shape."<br>";
	}
}
class TollCarBuilder{
	private $toll;
	public function __construct($material,$color,$shape){
		$toll=new TollCar();
		$toll->setMaterail($material);
		$toll->setColor($color);
		$toll->setShape($shape);
		$this->toll=$toll;
	}
	public function build(){
		return $this->toll;
	}
}
$builder=new TollCarBuilder("wooden","red","square");
$builder->build();
?>