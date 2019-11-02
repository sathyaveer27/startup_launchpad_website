<?php
    session_start();
    if($_SESSION['logged']==0){
        header("location:login.php");
    }
    include("db_config.php");

    if(isset($_GET['id'])){
        $projectid = $_GET['id'];
        
        $get_project_details = "SELECT * FROM project where projectid=".$projectid;
        $result = $conn->query($get_project_details);
        $row = $result->fetch_assoc();
        $project_title = $row['project_title'];    
        $project_desciption = $row['project_desc'];  
        $date_created = $row['timestamp'];  
        $ownerid = $row['owner'];   

        $get_project_statistics = "SELECT * FROM project_statistics where projectid=".$projectid;
        $result = $conn->query($get_project_statistics);
        $row = $result -> fetch_assoc();
        $collection_deadline = $row['collection_deadline'];  
        $target_amount = $row['target_amount'];   
        $completion_date = $row['completion_date'] ;  
        $gathered_amount = $row['gathered_amount'];   

      $get_owner = "SELECT * FROM user where userid=".$ownerid;
      $result = $conn->query($get_owner);
      $row = $result->fetch_assoc();
      $owner_name = $row['first_name']." ".$row['last_name']; 
    }
    // else{
    //     echo "<h2>Your Projects</h2>";
    //     $get_project_list = "SELECT * FROM project where owner=".$_SESSION['userid'];
    //     echo $get_project_list;
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $project_title;?></title>
    <link rel="stylesheet" href="css/project.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
</head>
<body>
     <?php include("navbar.php"); ?> 
        <!-- Project Details -->
        <div class="project-details">
            <div class="heading">
                <!-- <p id="project-title"><?= $project_title;?></p>
                <p id="project-owner">By:<?= $owner_name;?></p> -->
                <table align="center">
                    <tr id="project-title">
                        <td><?= $project_title;?></td>
                    </tr>
                     <tr id="project-owner">       
                        <td>By:<?= $owner_name;?></td>                        
                    </tr>
                </table>
            </div>
            <div class="general-info">
                <p id="desc"><b>Description</b><br><?= $project_desciption; ?></p>
                <!-- <p id="collection-deadline">Collection Deadline<?= $collection_deadline;?></p>
                <p id="target-amount">Target Amount<?= $target_amount; ?></p>
                <p id="completion-date">Completion Date<?= $completion_date; ?></p>
                <p id="gathered-amount">Gathered Amount<?=$gathered_amount;?></p> -->
                <table>
                    <!-- <tr id="desc">
                        <td>Description
                        <p style="text-indent:30px;"><?= $project_desciption; ?></p></td>                        
                    </tr> -->
                    <tr id="collection-deadline">
                        <td><b>Collection Deadline</b></td>
                        <td><?= $collection_deadline;?></td>                        
                    </tr>
                    <tr id="target-amount">
                        <td><b>Target Amount</b></td>
                        <td><?= $target_amount; ?></td>                        
                    </tr>
                    <tr id="completion-date">
                        <td><b>Completion Date</b></td>
                        <td><?= $completion_date; ?></td>                        
                    </tr>
                    <tr id="gathered-amount">
                        <td><b>Gathered Amount</b></td>
                        <td><?=$gathered_amount;?></td>                        
                    </tr>
                </table>
            </div>
            <div class="promote-area">
                <div class="promote-block"> 
                    <h2>Promote this project</h2>            
                    <a href="promote.php?id=<?=$projectid;?>"><button id="promote-btn">Promote</button></a> 
                </div>
            </div>
        </div>    
        <!-- Comment Section -->
         
        <div class="comment">
            <div class="comment-form">
                <h2>Comment</h2>
                <form method="post" action="add_comment.php?pid=<?= $projectid; ?>">
                    <textarea name="comment" placeholder="Type your text here" rows="10" cols="60" validate></textarea><br>
                    <input type="submit" name="submit">
                </form>
            </div>
            <div class="comment-area">
            <?php
            $fetch_comments = "SELECT * FROM project_livefeed where projectid=".$projectid." order by timestamp desc";
            $result = $conn->query($fetch_comments);
            
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $userid = $row['userid'];
                    $comment = $row['comment'];
                    $timestamp = $row['timestamp'];

                    $fetch_name = "SELECT first_name,last_name from user where userid=".$userid;
                    $result2 = $conn->query($fetch_name);
                    $row2 = $result2->fetch_assoc();
                    $name = $row2['first_name']. " ".$row2['last_name'];

                    echo "<div class=\"comment-block\">";
                    // echo "<a href=\"profile.php?id={$row['projectid']}\">";
                    echo "<h3 id=\"comment-name\">{$name}</h3>";
                    // echo "</a>";
                    echo "<p id=\"user-comment\">{$comment}</p>";
                    echo "<span id=\"timestamp\">{$timestamp}</span>";
                    echo "</div>";
                }
            }
            else{
                echo "No comments yet";
            }

            ?>
            </div>
        </div>
        
</body>
</html>