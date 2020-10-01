<php include('Res_conf.php'); ?>
<?php
	$db = mysqli_connect('localhost','root','','login_temp')
	or die ('Error connecting to MySQL server.');

	if(isset($_POST['res_sub']))
	{
		$res_id = $_POST['res_id'];
		$q1 = "select * from reservation where res_id = '$res_id'";
		$res1 = mysqli_query($db, $q1);
		$row1 = mysqli_fetch_array($res1);

		$amount = $row1['amount'];
		$no_rooms = $row1['no_rooms'];
		$room_cost = $amount/$no_rooms;
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Payment</title>
	<link rel="shortcut icon" type="image/png" href="img/favicon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		*{
  			margin: 0;
  			padding: 0;
  			box-sizing: border-box;
		 }
		header{
  				background :linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8));
  				height: 10vh;
  				background-size: cover;
  				background-position: center;
  				font-family: Century Gothic;
			}
		.logo ul{
			  float:left;
			  width: 200px;
			  height: auto;
			  margin-top: 10px;
			}
		.main{
				max-width: 1200px;
				margin: auto;
			}
		hr.style-one {
		    border: 0;
		    height: 2px;
		    width: 50%;
		    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
		}
		body {
  			font-family: Arial;
  			font-size: 17px;
		}
		h2{
			text-align:center;
			font-size: 200%;
		}
		h4{
			margin-top: 10px;
		}
		.container {
			background-color: #e6faff;
			padding: 3px 18px 13px 18px;
			border: 1px solid lightgrey;
			border-radius: 10px 10px 10px 10px;
		}
		.row {
  			display: -ms-flexbox; 
			display: flex;
			-ms-flex-wrap: wrap;  
			flex-wrap: wrap;
			margin: 0 -10px;
			width: 100%;
			height: auto;
		}
		.col1
		{
			-ms-flex: 50%;
  			flex: 60%;
		}
		.col2
		{
			-ms-flex: 50%;
  			flex: 30%;
  			padding-right: 50px;
		}
		.col3
		{
			-ms-flex: 50%;
  			flex: 30%;
  			margin-left: -15px;
		}
		.col1,.col2,.col3
		{
			padding: 0 25px;
		}
		.icon-container {
		  margin-bottom: 20px;
		  padding: 15px 0;
		  font-size: 40px;
		}
		input[type=text],input[type=number],input[type=password],select {
		  width: 100%;
		  margin-bottom: 20px;
		  padding: 12px;
		  border: 1px solid #ccc;
		  border-radius: 3px;
		}
		.Paybutton {
		  background: #ffc107;
		  color: #fff;
		  padding: 12px;
		  margin-top: 30px;
		  margin-left: 120px;
		  border: none;
		  width: 50%;
		  border-radius: 25px 25px 25px 25px;
		  cursor: pointer;
		  font-size: 19px;
		  transition: 0.5s ease-out;
		}
		.Paybutton:hover {
		  background:  #0099ff;
		}
		span.tab {
		  float: right;
		  color: grey;
		}
		p {
			font-style: italic;
			font-size: 16px;
			color: red;
		}
	</style>
</head>
<body>
	<header>
      <div class="main">
      	<div class="logo">
<ul>
                <li><h2><font color="white">S Travels</font></h2></li></ul>      	</div>
      </div>
    </header><br>
    <h2>Payment Gateway</h2>
    <center><hr class="style-one"></center>
    <br>

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pay_conf'])) 
    {
    	$flag=0;
    	$res_id = $_POST['res_id'];
    	$q1 = "select * from reservation where res_id = '$res_id'";
		$res1 = mysqli_query($db, $q1);
		$row1 = mysqli_fetch_array($res1);

		$amount = $row1['amount'];
		$no_rooms = $row1['no_rooms'];
		$room_cost = $amount/$no_rooms;

    	if (!preg_match("/^[a-zA-Z ]*$/",$_POST['custname']))
    	{
    		echo "<p>	*Name Invalid</p>";
    		$flag=1;
    	}
  		if(!preg_match("/^[0-9]*$/",$_POST['cardnumber']))
  		{
    		echo "<p>	*Card Number Invalid</p>";
  			$flag=1;
  		}
    	if($flag==0)
    	{
    		session_start();
    		$_SESSION['res_id1'] = $_POST['res_id'];
    	 	header("Location:ConfirmationPage.php");
    	}
    }
?>

    <div class="row">
    	<div class="col1">
    		<div class="container">
    			<h4 style="font-size: 150%;">Payment Details</h4><br>
    			Accepted Cards
    			<div class="icon-container">
	              <i class="fa fa-cc-visa" style="color:navy;"></i>
	              <i class="fa fa-cc-amex" style="color:blue;"></i>
	              <i class="fa fa-cc-mastercard" style="color:red;"></i>
	              <i class="fa fa-cc-discover" style="color:orange;"></i>
            	</div>

            	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> ">
	            	Card Holder Name 
	            	<input type="text" name="custname" placeholder="NAME" required>
	            	Credit Card Number 
	            	<input type="text" name="cardnumber" placeholder="XXXX-XXXX-XXXX-XXXX" maxlength="16" minlength="16" required>
	            	<div class="row">
	            		<div class="col3">
			            	Expiry Month
			            	<input type="number" name="expYear" placeholder="1" min="1" max="12" required> 	
			            </div>
	  					<div class="col3">
			  				Expiry Year
			  				<input type="number" name="expYear" placeholder="2018" min="2018" max="2054" required> 
			  			</div>
			  		</div>
	  				CVV
	  				<input type="password" name="cvv" placeholder="***" maxlength="3" minlength="3" required>
	  				<input type="hidden" name="res_id" value="<?php echo $res_id; ?>">
    		
                  
    	<div class="col2">
    		<div class="container">
	      		<h4 style="font-size: 150%;">Booking Details <span class="tab" style="color:black"></span></h4><br>
	      		Room Cost<span class="tab"><?php echo "$"; echo $room_cost; ?></span><br><br><br>
	      		x <?php echo $no_rooms; ?> Rooms
	      		<hr>
	      		Total <span class="tab" style="color:black"><b>$<?php echo $amount; ?></b></span>
    		</div>
    		<input type="submit" name="pay_conf" class="Paybutton">
                    </div>
    		</form>
        
    	</div>
    </div>
    </div>

</body>
</html>