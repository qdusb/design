Strategy Pattern<br>
<textarea style="width:600px;height:600px;resize:none;color:#F33">
abstract  class Equiment{
	public $IO;
	public function display(){
		$this->IO->display();
	}
}
class TV extends Equiment{
	function TV(){
		$this->IO=new ScreenDisplay();
	}
}
class Computer extends Equiment{
	function Computer(){
		$this->IO=new ScreenDisplay();
	}
}
class Printer extends Equiment{
	function Printer(){
		$this->IO=new PaperDisplay();
	}
}
//Behavior Display
interface Display{
	function display();
} 
class ScreenDisplay implements Display{
	function display(){
		echo "display on screen<br>";
	}
}
class PaperDisplay implements Display{
	function display(){
		echo "display on paper<br>";
	}
}
class BannerDisplay implements Display{
	function display(){
		echo "display on banner<br>";
	}
}

$tv=new TV();
$tv->display();

$equi=new Computer();
$equi->display();

$equi=new Printer();
$equi->display();
</textarea>
<br>
<?php
//Client
abstract  class Equiment{
	public $IO;
	public function display(){
		$this->IO->display();
	}
}
class TV extends Equiment{
	function TV(){
		$this->IO=new ScreenDisplay();
	}
}
class Computer extends Equiment{
	function Computer(){
		$this->IO=new ScreenDisplay();
	}
}
class Printer extends Equiment{
	function Printer(){
		$this->IO=new PaperDisplay();
	}
}
//Behavior Display
interface Display{
	function display();
} 
class ScreenDisplay implements Display{
	function display(){
		echo "display on screen<br>";
	}
}
class PaperDisplay implements Display{
	function display(){
		echo "display on paper<br>";
	}
}
class BannerDisplay implements Display{
	function display(){
		echo "display on banner<br>";
	}
}

$tv=new TV();
$tv->display();

$equi=new Computer();
$equi->display();

$equi=new Printer();
$equi->display();
