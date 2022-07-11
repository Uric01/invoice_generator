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


$json = [
    {"qty":"3","SKU":"NX.HGDM3.001","product":"Acer Aspire 3 15.6 celeron", "price":"10000"},{"qty":"1","SKU":"NX.FHJF8.001","product":"Acer Predator 300 15.6 i7", "price":"30000"},{"qty":"5","SKU":"NX.0000.001","product":"Acer ConceptD 3 16.6 i7", "price":"46000"}
];
