Command Pattern<br>
it seems like Factory Abstract Pattern<br>
<?php
class FirstPrize{
	function showPrize(){
		echo "First prize you can get BWM Car<br>";
	}
}
class SecondPrize{
	function show(){
		echo "Second prize you can get motorbike<br>";
	}
}
class ThirdPrize{
	function show(){
		echo "Third prize you can get IPhone6<br>";
	}
}

class ConsolationPrize{
	function show(){
		echo "Consolation prize you can get $20<br>";
	}
}
interface ICommand{
	public function show();
}
class FirstPrizeCommand implements ICommand{
	private $prize;
	public function __construct(){
		$this->prize=new FirstPrize();
	}
	public function show(){
		$this->prize->showPrize();
	}
}

class SecondPrizeCommand implements ICommand{
	private $prize;
	public function __construct(){
		$this->prize=new SecondPrize();
	}
	public function show(){
		$this->prize->show();
	}
}

class ThirdPrizeCommand implements ICommand{
	private $prize;
	public function __construct(){
		$this->prize=new ThirdPrize();
	}
	public function show(){
		$this->prize->show();
	}
}

class ConsolationPrizeCommand implements ICommand{
	private $prize;
	public function __construct(){
		$this->prize=new ConsolationPrize();
	}
	public function show(){
		$this->prize->show();
	}
}
class Sudoku{
	public $command;
	public function setCommand($command){
		$this->command=$command;
	}
	public function lotteryDraw(){
		$this->command->show();
	}
}

$sudoku=new Sudoku();

$prize=new FirstPrizeCommand();
$sudoku->setCommand($prize);
$sudoku->lotteryDraw();

$prize=new ConsolationPrizeCommand();
$sudoku->setCommand($prize);
$sudoku->lotteryDraw();


