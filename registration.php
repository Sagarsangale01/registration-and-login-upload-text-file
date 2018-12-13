<?php 

include("dbconnect.php");
?>

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
<style type="text/css">
    .note {
    color: #ff0000;
    padding-left: 140px;}
</style>
<?php 

if (isset($_POST['submit'])) {

  if(isset($_REQUEST['first_name'])) { $employee_firstName = $_REQUEST['first_name']; } else { $employee_firstName = ""; }
  if(isset($_REQUEST['last_name'])) { $employee_lastName = $_REQUEST['last_name']; } else { $employee_lastName = ""; }
  if(isset($_REQUEST['gender'])) { $employee_gender = $_REQUEST['gender']; } else { $employee_gender = ""; }
  if(isset($_REQUEST['date'])) { $employee_dateofBirth = $_REQUEST['date']; } else { $employee_dateofBirth = ""; }
  if(isset($_REQUEST['email'])) { $employee_email = $_REQUEST['email']; } else { $employee_email = ""; }
  if(isset($_REQUEST['mobile_no'])) { $employee_mobileNo = $_REQUEST['mobile_no']; } else { $employee_mobileNo = ""; }
  if(isset($_REQUEST['password'])) { $password = $_REQUEST['password']; } else { $password = ""; }
  if(isset($_REQUEST['employee_status'])) { $employee_status = $_REQUEST['employee_status']; } else { $employee_status = ""; }
  if(isset($_REQUEST['status'])) { $status = $_REQUEST['status']; } else { $status = "1"; }  
  $password = md5($password);

 $query = "SELECT employee_pk, employee_email, employee_mobileNo FROM employeedetail WHERE employee_email = '$employee_email' AND employee_mobileNo = '$employee_mobileNo' AND status='1'";
$result=mysqli_query($con,$query);
//die();

if(!empty($result))  {

             echo "<script type=\"text/javascript\">";
             echo "alert(\"Record Previously Available in Database...\");";
             echo "</script>";
  } else {

         $sql = "INSERT INTO employeedetail "."(employee_firstName, employee_lastName, employee_gender, employee_dateofBirth, employee_email, employee_mobileNo, employee_status, password,status) "."VALUES "."('$employee_firstName', '$employee_lastName', '$employee_gender', '$employee_dateofBirth', '$employee_email', '$employee_mobileNo', '$employee_status', '$password','$status')";
                  $retval = mysqli_query($con, $sql);
         
            if(! $retval ) {

               echo("<div align='center'; style ='font:18px Arial,tahoma,sans-serif;color:#ff0000;'> Could not Entered data </div>" . mysqli_error($con));
            }
            else{

            echo "<div align='center'; style ='font:18px Arial,tahoma,sans-serif;color:#008000;'> Record Added successfully...</div>";
                $_SESSION['retval']=$retval; ?>
              <script>
              window.location.href = ("index.php"); </script>
               <?php   }
                    }
}

?>
<br><br>

    <div class="main-content">

        <!-- You only need this form and the form-register.css -->

        <form class="form-register" method="post" action="#">

            <div class="form-register-with-email">

                <div class="form-white-background">
                    <a href="textfile.php" class="form-log-in-with-existing">Process Text File &rarr;</a><br><br>          
                    <div class="form-title-row">
                        <h1>Create an account</h1>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>First Name</span>
                            <input type="text" name="first_name" id="first_name" required="required">
                        </label>
                    </div>

                     <div class="form-row">
                        <label>
                            <span>Last Name</span>
                            <input type="text" name="last_name" id="last_name" required="required">
                        </label>
                    </div>

                      <div class="form-row">
                <label><span>Gender</span></label>
                <div class="form-radio-buttons">

                    <div>
                        <label>
                            <input type="radio" name="Male" id="Male" checked="checked">
                            <span>Male</span>
                        </label>
                    </div>

                    <div>
                        <label>
                            <input type="radio" name="Female" id="Female">
                            <span>Female</span>
                        </label>
                    </div>

                </div>
            </div>

             <div class="form-row">
                        <label>
                            <span>Date of Birth</span>
                            <input type="date" name="date" id="date" required="required">
                        </label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Email</span>
                            <input type="email" name="email" id="email" required="required">
                        </label>
                    </div>

                     <div class="form-row">
                        <label>
                            <span>Mobile No</span>
                            <input type="text" name="mobile_no" id="mobile_no" minlength="9" maxlength="10" onkeypress="return isNumberKey(event)">
                        </label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Password</span>
                            <input type="password" name="password" id="password" minlength="5" maxlength="10" required="required">
                        </label>
                    </div>

                     <div class="form-row">
                <label>
                    <span>Employee Status</span>
                    <select name="employee_status" id="employee_status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </label>
            </div>

                    <div class="form-row">
                        <label class="form-checkbox">
                            <input type="checkbox" name="checkbox" checked>
                            <span>I agree to the <a href="#">terms and conditions</a></span>
                        </label>
                    </div>

                    <div class="form-row">
                        <button type="submit" name="submit">Register</button>
                    </div>
<a href="index.php" class="form-log-in-with-existing">Already have an account? Login here &rarr;</a>
<br><br><br>
<a href="textfile.php" class="form-log-in-with-existing">Process Text File &rarr;</a>
                </div>

            </div>

        </form>

    </div>

</body>

</html>

<script type="text/javascript">
    function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    {
        return false;
    }
    return true;
}
</script>
