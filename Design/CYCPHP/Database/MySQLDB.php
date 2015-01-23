<?php

namespace CYCPHP\Database;

use CYCPHP\Database\IDatabase;
use CYCPHP\System\Config;

class MySQLDB implements IDatabase{
    protected $conn;
    protected $host;
    protected $user;
    protected $pwd;
    protected $database;
    private static $instance;
    public static function getInstance(){
        if(empty(self::$instance)){
            self::$instance=new MySQLDB();
        }
        return self::$instance;
    }
    private function __construct(){

        $this->host=Config::get("host");
        $this->user=Config::get("user");
        $this->pwd=Config::get("pwd");
        $this->database=Config::get("database");
        $this->connect();
    }
    public function connect(){
        $this->conn=@mysql_connect($this->host,$this->user,$this->pwd);
        mysql_select_db($this->database,$this->conn);
    }
    function query($sql){
        $rst=mysql_query($sql,$this->conn);
        $rows=array();
        while($row=mysql_fetch_array($rst)){
            array_push($rows,$row);
        }
        return $rows;
    }
    function close(){
        $this->conn->close();
    }
} 