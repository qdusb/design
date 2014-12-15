Builder<br>
<?php
class RobatDog{
	private $bone;
	private $skin;
	private $weapon;
	private $power;
	public function loadBone($bone){
		$this->bone=$bone;
	}
	public function loadSkin($skin){
		$this->skin=$skin;
	}
	public function loadWeapon($weapon){
		$this->weapon=$weapon;
	}
	public function loadPower($power){
		$this->power=$power;
	}
	public function speak(){
		if(empty($this->skin)||empty($this->bone)||empty($this->weapon)||empty($this->power)){
			echo "I am not ready!";
		}else{
			echo "I am robat dog!I am ready!I have load bone {$this->bone},load skin {$this->skin},load weapon {$this->weapon},load power {$this->power}";
		}
		
	}
}
class RobatDogFactory{
	private $dogs;
	private $dog;
	public function __construct(){
		$this->dogs=array();
		echo "I am builder,I start to build robat dog<br>";
	}
	public function build($options){
		
		echo "build robat dog frame...<br>";
		$dog=new RobatDog();
		echo "build robat dog bone...<br>";
		$dog->loadBone($options['bone']);
		echo "build robat dog skin...<br>";
		$dog->loadSkin($options['skin']);
		echo "build robat dog weapon...<br>";
		$dog->loadWeapon($options['weapon']);
		echo "build robat dog power...<br>";
		$dog->loadPower($options['power']);
		echo "build robat dog complete<br>";
		$this->dogs[]=$dog;
		$this->dog=$dog;
	}
	public function getRobatDog(){
		return $this->dog;
	}
}

$builder=new RobatDogFactory();
$builder->build(array("bone"=>"iron bone","skin"=>"black skin","weapon"=>"heavery gun","power"=>"100000KWH"));
$dog=$builder->getRobatDog();
$dog->speak();
