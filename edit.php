<?php



session_start();

$line=$_REQUEST['line'];

if(!isset($_SESSION["username"]) ){
  
header("Location: login.php");
 
exit();} 

if (!isset($line)){
  header("Location: view.php");

exit();}


include("getmethod.php");
$line=$_REQUEST['line'];



?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Update Taxpayer</title>
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
      <li class="nav-item ">
        <a class="nav-link" href="insert.php">New Registration </a>
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






<h1  style="
  text-align: center;
  margin-bottom: 30px;">Update Taxpayer</h1> 


<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)


	{

	





$update= array (
    'TPIN' => $response [$line]['TPIN'],
    'BusinessCertificateNumber' => $_REQUEST['BusinessCertificateNumber'],
    'TradingName' => $_REQUEST['TradingName'],
    'BusinessRegistrationDate' => $_REQUEST['BusinessRegistrationDate'],
    'MobileNumber' => $_REQUEST['MobileNumber'],
    'Email' => $_REQUEST['email'],
    'PhysicalLocation' => $_REQUEST['PhysicalLocation'],
    'Username' => $_SESSION["username"],
	'Deleted' => false,

		);
		
		
		
		
		
		
		//session headers

$apikey='Apikey :';
  $user='candidateid:';
  
  $apikey= $apikey.$_SESSION['Apikey'];
 $user =   $user.$_SESSION['username'];




 
//send data to post method
	
  $service_url = 'https://www.mra.mw/sandbox/programming/challenge/webservice/taxpayers/edit';
       $curl = curl_init($service_url);
       $curl_post_data = json_encode( $update);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, true);
	   curl_setopt($curl, CURLOPT_HTTPHEADER, [
       'Content-Type: application/json',$apikey,
	   $user,
	   
 ]);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
       $curl_response = curl_exec($curl);
	   $decoded = json_decode($curl_response, true);
       curl_close($curl);

	
print_r($decoded);
	

	$status = "Record Updated Successfully. </br></br> <a href='view.php'>View Taxpayers</a>";

	echo $status;
}



else {
?>
<div class="form"  style="  display: inline-block; width: 500px; text-align: right;   " >
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />




<p><label for="TPIN"  style="float:left ">TPIN: </label> <input type="Number" name="TPIN" placeholder="Enter TPIN" 
required value="<?php echo $response [$line]['TPIN'];?>" readonly/></p>




<p><label style="float:left "for="email">Email Address: </label><input type="Email" name="email" placeholder="Enter email" 
required value="<?php echo $response [$line]['Email'];?>" /></p>

<p><label style="float:left " for="BusinessCertificateNumber">Business Certificate Number: </label><input type="text" name="BusinessCertificateNumber" placeholder="Enter BusinessCertificateNumber" 
required value="<?php echo $response [$line]['BusinessCertificateNumber'];?>" /></p>

<p><label style="float:left " for="TradingName">Trading Name: </label><input type="text" name="TradingName" placeholder="Enter TradingName" 
required value="<?php echo $response [$line]['TradingName'];?>" /></p>

<p><label style="float:left " for="BusinessRegistrationDate">Business Registration Date: </label><input type="date" max="<?php echo date ("Y-m-d")?>" name="BusinessRegistrationDate" placeholder="BusinessRegistrationDate" 
required value="<?php echo $response [$line]['BusinessRegistrationDate'];?>" /></p>

<p><label style="float:left "for="MobileNumber">Mobile Number: </label><input type="number" name="MobileNumber" placeholder="Enter MobileNumber" 
required value="<?php echo $response [$line]['MobileNumber'];?>" /></p>

<p><label  style="float:left "for="PhysicalLocation">Physical Location: </label><input type="text" name="PhysicalLocation" placeholder="Enter PhysicalLocation" 
required value="<?php echo $response [$line]['PhysicalLocation'];?>" /></p>



<p><input name="submit" type="submit" value="Update Taxpayer" /></p>
</form>
</div>
<?php } ?>

</div>
</div>
</main>




</body>


<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
