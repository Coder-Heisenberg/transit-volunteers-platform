<?php
    include_once 'header.php';
    include_once 'includes/dbconnect.php';

    $updatingVehicle =  $_GET['updatingID'];
    $my_query = "select * from vehicles where vehiclesID='$updatingVehicle'";
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
				    <h2>Edit Vehicle</h2>
				</section>		
			</div>

    <form action="includes/vehicle-inc.php" method="post">
        <input type="hidden" name="updatingID" id="updatingID" value="<?php if(isset($_GET['updatingID'])) echo $_GET['updatingID'];?>" />
        <input type="hidden" name="userID" id="userID" value="<?php echo $row['usersID'];?>" />
        
        <div class="row uniform">
            <div class="6u$ 12u$(xsmall)">
				<input type="text" name="plate" id="plate" value="<?php echo $row['usersPlate']?>" placeholder="License Plate"/>
			</div>
      
            <div class="select-wrapper">
                <select name="state" id="state" selected = <?php echo ($row['usersState']) ?> placeholder="License Plate" style = "color: black; background-color: white"> <!--changed background and text color here, should be done in css-->
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
                <input type="date" id="exp" name="exp" value="<?php echo $row['usersVehexp'] ?>" placeholder="Expiration Date" style="color:black;">
            </div>
            </div>

		<div class="row uniform"> 
            <div class="6u 12u$(small)" >
                <h4>Type of Vehicle</h4>
            </div>
		</div></br>
		
        <div class="row uniform">
            <div class="4u 12u$(small)">
				<input type="radio" id="suv" name="vehicle" value="SUV">
				<label for="suv">SUV</label>
            </div>
            <div class="4u 12u$(small)">
				<input type="radio" id="sedan" name="vehicle" value="Sedan">
				<label for="sedan">Sedan</label>
            </div>
            <div class="4u 12u$(small)">
				<input type="radio" id="van" name="vehicle" value="Van-Truck">
				<label for="van">Minivan/Truck</label>
            </div>
		</div>
		
		<!--Added section - vehicle capacity (not working yet) -->
		 <div class="row uniform"><label >Capacity</label>
			<div class="6u 12u$(small)" >
				<input type="text" id='capacity' name='capacity' placeholder="Number of Passengers" value="<?php echo $row['capacity'] ?>">
			</div>
		</div>

        <div class="row uniform"> 
            <div class="6u 12u$(small)" >
                <h4>Level of Assistance</h4><?php echo ("Current Selection: ".$row['usersAstlevel'])?>
            </div>
        </div></br>

        <div class="4u 12u$(small)">
				<input type="checkbox" id="doordoor" name="assistance" value="Door to Door">
				<label for="doordoor">Door to Door</label>
				<div class="help-tip">
            </div>
            <div class="4u 12u$(small)">
				<input type="checkbox" id="wheelchair" name="assistance" value="Wheelchair">
				<label for="wheelchair">Wheelchair</label>
            </div>
            <div class="4u 12u$(small)">
				<input type="checkbox" id="curbcurb" name="assistance" value="Curb to Curb">
				<label for="curbcurb">Curb to Curb</label>
            </div>

        </br>
        
        <button class="button special" type="submit" name="update"> Update Your Vehicle </button>

        <hr class="major" />

    </form> 

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

<hr class="major" />

</body>
</html>