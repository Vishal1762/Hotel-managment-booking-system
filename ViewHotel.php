<!DOCTYPE html>
<html>
<head>
  <title>View hotel</title>
  <link rel="shortcut icon" type="image/png" href="favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Alike+Angular|Asul|Eczar|Work+Sans" rel="stylesheet">
<style type="text/css">
	body{
margin: 0;
padding: 0;
background: #ccc;
}
.nav ul{
list-style:none;
background:#663366;
text-align:right;
padding:0;
margin:0; 
}

.nav li{
display:inline-block;
}

.nav a{
text-decoration: none;
color:#fff;
width: 100px;
display: block;
padding: 10px;
font-size: 17px;
font-family: Helvetica;

}
.nav a:hover{
background:#000;
transition : 0.4s;
}			
				header{
	  				background :linear-gradient#663366;
	  				height: 10vh;
	  				background-size: cover;
	  				background-position: center;
	  				font-family: Century Gothic;
				}
				
				ul li{
				  display: inline-block;
				}
				
				.logo ul{

				  float:left;
				  width: 200px;
				  height: auto;
				  margin-top: 10px;
				}
				.main{
				  max-width: 1200px;
				  margin:auto;
				}  
				
	          .text1{
	              	
	              	padding-top: 100px;
	              	font-family:'Azul',Footlight MT Light;
	           		color: white;
		            height: 100%;
		            padding-left: 350px;
		            left:100px;
		            font-size: 35px;
		       }
		       .text1 table{
		       		border-collapse: collapse;
    				width:70%;
    				background-color: #fff;
		       }
		       th, td {
				    padding: 10px;
				    text-align: left;
				    border-bottom: 1px solid #ddd;

				}
				th{
					background-color: black;
				}
				td
				{
					color: black;
				}
				tr:hover {background-color:#d1e0e0;transition: 0.9s ease-in-out;}
</style>
</head>
<body>
<header>
      <div class="main">
        <div class="logo">
<ul>
                <li><h2><font color="white">S Travels</font></h2></li></ul>        </div>
        <div class="nav">
            <ul>
<li><a href ="adminpanel.php"> New Hotel</a></li>
<li><a href ="DeleteHotel.php"> Delete Hotel</a></li>
<li class="active"><a href ="ViewHotel.php"> View Hotel</a></li>
<li><a href ="MonthEntry.php"> Booking </a></li>
<li ><a href ="requests.php"> Hotel Request</a></li>
<li><a href ="adminlogin.php"> Logout</a></li>
</ul>
            </div>  
  </div>
</header>



<div class="text1">


<?php 
$servername="localhost";
$username="root";
$password="";
$db="login_temp";
$conn=mysqli_connect($servername,$username,$password,$db) or die("Error connecting to MYSQL server.");

$q1="select * from hotel";
$res1=mysqli_query($conn,$q1);
echo "<table>";
echo "<tr><th>ID</th><th>NAME</th><th>LOCATION</th></tr>";
while($row=mysqli_fetch_assoc($res1))
{
	echo "<tr><td>{$row['hid']}</td><td>{$row['hname']}</td><td>{$row['hloc']}</td></tr>";
}
echo "</table>";
?>
</div>
</body>

</html>


