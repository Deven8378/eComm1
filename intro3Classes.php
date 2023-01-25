<?php
//code is not properly organized
class Person {
	public $firstName;
	public $lastName;
	protected $age;
	protected $weight;
	protected static $count = 0;

	function __construct($firstName, $lastName, $age, $weight) {
		$this ->firstName = $firstName;
		$this ->lastName = $lastName;
		$this ->age = $age;
		$this ->weight = $weight;
		self::$count++;
	}

	function __toString() {
		return "$this ->firstName $this ->lastName $this ->age years old and weighs in at $this ->weight pounds <br>";
	}

	public static function count() {
		return self::$count;
	}
}

$person = new Person('John', 'Clayton',25,127);
$person2 = new Person('Eric', 'Lamont',18,200);
echo "There is ", Person::count(), " in the program <br>";

echo $person;


echo "there are ", Person::count(), (Person::count() == 1? "person": " people"), " in the program <br>";

class Pugalist extends Person {

	public function fight($other) {
		return ($this ->weight > $other->weight ? $this:$other);
	}
}

$pugalist1 = new Pugalist("Andre","The Giant",30,300);
$pugalist2 = new Pugalist("Deven","Pat",50,145);

$winner = $Pugalist->fight($pugalist2);
echo "the winner is $winner";
