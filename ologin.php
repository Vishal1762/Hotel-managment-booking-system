
<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<meta name="viewport" content="width= device-width, initial-scale=1">
	<style type="text/css">
		body {
             background-image:linear-gradient(rgba(0,0,0,0),rgba(0,0,0,0)), url(img/front.jpg);
            height: 100%;
            background-size: cover;
            background-position: center;
        }


        .body {
             font-family: Arial, Helvetica, sans-serif;
            font-style: italic;
            font-size: 15;
            color: white;
            text-align: center;
            padding-top: 150px; 
            }
            input[type=text]:focus, input[type=password]:focus {
                background-color: #ddd;
                outline: none;
            }

            * {
                margin: 0;
                padding: 0;
            }

          hr {
                border: 1px solid #f1f1f1;
                margin-bottom: 25px;
            }
          input[type=text], input[type=password] {
                width: 20%;
                padding: 15px;
                margin: auto;
                display: inline-block;
                border: groove;
                background: #f1f1f1;
            }
            .registerbtn {
                background-color: #4CAF50;
                color: white;
                padding: 16px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 15%;
                opacity: 0.9;
            }
             .container {
                padding: 16px;
            }
             
            .logo ul
            {
                float: left;
                width: 200px;
                height: auto;
                margin-top: 25px;
                padding-left: 40px;
            }
             ul
        {
            float:right;
            list-style-type: none;
            margin-top: 25px;
            padding-right: 130px;

        }

        ul li{
            display: inline-block;
        }

        ul li a
        {
            text-decoration: none;
            color: #fff;
            padding: 5px 20px;
            border: 1px solid transparent;
            transition: 0.9s ease-out;
        }

        ul li a:hover
        {
            background-color: #fff;
            color: #000;
        }   
        .error
            {
                font-style: italic;
                color: red;
            }

        </style>
    </head>


    <body>

         <div class="error">
    <?php 
    $user = $psw = $err = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $db = mysqli_connect('localhost','root','','login_temp')
                or die ('Error connecting to MySQL server.');

                if (isset($_POST['save'])) 
                {
                    $user = $_POST['user'];
                    $psw = $_POST['psw'];
                    $flag=0;
                     $que = "select hname	,password from h_owner where hname='$user' and password = '$psw'"; 
                     $res = mysqli_query($db,$que);
                    
                        
                        session_start();
                        $_SESSION["user1"] = $user;
                }

                if(mysqli_num_rows($res)==1)
                {
                    header("location:ohomepage.php");
                    $flag=1;
              
$err = "*Username/Password is/are invalid";
}
}
?>
</div>  
<header>
<div class="logo">
<ul>
                <li><h2><font color="white">S Travels</font></h2></li></ul></DIV><ul>
<li style="font-family: Century Gothic"><a href="o_register.php">Sign Up</a></li>  
    <li style="font-family: Century Gothic"><a href="index.php">Back</a></li> 
</ul>
</header>
<div class="body">
    <div>
      	<h1 class="title">Owner Login</h1>
      </div>
<form method="post" action="ologin.php"> <div class="container"><br><br><br><br><br><br>
Username &emsp;&emsp;<input required type="text" name="user" placeholder = "Enter Username" value="<?php echo $user;?>">
<br><br>
Password&emsp;&emsp;&nbsp; <input required type="password" name="psw" placeholder = "Enter Password" value="<?php echo $psw;?>">
      <br><br><span class="error"> <?php echo $err;?></span>
      <br><br>

    <button type="submit" class="registerbtn" name="save" >Sign In</button>
           <a>Forgot Password</a>  
    </div>
        
            </form>
    </div>


    



   </body>
</html>