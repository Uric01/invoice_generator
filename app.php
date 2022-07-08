<?php

$arr = array('SKU' => 'NH.HJWM8.003', 'product' => 'Acer Nitro 5 15.6 i7');

echo "Json print: ";

echo json_encode($arr);

$a = json_encode($arr);

echo"<br/>";
echo"<br/>";

$x = json_decode($a, true);

echo "PHP Array: ";
print_r($x);

echo"<br/>";
echo"<br/>";

echo "SKU is: ";
echo $x['SKU'];



