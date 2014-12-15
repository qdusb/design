<?php
interface IO{
	public function write($msg);
	public function read();
}
class Console implements IO{
	private $msgs;
	public function __construct(){
		$this->msgs=array(); 
	}
	public function read(){
		return $this->msgs;
	}
	public function write($msg){
		echo "Console:".$msg;
		array_push($this->msgs,$msg);
	}
}
interface IError{
	public function getError();
	public function setError($error);
}
class ErrorObject implements IError{
	private $_error;
	public function __construct($error){
		$this->_error=$error;
	}
	public function getError(){
		return $this->_error;
	}
	public function setError($error){
		$this->_error=$error;
	}
}

class LogToConsole{
	private $_errorObject;
	public function __construct($errorObject){
		$this->_errorObject=$errorObject;
	} 
	public function write(){
		echo "Console:".$this->_errorObject->getError()."<br>";
	}
}
/*新加入的第三方代码，其他系统有使用，不能改动*/
class LogToCSV{
	private $_errorObject;
		public function __construct($errorObject){
		$this->_errorObject=$errorObject;
	} 
	public function write(){
		echo "CSV:".$this->_errorObject->getErrorNum();
		echo ":";
		echo $this->_errorObject->getError();
		echo "<br>";
	}
}

/* 解决方案 适配器 */
class ErrorObjectAdapter implements IError{
	private $errorObject;
	private static $num=0;
	public function __construct($errorObject){
		$this->errorObject=$errorObject;
	}
	public function getErrorNum(){
		self::$num++;
		return self::$num;
	}
	public function getError(){
		return $this->errorObject->getError();
	}
	public function setError($error){
		$this->errorObject->setError($error);
	}	
}
$error=new ErrorObject("404 page not found");
$logToConsole=new LogToConsole($error);
$logToConsole->write();
echo "<br>";

$errorAdapter=new ErrorObjectAdapter($error);
$logToCSV=new LogToCSV($errorAdapter);
$logToCSV->write();
$errorAdapter->setError("not defined!");
$logToCSV->write();
$logToCSV->write();
$logToCSV->write();
$logToCSV->write();
?>




































