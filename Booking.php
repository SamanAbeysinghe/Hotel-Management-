<?php
	
	session_start();
	$Date = date("Y-m-d", strtotime($_POST['checkin_date']));
	$Days = $_POST['staying_days'];
	$R_type = $_POST['package'];
	$Email = $_POST['email'];
	$single = 2500;
	$jun= 6500;
	$triple= 4000;
	$double = 3500;
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
			
			header("location:index_I.php?EM=Email does not exist");
		}else{

		$stmt->close();
		if ($R_type=='Single') {
		
		$stmt=$conn->prepare("insert into reservation (date,days,type,email,Price) values(?,?,?,?,?)");
		$stmt->bind_param("sissi",$Date,$Days,$R_type,$Email,$single);
		$stmt->execute();
		$stmt->close();
	}elseif ($R_type=='Junior Suite') {

		$stmt=$conn->prepare("insert into reservation (date,days,type,email,Price) values(?,?,?,?,?)");
		$stmt->bind_param("sissi",$Date,$Days,$R_type,$Email,$jun);
		$stmt->execute();
		$stmt->close();
		
	}elseif ($R_type=='Triple') {
		$stmt=$conn->prepare("insert into reservation (date,days,type,email,Price) values(?,?,?,?,?)");
		$stmt->bind_param("sissi",$Date,$Days,$R_type,$Email,$triple);
		$stmt->execute();
		$stmt->close();
		
	}elseif ($R_type=='Double') {
		
		$stmt=$conn->prepare("insert into reservation (date,days,type,email,Price) values(?,?,?,?,?)");
		$stmt->bind_param("sissi",$Date,$Days,$R_type,$Email,$double);
		$stmt->execute();
		$stmt->close();
	}
		
		mysqli_query($conn,"update rooms set available=available-1 where type = '$R_type'");
		
		header("location:index_I.php?bk=Booking Successful");
		
		}
	}
	else{
		echo "Error";
	}
		
		//$stmt->close();
		$conn->close();
	}
?>