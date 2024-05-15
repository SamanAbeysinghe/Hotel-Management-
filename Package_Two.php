<?php
	session_start();
	$Date = date("Y-m-d", strtotime($_POST['checkin_date']));
	$Days = $_POST['staying_days'];
	$Adults = $_POST['adults'];
	$chil12 = $_POST['children_12'];
	$chil5 = $_POST['children_5'];
	$Email = $_POST['email'];
	$pack= 'Family';
	$A = 2000*$Adults;
	$B = 1000*$chil12;
	$price = $A + $B;
	//database connection
	$conn = new mysqli('localhost','root','','spring_hotel');

	if($conn->connect_error){
		die('Connection failed :'.$conn->connect_error);
	}else
	{
		if(isset($_POST['bkk'])){
		$select = "SELECT Email From registration Where Email = ? Limit 1";
		$stmt= $conn->prepare($select);
		$stmt->bind_param("s", $Email);
		$stmt->execute();
		$stmt->bind_result($Email);
		$stmt->store_result();
		$rnum = $stmt->num_rows;

		if( $rnum==0 ) {
			echo "Email does not exist";
		}else{

		$stmt->close();

		if (($Adults + $chil12 + $chil5) <= 10 ) {
		$stmt=$conn->prepare("insert into package_reserve (package,date,days,adults,chil12,chil5,email,Price) values(?,?,?,?,?,?,?,?)");
		$stmt->bind_param("ssiiiisi",$pack,$Date,$Days,$Adults,$chil12,$chil5,$Email,$price);
		$stmt->execute();
		$stmt->close();
		header("location:Package_One_I.php?bk=Booking Successful");
	
		}else{

			header("location:Package_One_I.php?mm=Member limit exceed");
		}
		
		}}
		//$stmt->close();
		$conn->close();
	}
?>