<?php
//代理模式就是策略模式，Actio
 class Song{
	private $title;
	public function __construct($title){
		$this->title=$title;
	}
	public function getTitle(){
		return $this->title;
	}
} 
interface SongList{
	public function getList($list);
}
class XMLSongList implements SongList{

	public function getList($list){
		$xml="<root>|";
		foreach($list as $song){
			$xml.="<song>".$song->getTitle()."</song>|";
		}
		$xml.="</root>";
		$xml=htmlspecialchars($xml);
		$xml_nodes=explode("|", $xml);

		foreach($xml_nodes as $node){
			echo $node."<br>";
		}
		return implode("", $xml_nodes);
	}
}
class CSVSongList implements SongList{

	public function getList($list){
		$csv="";
		foreach($list as $song){
			$csv.=$song->getTitle().",<br>";
		}
		return $csv;
	}
}
class LogSongList implements SongList{

	public function getList($list){
		$log="";
		foreach($list as $song){
			$log.="{song='".$song->getTitle()."'},<br>";
		}
		return $log;
	}
}

class PlayList{
	private $list;
	private $listDelegate;
	public function addSong($song){
		$this->list[]=$song;
	}
	public function __construct($listDelegate){
		$this->listDelegate=$listDelegate;
	}
	public function setListDelegate($listDelegate){
		$this->listDelegate=$listDelegate;
	}
	public function removeSong($song){
		$keys=array_keys($this->list,$song);
		foreach($keys as $val){
			array_splice($this->list,$val,1);
		}
	}
	public function getList(){
		echo $this->listDelegate->getList($this->list);
	}
}
$playList=new PlayList(new XMLSongList());
$songNames=array("burning","do you know","craig daivd-seven days","club 8","angela_ammons","All-For-You","A Thousand Miles","A Groovy Kind Of Love","when you are gone");
foreach($songNames as $val){
	$song=new Song($val);
	$playList->addSong($song);
}
$playList->getList();
?>