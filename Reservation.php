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
		     height: 650px;
		     border-style: inset;
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
			width: 150px;
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
            position: fixed;
            bottom: 0px;
            width: 100%;
			padding: 10px;
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
          <li><a href="Homepage.php">Home</a></li>
          <li><a href="MyAccount.php">My Account</a></li>
          <li><a href="Login.php">Log Out</a></li>
        </ul>
      </div>
    </header><br>
    <div class="content">
    	<?php
    		if(isset($_GET['searched']))	
			{
				$searched=$_GET["searched"];
				$hloc = $_GET['hloc'];
				
				$q1="select * from hotel where hname = '$searched' and hloc='$hloc'";
    			$res = mysqli_query($db,$q1);
				$row = mysqli_fetch_array($res);
    			$img = $row['path'];
    			echo '<img src="'.$img.'">';  		
    	
				$name = $row['hname'];
				$loc = $row['haddr'];
				$hid = $row['hid'];
				$hdesc = $row['hdesc'];
				echo '<span class="tab1"><h3 style="font-family: Montserrat,Footlight MT Light;font-size: 200%;">'.$name.'</h3>';    
				

    			echo '<br>
    				<p style="font-family: Montserrat,Footlight MT Light;font-size: 150%;">'.$loc.'</p>';
    				echo '<br>
    				<p style="font-family: Montserrat,Footlight MT Light;font-size: 100%;">'.$hdesc.'</p>';
    	
    	
    	echo '<form method="get" action="res_conf.php"><br>';
    	echo 'Check-In : '.'<input type="date" name="checkin" min="'.date('Y-m-d').'" required><br><br>';
    	echo 'Check-Out: '.'<input type="date" name="checkout" required min="'.date('Y-m-d', strtotime("+1 day")).'"><br><br>';

    	$q3 = "select * from room_type where hid = '$hid'";
    	$res3 = mysqli_query($db,$q3);
		echo 'Select Room Type :'.'<br><br>';
    	while($row = mysqli_fetch_array($res3))
	    	{
	    		$rtname = $row['rtname'];
	    		$rtprice = $row['rtprice'];
	    		echo '<input type="radio" name="rtype" value="'.$rtname.'">'.''.$rtname.''.' - $'.$rtprice.'<br><br>';
	    	}



    		echo 'No. Of Rooms : '.'<input type="number" name="no_room" required min="1" max><br><br>';




    		
    		echo 'No. Of Guests : '.'<input type="number" name="guests" required min="1" ><br><br>';
    		
    		echo '<input type= "hidden" name = "hname" value = "'.$searched.'">';
    		echo '<input type= "hidden" name = "hloc" value = "'.$hloc.'">';


    		echo '<br><br><br><input type="submit" name="save2" value="Proceed To Pay"></form></span>';
    	

    		










    	}
    ?>
	</div>
    <div class="footer" style="color: white;font-family: Verdana">
	  <p> &copy  2019 S Travels .</p>
	</div>
</body>
</html>