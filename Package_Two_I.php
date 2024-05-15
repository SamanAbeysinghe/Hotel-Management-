<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Family Package</title>
	<link rel="stylesheet" type="text/css" href="CSS/Package.css">
</head>
<body>
	<header>
		<div class="top"></dir><h2> Family Package</h2></div>
		<br>

		<!--start of booking-->
		<div class="book"><br>
		
		
			<form class="booking-form" action="Package_Two.php" method="POST">
				<div class="form-item"><br>
					<label for="checking.date">Check In date</label>
					<input type="date" id="checkin_date" name="checkin_date" required>
				</div>
				<div class="form-item">
					<label for="checkout">Number of days staying</label>
					<input type="number" min="1" value="1" id="staying_days" name="staying_days" required >
				</div>
				<div class="form-item">
					<label for="checkout">Adults</label>
					<input type="number" min="1" max="10" value="1" id="adults" name="adults" required >
				</div>
				<div class="form-item">
					<label for="checkout">Children-Under 12</label>
					<input type="number" min="0" max="9" value="1" id="children_12" name="children_12" required >
				</div>
				<div class="form-item">
					<label for="checkout">Children-Under 5</label>
					<input type="number" min="0" max="4" value="1" id="children_5" name="children_5" required >
				</div>
				
				<div class="form-item">
					<label for="email">Email</label>
					<input type="text" id="email" name="email" required >
				</div>

				<div class="form-item">
				<input type="submit" class="btn" name="bkk" value="Book Now" >
				</div>
		
		</form>
		<?php
           			 if (@$_GET['EM']==true) 
                    {
        			?>
            		<center><font size=5 color="red"><?php echo $_GET['EM'] ?></font></center>
        			<?php   
                    }
       				 ?>
       		<?php
            if (@$_GET['mm']==true) 
                    {
        ?>
            <center><font size=5 color="red"><?php echo $_GET['mm'] ?></font></center>
        <?php   
                    }
        ?>
        <?php
            if (@$_GET['bk']==true) 
                    {
        ?>
            <center><font size=5 color="green"><?php echo $_GET['bk'] ?></font></center>
        <?php   
                    }
        ?>
		</div>
		<!--end of booking-->
	</header>
</body>
</html>