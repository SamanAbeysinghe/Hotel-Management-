
<?php

	$F_Name = $_POST['f_name'];
	$L_Name = $_POST['l_name'];
	$Email = $_POST['email'];
	$country = $_POST['country'];
	$zip = $_POST['code'];
	$address = $_POST['address'];
	$no = $_POST['contact'];
	$pass = $_POST['pass'];
	$repass = $_POST['conpass'];

	//database connection
	$conn = new mysqli('localhost','root','','spring_hotel');

	if(isset($_POST['reg'])){
	if($pass== $repass){
	
	if($conn->connect_error){
		die('Connection failed :'.$conn->connect_error);
	}else{
		
		if (filter_var($Email, FILTER_VALIDATE_EMAIL) == true) {

		$select = "SELECT Email From registration Where Email = ? Limit 1";
		$stmt= $conn->prepare($select);
		$stmt->bind_param("s", $Email);
		$stmt->execute();
		$stmt->bind_result($Email);
		$stmt->store_result();
		$rnum = $stmt->num_rows;

		if( $rnum==0 ) {

			$stmt->close();

		$stmt=$conn->prepare("insert into registration (F_Name,L_Name,Email,country,code,address,phone,pass) values(?,?,?,?,?,?,?,?)");
		$stmt->bind_param("ssssisis",$F_Name,$L_Name,$Email,$country,$zip,$address,$no,$pass);
		$stmt->execute();

		echo '<script>alert("Resgistration successful")</script>';
		header("Location:Login_I.php");
		


		}else{

			
			header("location:Register_I.php?EM= This Email is already used!");
		}
	}else{

	header("location:Register_I.php?Invalied= Invalied Email address");
		}
	
		$conn->close();

		}}else{

		
		header("location:Register_I.php?Pass= Check Password again!");
	}
}else{
	echo "Error";
}

?>




	