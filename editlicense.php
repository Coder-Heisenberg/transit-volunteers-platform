<?php
    include_once 'header.php';
    include_once 'includes/dbconnect.php';

    $updatingLicense =  $_GET['updatingID'];
    $my_query = "select * from licenses where licensesID='$updatingLicense'";
    $result = mysqli_query($connection, $my_query);
    $row = mysqli_fetch_array($result);
	
	if (!isset($_SESSION["useruid"])) { #reroutes user to login if they are not logged in
		header("Location: login.php");
		die ();
	}
?>

<body class="subpage"> 
    <div id="main">
		<section class="wrapper style1">
		
        <div class="inner">
            <div class="row">
				<section class="6u 12u$(medium)">
				    <h2>Edit Driver's License</h2>
				</section>		
			</div>

    <form action="includes/license-inc.php" method="post">
        <input type="hidden" name="updatingID" id="updatingID" value="<?php if(isset($_GET['updatingID'])) echo $_GET['updatingID'];?>" />
        <input type="hidden" name="userID" id="userID" value="<?php echo $row['usersID'];?>" />
        
        <div class="row uniform">

            <div class="6u$ 12u$(xsmall)">
				<input type="text" name="linumber" id="linumber" value="<?php echo $row['usersLin']?>" placeholder="Driver's License Number"/>
			</div>
      
            <div class="select-wrapper">
                <select name="listate" id="listate" value="<?php echo $row['usersLinstate']?>">
                    <option value="">- State of Registration -</option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select>
            </div>

            <div class="6u 12u$(small)" >
                <span>Expiration Date</span>
                <input type="date" id="linexp" name="linexp" value="<?php echo $row['usersLinexp']?>" placeholder="Expiration Date" style="color:black;">
            </div>
            </div>
        </br>

        <div class="row uniform">
            <h5>Have you ever been convicted of driving while intoxicated or while under the influence of drugs?</h5>   
            
            <div class="4u 12u$(small)">
                <input type="radio" id="yes" name="dui" value="Yes">
                <label for="yes">Yes</label>
            </div>
            
            <div class="4u 12u$(small)">
                <input type="radio" id="no" name="dui" value="No">
                <label for="no">No</label>
            </div>
        </div>
        
        <button class="button special" type="submit" name="update"> Update Your Driver's License </button>

    </form>

<hr class="major" />

<?php
    if (isset($_GET["error"])) {
        

        if ($_GET["error"]=="stmtfailed") {
            echo "<h4>Error: Something went wrong, please try again!</h4>";
        }

        else if ($_GET["error"]=="emptyinput") {
            echo "<h4>Error: Missing field(s)</h4>";
        }


        else if ($_GET["error"]=="none") {
            echo "<h4>Update Successfully</h4>";
        }
    }   
?>

</body>
</html>
