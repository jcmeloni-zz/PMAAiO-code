<?php
class myClass {
	public $name = "Matt";
	function myClass($n) {
		$this->name = $n;
	}
	function sayHello() {
		echo "HELLO! My name is ".$this->name;
	}
}
class childClass extends myClass {
	//code goes here
}
$object1 = new childClass("Baby Matt");
$object1 -> sayHello();
?>
