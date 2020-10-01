<php include('Reservation.php'); ?>
<?php
	$db = mysqli_connect('localhost','root','','login_temp')
	or die ('Error connecting to MySQL server.');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reservation</title>
	<link rel="shortcut icon" type="image/png" href="img/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans|Montserrat|Quattrocento|Quattrocento+Sans" rel="stylesheet">
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
		    background-image: linear-gradient(to right, rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
		}
		.content
		{
		     margin: 0 auto;
		     width: 1100px; 
		     height: 550px;
		     border-style: inset;
		     font-size: 20px;
		}
		.content img
		{
			 width: 50%;
			 height: auto;
		}
		.content form
		{
			font-family: 'Montserrat',Footlight MT Light;
		}
		.tab1
		{
			position: absolute;
			left: 800px;
			margin-right: 300px;
		}
		input[type="submit"]
		{
			background: #b3ecff;
			color: #000;
			width: 300px;
			height: 50px;
			border-radius: 25px 25px 25px 25px;
			border-style: solid;
			border-color: #33adff;
			font-size: 18px;
			border-width: 1px;
			outline: none;
			cursor: pointer;
		}

		input[type="submit"]:hover
		{
		background-color: #00bfff;
		color: #fff;
		transition: 0.9s ease-out;
		}

		.footer {
			padding: 20px;
			text-align: center;
			background:  #000;
			margin-top: 20px;
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
    <div class="content">
    	<?php
    		if(isset($_GET['save2']))	
			{
				$checkin = $_GET['checkin'];
				$checkout = $_GET['checkout'];
				$flag=0;
				if($checkout<$checkin)
				{
					echo "<center>Check-out date cannot be prior to Check-in date. Please re-enter details.</center><br>";
					$flag=1;
				}

				$max_guests=0;
				$q2="";
				
				$rtname = $_GET['rtype'];
				$hname = $_GET['hname'];
				$hloc = $_GET['hloc'];				
    			$no_rooms = $_GET['no_room'];
    			$guests = $_GET['guests'];

				//echo $hname,$hloc,$checkin,$checkout;

				$q2 = "select * from room_type where rtname = '$rtname' and hid = (select hid from hotel where hname = '$hname' and hloc = '$hloc');";
	    			$res2 = mysqli_query($db,$q2);
	    			$row = mysqli_fetch_array($res2);
	    			$max_guests = $row['max_guests'];
	    			$hid = $row['hid'];
	    			$rtprice = $row['rtprice'];
	    	
    			    			if ($max_guests*$no_rooms<$guests) 
    			{
    				echo "<center>Cannot accomodate desired number of people in stated number of rooms.</center><br>";
    				$flag = 1;
    			}
    			
    			$q1 = "select * from reservation where hid=(select hid from hotel where hname = '$hname' and hloc='$hloc') and roomtype='$rtname'";
    			$sum = 0;
   				$res = mysqli_query($db,$q1);

   				$q2 = "select * from room_type where hid = (select hid from hotel where hname = '$hname' and hloc = '$hloc') and rtname = '$rtname'";
   				$res2 = mysqli_query($db,$q2);
			    $row2 = mysqli_fetch_array($res2);

			    $flag2=0;
			    date_default_timezone_set('Asia/Kolkata');
			    for($date = $checkin; $date<$checkout; $date = date('Y-m-d', strtotime($date . ' +1 day')))	
			    {
			    	$sum=0;
			    	$res = mysqli_query($db,$q1);
			      while ($row = mysqli_fetch_array($res)) 
			      {
			        if($date>=$row['in_date'] && $date<$row['out_date'] && $row['status']==="Confirmed")
			        {
			          $sum = $sum+$row['no_rooms'];
			        }
			      }

			      if($sum+$no_rooms<=$row2['no_rooms'])
			      {
			        $flag2=($flag2==1)?1:0;
					continue;
			      }
			      else
			      {
			        $flag2=1;
			       // break;
			        echo '<center>Not available on: '.date('d/M/Y',strtotime($date)).'</center><br>';
			      }

			    }
			    if($flag2==0 && $flag == 0)
			    {
			    	$duration = abs(strtotime($checkout)-strtotime($checkin));
			    	$amount = $duration/86400 * $rtprice * $no_rooms;
			    	echo '<br><br><center>Amount due: $'.$amount.' ';

			    	if(!isset($_SESSION['user1']))
			    	{
			    		session_start();
			    	}
			    	$user = $_SESSION['user1'];

			      	$q3 = "insert into reservation(hid,roomtype,username,no_rooms,no_guests,in_date,out_date,amount,status) values ('$hid','$rtname','$user','$no_rooms','$guests','$checkin','$checkout','$amount','Not Confirmed')";
			      	mysqli_query($db,$q3);
			      	$res_id = mysqli_insert_id($db);
			      	

				    echo '<form action="paymentpage.php" method="post">';

				    //$q4 = "select * from reservation where ";
				    echo '<input type="hidden" name="res_id" value="'.$res_id.'">';
				    echo '<br><br><br>	<input type="submit" name="res_sub" value="Proceed to Payment">';





			    }
			    else if($flag2==1 && $flag==0)
			    {
			      echo "<center>Slot not available on the said dates. Please try to re-enter different dates for check-in and check-out.<br><br>";
			      echo "<a href=\"javascript:history.go(-1)\">Go Back To Reservation Page</a></center>";
			    }
			    else  echo "<center><a href=\"javascript:history.go(-1)\">Go Back To Reservation Page</a></center>";



    	}
    ?>
	</div>
    <div class="footer" style="color: white;font-family: Verdana">
	  <p> &copy 2019 S Travels .</p>
	</div>
</body>
</html>