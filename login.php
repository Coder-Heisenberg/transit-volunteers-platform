<?php
    include_once 'header.php';
    if(!empty($_SESSION['message'])) {
        $message = $_SESSION['message'];
        echo "<h4 class='error'>Successfully registered!</h4>";
        $_SESSION['message'] = null;
    }
?>

<body class="subpage"> 
    <div id="main">
		<section class="wrapper style1">
		
        <div class="inner">
            <div class="row">
				<section class="6u 12u$(medium)">
				    <h2>User Login</h2>
				</section>		
			</div>
        
    <form action="includes/login-inc.php" method="post">
        <div class="row uniform">

            <div class="6u$ 12u$(xsmall)">
                <?php
                    if (isset($_GET['username'])) {
                        $username = $_GET['username'];
                        echo '<input type="text" name="username" id="username" placeholder="Username" value="'.$username.'"/>';
                        }
                    else {
                        echo '<input type="text" name="username" id="username" placeholder="Username" value=""/>';
                    }
                ?>
            </div>

            <div class="6u$ 12u$(xsmall)">
				<input type="password" name="password" id="password" value="" placeholder="Password"/>
			</div>

        </div>
        </br>
        
        <button class="button special" type="submit" name="submit"> Log In </button>
        </br>
        <br class="" />
        <h5>Don't have an account? <u><a href="register.php" style="color:#EAAA00;" >Register</a></u></h5>
		
        

    </form> 
    <hr class="major" />

    <?php
    if (isset($_GET["error"])) {

        if ($_GET["error"]=="emptyinput") {
            echo "<h4 class='error'>Error: Missing field(s)</h4>";
        }

        else if ($_GET["error"]=="credentialsError") {
            echo "<h4 class='error'>Error: Incorrect Credentials Entered</h4>";
        }
    }   
?>
    </div>
</body>
</html>
