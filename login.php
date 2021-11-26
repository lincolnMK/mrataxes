<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Mrataxes Login</title>

<link rel="stylesheet" href="css/style.css" />


<link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>


	<div class="header-top"  style="
	width: 100%;
	height: 100px;
	background-color: green;"
>

	<h2 style="color:white; margin-top:30px; margin-left: 30px; float:left;">MRA Tax Registration APP </h2
		>
	</div>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <a class="navbar-brand" href="index.php"> MRA</a>
  
    <ul class="navbar-nav mr-auto">
    </ul>
      
      <p style="color:white; text-align: right;" > Log in Fist: || <a href="login.php" >Login</a></p>
   
  </div>
</nav>


<main role="main" class="container">
  <div class="jumbotron">

  	<div class="form"  style=" float:center;  width: 500px; text-align: center;">
<?php


//session unset destroy session

 

session_start();

// If form submitted post values to validate values through endpoint.
if (isset($_POST['username'])){

	//Checking  user  using curl
	
	
			
	    $service_url = 'https://www.mra.mw/sandbox/programming/challenge/webservice/auth/login';
		$curl = curl_init($service_url);
		$curl_post_data = json_encode(array(
            "Password" => $_REQUEST['password'],
            "Email" => $_REQUEST['username']
            ));
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, true);
	   curl_setopt($curl, CURLOPT_HTTPHEADER, [
       'Content-Type: application/json'
 ]);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
       $curl_response = curl_exec($curl);
	   $decoded = json_decode($curl_response, true);
       curl_close($curl);
			
 
	    

       
	
	//retrieve session cookies apikey and user name from endpoint.
        if(($decoded['ResultCode']==1) &&($decoded['Remark']=='Successful')) {
			
	   $_SESSION['username'] = $decoded['Token']['Name'];		
	    $_SESSION ['Apikey']=	$decoded['Token']['Value'];
				
	    header("location:index.php");
         }

         else{
	echo "
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a>"
;
echo $decoded['ResultCode'];  

echo $decoded['Remark'];


			
		


	}
	

    }
	else{
?>




<h1 style="color:grey;">Log In</h1>
<form action="" method="post" name="login">
<p><input type="text" style="margin-bottom: 5px" name="username" placeholder="Username" required /> </p>

<p> <input style="margin-bottom: 5px" type="password" name="password" placeholder="Password" required /> </p>
<input style="margin-bottom: 5px" name="submit" type="submit" value="Login" />
</form>
<p>Forgot your password? call 0993779941</p>

<?php } ?>

</div>
</div>
</main>
</body>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
