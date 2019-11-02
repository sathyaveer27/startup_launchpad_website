<?php
    session_start();
    $_SESSION['logged']=0;

    include("db_config.php");

?>    
<html>
    <head>
    <link href="css/signup.css" type="text/css" rel="stylesheet">
    </head>
    <body>
    <?php include("navbar.php"); ?>
    <div class="signup">
        <div class="signup-heading">
            Signup        
        </div>
        <form action="signu.php" method="post">
            <div class="signup-body">
            <p> 
  			 	<span>First Name</span><br>
                <input type="text" name="first_name" size="40" maxlength="15" required>
            </p>
            <p> 
  			 	<span>Last Name</span><br>
                <input type="text" name="last_name" size="40" maxlength="15" required>
            </p>
            <p> 
  			 	<span>Password</span><br>
                <input type="password" name="password" id="password" size="40" maxlength="15">
            </p>
            <p> 
  			 	<span>Confirm Password</span><br>
                   <input type="password" name="cnfpassword" id="cnfpassword"size="40" maxlength="15">
            </p>
            <p> 
  			 	<span>Email Id</span><br>
                   <input type="email" name="email" size="40" maxlength="40">
            </p>
            <p> 
  			 	<span>Gender</span><br>
                <input type="radio" name="gender" value="M" id="t5">
                    Male
                <input type="radio" name="gender" value="F" id="t6">
                    Female
            </p>
            <p> 
  			 	<span>Mobile no</span><br>
                   <input type="telno" name="contact" size="40" maxlength="10">
            </p>
            <p> 
                <input type="submit" value="Sign Up" name="submit" onclick="validate()">
  			</p>  
            </div>    
        </form>
    </div>
    <script type="text/javascript">
        function validate(){
            var password = document.getElementByid("password").value;
            altert("Hello"+password);
            return false;
        }
    </script>
    <?php
        if(isset($_POST['submit'])){
            /*Credentials obtained from user */
            $get_first_name = $_POST['first_name'];
            $get_last_name = $_POST['last_name'];
            $get_email = $_POST['email'];
            $get_password = $_POST['password'];
            $get_gender = $_POST['gender'];
            $get_contact = $_POST['contact'];
            $sql = "INSERT INTO user(userid,first_name,last_name,email,password,wallet_balance,gender,contact) VALUES(0,\"$get_first_name\",\"$get_last_name\",\"$get_email\",\"$get_password\",0,\"$get_gender\",\"$get_contact\")";
 
           if($conn->query($sql)){
                echo "Inserted into table";
            }
            else{
                die("Error: ".$conn->error);
            }
            header("location:dashboard.php");
        }
    ?>
    </body>
</html>
