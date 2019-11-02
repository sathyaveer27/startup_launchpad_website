<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    else
    {
        session_destroy();
        session_start(); 
    }

    include("db_config.php");
?>    
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
</head>
<body>
<?php include("navbar.php"); ?>
  <div class="login">
  <div class="login_heading">
  			Login
  	</div>  
  	<form action="login.php" method="post">
  		<div class="login_body">
  			<p> 
  			 	<span>Email</span><br>
  				<input type="text" name="email">
  			</p>
  			<p> 
  			 	<span>Password</span><br>
  				<input type="password" name="password">
  			</p>
  			<p> 
  				<input type="submit" name="submit">
  			</p>
  		</div>
  	</form>
    <?php
        if(isset($_POST['submit'])){
            /*Credentials obtained from user */
            $get_email = $_POST['email'];
            $get_password = $_POST['password'];
            $sql = "SELECT * from user where email=\"$get_email\"";
            $result = $conn->query($sql);
            if($result->num_rows >0){
                $row = $result->fetch_assoc(); 
            $db_ret_password = $row['password'];/*password returned by database*/
            if(strcasecmp($get_password,$db_ret_password) ==0){
                    echo "login Successful";
                    $_SESSION['logged']=1;
                    $_SESSION['userid']=$row['userid'];
                    $_SESSION['name']=$row['first_name']." ".$row['last_name'];
                    $_SESSION['email']=$row['email'];
                    header("location:profile.php");//will b changed to Dashboard
                }
                else{
                    echo "username or password Invalid";
                }
            }
            else{
                echo "Account not found";
            }  
        }
    ?>
  </div>
  <div class="login_help">
    
  </div>
  <?php //include("footer.php"); ?>
</body>
</html>

