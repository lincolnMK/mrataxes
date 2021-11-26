<?php
session_start();
// Destroying All Sessions


if(!isset($_SESSION["username"])){
  
header("Location: login.php");
exit();}


$out= array (
  'Email' => $_SESSION['username'],
);


//session headers
$apikey='Apikey :';
  $user='candidateid:';
  
  $apikey= $apikey.$_SESSION['Apikey'];
 $user =   $user.$_SESSION['username'];




$service_url = 'https://www.mra.mw/sandbox/programming/challenge/webservice/auth/logout';
       $curl = curl_init($service_url);
       $curl_post_data = json_encode($out);
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






if(session_destroy())
{
	
	
	
// Redirecting To Home Page
header("Location: login.php");

}

?>