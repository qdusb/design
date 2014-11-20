Adapter Pattern<br>
<?php
interface ICar{
	public function addSpeed();
	public function autoDrive();
	public function autoNavigation();
	public function carry();
}
class Car implements ICar{
	public $speed;
	public function addSpeed(){
		$this->speed+=5;
		echo "addSpeed:car add speed 5<br>";
	}
	public function autoDrive(){
		echo "autoDrive:car add auto drive<br>";
	}
	public function autoNavigation()
	{
		echo "autoNavigation:car can navigation<br>";
	}
	public function carry(){
		echo "carry:car can carry 4 persons<br>";
	}
}
class Bike{
	public $speed;
	public function addSpeed(){
		$this->speed+=1;
		echo "addSpeed:bike add speed 1<br>";
	}
	public function ride(){
		echo "ride:bike ride vary slowly<br>";
	}
	public function carry(){
		echo "carry:bike can carry 1 person<br>";
	}
}
class BikeAdapter implements ICar{
	public $bike;
	public function BikeAdapter($bike){
		$this->bike=$bike;
	}
	public function addSpeed(){
		for($i=1;$i<5;$i++){
			$this->bike->addSpeed();
		}
	}
	public function autoDrive(){
		$this->bike->ride();
	}
	public function autoNavigation()
	{
		echo "navigation:bike can not navigation<br>";
	}
	public function carry(){
		for($i=1;$i<5;$i++){
			$this->bike->carry();
		}
	}
}
$bike=new Bike();
$bikeAdapter=new BikeAdapter($bike);
$car=new Car();

$car->addSpeed();
$car->carry();
$car->autoNavigation();
$car->autoDrive();
echo "<hr>";
$bikeAdapter->addSpeed();
$bikeAdapter->carry();
$bikeAdapter->autoNavigation();
$bikeAdapter->autoDrive();
?>