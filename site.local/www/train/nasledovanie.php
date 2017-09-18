<?php
class Vehicle {
	public $color;
	public $material;
	public $type;
	public $speed;


	public function getDistance($time) {
		$distance = $this->speed * $time;
		return $distance;
	}

//далее финальный метод переопреелить нельзя
	final public function test(){
		echo "test";
	}
} 


//запрет на наследование от этого классаы
final class Velic extends Vehicle {
	public $speed = 20;
	public function getDistance($time) {
		return parent::getDistance($time)*1.2;
	}
}
$aist=new Velic;
$aist->speed=44;
echo $aist->test()."<br>".$aist->getDistance(4);



?>