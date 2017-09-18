<?php
interface Vehicle {
	public function info();
} 

interface Car extends Vehicle {
	public function drive();
}

interface Boat extends Vehicle {
	public function swim();
}

//класс ауди реализует интерфейс машины, 
//а значит мы должны определить методы drive() и info(), 
//что мы и сделали

class Audi implements Car {
	public function info() {
		echo '<br>Audi is a German automobile manufacture.';
	}

	public function drive() {
		echo '<br>Audi drives!';
	}
}

$audi1 = new Audi;
$audi1->info();
$audi1->drive();



//класс MersedesAmphibious реализует 2 интерфейса
//а значит и должен реализовывать методы каждого из них
class MersedesAmphibious implements Car,Boat {
	public function info() {
		echo '<br>Audi is a German automobile manufacture.';
	}

	public function drive() {
		echo '<br>Audi drives!';
	}

	public function swim() {
		echo '<br>Audi swim!';
	}
}



//фишка интерфейсов в том что мы не может наследовать
//множество классов, а интерфейсы реализовывать можем сколь угодно
?>