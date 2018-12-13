<?php 

include("dbconnect.php");
?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Process Text File</title>
	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-register.css">
</head>
<style type="text/css">
    .note {
    color: #ff0000;
    padding-left: 140px;}
</style>
<?php 
$data ='';
if (isset($_POST['submit'])) {
  $rand_no = (rand(1111111,9999999));

                       $path = "uploads/";
                       $ext = explode('.', basename( $_FILES['fileToUpload']['name']));
                       $file_tmp  = $_FILES['fileToUpload']['tmp_name'];
                       $path = $path . $rand_no . "." . $ext[count($ext)-1]; 
                        move_uploaded_file($file_tmp, $path);

$file = fopen($path,"r");

while(! feof($file))
  {
  $data .= fgets($file). "<br />";
  }
fclose($file);

 $sql = "INSERT INTO textdata "."(text_file_data, file_location) "."VALUES "."('$data', '$path')";
         $retval = mysqli_query($con, $sql);
         
            if(! $retval ) {

               echo("<div align='center'; style ='font:18px Arial,tahoma,sans-serif;color:#ff0000;'> Could not Entered data </div>" . mysqli_error($con));
            }
            else{

            echo "<div align='center'; style ='font:18px Arial,tahoma,sans-serif;color:#008000;'> File Upload successfully...</div>";
                $_SESSION['retval']=$retval; ?>
              <script>
              window.location.href = ("index.php"); </script>
               <?php   }

 }
?>
<br><br>

    <div class="main-content">

        <!-- You only need this form and the form-register.css -->

        <form class="form-register" method="post" action="#" enctype="multipart/form-data">

            <div class="form-register-with-email">

                <div class="form-white-background">
                    <a href="registration.php" class="form-log-in-with-existing">New Registration &rarr;</a><br><br>          
                    <div class="form-title-row">
                        <h1>Process Text File</h1>
                    </div>

                 <div class="form-row">
                        <label>
                            <span>Upload Text File</span>
                            <input type="file" name="fileToUpload" id="fileToUpload" required="required">
                        </label>
                    </div>
                     <div class="form-row">
                        <button type="submit" name="submit" id="submit">Upload</button>
                    </div>
          
<a href="index.php" class="form-log-in-with-existing">Already have an account? Login here &rarr;</a>
<br><br><br>
<a href="registration.php" class="form-log-in-with-existing">New Registration &rarr;</a>
                </div>

            </div>

        </form>
   
    </div>

</body>

</html>
