
<!--
## Description - This repository demonstrates on how to create restAPI using php.
@Author : Savan Visalpara
# Remaining two files are the backbone of restAPI service..
# Now, this file demonstrates on how to create client app which uses API create using remaining files.
-->

<!DOCTYPE html>
<html lang="en">
	<head>
	<title> My Book Store </title>
	<style>
		#table-data,th,td{
			border:1px solid black;
			border-collapse:collapse;
		}
		#table-data{
			margin-top:70px;
			margin-left:100px;
		}
		#table-data th,td{
			padding:10px 20px 10px 20px;
			text-align:center;
        }
	</style>
</head>
<body>
	<h1> Book Store </h1>
	<p> Find out price of the books...</p>
	<form action="client.php" method="post">
		<label>Book Name : </label>
		<input type="text" name="textfield" size="70" required>
		<input type="submit" value="search">
	</form>
	
	
	<?php
	    error_reporting(0);
		if(isset($_POST['textfield'])){
			
			//get book name from front end app ..
			$bname = $_POST['textfield'];
			
			//web service provider..
			//using API..
			$url = 'localhost/restAPI/index.php?name='.$bname;
			
			$c =curl_init($url);
			curl_setopt($c,CURLOPT_RETURNTRANSFER, true);
			
			//getting responce from web service provider..
			$response = curl_exec($c);
			curl_close($c);
			
			//decoding json and displaying result..
			$result = json_decode($response);
	
	?>
	
	
	//representing data in table format..
	<table id="table-data">
		<tr>
			<th>Book</th>
			<th>Price</th>
			<th>Status</th>
			<th>Status-Message</th>
		</tr>
		<tr>
			<td><?php echo $result->name; ?></td>
			<td><?php echo $result->price; ?></td>
			<td><?php echo $result->status; ?></td>
			<td><?php echo $result->status_message; ?></td>
		</tr>
	</table>
			
	<?php
		}
		?>
</body>
</html>
