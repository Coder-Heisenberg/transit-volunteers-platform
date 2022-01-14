<?php
	session_start();
?>

<html lang="en">
	<head>
		<title>Platform Test</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	
<body class="subpage">

<!-- Header -->
	<header id="header">
		<h1><a href="index.php">Platform <span>TRB Development</span></a></h1>
		<?php
			if (isset($_SESSION["useruid"])) {
				$current_user = $_SESSION["useruid"];
				if ($current_user == 'admin') {
					echo "<a href='task.php'>Task</a>";
					echo "<a href='volunteer.php'>Volunteer</a>";
					echo "<a href='includes/logout-inc.php'>Logout</a>";
				}
				else {
					echo "<a href='contact.php'>Contact Us</a>";
					echo "<a href='volunteertask.php'>Task</a>";
					echo "<a href='profile.php'>Profile</a>";
					echo "<a href='vehicle.php'>Vehicle</a>";
					echo "<a href='license.php'>Driver's License</a>";
					echo "<a href='includes/logout-inc.php'>Logout</a>";
				}
			}
			else {
				echo "<a href='contact.php'>Contact Us</a>";
				echo "<a href='register.php'>Register</a>";
				echo "<a href='login.php'>Login</a>";
			}
		?>
	</header>

