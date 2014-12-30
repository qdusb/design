<?php
class DreamWorks{
	private $medias;
	public static $instance;
	public function __construct(){
		$this->medias=array();
		self::$instance=$this;
	}
	public function book($media){
		array_push($this->medias,$media);
	}
	public function unBook($media){
		$keys=array_keys($this->medias,$media);
		foreach($keys as $key=>$val){
			array_splice($this->medias,$key,1);
		}
	}
	public function update($film){
		foreach($this->medias as $media){
			$media->update($film);
		}
	}
}
interface IObserver{
	public function update($film);
	public function book();
	public function unBook();
}
class Observer implements IObserver{
	public function update($film){}
	public function book(){
		DreamWorks::$instance->book($this);
	}
	public function unBook(){
		DreamWorks::$instance->unbook($this);
	}
}
class TV extends Observer{
	public function update($film){
		echo "I am <strong>CCTV-6</strong>.The film \"".$film."\" will fixation.I must pay a lot of money to get license to play.<br>";
	}
}
class NewsPaper extends Observer{
	public function update($film){
		echo "I am <strong>Anhui Daily Newspaper</strong>.The dreamworks tell me his film \"".$film."\" will fixation.He can pay me $50000 to do the first advertising<br>";
	}
}
class Youku extends Observer{
	public function update($film){
		echo "I am <strong>Youku</strong>.I need to pay $20000 to buy a license to play film \"".$film."\".<br>";
	}
}
$dreamworks=new DreamWorks();
$tv=new TV();
$tv->book();
$newsPaper=new NewsPaper();
$newsPaper->book();
$youku=new Youku();
$youku->book();
echo "<strong style='color:#F00'>Dreamworks</strong> update film \"Harry Potter\"<br>";
$dreamworks->update("Harry Potter");
$newsPaper->unBook();
echo "<strong style='color:#F00'>Dreamworks</strong> update film \"Tom  And Jerry\"<br>";
$dreamworks->update("Tom  And Jerry");




















?>