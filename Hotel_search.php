<php include('index.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Travotel</title>
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Proza+Libre" rel="stylesheet">
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
		.sub_btn .SearchBox
		{
		  position: absolute;
		  top: 60%;
		  left:52%;
		  width: 500px;
		  transform: translate(-50%,-670%); */
		}
		.sub_btn input
		{
		  position: relative;
		  display: inline-block;
		  font-size: 20px;
		  box-sizing: border-box;
		  transition: 0.9s;
		}
		.sub_btn input[type="text"]
		{
		  background: beige;
		  width: 340px;
		  height: 50px;
		  border: none;
		  outline: none;
		  padding: 0 25px;
		  border-radius: 25px 0 0 25px;
		}
		.sub_btn input[type="submit"]
		{
		  position: relative;
		  left: -50px;
		  border-radius: 0 25px 25px 0;
		  width: 150px;
		  height: 50px;
		  border: none;
		  outline: none;
		  cursor: pointer;
		  background: #ffc107;
		  color: #fff;
		}
		.sub_btn input[type="submit"]:hover
		{
		  background: #ff3333;
		}

		hr.style-one {
				border: 0;
				height: 2px;
				width: 100%;
				background: #333;
				background-image: -webkit-linear-gradient(left, #ccc, #333, #ccc);
				background-image: -moz-linear-gradient(left, #ccc, #333, #ccc);
				background-image: -ms-linear-gradient(left, #ccc, #333, #ccc);
				background-image: -o-linear-gradient(left, #ccc, #333, #ccc);
				padding-top: 2px;
		}

		hr.style-two
		{
				height: 0px;
				background-color: white;
				border: none;
		}

		hr.style-three
		{
				border: 0;
				height: 2px;
				width: 50%;
				background: #333;
				background-image: -webkit-linear-gradient(left, #ccc, #333, #ccc);
				background-image: -moz-linear-gradient(left, #ccc, #333, #ccc);
				background-image: -ms-linear-gradient(left, #ccc, #333, #ccc);
				background-image: -o-linear-gradient(left, #ccc, #333, #ccc);
				padding-top: 2px;
		}
		.column1 {
		    float: left;
		    width: 20%;
		    padding: 15px;
		  padding-left: 30px;
		}
		.column2 {
		    float: left;
		    width: 50%;
		    padding: 15px;
		  	padding-left: 20px;
		  	border-left: 6px solid red;
		  	border-right: 6px solid red;
    		background-color: white;
		}
		.column4 {/*image*/
		    float: left;
		    
		}
		.column4 img{
			width: 300px;
			height: auto;
		}
		
		.column3 {
		    float: left;
		    width: 20%;
		    padding: 15px;
		  padding-left: 30px;
		}
		.row1:after {
		    content: "";
		    display: table;
		    clear: both;
		}
		.footer {
            position: fixed;
  bottom: 0;
  width: 100%;
			    padding: 20px;
			    text-align: center;
			    background:  #000;
			}

		p.temp1 {
			font-family: 'Proza Libre',Footlight MT Light;
			font-size: 80%;
			font-weight: lighter;	
			}

		h3.temp2 {
			font-family: 'Proza Libre',Footlight MT Light;
			font-size: 150%;
			float: center;
		}	
		a {
			text-decoration: none;
			color: black;
		}
		input
		{
			font-family: 'Proza Libre',Footlight MT Light;
			font-size: 150%;
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
        </header>
          	  	<div class="sub_btn">
  	  <div class="SearchBox">
        <form method="get" action = "Hotel_Search.php?searched=searched&searchbutton=Search">
          <input type="text" name="searched" placeholder="Enter City" required>
          <input type="submit" name="searchbutton" value="Search">
        </form>
      </div></div>


  


<?php
	$db = mysqli_connect('localhost','root','','login_temp')
	or die ('Error connecting to MySQL server.');
?>

    <div><br><br><br><br><br>
      	<center><h2 style="font-family: 'Libre Baskerville', Footlight MT Light;font-size:200%">
      		<?php
      			if(isset($_GET['searched']))	
					{
						$searched=$_GET["searched"];
						echo "Search Results for Location: <i>".$searched.'</i>';
					}
      		?>
      	</h2></center><br>
      	<center><hr class="style-three"></center>
    </div>
<br>

	<!--Code to be repeated-->
    <div class="row1">	
  	<div class="column1">
    <p>
      	
    </p>
  	</div>
  	<div class="column2">
    	<div class="column4">
    	</div>
    	<div class="column5">
    		<center><h3 class="temp2">

    			<?php
                
    				if(isset($_GET['searched']))	
					{
						$searched=$_GET["searched"];
						$q1="select * from hotel";
						$flag = 0;
						$hloc = "";
$hcountry = "";

						$res = mysqli_query($db,$q1);
						while($row = mysqli_fetch_array($res))
						{
							if (substr_compare($searched, $row['hloc'], 0, 5, true)==0) 
							{
								$hname = $row['hname'];
								$hloc = $row['hloc'];

                                echo '<form method = "get" action = "login.php?searched='.$hname.'">';
								
								echo '<input type="hidden" name="hloc" value="'.$hloc.'">';

								echo '<img class="column 4" src= "img/'.$row['imgname'].'" width=300px height=auto align=left>'.'<br>';


								echo '<input type="submit" name="searched" value="'.$hname.'"><br>';

/*
*/								
								echo '<p class ="temp1">'.$row['haddr'].'<br>'.'<br>'.'<hr class = "style-two">'.'<br>';
								echo '<br>'.'<br>';	 
								echo '<hr class = "style-one">';
								echo '<br>';
								
								$flag=1;

							

							}
						}
						if($flag==0)
						{
							echo "No results found";
						}

					}
				?>


    		</h3>
    		<p style=""></p></center>
    	</div>
    	</div>
	</div>
    <div class="column3">
    <p>
    	
    </p>
	</div><br>
	<br>
  	<!--Till Here-->


  	<div class="footer" style="color: white;font-family: Verdana">
	  <p> &copy  2019 S Travels .</p>
	</div>
</body>
</html>