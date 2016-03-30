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
