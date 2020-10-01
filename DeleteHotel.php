<!DOCTYPE html>
<html>
<head>
  <title >Delete hotel</title>
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
            background :#663366;
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
       

   input[type=text]{
                width: 20%;
                padding: 15px;
                margin: auto;
                display: inline-block;
                border: groove;
                background: #f1f1f1;
            }
  input[type=text]:focus{
                background-color: #ddd;
                outline: none;
            }

          .submitbtn {
                background-color: #4CAF50;
                color: white;
                padding: 16px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 30%;
                opacity: 0.9;
              }

            .submitbtn:hover {
                opacity: 1;
            }

            .text1{
                  
                  padding-top: 60px;
                  font-family:'Azul',Footlight MT Light;
                color: black;
                height: 100%;
                width: 100%;
                padding-left: 450px;
                left:100px;
                font-size: 25px;
           }
           
}
}
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


<li class="active"><a href ="DeleteHotel.php"> Delete Hotel</a></li>
<li><a href ="ViewHotel.php"> View Hotel</a></li>

<li><a href ="MonthEntry.php"> Booking </a></li>
<li ><a href ="requests.php"> Hotel Request</a></li>
<li><a href ="adminlogin.php"> Logout</a></li>
</ul>
            </div>
  </div>
<h2 style="font-family: 'Azul',Arial;padding-top: 100px;"><center>Delete Hotel</center></h2>
<div class="text1">

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  &emsp;&emsp;Hotel ID: &emsp;&emsp;&emsp;&emsp;<input type="text" name="hid" placeholder="eg:12">
  <br><br>
  &emsp;&emsp;
  <input type="submit" name="save" class="submitbtn" value="Submit">
</form>
</body>
</html>

<?php //include('updateenterid.php'); 

/*function dialogb()
{
  if(isset($res1))
  {
    echo "$res1 hotels added!";
    return true;
  }
  else
  {
    echo "Insertion unsuccessfull";
    return false;
  }
}*/
$servername="localhost";
$username="root";
$password="";
$db="login_temp";

$conn=mysqli_connect($servername,$username,$password,$db) or die("Error connecting to MYSQL server.");

$hid ="";

if(isset($_POST['save']))
{
  $hid = $_POST["hid"];
  $q1="delete from hotel where hid='$hid'";
  $q2="delete from room_type where hid='$hid'";

  $res1=mysqli_query($conn,$q1);
  $res2=mysqli_query($conn,$q2);
}
?>

