<?php
    session_start();
    include("db_config.php");
    if(isset($_POST['submit']) && isset($_GET['pid'])){
        $comment = $_POST['comment'];
        $projectid = $_GET['pid'];

        $insert_comment = "INSERT INTO project_livefeed(projectid,userid,comment,`timestamp`,commentid) VALUES(".$projectid.",".$_SESSION['userid'].",\"".$comment."\",now(),0)";
        $conn->query($insert_comment);
        header("location:project.php?id={$projectid}");
    }
?>