<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		
        .body
        {
            font-family: Arial, Helvetica, sans-serif;
            color: white;
            width: 100%;
            height: 100%;
            padding-left: 15px;
        }    
body {
            background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(img/front.jpg);
            height: 135vh;
            background-size: cover;
            background-position: top;
            }

        .logo ul
        {
                float: left;
                width: 200px;
                height: auto;
                margin-top: 25px;
                padding-left: 20px;
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
          * {
                box-sizing: border-box;
            }

            .container {
                padding-top:100px;
                padding-left: 10px;
            }

            input[type=text], input[type=password] {
                width: 20%;
                padding: 15px;
                margin: auto;
                display: inline-block;
                border: groove;
                background: #f1f1f1;
            }

            input[type=textarea] {
                width: 30%;
                padding: 15px;
                margin: auto;
                display: inline-block;
                border: groove;
                background: #f1f1f1;
            }

            input[type=text]:focus, input[type=password]:focus, input[type=textarea]:focus {
                background-color: #ddd;
                outline: none;
            }

          hr {
                border: 1px solid #f1f1f1;
                margin-bottom: 25px;
            }

            /* Set a style for the submit button */
            .registerbtn {
                background-color: #4CAF50;
                color: white;
                padding: 16px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 45%;
                opacity: 0.9;
                margin-left: 115px;
            }

            .registerbtn:hover {
                opacity: 1;
            }

            a {
                color: dodgerblue;
            }

            .signin {
                text-align: center;
                color: white;
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
    // define variables and set to empty values
    $title = $fname = $lname = $add1 = $city = $country = $email = $user = "";
    $titleErr = $fnameErr = $lnameErr = $add1Err =  $cityErr =  $countryErr = $emailErr =  $userErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
    
           if (empty($_POST["title"])) {  
            $titleErr = "";
          } else {
            $title = test_input($_POST["title"]);
            if (!preg_match("/^[a-zA-Z. ]*$/",$title)) {
              $titleErr = "*invalid"; 
            }
          }


           if (empty($_POST["fname"])) {
            $fnameErr = "";
          } else {
            $fname = test_input($_POST["fname"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
              $fnameErr = "*invalid"; 
            }
          }

           if (empty($_POST["lname"])) {
            $lnameErr = "";
          } else {
            $lname = test_input($_POST["lname"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
              $lnameErr = "*invalid"; 
            }
          }


         

          if (empty($_POST["add1"])) {
            $add1Err = "";
          }

          


           if (empty($_POST["city"])) {
            $cityErr = "";
          } else {
            $city = test_input($_POST["city"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
              $cityErr = "*invalid"; 
            }
          }

         

         if (empty($_POST["country"])) {
            $countryErr = "";
          } else {
            $country = test_input($_POST["country"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$country)) {
              $countryErr = "*invalid"; 
            }
          }

          if (empty($_POST["email"])) {
            $emailErr = "";
          } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "*invalid"; 
            }
          }


          if (empty($_POST["user"])) {
            $userErr = "";
          } else {
            $user = test_input($_POST["user"]);
            if (!preg_match("/^[A-Za-z0-9_]{4,20}$/",$user)) {
              $userErr = "*invalid"; 
            }
          }

          
    
        if($titleErr =="" && $fnameErr =="" && $lnameErr =="" && $add1Err ==""  && $cityErr =="" && $countryErr ==""  && $emailErr =="" && $userErr =="")
        {
             $db = mysqli_connect('localhost','root','','login_temp')
                or die ('Error connecting to MySQL server.');

                if (isset($_POST['save'])) {
                 $title = $_POST["title"];
                 $fname = $_POST["fname"];
                 $lname = $_POST["lname"];
                 $add1 = $_POST["add1"];
                 $city = $_POST["city"];
                 $country = $_POST["country"];
                 $email = $_POST["email"];
                 $user = $_POST["user"];

                 $flag=0;
                 $que = "select * from o_registered"; 
                 $res = mysqli_query($db,$que);
                 while ($row = mysqli_fetch_array($res)) {
                   if($row['username']===$user)
                   {
                      $flag=1;
                   }
                 }
                 if($flag==0)
                 {
                   $query = "insert into o_registered values ('$user','$title','$fname','$lname','$add1','$city','$country','$email')";
                  
                    mysqli_query($db, $query) or die('Error querying database.');
                    header("Location:Thanks.html");
                }
                else
                {
                  $userErr = "*Username already in use";
                }

                }
        }

    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
//placeholder provides input text for the blank fields as attribute in input field

    ?>
</div>
    <header>
<div class="logo">
<ul>
                <li><h2><font color="white">S Travels</font></h2></li></ul><ul>
    <li style="font-family: Century Gothic"><a href="index.php">Back</a></li> 
</ul>
        </div>
</header>

<br><br><br>
    
    <div class = "body">

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> ">  
        <div class="container">

      Title&emsp;&emsp;&emsp;&emsp;&emsp; <input required type="text" name="title" placeholder = "Enter a Title" value="<?php echo $title;?>">
       <span class="error"><?php echo $titleErr;?></span>
      
      &emsp;
      First Name&emsp;&ensp; <input required type="text" name="fname" placeholder = "Enter Name" value="<?php echo $fname;?>">
      <span class="error"> <?php echo $fnameErr;?></span>
      
      &emsp;
      Last Name&emsp;&ensp;<input required type="text" name="lname" placeholder = "Enter Surname" value="<?php echo $lname;?>">
      <span class="error"> <?php echo $lnameErr;?></span>
      <br><br>
      
     
      
      Address &emsp;&emsp;&emsp; <input required type="textarea" name="add1" placeholder = "Line 1" value="<?php echo $add1;?>">
      <span class="error"> <?php echo $add1Err;?></span>
      <br><br>
      
      
      
      City &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<input required type="text" name="city" placeholder = "Eg. New Delhi" value="<?php echo $city;?>">
      <span class="error"> <?php echo $cityErr;?></span>
      
      &emsp;
      
      <br><br>

      Country &emsp;&emsp;&emsp;&ensp;<input required type="text" name="country" placeholder = "Eg. India" value="<?php echo $country;?>">
      <span class="error"> <?php echo $countryErr;?></span>
      &emsp;
     
      <br><br>
      
      
      Email &emsp;&emsp;&emsp;&emsp;<input required type="text" name="email" placeholder = "example@site.com" value="<?php echo $email;?>">
      <span class="error"> <?php echo $emailErr;?></span>
      <br><br>

      Username &emsp;&emsp;<input required type="text" name="user" placeholder = "4 to 20 characters" value="<?php echo $user;?>">
      <span class="error"> <?php echo $userErr;?></span>
      <br><br>

      
      <hr>
    <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        By creating an account you agree to our <a href="#">Terms & Conditions</a>.</p>
 
    <button type="submit" class="registerbtn" name="save">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="ologin.php">Sign In</a>.</p>
  </div>
    </form>
</div>
</body>
</html>