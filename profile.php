<?php
    session_start();
    if($_SESSION['logged']==0){
        header("location:login.php");
    }
    include("db_config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
</head>
<body>
    <?php include("navbar.php"); ?>
    <?php
        $sql = "SELECT * from user where userid=\"".$_SESSION['userid']."\"";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>
    <div class="personal-details">
        <div class="info">
            <h2 id="title">Personal Info</h2>
            <table cellspacing="5" cellpadding="5">
                <tr>
                    <td>First Name:</td>
                    <td><?php echo $row['first_name'];?></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><?php echo $row['last_name'];?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $row['email'];?></td>
                </tr>
                <tr>
                    <td>Wallet Ballance</td>
                    <td><?php echo $row['wallet_balance'];?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?php echo $row['gender'];?></td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td><?php echo $row['contact'];?></td>
                </tr>
            </table>
        </div>  
    </div>
    <div class="user-projects-area">
        <div class="user-projects">
            <h2 id="title">My Projects</h2>
            <?php
                $get_project_list = "SELECT * FROM project where owner=".$_SESSION['userid'];
                $result = $conn->query($get_project_list);
                if($result->num_rows == 0){
                    echo "<p class=\"alert\">No Projects Created</p>";
                    echo "<a href=\"create.php\">Start a Project</a>";
                }
                else{
                    while($row = $result->fetch_assoc()){
                        // $row = $result->fetch_assoc();
                        echo "<div class=\"project-block\">";
                        echo "<a id=\"project-title\"  href=\"project.php?id={$row['projectid']}\">";
                        echo "<span>{$row['project_title']}</span>";
                        echo "</a>";
                        echo "<p id=\"project-desc\">{$row['project_desc']}</p>";
                        echo "<span id=\"timestamp\">Date Created:{$row['timestamp']}</span>";
                        echo "</div>";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>