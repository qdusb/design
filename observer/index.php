Observer<br>
<style type="text/css">
pre {
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
<pre>
class MessageStation{
private $observers;
private static $instance;
function MessageStation(){
	$this->observers=array();
}
public static function getInstance(){
	if(!isset(MessageStation::$instance)){
		MessageStation::$instance=new MessageStation();
	}
	return MessageStation::$instance;
}
function addObserver($o){
	if(!in_array($o, $this->observers)){
		array_push($this->observers,$o);
	}
}
function deleteObserver($o){
	if(in_array($o, $this->observers)){
		foreach($this->observers as $key=>$val){
			if($val==$o)break;
		}
		unset($this->observers[$key]); 
	}
}
function setChange($array){
	foreach ($this->observers as $key => $observer) {
		$observer->update($array);
	}
}
}

//observer
abstract class Observer{
	public $ms;
	public function __construct(){
		$this->ms=MessageStation::getInstance();
	}
	public function update($array){

	}
	function book(){
		$this->ms->addObserver($this);
	}
	function unBook(){
		$this->ms->deleteObserver($this);
	}
}
class AmericanObserver extends Observer{

	public function update($array){
		echo "I am American,I speak English ".$array["msg"]."<br>";
	}
}
class ChineseObserver extends Observer{
	public function update($array){
		echo "I am Chinese,I speak Chinese ".$array["msg"]."<br>";
	}
}
$messageStation=MessageStation::getInstance();
$p1=new AmericanObserver();
$p1->book();

$p2=new ChineseObserver();
$p2->book();

$messageStation->setChange(array("msg"=>"I am late"));
$p1->unbook();
$messageStation->setChange(array("msg"=>"I am early"));

$p2->unbook();
$messageStation->setChange(array("msg"=>"I am early too"));

<?php
//Subject
class MessageStation{
	private $observers;
	private static $instance;
	function MessageStation(){
		$this->observers=array();
	}
	public static function getInstance(){
		if(!isset(MessageStation::$instance)){
			MessageStation::$instance=new MessageStation();
		}
		return MessageStation::$instance;
	}
	function addObserver($o){
		if(!in_array($o, $this->observers)){
			array_push($this->observers,$o);
		}
	}
	function deleteObserver($o){
		if(in_array($o, $this->observers)){
			foreach($this->observers as $key=>$val){
				if($val==$o)break;
			}
			unset($this->observers[$key]); 
		}
	}
	function setChange($array){
		foreach ($this->observers as $key => $observer) {
			$observer->update($array);
		}
	}
}

//observer
abstract class Observer{
	public $ms;
	public function __construct(){
		$this->ms=MessageStation::getInstance();
	}
	public function update($array){

	}
	function book(){
		$this->ms->addObserver($this);
	}
	function unBook(){
		$this->ms->deleteObserver($this);
	}
}
class AmericanObserver extends Observer{

	public function update($array){
		echo "I am American,I speak English ".$array["msg"]."<br>";
	}
}
class ChineseObserver extends Observer{
	public function update($array){
		echo "I am Chinese,I speak Chinese ".$array["msg"]."<br>";
	}
}
$messageStation=MessageStation::getInstance();
$p1=new AmericanObserver();
$p1->book();

$p2=new ChineseObserver();
$p2->book();

$messageStation->setChange(array("msg"=>"I am late"));
$p1->unbook();
$messageStation->setChange(array("msg"=>"I am early"));

$p2->unbook();
$messageStation->setChange(array("msg"=>"I am early too"));
?>
<pre>
<br>