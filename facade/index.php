<html>
<head>
	<title>facede pattern</title>
</head>
<body>
<?php
class Web{
	private $url;
	private $params;
	public function getURL(){
		$this->url="http://365jia.cn/news?id=10&page=1";
	}
	public function analysisURL(){
		$preg="/\?([a-zA-Z0-9=&]+)/";
		$url=$this->url;
		preg_match($preg,$url,$matches);
		$params_str="";
		if(count($matches)>0){
			$params_str=$matches[1];
		}
		$params_str_arr=explode("&",$params_str);
		$params=array();
		foreach($params_str_arr as $param){
			list($key,$val)=explode("=",$param);
			$params[$key]=$val;
			
		}
		
		$this->params=$params;
	}
	function loadDynamicContentByParams(){
		$params=$this->params;
		echo "params:<br>";
		foreach($params as $key=>$val){
			echo $key.":".$val."<br>";
		}
	}
	function loadHtml(){
		echo "load html frame<br>";
		echo "load css and js files<br>";
		echo "load dynamic content<br>";
		echo "set metas <br>";
		echo "display <br>";
	}
}
class WebFacade{
	private $web;
	public function __construct(){
		$this->web=new Web();
	}
	public function displayWeb(){
		$this->web->getURL();
		$this->web->analysisURL();
		$this->web->loadDynamicContentByParams();
		$this->web->loadHtml();
	} 
}
$webFacade=new WebFacade();
$webFacade->displayWeb();
?>
</body>
</html>
