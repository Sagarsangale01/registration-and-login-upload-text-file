<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Registration Form</title>

	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-register.css">

</head>
<?php 
session_start();
  
  $user = $_SESSION['username']; 
  $userid = $_SESSION['userid'];
  $email = $_SESSION['email'];
  $gender = $_SESSION['gender'];
  $mobile = $_SESSION['mobile'];
  $dob = $_SESSION['dob'];

$dateofB = date('d-m-Y', strtotime(str_replace('-','/', $dob)));

if(!empty($user)) {

    if ((time() - $_SESSION['last_login']) > 120) {
        
        header('Location: logout.php');  
    }
    ?>
    <body>
	<header>
		<h1>Siddhi Care India</h1>
        <a href="logout.php">Logout</a>
    </header>
<br><br><br>
<h2 align="center">Welcome to Dashboard</h2>
<br><br>
 <p style="text-align: center;"><b>Your Details:</b></p>
 <br>
 <p style="text-align: center;"><b>Name: </b><?php echo $user; ?></p>
 <br>
 <p style="text-align: center;"><b>Date of Birth: </b> <?php echo $dateofB; ?></p>
 <br>
 <p style="text-align: center;"><b>Gender: </b> <?php echo $user; ?></p>
 <br>
 <p style="text-align: center;"><b>Email: </b><?php echo $email; ?></p>
 <br>
 <p style="text-align: center;"><b>Mobile No: </b><?php echo $mobile; ?></p>
 <br>


</body>
<?php }
else{
header('Location: index.php');
  }
   ?>
</html>
