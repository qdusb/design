<html>
<head>
<title>delegate pattern</title>
</head>
<body>
<?php
class Song{
	private $title;
	private $url;
	private $total_time;
	private $creater;
	private $size;
	public function __construct($title,$url){
		$this->title=$title;
		$this->url=$url;
		$this->analysisSong();
	}
	private function analysisSong(){
		$this->creater="Mike Jackson";
		$this->size=4056232;
		$this->total_time=248.3;
	}
	public function getValueByName($value){
		if(isset($this->$value)){
			return $this->$value;
		}else{
			return null;
		}
		
	}
}
class PlayList{
	private $songs;
	private $list_creater;
	public function __construct($type){
		$this->songs=array();
		$creater=$type."ListDelegate";
		$this->list_creater=new $creater();
	}
	public function addSong($song){
		$keys=array_keys($this->songs,$song);
		if(count($keys)==0){
			$this->songs[]=$song;
		}
	}
	public function removeSong($song){
		$keys=array_keys($this->songs,$song);
		foreach($keys as $val){
			array_splice($this->songs,$val,1);
		}
	}
	public function getAllSongs(){
		return $this->songs;
	}
	public function getList(){
		//感觉就是工厂方法
		return $this->list_creater->getList($this->songs);
	}
}
interface IListDelegate{
	public function getList($songs);
}
class XMLListDelegate implements IListDelegate{
	public function getList($songs){
		$xml="<root>";
		foreach($songs as $song){
			$xml.="<song url='".$song->getValueByName('url')."' >".$song->getValueByName('title')."</song>";
		} 
		$xml.="</root>";
		return htmlentities($xml);
	}
}
class CSVListDelegate implements IListDelegate{
	public function getList($songs){
		$csv="";
		foreach($songs as $song){
			$csv.=$song->getValueByName('url').",".$song->getValueByName('title').",<br>";
		} 
		return $csv;
	}
}
$song=new Song("Danagers","http://www.baidu.com/mp3/2015483.mp3");
$song2=new Song("World Peace","http://www.baidu.com/mp3/2015484.mp3");
$playList=new PlayList("CSV");
$playList->addSong($song);
$playList->addSong($song2);
echo $playList->getList();
?>
</body>
</html>