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
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/search.css">
</head>
<body>
	<?php include("navbar.php");?>
	<di v class="search-block">
		<div class="search-form" align="center">
			<form action="search.php" method="post">
				<input type="text" name="search_query">
				<input type="submit" name="submit" value="Search">
			</form>
		</div>
	</div>
	<div class="project-area">
	<?php
		if(isset($_POST['submit'])){
			$search_query = $_POST['search_query'];
			$sql = "SELECT * FROM project where project_title=\"".$search_query."\"";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();

			while($row = $result->fetch_assoc()){
				//echo <p>Results</p>";
				echo "<div class=\"project-block\">";
				echo "<a id=\"project-title\" href=\"project.php?id={$row['projectid']}\">";
				echo "<span>{$row['project_title']}</span>";
				echo "</a>";
				echo "<p id=\"project-desc\">{$row['project_desc']}</p>";
				echo "<span id=\"timestamp\">Date Created:{$row['timestamp']}</span>";
				echo "</div>";
			}
		}
	?>
	</div>
</body>
</html>