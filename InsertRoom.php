<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Insert Room</title>
  <link rel="shortcut icon" type="image/png" href="favicon.png">
     <link rel = "stylesheet"
   type = "text/css"
   href = "Style.css" />
  <link href="https://fonts.googleapis.com/css?family=Alike+Angular|Asul|Eczar|Work+Sans" rel="stylesheet">
<style>
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
.logo ul{

          float:left;
          width: 200px;
          height: auto;
          margin-top: 10px;
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
      width: auto; 
            height: 10vh;
            background-size: cover;
            background-position: center;
            font-family: Century Gothic;
        }  
        
        ul li{
          display: inline-block;
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
                  
                  padding-top: 100px;
                  font-family:'Azul',Footlight MT Light;
                color: black;
                height: 100%;
                width: 100%;
                padding-left: 450px;
                left:100px;
                font-size: 25px;
           }
</style>
</head>
<body>
<header>
      <div class="main">
        <div class="logo">
<ul>
                <li><h2><font color="white">S Travels</font></h2></li></ul>ul       </div>
                <div class="nav">

            <ul>
<li><a href ="ohomepage.php"> insert hotel</a></li>                
<li ><a href ="UpdateHotel.php"> Update Hotel</a></li>
<li class="active"><a href ="InsertRoom.php"> New Rooms</a></li>
<li><a href ="UpdatePrice.php"> Update Rooms</a></li>
<li><a href="ologin.php">Log Out</a></li>
</ul>
            </div> 
    </div>
    </header>
<h2 style="font-family: 'Azul',Arial;padding-top: 90px;"><center>Insert Room Details</center></h2>
<div class="text1">

<form method="post" action="" enctype="multipart/form-data">  

  Hotel ID:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input required type="text" name="hid" placeholder="eg:123">
  <br><br>
  Room Type: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<input required type="text" name="rtname" placeholder="eg:Single">
  
  <br><br>
  Maximum guests/room: &emsp;&emsp;&emsp;&nbsp;<input required type="text" name="max_guests" placeholder="eg:2">
  
  <br><br>
  Price/room: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp
   <input required type="text" name="rtprice" >
  <br><br>
  
  Total Rooms of this type/hotel: &nbsp;<input required type="text" name="no_rooms" >
  <br><br>

    <br><br>
    &emsp;&emsp;&emsp;<input type="submit" name="save_btn" class="submitbtn" value="Submit">
    
  </form>

  <?php

$servername="localhost";
$username="root";
$password="";
$db="login_temp";

$conn=mysqli_connect($servername,$username,$password,$db) or die("Error connecting to MYSQL server.");

$hloc = $hdesc = $hname = $hid = $haddr = "";
if(isset($_POST['save_btn']))
{
  $hid = $_POST['hid'];
  $rtname = $_POST['rtname'];
  $max_guests = $_POST['max_guests'];
  $rtprice = $_POST['rtprice'];
  $no_rooms = $_POST['no_rooms'];


        $que = "select * from hotel"; 
        $res = mysqli_query($conn,$que);
        $flag=0;
        while($row = mysqli_fetch_array($res))
        {
          if($row['hid']==$hid)
          {
            $flag=1;
             $q1="insert into room_type(hid,rtname,max_guests,rtprice,no_rooms) values('$hid','$rtname','$max_guests','$rtprice','$no_rooms')";
          $res1=mysqli_query($conn,$q1);
          }
        }
        if($flag==0)
        {
            echo "Hotel ID not found. Re-enter details";
        }
}