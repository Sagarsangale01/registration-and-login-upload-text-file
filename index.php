<!DOCTYPE html>

<?php 
include("dbconnect.php");
?>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login Form</title>

	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-login.css">
</head>
<?php
if(isset($_POST['submit']))  {
  if(isset($_REQUEST['email'])) { $email = $_REQUEST['email']; } else { $email = ""; }
  if(isset($_REQUEST['password'])) { $password = $_REQUEST['password']; } else { $password = ""; }
  

  $password = md5($password);
  
  $query = "SELECT employee_pk, employee_firstName, employee_email, employee_gender,employee_lastName,employee_mobileNo,employee_dateofBirth FROM employeedetail WHERE employee_email = '$email' AND password = '$password' AND employee_status ='Active' AND status ='1'";
$result=mysqli_query($con,$query);
  if(!empty($result))  {
    while($row = mysqli_fetch_row($result)){
    $userid = $row[0];
    $first_name = $row[1];
    $email = $row[2];
    $gender = $row[3];
    $lastname = $row[4];
    $mobile = $row[5];
    $dob = $row[6];
    session_start();
    $_SESSION['username']= $first_name." ".$lastname; 
    $_SESSION['userid']= $userid;
    $_SESSION['email'] = $email;
    $_SESSION['gender'] = $gender;
    $_SESSION['mobile'] = $mobile;
    $_SESSION['dob'] = $dob;
    $_SESSION['last_login'] = time();
  header('Location: dashboard.php');
  }
  echo "<br><br><div align='center'; style ='font:18px Arial,tahoma,sans-serif;color:#ff0000;'> Entered emailid or password is incorrect. Please try again.</div>";

 }
  else {
    echo "<br><br><div align='center'; style ='font:18px Arial,tahoma,sans-serif;color:#ff0000;'> Entered emailid or password is incorrect. Please try again.</div>";
  }
} ?>

   <br><br>

    <div class="main-content">

        <!-- You only need this form and the form-login.css -->

        <form class="form-login" method="post" action="index.php">

            <div class="form-log-in-with-email">

                <div class="form-white-background">

                    <div class="form-title-row">
                        <h1>Log in</h1>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Email</span>
                            <input type="email" name="email" id="email" required="required">
                        </label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Password</span>
                            <input type="password" name="password" id="password" required="required">
                        </label>
                    </div>

                    <div class="form-row">
                        <button type="submit" name="submit" id="submit">Log in</button>
                    </div>

                </div>
                <a href="registration.php" class="form-create-an-account">Create an account &rarr;</a>

            </div>

        </form>

    </div>

</body>

</html>
