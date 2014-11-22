Template Method Pattern<br>
<?php
abstract class DB{
	public $name="root";
	public $pass="";
	public $host="localhost";
	public $dbName="TemplateMethod";
	final function connectDB(){
		$this->getUserNameAndPass();
		$this->getDBHost();
		$this->getDB();
		$this->connect();
	}
	abstract function getUserNameAndPass();
	abstract function getDBHost();
	abstract function getDB();
	abstract function connect();
}
class MySQL extends DB{
	public function getUserNameAndPass(){
		echo "get MySQL user name is root,pass is 123456<br>";
	}
	public function getDBHost(){
		echo "get MySQL host is localhost <br>";
	}
	public function getDB(){
		echo "get MySQL DB is MySQLTest <br>";
	}
	public function connect(){
		echo "connect MySQL:localhost/MySQLTest with username root and pass 123456 <br>";
	}
}

class MSSQL extends DB{
	public function getUserNameAndPass(){
		echo "get MSSQL user name is admin,pass is admin123<br>";
	}
	public function getDBHost(){
		echo "get MSSQL host is http://192.168.1.100 <br>";
	}
	public function getDB(){
		echo "get MSSQL DB is MSSQLTest <br>";
	}
	public function connect(){
		echo "connect MSSQL: http://192.168.1.100/MSSQLTest with username root and pass 123456 <br>";
	}
}
$mysql=new MySQL();
$mssql=new MSSQL();

$mysql->connectDB();
echo "<hr>";
$mssql->connectDB();
?>