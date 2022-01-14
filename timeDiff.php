<?php
$first = date_create('17:30'); 
$second = date_create('12:00'); 

$difference = date_diff($first, $second); 
echo $difference->h; #gives integer (no decimal)
?>