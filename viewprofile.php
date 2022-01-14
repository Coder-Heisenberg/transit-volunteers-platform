<?php
    include_once 'header.php';
	
	if (!isset($_SESSION["useruid"])) { #reroutes user to login if they are not logged in
		header("Location: login.php");
		die ();
	}

    if (isset($_SESSION["useruid"])) {
        include_once('includes/dbconnect.php');
        $current_user = $_SESSION["useruid"];
        
        if ($current_user == 'admin') {
            
            $accessingProfile =  $_GET['updatingID'];
            
            $my_query = "SELECT 
            profiles.usersFirst, profiles.usersLast, profiles.usersPhone, profiles.usersDOB, 
            profiles.usersSkill, profiles.usersDay_1, profiles.usersFrom_1, 
            profiles.usersDuration_1, profiles.usersOrg_1,
            vehicles.usersPlate, vehicles.usersState, vehicles.usersVehexp, vehicles.usersVehtype,
            licenses.usersLin, licenses.usersLinstate, licenses.usersLinexp
            FROM profiles
            LEFT JOIN vehicles ON profiles.usersID = vehicles.usersID
            LEFT JOIN licenses ON profiles.usersID = licenses.usersID
            AND profilesID= '$accessingProfile' ";
            $result = mysqli_query($connection, $my_query);

            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
            }
            else{
                echo 'Users have not update all profile';
            }
        }
        else {
            header("location: ../index.php");
            exit();
        }
    }   
?>
    <!-- Profiles -->
    <div id="main">
		<section class="wrapper style1">
		
        <div class="inner">
            <div class="row">
				<section class="6u 12u$(medium)">
				    <h2><?php echo $row['usersFirst']?> <?php echo $row['usersLast']?></h2>
				</section>		
		    </div>
        

        <div class="row uniform"> 
            <div class="6u 12u$(small)" >
                <h5>Date of Birth</h4><?php echo $row['usersDOB']?>
            </div>
            <div class="6u 12u$(small)" >
                <h5>Phone Number</h4><?php echo $row['usersPhone']?>
            </div>
        </div>
        
        <div class="row uniform"> 
            <div class="6u 12u$(small)" >
                <h5>Registered Skills</h4><?php echo $row['usersSkill']?>
            </div>
            <div class="6u 12u$(small)" >
                <h5>Address</h4><?php echo $row['usersOrg_1']?>
            </div>
        </div>
        
        <div class="row uniform"> 
            <div class="6u 12u$(small)" >
                <h5>Available Day</h4><?php echo $row['usersDay_1']?>
            </div>
            <div class="6u 12u$(small)" >
                <h5>Start Time</h4><?php echo $row['usersFrom_1']?>
            </div>
            <div class="6u 12u$(small)" >
                <h5>Duration</h4><?php echo $row['usersDuration_1']?>
            </div>
        </div>
    <hr class="major" />

    <!-- Vehicles -->
    <div class="inner">
        <div class="row">
			<section class="6u 12u$(medium)">
				<h3>Registered Vehicles</h3>
			</section>		
		</div>

        <div class="row uniform"> 
            <div class="6u 12u$(small)" >
                <h5>Vehicle's Plate</h4><?php echo $row['usersPlate']?>
            </div>
            
            <div class="6u 12u$(small)" >
                <h5>State of Registration</h4><?php echo $row['usersState']?>
            </div>
        </div>
        
        <div class="row uniform"> 
            <div class="6u 12u$(small)" >
                <h5>Plate's Expiration Date</h4><?php echo $row['usersVehexp']?>
            </div>
            <div class="6u 12u$(small)" >
                <h5>Vehicle Type</h4><?php echo $row['usersVehtype']?>
            </div>
        </div>
    <hr class="major" />

    <!-- Licenses -->
    <div class="inner">
        <div class="row">
			<section class="6u 12u$(medium)">
				<h3>Registered Driver's License</h3>
			</section>		
		</div>

        <div class="row uniform"> 
            <div class="6u 12u$(small)" >
                <h5>Driver's License Number</h4><?php echo $row['usersLin']?>
            </div>
            <div class="6u 12u$(small)" >
                <h5>State of Registration</h4><?php echo $row['usersLinstate']?>
            </div>
        </div>
        <div class="row uniform"> 
            <div class="6u 12u$(small)" >
                <h5>Driver's License Expiration Date</h4><?php echo $row['usersLinexp']?>
            </div>
        </div>
    <hr class="major" />

    <button class="button special" type="submit" onclick="location.href='volunteer.php'" name="submit"> Back </button>
               