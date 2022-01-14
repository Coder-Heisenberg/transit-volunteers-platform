<?php
include_once 'header.php';
?>

<section id="banner" data-video="images/banner">
	<div class="inner">
		<header>
			<?php
				if (isset($_SESSION["useruid"])) {
					$current_user = $_SESSION["useruid"];
					if ($current_user == 'admin') { ?>
						<h1>Welcome back, Agent!</h1>
					<?php }
					else{
						require_once("includes/dbconnect.php");
						$current_id = $_SESSION["userid"];

						$my_query = "select * from profiles where usersID=$current_id";
						$result = mysqli_query($connection, $my_query);
					
						if(mysqli_num_rows($result) > 0) {
							$row = mysqli_fetch_assoc($result); ?>
							<h1>Hi, <?php echo $row['usersFirst']?>!</h1>
						<?php
						}
						else{
							echo "<h1>Volunteer Today</h1>";
						}
					}}
				else {
					echo "<h1>Volunteer Today</h1>";
			}
			?>
							
		<p>“Remember that the happiest people are not those getting more, but those giving more.”</br>
		<p>― H. Jackson Brown Jr.</p>
		</header>
		<a href="#main" class="button big alt scrolly">See More</a>
	</div>

</section>

<?php
include_once 'footer.php';
?>
