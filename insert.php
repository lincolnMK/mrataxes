<?php





session_start();



if(!isset($_SESSION["username"])){
  
header("Location: login.php");
exit(); }

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
	
	//assign variables to array 
	
	$dataAdd=array (
  'TPIN'		 		=> $_REQUEST['TPIN'],
  'BusinessCertificateNumber' 	=> $_REQUEST['BusinessCertificateNumber'],
  'TradingName' 		=> $_REQUEST['TradingName'],
  'BusinessRegistrationDate' => $_REQUEST['BusinessRegistrationDate'],
  'MobileNumber'		=> $_REQUEST['MobileNumber'],
  'Email' 				=> $_REQUEST['email'],
  'PhysicalLocation' 	=> $_REQUEST['PhysicalLocation'],
  'Username' 			=> $_SESSION["username"],
);
	
	
	
	//session headers
	$apikey='Apikey :';
  $user='candidateid:';
  
  $apikey= $apikey.$_SESSION['Apikey'];
 $user =   $user.$_SESSION['username'];

	//send data to endpoint
	
  $service_url = 'https://www.mra.mw/sandbox/programming/challenge/webservice/taxpayers/add';
       $curl = curl_init($service_url);
       $curl_post_data = json_encode( $dataAdd);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, true);
	   curl_setopt($curl, CURLOPT_HTTPHEADER, [
       'Content-Type: application/json',$apikey,$user
	  ,
	   
 ]);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
       $curl_response = curl_exec($curl);
	   $decoded = json_decode($curl_response, true);
       curl_close($curl);
	
    $status = "New Taxpayer Registered Successfully.</br></br><a href='view.php'>View Registered Taxpayers</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>New Taxpayer</title>




<link rel="stylesheet" href="css/navbar-top.css">

<link rel="stylesheet" href="css/style.css" >

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
      <li class="nav-item">
        <a class="nav-link" href="index.php" >Home </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="insert.php">New Registration <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view.php">View Registered</a>
      
      
    </ul>
    <p style="color:white; text-align: right;" > Logged in as: <?php echo $_SESSION['username']; ?> || <a href="logout.php" >Logout</a></p>
  </div>
</nav>

<main role="main" class="container">
  <div class="jumbotron">


<h1 style="
  text-align: center;
  margin-bottom: 30px;">Register New TaxPayer</h1>



<div class="form"  style="   width: 500px; text-align: right;   ">
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />


<p><label style="float:left " for="TPIN">TPIN: </label><input type="number" name="TPIN" 	minlength="5" maxlength="15" 	placeholder="Enter TPIN" required /></p>

<p><label style="float:left " for="TradingName">Trading Name: </label><input type="text" name="TradingName" 	placeholder="Enter TradingName" required /></p>

<p><p><label style="float:left " for="BusinessCertificateNumber">Business Certificate Number: </label><input minlength="8" maxlength=11 type="text" name="BusinessCertificateNumber" 	placeholder="Enter BusinessCertificateNumber" required  /></p>

<p><label style="float:left " for="BusinessRegistrationDate">Business Registration Date: </label> <input type="date" max="<?php echo date ("Y-m-d")?>" name="BusinessRegistrationDate" placeholder="Enter BusinessRegistrationDate" required value="<?php echo date("Y-m-d");?>"/></p>

<p><label  style="float:left " for="email">Email Address: </label><input type="Email" name="email" 		placeholder="Enter email" required /></p>
<p><label style="float:left " for="MobileNumber">Mobile Number: </label><input minlength="8" maxlength="12" type="number" name="MobileNumber" 	placeholder="Enter MobileNumber" required /></p>

<p><label  style="float:left " for="PhysicalLocation">Physical Location: </label> <input minlength="4" maxlength="20" type="text" name="PhysicalLocation" 	placeholder="Enter PhysicalLocation" required /></p>

<p><input name="submit" type="submit" value="Register" /></p>
</form>

<p style="color:#FF0000;"><?php echo $status; ?></p>

</div>

</div>
</div>

  
  </div>
</main>
<footer class="container">
  <p>&copy; kings 2017-2021</p>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
