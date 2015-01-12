MVC-Model View Control
<hr>
<?php
//Model 菜单项
class MenuItem{
	public $name;
	public $price;
}
class TomatoItem extends MenuItem{

	public function __construct(){
		$this->name="tomato noodle";
		$this->price="￥12.00";
	}
}
class BeefNoodleItem extends MenuItem{

	public function __construct(){
		$this->name="beef noodle";
		$this->price="￥16.00";
	}
}
//View 接口文件
interface IDisplay{
	public function displayName($name);
	public function displayPrice($price);
}
class PaperMenu implements IDisplay{
	public function displayName($name){
		echo "I am PaperMenu.I show the item's name on paper.The item name is ".$name;
		echo "<br>";
	}
	public function displayPrice($price){
		echo "I am PaperMenu.I show the item's price on paper.The item price is ".$price;
		echo "<br>";
	}
}

class PhoneMenu implements IDisplay{
	public function displayName($name){
		echo "I am ".__CLASS__.".I show the item's name on phone.The item name is ".$name;
		echo "<br>";
	}
	public function displayPrice($price){
		echo "I am ".__CLASS__.".I show the item's price on phone.The item price is ".$price;
		echo "<br>";
	}
}
/*Control 控制器*/
class ResControl{
	private $model;
	private $view;
	public function __construct($model,$view){
		$this->model=$model;
		$this->view=$view;
	}
	public function setModel($model){
		$this->model=$model;
	}
	public function setView($view){
		$this->view=$view;
	}
	public function displayName(){
		$this->view->displayName($this->model->name);
	}
	public function displayPrice(){
		$this->view->displayPrice($this->model->price);
	}
}
$model=new TomatoItem();
$view=new PaperMenu();
$control=new ResControl($model,$view);
$control->displayName();
$control->displayPrice();

$control->setModel(new BeefNoodleItem());
$control->displayName();
$control->displayPrice();
$control->setView(new PhoneMenu());
$control->displayName();
$control->displayPrice();
?>