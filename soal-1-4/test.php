<?php
$bil = '1.225.441';
// $pecah = explode('.', $bil);
// $new_bil = [$pecah[0], $pecah[1], $pecah[2]];
$arr = explode('.',$bil);
$new_bill = implode($arr);
$bil = str_split($new_bill);
// echo "<pre>";
// echo count($arr);
// echo "</pre/>";

echo "<pre>";
var_dump($bil);
echo "</pre/>";
// var_dump($new_bil);

for($i=0;$i <= count($bil)-1; $i++){
	echo $bil[$i];
	for($j=count($bil)-1; $j > $i; $j--){
		echo 0;
	}
	
	echo '<br/>';
}