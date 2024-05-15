<?php
	
	session_start();
	$Email = $_POST['email'];
	$pass = $_POST['pass'];

	//database connection
	$conn = new mysqli('localhost','root','','spring_hotel');

	if($conn->connect_error){
		die('Connection failed :'.$conn->connect_error);
	}else
	{
		if(isset($_POST['log'])){
		$Login_confirm = "select * from registration Where Email = ?";
		$stmt= $conn->prepare($Login_confirm);
		$stmt->bind_param("s", $Email);
		$stmt->execute();
		$Login_confirm_result = $stmt->get_result();
		if ($Login_confirm_result->num_rows > 0) {
               

               $data = $Login_confirm_result->fetch_assoc();
               if($data['pass'] === $pass){

               		header('location:Profile.html');
               } else {

               		//echo "Invalied Email or Password";
               	header("location:Login_I.php?Invalid=Invalied Email or Password");
               }



		} else{

			//echo "Invalied Email or Password";
			header("location:Login_I.php?Invalid=Invalied Email or Password");


		}}else{

			echo "Error";
		}
			
		$conn->close();
		}
		
	




?>