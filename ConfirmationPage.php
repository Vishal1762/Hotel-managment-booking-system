<php include('PaymentPage.php'); ?>
<?php
	$db = mysqli_connect('localhost','root','','login_temp')
	or die ('Error connecting to MySQL server.');
	
	session_start();
	$res_id = $_SESSION['res_id1'];
	/*if(isset($_POST['pay_conf']))
	{
		$res_id = $_POST['res_id'];
	}*/
	//echo $_SESSION['user1'];

	$q1 = "select * from reservation where res_id = '$res_id'";
	$res1 = mysqli_query($db,$q1);
	$row1 = mysqli_fetch_array($res1);

	$user = $row1['username'];
	$q2 = "select * from customer where username = (select username from reservation where res_id = '$res_id');";
	$res2 = mysqli_query($db,$q2);
	$row2 = mysqli_fetch_array($res2);

	$q3 = "select * from hotel where hid=(select hid from reservation where res_id = '$res_id');";
	$res3 = mysqli_query($db,$q3);
	$row3 = mysqli_fetch_array($res3);

	$q4 = "update reservation set status = 'Confirmed' where res_id='$res_id'";
	mysqli_query($db,$q4);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Payment Confirmation</title>
	<link rel="shortcut icon" type="image/png" href="img/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Alike+Angular|Asul|Eczar|Work+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		*{
  			margin: 0;
  			padding: 0;
		 }
		header{
  				background :linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8));
  				height: 10vh;
  				background-size: cover;
  				background-position: center;
  				font-family: Century Gothic;
			}
		ul{
  			float: right;
  			list-style-type: none;
  			margin-top: 25px;
			}
		ul li{
  				display: inline-block;
			}
		ul li a{
			  text-decoration: none;
			  color: #fff;
			  padding: 5px 20px;
			  border: 1px solid transparent;
			  transition: 0.9s ease-out;
			}
		ul li a:hover{
			  background-color: #fff;
			  color: #000;
			}
		.logo ul,.invoicebox img{
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
		h2{
			text-align:center;
			font-size: 200%;
			font-family: 'Asul', Footlight MT Light;
		}
		.content1
		{
			padding-left: 10px;
			margin-left: 320px;
			margin-right: 100px;
			padding-bottom: 10px;
			padding-top: 10px;
			background-color: #ccffcc;
			background: linear-gradient(to right,#ccffcc,#ffffff);
			border-radius: 45px 10px 10px 45px;
		}
		.message
		{
			font-size: 90%;
			font-family: 'Work Sans',Footlight MT Light;
		}
		.content2
		{
			padding-left: 12px;
			margin-left: 320px;
			margin-right: 320px;
			padding-bottom: 10px;
			padding-top: 30px;
		}
		.content2 p{
			padding-top: 10px;
			font-size: 100%;
			font-family: 'Work Sans';
		}
		.invoicebox 
		{
	        max-width: 800px;
	        margin: auto;
	        padding: 30px;
	        border: 1px solid #eee;
	        box-shadow: 0 0 10px rgba(0, 0, 0, .5);
	        font-size: 16px;
	        line-height: 24px;
	        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
	        color: #555;
    	}
    	.tab1
    	{
    		text-align: right;
    		position: absolute;
    		left: 900px;
    	}
    	.tab2
    	{
    		text-align: right;
    		position: absolute;
    		left: 1000px;
    	}
    	.tab3
    	{
    		text-align: center;
    		position: absolute;
    		left: 700px;
    	}
    	.details
    	{
    		margin-top: 80px;
    	}
    	.heading
    	{
    		background-color: #e6faff;
    		padding-left: 10px;
    		border-bottom: 1px solid #ddd;
        	font-weight: bold;
        	font-size: 18px;
    	}
    	.item
    	{
    		padding-left: 10px;
    		border-bottom: 2px solid #eee;
    	}
    	.total
    	{
    		font-weight: bold;
    		padding-left: 10px;
    	}
    	h5
    	{
  			transform: rotate(12deg);
			color: #555;
			font-size: 3rem;
			font-weight: 700;
			border: 0.25rem solid #555;
			display: inline-block;
			padding: 10px 2px;
			text-transform: uppercase;
			border-radius: 1rem;
			font-family: 'Courier';
			-webkit-mask-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/8399/grunge.png');
		  	-webkit-mask-size: 944px 604px;
		  	mix-blend-mode: multiply;
		  	color: #0A9928;
			border: 0.5rem solid #0A9928;
			-webkit-mask-position: 13rem 6rem;
			transform: rotate(-14deg);
  			border-radius: 0;
    	}
    	.footer {
            position: fixed;
            bottom: 0px;
			padding: 20px;
			text-align: center;
			background:  #000;
		}
	</style>
</head>
<body>
	<header>
      <div class="main">
      	<div class="logo">
<ul>
                <li><h2><font color="white">S Travels</font></h2></li></ul>      	</div>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="MyAccount.php">My Account</a></li>
          <li><a href="Login.php">Log Out</a></li>
        </ul>
      </div>
    </header><br>
    <h2>Payment Confirmation</h2>
    <center><hr class="style-one"><br></center><br>
    <div class="content1">
    	<i class="fa fa-check-circle" style="font-size:40px;color:green"><span class="message">
    	Your Booking Has Been Confirmed</span></i><br>
    </div>
    <div class="content2">
    	<p>Thank You for using vg Hotels to book your Hotel Accomodation.</p>
    	<p>Kindly Note, that your Booking is <b>CONFIRMED</b> and you are not required to contact the hotel or vg Hotels to reconfirm the same.</p>
    	<p>You will need to carry a printout of the invoice below and present it at the hotel at the time of check-in.</p>
    	<p>We hope you have a pleasant stay and look forward to assisting you again!</p>
    	<p>Team vg Hotels</p>
    </div><br>
    <div class="invoicebox">
    	<img src="img/fron.jpg"><span class="tab1">Booking ID:  &emsp;#<?php echo $res_id; ?> <br>Date: <?php echo date("d/M/Y"); ?></span><br>
    	<span class="tab3"><h5>PAID</h5></span>
    	<p class="details" style="padding-top: 20px;">To,<br><?php echo $row2['fname'].' '.$row2['lname']; ?> <br><?php echo $row2['email']; ?></p><br><br>
    	<div class="heading">
    		Hotel Details<span class="tab2">Price</span>
    	</div>
    	<div class="item">
    		 <?php echo $row1['no_rooms'].' '.$row1['roomtype'].' at '.$row3['hname']; ?> <span class="tab2">$<?php echo $row1['amount']; ?></span><br>
    		<?php 
    		$in_date = date('d/M/Y', strtotime($row1['in_date']));
    		$out_date = date('d/M/Y', strtotime($row1['out_date'])); 
    		echo $in_date.' - '.$out_date; 
    		?>
    		<br><br>
    	</div>
    	<div class="total">
			 Amount<span class="tab2">$<?php echo $row1['amount']; ?></span>    		
    	</div>
    </div>
    <br>

    <div class="footer" style="color: white;font-family: Verdana">
	  <p> &copy 2019 S Travels .</p>
	</div>
</body>
</html>