Data Access Object
<?php
const DB_HOST="localhost";
const DB_NAME="my_sql";
const DB_USER="root";
const DB_PWD="123456";
abstract class BaseDAO{
	private $connection;
	private $primary_key="id";
	private $table_name;
	public function __construct(){
		$this->connect_to_db();
	}
	private function connect_to_db(){
		/* $this->connection=@mysql_connect(DB_USER,DB_PASS,DB_HOST);
		mysql_select_db(DB_NAME,$this->connection) or die(); */
	}
	public function getTableName(){
		return $this->table_name;
	}
	public function fetch($value,$key=NULL){
		if(is_null($key)){
			$key=$this->primary_key;
		}
		$sql="select * from {$this->table_name} where {$key}='{$value}'";
		$row=array();
		/* $results=mysql_query($sql,$this->connection);
		$row=array();
		while($result=mysql_fetch_array($results)){
			$row[]=$result;
		} */
		$row[]=array("id"=>1,"name"=>"jack","nick_name"=>"ibw_jack");
		$row[]=array("id"=>2,"name"=>"carter","nick_name"=>"ibw_carter");
		$row[]=array("id"=>3,"name"=>"rocky","nick_name"=>"ibw_rocky");
		return $row;
	}
	public function update($values,$where=NULL){
		$columns=array();
		foreach($values as $key=>$val){
			$columns[$key]="{$key}='{$val}'";
		}
		$set_value=implode(",",$colums);
		$sql="update {$this->table_name} set ".$set_value;
		if(is_null($where)){
			$where="{$columns[$this->primary]}";
		}
		$sql.="where {$where}";
		//mysql_query($sql);
	}
	public function delete($where){
		$sql="delete from {this->table_name} where {$where}";
		//mysql_query($sql);
	}
	function retrievalByPK($value){
		$row=$this->fetch($value);
		if(count($row)>0){
			return $row[0];
		}else{
			return NULL;
		}
	}
	function retrievalByPKS($value){
		$row=$this->fetch($value);
		if(is_array($row)){
			return $row;
		}else{
			return NULL;
		}
	}
}
class UserName extends BaseDAO{
	private $table_name="user";
	public function getColumnValue($column,$id){
		$row=$this->retrievalByPK($id);
		if($row[$column]){
			return $row[$column];
		}else{
			return NULL;
		}
	}
}
$user=new UserName();
$val=$user->getColumnValue("name",2);
echo $val;
?>




















