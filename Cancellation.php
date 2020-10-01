<?php
$db = mysqli_connect('localhost','root','','login_temp') or die ('Error connecting to MySQL server.');
session_start();
$user = $_SESSION['user1'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cancellation</title>
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
		.cancellation
		{
			padding-left: 10px;
			margin-left: 210px;
			margin-right: 100px;
			padding-bottom: 10px;
			padding-top: 10px;
			background-color: #ccffcc;
			background: linear-gradient(to right,#b3f0ff,#ffffff);
			border-radius: 45px 10px 10px 45px;
		}
		.message
		{
			font-size: 70%;
			font-family: 'Work Sans',Footlight MT Light;
			color: black;
		}
		.tab1
		{
			font-size: 70%;padding-top: 7px;
			font-family: 'Work Sans',Footlight MT Light;
			color: black;
    		position: absolute;
    		left: 1000px;
		}
		input
		{
			font-family: 'Work Sans',Footlight MT Light;
			font-size:25px;
			float: center;
			background-color: transparent;
			border: none;
			cursor: pointer;
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

    <div class="heading">
    	<h3 >Cancel Your Bookings</h3>
    	<center><hr class="style-one"></center><br><br>
    	<p style="font-size: 100%;font-family: 'Work Sans',Arial">Please click on the reservation ID of the respective booking to cancel it.</p>
    </div><br>
    <!--The division for cancellation-->
    <div class="cancellation">
    	<?php
    		$q1 = "select * from reservation where username = '$user'";
    		$res1 = mysqli_query($db,$q1);
    		while($row1 = mysqli_fetch_array($res1))
    		{
    			$hid = $row1['hid'];
    			$q2 = "select * from hotel where hid = '$hid'";
    			$res2 = mysqli_query($db,$q2);
    			$row2 = mysqli_fetch_array($res2);

    			$in_date = date('d/M/Y', strtotime($row1['in_date']));
				$out_date = date('d/M/Y', strtotime($row1['out_date']));

				if (date('Y-m-d')<$row1['in_date'] && strcmp($row1['status'],"Confirmed")==0) 
				{			
			    	echo '<form method="get" action="CancelConfirm.php"><i class="fa fa-suitcase" style="font-size:30px;color:red"><span class="message">
			    	#<input type="submit" name="res_id" value="'.$row1['res_id'].'">: '.$row2['hname'].', '.$row2['hloc'].'</span><span class="tab1">'.$in_date.' to '.$out_date.'</span></i>
			    	</form>';
    			}
    	}
    	?>
    </div><br><!--Loop Till Here-->


</body>
</html>