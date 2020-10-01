<!DOCTYPE html>
<html>
<head>
  <title>Travotel</title>
  <link rel="shortcut icon" type="image/png" href="favicon.png">
  <style type="text/css">
    *{
  margin: 0;
  padding: 0;
}
header{
  background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(img/front.jpg);
  height: 100%;
  background-size: cover;
  background-position: center;
  font-family: Century Gothic;
}
ul{
  float: right;
  list-style-type: none;
  margin-top: 25px;
  padding-right:130px;
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
.logo img{
  float:left;
  width: 200px;
  height: auto;
  margin-top: 20px;
}
.SearchBox
{
  position: absolute;
  top: 60%;
  left:52%;
  width: 500px;
  transform: translate(-50%,-50%);
}
input
{
  position: relative;
  display: inline-block;
  font-size: 20px;
  box-sizing: border-box;
  transition: 0.9s;
}
input[type="text"]
{
  background: #fff;
  width: 340px;
  height: 50px;
  border: none;
  outline: none;
  padding: 0 25px;
  border-radius: 25px 0 0 25px;
}
input[type="submit"]
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
input[type="submit"]:hover
{
  background: #ff3333;
}


.main{
  max-width: 1200px;
  margin:auto;
}
.title{
  position: absolute;
  top: 45%;
  left: 50%;
  transform: translate(-50%,-50%);
  color: #fff;
  font-size: 90px;
}
.division1
{
  background-color: ;
}
.column {
    float: left;
    width: 30%;
    padding: 15px;
  padding-left: 30px;
}
.row:after {
    content: "";
    display: table;
    clear: both;
}
.division1 img{
  transition: 0.6s ease;
  overflow: hidden;
}
.division1 img:hover{
  -moz-transform: scale(1.1);
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
img[src="Moscow.jpg"] 
{
  border-radius: 10px;
  width: 90%;
  height: auto;

}
img[src="New Delhi.jpg"] 
{
  border-radius: 10px;
  width: 90%;
  height: auto;

}
img[src="Miami.jpg"] 
{
  border-radius: 10px;
  width: 90%;
  height: auto;

}
img[src="London.jpg"] 
{
  border-radius: 10px;
  width: 90%;
  height: auto;

}
img[src="Oslo.jpg"] 
{
  border-radius: 10px;
  width: 90%;
  height: auto;

}
img[src="Toronto.jpg"] 
{
  border-radius: 10px;
  width: 90%;
  height: auto;

}
img[src="Ratings.png"]
{
  width: 70%;
  height: auto;
}
.division2
{
  background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(luxury.jpg);
  height: 60vh;
  background-size: cover;
  background-position: center;
}
.division2 p
{
  color: white;
}
.row1:after {
    content: "";
    display: table;
    clear: both;
}

.footer {
    position: fixed;
    width: 100%;
    bottom: 0px; 
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
      		<img src="logo.png">
      	</div>
          <div class="nav">
        <ul>
          <li><a href="#">
            <?php
               $db = mysqli_connect('localhost','root','','login_temp') or die ('Error connecting to MySQL server.');
        
                     if(!isset($_SESSION["user1"]))
                     {
                          session_start();
                      }
                    echo $_SESSION["user1"];
                ?>



          </a></li>
            
<li><a href ="UpdateHotel.php"> Update Hotel</a></li>
<li><a href ="InsertRoom.php"> New Rooms</a></li>
<li><a href ="UpdatePrice.php"> Update Rooms</a></li>
<li><a href ="adminlogin.php"> Logout</a></li>
          <li><a href="MyAccount.php">My Account</a></li>
          <li><a href="ologin.php">Log Out</a></li>
        </ul>
          </div></div>
      <div>
      	<h1 class="title">Travotel Hotels</h1>
      </div>

     
    </header>
    


<div class="footer" style="color: white;font-family: Verdana">
  <p> &copy 2018 vg.</p>
</div>
</body>
</html>