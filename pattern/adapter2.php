 <pre>
 <?php
 /**
 * ������ģʽ:��һ������Ľӿ�����Ϊ��һ��������ϣ���Ľӿ�
 */

 class Duck{
    public function swim(){
        echo "I am duck,I am swiming to wash my feathers<br>";
    }
    public function fluffed(){
        echo "I am duck,I am fluffing to day my feathers<br>";
    }
 }
 class DuckDressUpRoom{
    public $ducks;
    public function __construct(){
        $this->ducks=array();
    }
    public function addDuck($duck){
        array_push($this->ducks,$duck);
    }
    public function dressUp(){
        foreach($this->ducks as $duck){
            $duck->swim();
            $duck->fluffed();
        }
    }
 }
 $room=new DuckDressUpRoom();
 $duck=new Duck();
 $room->addDuck($duck);
 $room->dressUp();
 echo "<hr>";
 /**
    �¼���Chicken��,���ı�DuckDressUpRoom����£�ʹ��Chicken
 */
 class Chicken{
    public function shower(){
        echo "I am chicken,I am showering to wash my feathers<br>";
    }
    public function fluffed(){
        echo "I am chicken,I am fluffing to day my feathers<br>";
    }
 }
 class ChickenAdapter extends Duck{
    private $chicken;
    public function __construct(){
        $this->chicken=new Chicken();
    }
    public function swim(){
        $this->chicken->shower();
    }
    public function fluffed(){
        $this->chicken->fluffed();
    }
 }
 $chicken=new ChickenAdapter();
 $room->addDuck($chicken);
 $room->dressUp();
?>







































