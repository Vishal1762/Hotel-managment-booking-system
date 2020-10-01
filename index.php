<!DOCTYPE html>
<html>
<head>
  <title>S travels</title>
  <link rel="shortcut icon" type="image/png" href="ing/favicon.png">
  <style type="text/css">
    *{
  margin: 0;
  padding: 0;
}
header{
  background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(img/front.jpg);
     position: fixed;
  top: 0mm;
  width: 100%;
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
.logo ul{
  float:left;
  width: 300px;
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
.footer {
     position: fixed;
  bottom: 0;
  width: 100%;
    padding: 20px;
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
                <li><h2><font color="white">S Travels</font></h2></li></ul>      	</div>
        <ul>
          <li><a href="#">
              <li><a href="ologin.php">Hotels</a></li>  


              </a>
        </ul>
      </div>
      <div>
      	<h1 class="title">S Travels Hotels</h1>
      </div>


    </header>


      <div class="SearchBox">
        <form method="get" action = "Hotel_Search.php?searched=searched&searchbutton=Search">
          <input type="text" name="searched" placeholder="Eg. Auckland " required>
          <input type="submit" name="searchbutton" value="Search">
        </form>
      </div>
    <hr>



<div class="footer" style="color: white;font-family: Verdana">
  <p> &copy  2019 S Travels .</p>
</div>
</body>
</html>