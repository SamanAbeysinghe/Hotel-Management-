<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

	<title>Login</title>
	<link rel= "stylesheet" type = "text/css" href= "CSS/login.css">

</head>
	<body>
		<form action="Login.php" method="POST">
		
		<header>
			<div class = "main">
				<ul>
					<li ><a href = "index_I.php">Home</a></li>
					<li><a href = "#">Services</a></li>
					<li><a href = "#">Contact</a></li>
					<li><a href = "#">About</a></li>
					<li class = "lactive"><a href="#">Login</a></li>


				</ul>

			</div>



	<div class="login-box">
		<?php
            if (@$_GET['Invalid']==true) 
                    {
        ?>
            <center><font size=4 color="red"><?php echo $_GET['Invalid'] ?></font></center>
        <?php   
                    }
        ?>
			  
		<br><br><br><h2>Login</h2>
</br></br></br>



		<div class="text-box">
			<input type="text" placeholder="Email" name="email" id="email" required>
		</div>
		<div class="text-box">
			<input type="Password" placeholder="Password" name="pass" id="pass" required>
		</div>
		<div>
			<input class="btn" type="submit" name="log" value="Sign In">
		</div>
		<div class="sign">
			<p><br>Don't have an account ?<a href="Register_I.php" class="sa" target="_blank" >  Sign Up</a></p>
		</div>

	</div>
	
</header>
</form>
	</body>


</html>