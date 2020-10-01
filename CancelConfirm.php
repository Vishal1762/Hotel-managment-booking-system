<?php
$db = mysqli_connect('localhost','root','','login_temp') or die ('Error connecting to MySQL server.');
if(isset($_GET['res_id']))
{
	$res_id = $_GET['res_id'];
	$q1 = "update reservation set status = 'Cancelled' where res_id = '$res_id'";
	mysqli_query($db,$q1);
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Booking Cancelled</title>
	<link rel="shortcut icon" type="image/png" href="img/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Alike+Angular|Asul|Eczar|Work+Sans" rel="stylesheet">
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
		    width: 70%;
		    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
		}
		.heading
		{
			text-align: center;
		}
		.heading h3
		{
			font-family: 'Work Sans',Footlight MT Light;
			font-size: 180%;
		}
		.cancelbook
		{
			position:absolute;
			left:630px;
			font-size: 150%;
			font-family: 'Work Sans',Arial;
			color: #000;
		}
		.cancelbook a:link {
    		text-decoration: none;color: #000;
		}
		.cancelbook a:visited {
	  		text-decoration: none; color: #000;
		}
		.cancelbook a:hover {
    		text-decoration: underline; color: #000;
		}
		.cancelbook a:active {
		    text-decoration: underline; color: #000;
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
          <li><a href="index,php">Home</a></li>
          <li><a href="MyAccount.php">My Account</a></li>
          <li><a href="Login.php">Log Out</a></li>
        </ul>
      </div>
    </header><br>

    <div class="heading">
    	<h3 >Booking Cancelled</h3>
    	<center><hr class="style-one"></center><br><br>
    	<p style="font-size: 100%;font-family: 'Work Sans',Arial">This is to confirm that we have received your request to cancel your booking.</p><br>
    	<p style="font-size: 100%;font-family: 'Work Sans',Arial">Refund would be processed in up to 7 working days subject to verification.</p><br>
    	<p style="font-size: 100%;font-family: 'Work Sans',Arial">We look forward to assisting you again!</p><br>
    	<p style="font-size: 100%;font-family: 'Work Sans',Arial">Team vgtravles </p><br>
    </div><br>
    <span class="cancelbook">Go Back to : <a href="MyAccount.php">My Accounts</a></span>
</body>
</html>