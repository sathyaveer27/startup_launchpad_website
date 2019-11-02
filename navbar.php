 <nav class="navigation">
	<div class="nav-left" id="nav">
		<a href="create.php">Start a Project</a>
		<a href="search.php">Search Project</a>
	</div>
	<div class="nav-center" id="logo">
		<span>Launchpad</span>
	</div>
	<div class="nav-right" id="login-control">
		
		<?php
		if(!isset($_SESSION)){
			echo "<a href=\"login.php\"><button id=\"login-btn\">Login</button></a>";
			echo "|";
			echo "<a href=\"signup.php\"><button id=\"signup-btn\">Signup</button></a>";	
		}
		else{
			echo "<span id=\"user-name\">{$_SESSION["name"]}</span>";
			echo "<a href=\"logout.php\"><button id=\"logout-btn\">Logout</button></a>";
		}
		?>
	</div>
</nav>
