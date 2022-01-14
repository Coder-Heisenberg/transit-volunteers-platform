<?php
    include_once 'header.php';
?>


    <div id="main">
		<section class="wrapper style1">
		
        <div class="inner">
            <div class="row">
				<section class="6u 12u$(medium)">
				    <h2>Register Your Account</h2>
					<h5>* By registering, you agree to undergo a background check by the Mountain Line Transit Authority</h5>
				</section>
			</div>
        
    <form action="includes/register-inc.php" method="post" >
        <div class="row uniform">
            <div class="6u$ 12u$(xsmall)">
                <?php
                    if (isset($_GET['email'])) {
                        $email = $_GET['email'];
                        echo '<input type="email" name="email" id="email" placeholder="Email" value="'.$email.'";/>';
                    }
                    else {
                        echo '<input type="email" name="email" id="email" placeholder="Email" value=""/>';
                    }
                ?>
            </div>
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
                <p>*Upper and lower case characters and numbers allowed</p>
			</div>
           
            <div class="6u 12u$(xsmall)">
				<input type="password" name="repassword" id="repassword" value="" placeholder="Repeat Password" />
                <p>*Upper and lower case characters and numbers allowed</p>
			</div>
        </div></br>
        
        <button class="button special" type="submit" name="submit"> Register Your Account </button>
        </br>
        <br class="" />
        <h5>Already registered? <u><a href="login.php" style="color:#EAAA00;" >Log In</a></u></h5>
		
    </form> 

    <?php
    if (isset($_GET["error"])) {

        if ($_GET["error"]=="emptyinput") {
            
            echo "<h4 class='error'>Error: Missing field(s)</h4>";
        }

        else if ($_GET["error"]=="invalidUID") {
            echo "<h4 class='error'>Error: Username cannot contain special characters</h4>";
        }

        else if ($_GET["error"]=="invalidEmail") {
            echo "<h4 class='error'>Error: Invalid Email</h4>";
        }

        else if ($_GET["error"]=="matchError") {
            echo "<h4 class='error'>Error: Password entered do not match each other</h4>";
        }

        else if ($_GET["error"]=="stmtfailed") {
            echo "<h4 class='error'>Error: Something went wrong, please try again!</h4>";
        }

        else if ($_GET["error"]=="takenUID") {
            echo "<h4 class='error'>Error: Username or Email already taken. Please try again!</h4>";
        }

        else if ($_GET["error"]=="none") {
            
            $_SESSION['message'] = 'Successfully registered. Log in below.';
            header("location: ../login.php");
        }
    }   
    ?>
    </div>

    <hr class="major" />

</body>
</html>