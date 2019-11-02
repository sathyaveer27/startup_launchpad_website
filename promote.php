<?php
  session_start();

  include("db_config.php");
  $projectid = $_GET['id'];

  $fetch_project_details ="SELECT * FROM project where projectid=".$projectid;
  $result = $conn->query($fetch_project_details);
  $row = $result->fetch_assoc();

  $project_title = $row['project_title'];
  $project_owner = $row['owner']; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $project_title; ?></title>
    <link rel="stylesheet" type="text/css" href="promote.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
</head>
<body>
    <?php include("navbar.php"); ?>
    <h2><?= $project_title; ?></h2>
    <p>Enter Amount to Promote</p>
    <form action="promote.php?id=<?= $projectid ?>" method="post">
        <input type="text" name="promote-amount"><br>
        <input type="submit" name="submit">
    </form>
    <?php
        if(isset($_POST['submit'])){
            $amount = $_POST['promote-amount'];

            $fetch_wallet_balance = "SELECT wallet_balance FROM user where userid=".$_SESSION['userid'];
            $result = $conn->query($fetch_wallet_balance);
            $row = $result->fetch_assoc();
            $wallet_balance = $row['wallet_balance'];

            if($wallet_balance < $amount){
                header("location:error.php?message=Insufficient Balance");
                die();
            }
            else{
                $wallet_balance -= $amount;
                //Update user wallet_balance
                $update_wallet = "UPDATE user SET wallet_balance= ".$wallet_balance." where userid=".$_SESSION['userid'];
                if($conn->query($update_wallet)){
                    $fetch_owner_wallet = "SELECT wallet_balance FROM user where userid=".$project_owner;
                    // echo $fetch_owner_wallet;
                    $result = $conn->query($fetch_owner_wallet);
                    $row = $result->fetch_assoc();
                    $owner_wallet_balance = $row['wallet_balance']; 
                    $owner_wallet_balance += $amount;
                    echo $owner_wallet_balance;
                    $update_wallet = " UPDATE user set wallet_balance=".$owner_wallet_balance." where userid=".$project_owner;
                    if($conn->query($update_wallet)){
                        //Update Promote Table
                        $update_promote ="INSERT INTO promote(projectid,userid,amount,`timestamp`) VALUES(".$projectid.",".$_SESSION['userid'].",".$amount.",now())";
                       if($conn->query($update_promote)){
                        header("location:paymentsuccessful.php");
                       }
                    }
                }
            }
        }
    ?>
</body>
</html>