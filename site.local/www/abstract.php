<?php
class Student {
	public $name;
	public $result;

	function __construct($name,$result) {
		echo '<br>Student ' .$name .':';
		foreach($result as $subject => $item) {
			echo '<br>'.$subject.': '.$item;
		} 
		echo '<hr>';
	}
}


$student1 = new Student('John',array('math' => 3,'biology' => 4));
$student2 = new Student('Marry',array('math' => 4,'biology' => 4));


//тут выведет ошибку, т.к 1 не явлляется массивом,которыц проходит через форич в конструкторе
$student3 = new Student('Mark',1);






function onErrorFunction() {
	echo 'Enter correct value';
}
set_error_handler('onErrorFunction');

class User {
	public $firstname;
	public $lastname;
} 
//функция ожидает на вход объект класса User
function getFullName(User $user) {
	return $user->firstname . ' ' . $user->lastname;
}

$user1 = new User;
$user1->firstname = 'Alex';
$user1->lastname = 'Jones';

echo getFullName($user1);
//будет ошибка, т.к стоит в функции контроль типов
//echo getFullName(3);



//то же происходит и с наследуемым классом
class SuperUser extends User {

}
$user2 = new SuperUser;
$user2->firstname = 'Will';
$user2->lastname = 'Born';
echo getFullName($user2);
 ?>
