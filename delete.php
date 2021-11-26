<?php


session_start();

$del=$_REQUEST['del'];

if(!isset($_SESSION["username"]) ){
  
header("Location: login.php");
 
exit();} 

if (!isset($del)){
  header("Location: view.php");

exit();}



// post method to consume delete endpoint


$del=$_REQUEST['del'];

$deldata=array (
  'TPIN' => $del,
);



//session headers
$apikey='Apikey :';
  $user='candidateid:';
  
  $apikey= $apikey.$_SESSION['Apikey'];
 $user =   $user.$_SESSION['username'];

//sending delete data to endpoint

$service_url = 'https://www.mra.mw/sandbox/programming/challenge/webservice/taxpayers/delete';
       $curl = curl_init($service_url);
       $curl_post_data = json_encode( $deldata);
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
	

echo 'logged out successfully';



header("Location: login.php"); 
?>