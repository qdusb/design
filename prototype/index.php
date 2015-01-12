<?php
class Employee{
	private $name;
	private $depart;
	public function setName($v){
		$this->name=$v;
	}
	public function setDepart($v){
		$this->depart=$v;
	}
	public function showInfo(){
		echo "Name:".$this->name." Depart:".$this->depart;
		echo "<br>";
	}
	public function __clone(){}
}
$emplyee=new Employee();/
$liMing=clone $emplyee;
$liMing->setName("Li Ming");
$liMing->setDepart("Manage");
$liMing->showInfo();

$shiTingTing=clone $emplyee;
$shiTingTing->setName("Shi Ting Ting");
$shiTingTing->setDepart("HR");
$shiTingTing->showInfo();
?>