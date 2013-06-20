<?php
class myCar {
	public $color = "silver";
	public $make = "Mazda";
	public $model = "Protege5";
}
$car = new myCar();
$car -> color = "red";
$car -> make = "Porsche";
$car -> model = "Boxter";
echo "I drive a: ".$car -> color." ".$car -> make." ".$car -> model;
?>
