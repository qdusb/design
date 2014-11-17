Strategy Pattern<br>
<style type="text/css">
	.pre {
width: 620px;
margin: 10px 0 0 0;
padding: 10px;
border: 0;
border: 1px dotted #785;
background: #f5f5f5;
font-family: "Courier New",monospace;
font-size: 12px;
}
</style>
<pre class="pre">
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

?>
</pre>