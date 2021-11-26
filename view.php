<?php 


session_start();

include 'GetMethod.php';

if(!isset($_SESSION["username"])){
  
header("Location: login.php");
exit(); }


?>

<!DOCTYPE html>
<html>
<head>


<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Registered Taxpayer</title>
</head>

<link rel="stylesheet" href="css/navbar-top.css">

<link rel="stylesheet" href="css/style.css" >

<link href="css/bootstrap.min.css" rel="stylesheet">



<style>
table {
  border-collapse: collapse;
  width: 100%;
  float: left;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #D6EEEE;
}
</style>

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
      <li class="nav-item active">
        <a class="nav-link" href="view.php">View Registered <span class="sr-only">(current)</span></a>
      
      
    </ul>
    <p style="color:white; text-align: right;" > Logged in as: <?php echo $_SESSION['username']; ?> || <a href="logout.php" >Logout</a></p>
  </div>
</nav>

<main role="main" class="container" style=
	"max-width: 100%";
>
  <div class="table "   style="font-size: 1rem;
	font-weight: 400;
	line-height: 1.5;
	color: #212529;
	text-align: left;"
	
>


<h1 style="text-align:center;margin-bottom: 30px;">Registered  TaxPayers</h1>





<table width="100%" border=" 0.5px" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Index#</strong></th>
<th><strong>Id</strong></th>
<th><strong>TPIN</strong></th>
<th><strong>BusinessCertificateNumber</strong></th>
<th><strong>TradingName</strong></th>
<th><strong>Email</strong></th>
<th><strong>BusinessRegistrationDate</strong></th>
<th><strong>MobileNumber</strong></th>
<th><strong>PhysicalLocation</strong></th>

<th align="right"><strong>Action</strong></th>

</tr>
</thead>
<tbody>

<?php
$count=1;
$row=0;

$looper=count($response);


while($row <$looper ) { ?>
<tr><td align="center"> <?php echo $count; ?></td>

<td align="center"> <?php echo $response [$row]['id']; ?></td>

<td align="center"> <?php echo  $response [$row]['TPIN']; ?></td>

<td align="center"> <?php echo  $response [$row]['BusinessCertificateNumber']; ?></td>
<td align="center"> <?php echo  $response [$row]['TradingName']; ?></td>
<td align="center"> <?php echo  $response [$row]['Email']; ?></td>
<td align="center"> <?php echo  $response [$row]['BusinessRegistrationDate']; ?></td>
<td align="center"> <?php echo  $response [$row]['MobileNumber']; ?></td>
<td align="center"> <?php echo  $response [$row]['PhysicalLocation']; ?></td>



<td align="right"> <a href="edit.php?line=<?php echo  $row; ?>" >Edit</a> </td>
<td align="left"> <a href="delete.php?del=<?php echo  $response [$row]['TPIN']; ?>"     onclick="return confirm(' Delete Taxpayer  Record with TPIN: <?php echo  $response [$row]['TPIN']; ?> from: <?php echo $response [$row]['PhysicalLocation']?> ?')"Link>Delete</a> </td>
</tr>
<?php $count++;
$row++;


 } ?>
</tbody>
</table>

</div>
</main>


</body>

</html>
