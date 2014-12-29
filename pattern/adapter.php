<?php
//日志信息
class LogMessage{
	private $msg;
	public function setMsg($msg){
		$this->msg=$msg;
	}
	public function log(){
		return $this->msg;
	}
}

//日志信息控制台
class MessageConsole{
	private $msgs=array();
	
	public function addMessage($msg){
		array_push($this->msgs,$msg);
	}
	public function log(){
		$msg=array_pop($this->msgs);
		echo "log:".$msg->log()." save to log file...<br>";
	}
}

//新加入CSV格式Message,使用适配器模式，适配日志信息控制台
class CSVMessage{
	private $msg;
	public function setMsg($msg){
		$this->msg=$msg;
	}
	public function csv(){
		return $this->msg;
	}
}
Class CSVMessageAdapter{
	private $msg;
	public function __construct(){
		$this->msg=new CSVMessage();
	}
	public function setMsg($msg){
		$this->msg->setMsg($msg);
	}
	public function log(){
		return $this->msg->csv();
	}
}
$msgConsole=new MessageConsole();
$logMsg=new LogMessage();
$logMsg->setMsg("404 Error,can not find page");
$msgConsole->addMessage($logMsg);
$msgConsole->log();
//添加CSV信息至信息台
$csvMsg=new CSVMessageAdapter();
$csvMsg->setMsg("user cui,date 2014/12/19");
$msgConsole->addMessage($csvMsg);
$msgConsole->log();
?>