<!DOCTYPE html>
<html>
<head>
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
        table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
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
                <li><h2><font color="white">S Travels</font></h2></li></ul>        </div>
        <div class="nav">
            <ul>
<li><a href ="adminpanel.php"> New Hotel</a></li>
<li><a href ="DeleteHotel.php"> Delete Hotel</a></li>
<li><a href ="ViewHotel.php"> View Hotel</a></li>
<li><a href ="MonthEntry.php"> Booking </a></li>
<li class="active"><a href ="requests.php"> Hotel Request</a></li>
<li><a href ="adminlogin.php"> Logout</a></li>
</ul>
            </div>
  </div>

<div class="text1">

    </div>
    </header>
    <table>
        <tr>
            <th>User</th>
            <th>Title</th>
            <th>First name </th>
            <th>Last name</th>
            <th>Email</th>
            <th>Address</th>
            <th>City</th>
            <th>Country</th>
        </tr>
       <?php 
$servername="localhost";
$username="root";
$password="";
$db="login_temp";

$conn=mysqli_connect($servername,$username,$password,$db) or die("Error connecting to MYSQL server.");

$sql = "SELECT user, title, fname,lname, email, add1, city, country from o_registered";
$result = $conn-> query($sql);

if ($result-> num_rows>0){
    while ($row = $result-> fetch_assoc()){
echo "<tr><td>". $row["user"] ."</td><td>". $row["title"] ."</td><td>". $row["fname"] ."</td><td>". $row["lname"] ."</td><td>". $row["email"] ."</td><td>". $row["add1"] ."</td><td>". $row["city"] ."</td><td>". $row["country"] ."</td></tr>";
    }
    echo"</table>";
}
else{
echo"0 result";
}
$conn-> close()
?>

 
    
    </table>
    <footer>
      <button onclick="window.location.href = 'https://mail.google.com/mail/u/0/#inbox?compose=new';" target="_blank" >send email</button>
    </footer>
</body>
</html>

