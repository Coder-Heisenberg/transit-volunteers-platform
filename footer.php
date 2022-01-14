<?php
if (!isset($_SESSION["useruid"])) { #reroutes user to login if they are not logged in
		header("Location: login.php");
		die ();
	}
?>		
		<!-- Main -->
<div id="main">

<!-- One -->
	<?php
		if (isset($_SESSION["useruid"])) { 
				$current_user = $_SESSION["useruid"];
				if ($current_user == 'admin') { ?>
				<section class="wrapper style1">
				<div class="inner">
				<header class="align-center">
				<h2>Forms and Resources</h2>
				<p>Access Tasks and Volunteers information using the link below.</p>
			</header>
				<div class="flex flex-2">
					<div class="video col">
						<div class="image fit">
							<img src="images/task.jpg" alt="" />
						</div>
						<p class="caption">
							Manage Tasks
						</p>
						<a href="task.php" class="link"><span>Click Me</span></a>
					</div>
					<div class="video col">
						<div class="image fit">
							<img src="images/volunteer.jpg" alt="" />
							
						</div>
						<p class="caption">
							Manage Volunteers
						</p>
						<a href="volunteer.php" class="link"><span>Click Me</span></a>
					</div>
				</div>
				<?php }
			else { ?>
				<section class="wrapper style1">
				<div class="inner">
				<header class="align-center">
					<h2>Forms and Resources</h2>
					<p>Make sure to complete your profile to start volunteering. You can do so by clicking on the Profile link.</br>
					If you would like to volunteer as drivers, make sure to complete the Vehicle and License forms using the links below. </br>
					To access your invited and scheduled volunteer tasks, use on the Task link.</p>
				</header>
				<div class="flex flex-2">
					<div class="video col">
						<div class="image fit">
							<img src="images/profile.jpeg" alt="" />
						</div>
						<p class="caption">
							Access your Profile
						</p>
						<a href="profile.php" class="link"><span>Click Me</span></a>
					</div>

					<div class="video col">
						<div class="image fit">
							<img src="images/vehicle.jpeg" alt="" />
						</div>
						<p class="caption">
							Access your Vehicle
						</p>
						<a href="vehicle.php" class="link"><span>Click Me</span></a>
					</div>

					<div class="video col">
						<div class="image fit">
							<img src="images/license.jpeg" alt="" />
						</div>
						<p class="caption">
							Access your Driver's License
						</p>
						<a href="license.php" class="link"><span>Click Me</span></a>
					</div>

					<div class="video col">
						<div class="image fit">
							<img src="images/task.jpg" alt="" />
						</div>
						<p class="caption">
							Access your Tasks
						</p>
						<a href="volunteertask.php" class="link"><span>Click Me</span></a>
					</div>


				</div>
			<?php } }
		else { ?>
		<section class="wrapper style1">
				<div class="inner">
				<header class="align-center">
					<h2>Forms and Resources</h2>
					<p>Start volunteering today by registering for an account using the link below.</br>
					If you already have an account, log in to complete your volunteer information and more.</p>
				</header>
				<div class="flex flex-2">
					<div class="video col">
						<div class="image fit">
							<img src="images/register.jpeg" alt="" />
							
						</div>
						<p class="caption">
							Register Your Account
						</p>
						<a href="register.php" class="link"><span>Click Me</span></a>
					</div>
					<div class="video col">
						<div class="image fit">
							<img src="images/login.jpeg" alt="" />
							
						</div>
						<p class="caption">
							Log In into Your Account
						</p>
						<a href="login.php" class="link"><span>Click Me</span></a>
					</div>
				</div>
			<?php } ?>
				
		</div>
	</section>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
