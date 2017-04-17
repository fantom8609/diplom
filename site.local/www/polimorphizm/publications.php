<?php
require_once "data.php";

foreach ($publications as $item) {
	echo '<pre>';
	print_r($item);
	echo '<br>В переменной $item находится объект класса '.get_class($item);
	echo "<br>";
	print_r($item->printItem());

	echo "</pre><br>";
}