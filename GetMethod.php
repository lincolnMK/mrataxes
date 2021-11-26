<?php

  $url = 'https://www.mra.mw/sandbox/programming/challenge/webservice/Taxpayers/getAll';
  
  $apikey='Apikey :';
  $user='candidateid:';
  
  $apikey= $apikey.$_SESSION['Apikey'];
 $user =   $user.$_SESSION['username'];

  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, [
       'Content-Type: application/json',$apikey,
	   $user,
	   
 ]);

  $response = (curl_exec($curl));
  curl_close($curl);


$response=json_decode($response, true);










?>