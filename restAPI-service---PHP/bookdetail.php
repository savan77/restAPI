<!--
## Description - This repository demonstrates on how to create restAPI using php.
@Author : Savan Visalpara

##This file contains data, which will be provided to client through API.
-->
<?php

function find_price($bname){
	
	//associate array for storing book name=>price..
	$books = array(
		'c' => 234,
		'c++' => 345,
		'java' => 500,
		'python' => 300,
		'ruby' => 350);
	
	//return price of a book..
	foreach($books as $book => $price){
		if($book == $bname){
			return $price;
			break;
		}
		
	}
	
}


?>
