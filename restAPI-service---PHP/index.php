
<!--
## Description - This repository demonstrates on how to create restAPI using php.
@Author : Savan Visalpara
# This is the core file, which returns data in json format..
<?php

    header("Content-Type: application/json");
    include 'bookdetail.php';
	
	if(!empty($_GET['name'])){
		
		$bname = $_GET['name'];
		$price = find_price($bname);
		
		if(!empty($price)){
			//book found
			write_msg(200,"book found",$price,$bname);
		}
	    else{
			//book not found
			write_msg(200,"book not found",NULL,NULL);
		}
	
	
	}
   
    else{
		 //invalid request
		 write_msg(400,"Invalid request",NULL,NULL);
	 }
	 
	function write_msg($status, $status_message, $price, $bname){
		
		header("HTTP/1.1 $status $status_message");
		$result['status'] = $status;
		$result['status_message'] = $status_message;
		$result['name'] = $bname;
		$result['price'] = $price;
		
		echo json_encode($result);
	}


?>

<!--

Note: Since we are dealing with basic restAPI, in this repository i've used get request and didn't provided more security.
      In real world app you have to create more secure and reliable service..

-->
