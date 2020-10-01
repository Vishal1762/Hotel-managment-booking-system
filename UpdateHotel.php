<!DOCTYPE html>
<html>
<head>
  <title>Update hotel</title>
    <meta name="viewport" content="width= device-width, initial-scale=1">
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
            .error
            {
              font-size: 25px;
              color: red;
              text-decoration-color: red;
              margin-bottom: 20px;
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
<li><a href ="ohomepage.php"> insert hotel</a></li>                
<li class="active"><a href ="UpdateHotel.php"> Update Hotel</a></li>
<li><a href ="InsertRoom.php"> New Rooms</a></li>
<li><a href ="UpdatePrice.php"> Update Rooms</a></li>
<li><a href="ologin.php">Log Out</a></li>
</ul>
            </div>
  </div>
    </header>
<h2 style="font-family: 'Azul',Arial;padding-top: 90px;">    
<center>update Hotel Details</center></h2>
<div class="text1">

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">  
 
  Hotel ID:&emsp;&emsp;&emsp;&emsp;<input  required type="text" name="hid" placeholder="eg:12">
  <br><br>
  Hotel Name:&emsp;&emsp;&nbsp;<input  required type="text" name="hname" placeholder="eg:Taj">
  <br><br>
  Hotel location: &emsp;&nbsp;<input  required type="text" name="hloc" placeholder="eg:Pune">
  <br><br>
  Description:&emsp;&emsp;&nbsp; <input required type="text" name="hdesc" >
  <br><br>
  Address:&emsp;&emsp;&emsp;&emsp;<input required type="text" name="haddr" >
  <br><br>

  <h2>&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;Image Upload</h2><br>

       &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Image:
        <input type="file" name="img" required>

   <br><br>&emsp;&emsp;
  <input type="submit" name="save" class="submitbtn" value="Submit">
    
</form>
    </div>
    

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

$hloc = $hotel = $hname = $hid ="";
if(isset($_POST['save']))
{
  $hid = $_POST["hid"];
  $hname = $_POST["hname"];
  $hloc = $_POST["hloc"];
  $hdesc= $_POST["hdesc"];
  $haddr = $_POST["haddr"];

  $filetemp=$_FILES['img']['tmp_name'];
  $filename=$_FILES['img']['name'];
  $filetype=$_FILES['img']['type'];
  $filepath="pics/".$filename;  



  $q1="update hotel set hname='$hname',hloc='$hloc',hdesc='$hdesc',haddr='$haddr', imgname='$filename', path='$filepath', type = '$filetype' where hid='$hid'";

  $res1=mysqli_query($conn,$q1) or die('Error querying request');
  move_uploaded_file($filetemp, $filepath);
}
?>

    
    </body>
</html>