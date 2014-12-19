<html>
<head>
	<title>interpreter the sample is bad</title>
</head>
<body>
<?php
class ID{
	private static $id=0;
	private function __construct(){
		
	}
	public static function getId(){
		return self::$id++;
	}
}
class Book{
	private $title;
	public function __construct($title){
		$this->title=$title;
	}
	public function getTitle(){
		return $this->title;
	}
}
class User{
	private $user_name;
	private $user_id;
	public function __construct($name){
		$this->user_name=$name;
		$this->id=ID::getId();
	}
	public function getFavouriteBook(){
		$book_str="{{book.getTitle}}";
		return $bool_str;
	}
}
class BookInterpreter{
	private $user;
	function setUser($user){
		$this->user=$user;
	}
	public function interpteter(){
	}
}
?>
</body>
</html>
