<?php
    session_start();

    include("db_config.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <section class="project-referral">
        <h3>Most Promoted Projects</h3>
        <?php
            $get_project_list = "SELECT DISTINCT(projectid) FROM promote  "
        ?>
    </setion>
</body>
</html>