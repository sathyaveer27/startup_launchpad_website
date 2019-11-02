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
    <title>Create Project</title>
    <link rel="stylesheet" href="css/create.css ">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
</head>
<body>
    <?php include("navbar.php"); ?>
    <div class="create-block">
        <h2>&nbsp;&nbsp;&nbsp;Create Project</h2>
        <div class="create-form">
            <form action="create.php" method="post">
                <table>
                    <tr>    
                        <td>Title:</td>
                        <td><input type="text" name="project_title" id="project_title"><br></td>                        
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td> <input type="text" name="project_desc" id="project_desc"><br></td>
                    </tr>
                    <tr>
                        <td>Collection Deadline</td>
                        <td> <input type="date" name="collection_deadline" id="collection_deadline"><br></td>
                    </tr>
                    <tr>
                        <td>Target Amount</td>
                        <td><input type="text" name="target_amount" id="target_amount"><br></td>
                    </tr>
                    <tr>
                        <td>Completion Date</td>
                        <td><input type="date" name="completion_date" id="completion_date"><br></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" id="submit"></td>
                    </tr>   
                </table>    
            </form>
        </div>
    </div>
    <?php
        if(isset($_POST['submit'])){
             $project_title = $_POST['project_title'];
             $project_desciption = $_POST['project_desc'];
             $collection_deadline = $_POST['collection_deadline'];
             $target_amount = $_POST['target_amount'];
             $completion_date = $_POST['completion_date'];

             $owner = $_SESSION['userid'];

             $sql = "INSERT INTO project(projectid,project_title,project_desc,`timestamp`,owner) VALUES(0,\"".$project_title."\",\"".$project_desciption."\",now(),\"".$owner."\")";
            echo $sql;
            echo "<br>";
             if($conn->query($sql)){
                $get_pid = "SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'launchpad' AND   TABLE_NAME   = 'project'";
                $result = $conn-> query($get_pid);
                $row = $result -> fetch_assoc();
                $projectid = $row['AUTO_INCREMENT']-1;

                $sql2 = "INSERT INTO project_statistics(projectid,collection_deadline,gathered_amount,target_amount,completion_date) VALUES (".$projectid.",\"".$collection_deadline."\",0,\"".$target_amount."\",\"".$completion_date."\")";
                if($conn->query($sql2)){    
                   header("location:project.php?id={$projectid}");
                }
               else{
                   die("Error: ".$conn->error);
                }
              }
              else{
                 die("Error:".$conn->error);
             }
        }
    ?>
</body>
</html>