<?php
class myCar {
	public $color = "silver";
	public $make = "Mazda";
	public $model = "Protege5";
}
$car = new myCar();
echo "I drive a: ".$car->color." ".$car->make." ".$car->model;
?>
