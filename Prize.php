<?php
class Prize{
	public $name;
	public $count;
	public $limit;
	public $rate;
	public $has_win_count=0;
	private $total_rate;
	public $min=0;
	public $max=0;
	public function __construct($name,$count,$limit,$rate){
		$this->name=$name;
		$this->count=$count;
		$this->limit=$limit;
		$this->rate=$rate;
		$this->has_win_count=1;
	}
	public function addWin(){
		if($this->count>0){
			$this->has_win_count++;
			$this->count--;
		}
	}

	public function printPrize(){
		echo "name:<strong style='color:#F00'>".$this->name."</strong> count:".$this->count." limit:".$this->limit." rate:".$this->rate."% min:".$this->min." max:".$this->max."<br>";
	}
}
class PrizeProcessCeneter{
	private $prizeItems=array();
	private $stage=5;
	public $rate_range;
	public $total_count;
	public function __construct(){
		/*0-7 8-9 10-12 13-16 17-19 20-22 23-24*/
		$this->rate_range=array(0.1,0.1,0.15,0.15,0.2,0.2,0.1);	
	}
	public function drawPrizesChart(){
        $size = 600;  
        $image = imagecreatetruecolor($size*1.5,$size);  
          
        //用白色背景，黑色边框画方框  
        $white = imagecolorallocate($image, 255, 255, 255);
        $back = imagecolorallocate($image,0,0,0);  
        $red = imagecolorallocate($image, 255, 0, 0);
          
        //imagefilledrectangle($image,20,20,$size,$size,$white);      //画出白色背景  
        imagestring($image,5,60,20,"The Total Prizes Chart",$white);
        imageline  ($image,40,560,860,560,$white);
        imageline  ($image,40,560,40,40,$white);

         imagestring($image,5,30,565,0,$red);
         for($i=1;$i<=15;$i++){
         	 imagestring($image,5,20,565-30*$i,$i,$red);
         	 imageline($image,40,565-30*$i,45,565-30*$i,$white);
         }
         for($i=1;$i<=24;$i++){
         	 imagestring($image,5,40+30*$i,565,$i,$red);
         	 imageline($image,40+30*$i,560,40+30*$i,555,$white);
         }
         $text="The Total Prizes Count is ".$this->total_count;
         imagestring($image,3,60,40,$text,$white);
         /*0-7 8-9 10-12 13-16 17-19 20-22 23-24*/
         $time_range=array("0#7","8#9","10#12","13#16","17#19","20#22","23#23");
         $new_rate=array_combine($time_range, $this->rate_range);
         foreach($new_rate as $key=>$rate){
         	list($min,$max)=explode("#", $key);
         	//echo $key;
         	$sizeX=($max+1)*30+40;
         	$deltX=($max-$min+0.5)*15;
         	$sizeY=ceil($this->total_count*$rate);
         	$posX=40+30*$min;
         	$posY=560-$sizeY;
         	$red=imagecolorallocate($image, rand(1,255), rand(1,255), rand(1,255));
         	imagefilledrectangle($image,$posX,$posY,$sizeX,560,$red);
         	imagestring($image,3,$posX+$deltX,$posY+$sizeY/2,$sizeY,$white);
         	
         }
        header("Content-type: image/jpeg");  
        //输出结果  
        imagepng($image);  
        imagedestroy($image);  
	}
	public function setPrizeItems($prizeItems){
		$this->prizeItems=$prizeItems;
		$total_rate=0;
		foreach($this->prizeItems as $prize){
			$prize->min=$total_rate+1;
			$total_rate+=$prize->rate*100;
			$prize->max=$total_rate;
			$this->total_count+=$prize->limit;
		}
		$this->total_rate=$total_rate;
	}
	public function getPrizeRate($f=0){
		$hour=(int)date("H");
		$rate=0;
		if(0<=$hour&&$hour<=7){
			$rate=0.1;
		}elseif(8<=$hour&&$hour<=9){
			$rate=0.2;
		}elseif(10<=$hour&&$hour<=12){
			$rate=0.35;
		}elseif(13<=$hour&&$hour<=16){
			$rate=0.5;
		}elseif(17<=$hour&&$hour<=19){
			$rate=0.7;
		}elseif(20<=$hour&&$hour<=22){
			$rate=0.9;
		}elseif(23<=$hour&&$hour<=24){
			$rate=1;
		}
		$rate*=$f;
		return $rate;

	}
	public function printPrize(){
		foreach($this->prizeItems as $key=>$prize){
			echo ($key+1).":";
			$prize->printPrize();
		}
	}
	public function getPrizeRestCount($prize){
		$curr_prize_count=ceil($prize->limit*$this->getPrizeRate());
		$rest_count=$curr_prize_count-$prize->has_win_count;
		$rest_count=max($rest_count,0);
		return $rest_count;
	}
	public function getTotalRest(){
		$count=0;
		foreach($this->prizeItems as $prize){
			$count+=$this->getPrizeRestCount($prize);
		}
		return $count;
	}
	public function drawPrize(){

		echo "<strong style='color:#0F0'>Start Draw.....</strong><br>";
		echo "get prize rate: ";
		echo $this->getPrizeRate();
		echo "<br>";
		echo "total rate is {$this->total_rate}<br>";
		$rand_num=rand(1,$this->total_rate);
		echo "draw number is <strong style='color:#F00'>$rand_num</strong><br>";
		$curr_prize=null;
		echo "the total rest prizes num is ".$this->getTotalRest();
		echo "<br>";
		if($this->getTotalRest()>0){
			foreach($this->prizeItems as $prize){
				if($prize->min<=$rand_num&&$prize->max>=$rand_num){
					$curr_prize=$prize;
					echo "the prize is ";
					$curr_prize->printPrize();
					break;
				}
			}
			$rest_count=$this->getPrizeRestCount($curr_prize);
			echo "rest count of prize is ".$rest_count."<br>";
			while($rest_count==0&&$curr_prize!=null){
				echo "the prizes are enough,but the prize is ";
				$curr_prize->printPrize();
				echo " have not enough,draw again!!!<br>";
				$curr_prize=$this->drawPrize();
				$rest_count=$this->getPrizeRestCount($curr_prize);
			}
		}else{
			echo "<strong style='color:#F00'>You have no prize to draw</strong>";
		}
		return $curr_prize;
	}
}
class PrizeBuilder{
	public $prizeInfos;
	public $prizeItems;
	public function __construct(){
		$this->prizeItems=array();
		$prizeInfos=array(
			array("name"=>"IPhone","count"=>1,"limit"=>1,"rate"=>0.01),
			array("name"=>"10WJB","count"=>100,"limit"=>10,"rate"=>14.99),
			array("name"=>"wine","count"=>5,"limit"=>1,"rate"=>5),
			array("name"=>"50WJB","count"=>100,"limit"=>10,"rate"=>5),
			array("name"=>"Cup","count"=>10,"limit"=>2,"rate"=>5),
			array("name"=>"100WJB","count"=>50,"limit"=>5,"rate"=>5),
			array("name"=>"No Prize","count"=>2000,"limit"=>400,"rate"=>35),
			array("name"=>"200WJB","count"=>25,"limit"=>5,"rate"=>5),
			array("name"=>"Light","count"=>10,"limit"=>2,"rate"=>2.5),
			array("name"=>"300WJB","count"=>20,"limit"=>4,"rate"=>2.5),
			array("name"=>"Egg Device","count"=>5,"limit"=>1,"rate"=>2.5),
			array("name"=>"400WJB","count"=>15,"limit"=>3,"rate"=>2.5),
			array("name"=>"50RMB","count"=>10,"limit"=>2,"rate"=>2.5),
			array("name"=>"500WJB","count"=>10,"limit"=>2,"rate"=>2.5),
			array("name"=>"20RMB","count"=>15,"limit"=>3,"rate"=>2.5),
			array("name"=>"10RMB","count"=>0,"limit"=>4,"rate"=>2.5)
		);
		foreach($prizeInfos as $info){
			$prize=new Prize($info['name'],$info['count'],$info['limit'],$info['rate']);
			array_push($this->prizeItems, $prize);
		}
	}
}
date_default_timezone_set('Asia/Shanghai'); 

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>2014购物节</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
$builder=new PrizeBuilder();
$process=new PrizeProcessCeneter();
$process->setPrizeItems($builder->prizeItems);
$process->printPrize();
$curr_prize=$process->drawPrize();
?>

</body>
</html>