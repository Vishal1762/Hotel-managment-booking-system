<php include('Login.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>My Account</title>
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
		    background-image: linear-gradient(to right, rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
		}
		.content h3{
			font-family: 'Work Sans',Footlight MT Light;
			font-size: 180%;
		}
		.content3 h3{
			font-family: 'Work Sans',Footlight MT Light;
			font-size: 180%;
		}
		.content{
			padding-left: 170px;
			font-size: 135%;
			font-family: 'Azul',Footlight MT Light;
		}
		.content3{
			padding-left: 170px;
			font-size: 135%;
			font-family: 'Azul',Footlight MT Light;
		}
		.tab1
		{
			position:absolute;
			left:300px; 
		}
		.tab2
		{
			position:absolute;
			left:750px; 
		}
		.tab3
		{
			position:absolute;
			left:370px; 
		}
		.content2{
			width:80%;
			border-left: 3px solid black;
    		background-color: #f0f5f5;
    		padding-left: 5px;
		}
		.footer {
			padding: 20px;
			text-align: center;
			background:  #000;
			margin-top: 20px;
		}
		.cancelbook
		{
			position:absolute;
			left:1150px;
			font-size: 70%;
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
                <li><h2><font color="white">S Travels</font></h2></li></ul>       	</div>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="Login.php">Log Out</a></li>
        </ul>
      </div>
    </header><br>

    <div class="content"><!--Division for My Details-->
    	<h3>My Details</h3>
    	<hr class="style-one"><br><br>
    	<div>
    	<?php
    			 $db = mysqli_connect('localhost','root','','login_temp') or die ('Error connecting to MySQL server.');
        
                     if(!isset($_SESSION["user1"]))
                     {
                          session_start();
                      }
                    $user = $_SESSION["user1"]; 
                    $q1 = "select * from customer where username = '$user'";
                    $res = mysqli_query($db,$q1) or die("Error querying database.");
                    $row = mysqli_fetch_array($res);

                    echo "Name".'<span class="tab1">'.": ".$row['fname']." ".$row['lname'].'</span>'.'<br>'.'<br>';

                    echo "Gender".'<span class="tab1">'.": ".$row['gender'].'</span>'.'<br>'.'<br>';



                    echo "City".'<span class="tab1">'.": ".$row['city'].'</span>'.'<br>'.'<br>';

                    

                    echo "Country".'<span class="tab1">'.": ".$row['country'].'</span>'.'<br>'.'<br>';


                    echo "Contact".'<span class="tab1">'.": ".$row['contact'].'</span>'.'<br>'.'<br>';

                    echo "Email".'<span class="tab1">'.": ".$row['email'].'</span>'.'<br>'.'<br>';

    		?>
    	</div>
    </div><br>

    <div class="content3"><!--Division for My Bookings-->
    	<h3>My Bookings<span class="cancelbook"><a href="Cancellation.php">Cancel Bookings</a></span></h3>
    	<hr class="style-one"><br>
    	<div class="content2"><!--To be looped-->
    		<?php
    			$q2 = "select * from reservation where username = '$user'";
				$res2 = mysqli_query($db,$q2);


    			while($row2 = mysqli_fetch_array($res2))
    			{
    				if(strcmp($row2['status'],"Confirmed")==0 || strcmp($row2['status'],"Cancelled")==0)
	    			{
	    				$hid = $row2['hid'];
						$q3 = "select * from hotel where hid = '$hid'";
						$res3 = mysqli_query($db,$q3);
						$row3 = mysqli_fetch_array($res3);

						$in_date = date('d/M/Y', strtotime($row2['in_date']));
    					$out_date = date('d/M/Y', strtotime($row2['out_date']));

    					echo '<h4 style="font-size: 150%">'.$row3['hname'].'<span class="tab2">'.$row2['status'].'</span><br></h4>
    					'.$row3['hloc'].'<span class="tab3">'.$in_date.' to '.$out_date.'</span><span class="tab2">'.$row2['no_rooms'].' Room(s)</span><br>';
    				}
    			}
    		?>
    	</div><br><!--Loop till here-->
    </div>
    <br>
    <div class="footer" style="color: white;font-family: Verdana">
	  <p> &copy S Travels 2019.</p>
	</div>
</body>
</html>