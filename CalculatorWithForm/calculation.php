<?php
class calculator{

    public $Num1 = '';
    public $Num2 = '';
    public $value ='';


    public function add($data){
        $this->Num1 = $data['num1'];
        $this->Num2 = $data['num2'];


    }
    
    public function getData(){

        if (isset($_POST['add'])){
            echo "The first Number Is:".$this->Num1."<br>";
            echo "The Adding Number IS: ".($this->Num1+$this->Num2)."<br>";
        }elseif (isset($_POST['sub'])){
            echo "The Subtracting Number IS: ".($this->Num1-$this->Num2)."<br>";
        }elseif (isset($_POST['mul'])){
            echo "The Multiplying Number IS: ".($this->Num1 * $this->Num2)."<br>";
        }elseif (isset($_POST['div'])){
            echo "The Dividing Number IS: ".($this->Num1 / $this->Num2)."<br>";
        }

    }
}
?>