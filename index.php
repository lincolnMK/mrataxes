<?php
//require('db.php');
//include("auth.php");


session_start();



if(!isset($_SESSION["username"])){
  
header("Location: login.php");
exit(); }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    
<title>Home Page</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/navbar-top.css">

    <link href="css/bootstrap.min.css" rel="stylesheet">




</head>
<body>

	<header class="header-top"  style="
  
  height: 150px;
  background-color:#0b381b;"><img style="color: white; margin-top:30px; margin-left: 30px; float:left;" src="logo/logo.png" alt="MRA Taxpayer Management APP">

   
    
  </header>



<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <a class="navbar-brand" href="index.php"> Taxpayer Management App |  |</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"> </span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="insert.php">New Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view.php">View Registered</a>
      </li>
       
      
    </ul>
    
      
      <p style="color:white; text-align: right;" > Logged in as: <?php echo $_SESSION['username']; ?> || <a href="logout.php" >Logout</a></p>
   
  </div>
</nav>





<main role="main" class="container">
  <div class="jumbotron">
    <h1>mra tax reg app</h1>



    <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
    <p class="lead">This app allows you to register a New Taxpayers,Update or Delete  an existing Registerd Tax Payer.</p>
    <p> Get Started below: </p>
    <a class="btn btn-lg btn-primary" href="insert.php" role="button">New Taxpayer &raquo;</a>|   | 
    <a class="btn btn-lg btn-primary" href="view.php" role="button">View Registered &raquo;</a>|   |
    <a class="btn btn-lg btn-primary" href="view.php" role="button">Update Existing &raquo;</a>
  </div>







 </div>
</main>
</body>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      
</html>

