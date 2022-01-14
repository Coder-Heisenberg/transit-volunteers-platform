<?php
    include_once 'header.php';
    include_once 'includes/dbconnect.php';

    $updatingProfile =  $_GET['updatingID'];
    $my_query = "select * from profiles where profilesID='$updatingProfile'"; //Should not be visible
    echo $my_query;
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
				    <h2>Update Profile</h2>
				</section>		
			</div>

<form action="includes/profile-inc.php" method="post"> 
    <input type="hidden" name="updatingID" id="updatingID" value="<?php if(isset($_GET['updatingID'])) echo $_GET['updatingID'];?>" />
    <input type="hidden" name="userID" id="userID" value="<?php echo $row['usersID'];?>" />
        <div class="row uniform">     
            <div class="6u 12u$(small)" >
                <input type="text" id='first' name='first' placeholder="First Name" value="<?php echo $row['usersFirst'] ?>">
            </div>

            <div class="6u 12u$(small)" >
                <input type="text" id='last' name='last' placeholder="Last Name" value="<?php echo $row['usersLast'] ?>">
            </div>

            <div class="6u 12u$(small)" >
                <input type="text" id="phone" name="phone" placeholder="Phone Number" value="<?php echo $row['usersPhone'] ?>">
            </div>  

            <div class="6u 12u$(small)" >
                <span>Date of Birth</span>
                <input type="date" id="dob" name="dob" placeholder="Date of Birth" style="color:black;" value="<?php echo $row['usersDOB'] ?>">
            </div>
        </div> 

        <div class="row uniform"><label >Skill</label>
        <div class="6u 12u$(small)">
			<input type="checkbox" id="driving" name="skill[]" value="driving">
			<label for="driving">Driving</label>
            <input type="checkbox" id="passenger assistance" name="skill[]" value="Passenger Assistance">
			<label for="passenger assistance">Passenger Assistance</label>
            <input type="checkbox" id="communication" name="skill[]" value="communication">
			<label for="communication">Communication</label>
		</div>
        </div>

        <div class="row uniform">
                    <div class="select-wrapper">
                        <select name="education" id="education" value="<?php echo $row['usersEducation'] ?>"">
                        <option value="">- Highest Level of Education -</option>
                            <option value="No Formal Education">No Formal Education</option>
                            <option value="Primary Education">Primary Education</option>
                            <option value="Secondary Education">Secondary Education / Highschool</option>
                            <option value="GED">GED</option>
                            <option value="Vocational Qualification">Vocational Qualification</option>
                            <option value="Bachelor's Degree">Bachelor's Degree</option>
                            <option value="Master's Degree">Master's Degree</option>
                            <option value="Doctorate's Degree or Higher">Doctorate's Degree or Higher</option>
                        </select>
                    </div>

                    <div class="6u 12u$(small)">
                    <input type="text" id="group" name="group" placeholder="Volunteer Group (*Leave blank if not applicable)" value="<?php echo $row['usersGroup'] ?>">
                    </div>
                </div></br>
        
        <label >Availability 1</label>  
        <div class="row uniform">        
            <div class="select-wrapper">
                <select name="day_1" id="day_1" value="<?php echo $row['usersDay_1'] ?>">
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select>
            </div>
         
            <div class="select-wrapper">
                <select name="from_1" id="from_1" value="<?php echo $row['usersFrom_1'] ?>">
				<!--#ffffff13 desired background-->
                    <option value="">- From -</option>
                    <option value="00:00">00:00</option>
                    <option value="1:00">1:00</option>
                    <option value="2:00">2:00</option>
                    <option value="3:00">3:00</option>
                    <option value="4:00">4:00</option>
                    <option value="5:00">5:00</option>
                    <option value="6:00">6:00</option>
                    <option value="7:00">7:00</option>
                    <option value="8:00">8:00</option>
                    <option value="9:00">9:00</option>
                    <option value="10:00">10:00</option>
                    <option value="11:00">11:00</option>
                    <option value="12:00">12:00</option>
                    <option value="13:00">13:00</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                    <option value="17:00">17:00</option>
                    <option value="18:00">18:00</option>
                    <option value="19:00">19:00</option>
                    <option value="20:00">20:00</option>
                    <option value="21:00">21:00</option>
                    <option value="22:00">22:00</option>
                    <option value="23:00">23:00</option>
                </select>
            </div>

            <div class="select-wrapper">
                <select name="duration_1" id="duration_1" value="<?php echo $row['usersDuration_1'] ?>">
                    <option value="">- Duration -</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
            </div>
        </div>
    </br>
        <div class="6u 12u$(small)" >
            <input type="text" id='origin_1' name='origin_1' value="<?php echo $row['usersOrg_1'] ?>">
        </div>
    </br>

    <label >Availability 2 (*Leave blank if not applicable)</label>     
            <div class="row uniform"> 
               
                    <div class="select-wrapper">
                        <select name="day_2" id="day_2" value="<?php echo $row['usersDay_2']?>">
                            <option value="">- Date of Availability -</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                    </div>
                
                    <div class="select-wrapper">
                        <select name="from_2" id="from_2" value="<?php echo $row['usersFrom_2']?>">
                            <option value="">- From -</option>
                            <option value="00:00">00:00</option>
                            <option value="1:00">1:00</option>
                            <option value="2:00">2:00</option>
                            <option value="3:00">3:00</option>
                            <option value="4:00">4:00</option>
                            <option value="5:00">5:00</option>
                            <option value="6:00">6:00</option>
                            <option value="7:00">7:00</option>
                            <option value="8:00">8:00</option>
                            <option value="9:00">9:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                            <option value="18:00">18:00</option>
                            <option value="19:00">19:00</option>
                            <option value="20:00">20:00</option>
                            <option value="21:00">21:00</option>
                            <option value="22:00">22:00</option>
                            <option value="23:00">23:00</option>
                        </select>
                    </div>

                    <div class="select-wrapper">
                        <select name="duration_2" id="duration_2" value="<?php echo $row['usersDuration_2']?>">
                            <option value="">- Duration -</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                </div>
            </br>
                <div class="6u 12u$(small)" >
                    <input type="text" id='origin_2' name='origin_2' placeholder="Origin" value="<?php echo $row['usersOrg_2']?>">
                </div>
            </br>
        
        <label >Availability 3 (*Leave blank if not applicable)</label> 
        <div class="row uniform">       
         
                    <div class="select-wrapper">
                        <select name="day_3" id="day_3" value="<?php echo $row['usersDay_3'] ?>">
                            <option value="">- Date of Availability -</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                    </div>
                
                    <div class="select-wrapper">
                        <select name="from_3" id="from_3" value="<?php echo $row['usersFrom_3'] ?>">
                            <option value="">- From -</option>
                            <option value="00:00">00:00</option>
                            <option value="1:00">1:00</option>
                            <option value="2:00">2:00</option>
                            <option value="3:00">3:00</option>
                            <option value="4:00">4:00</option>
                            <option value="5:00">5:00</option>
                            <option value="6:00">6:00</option>
                            <option value="7:00">7:00</option>
                            <option value="8:00">8:00</option>
                            <option value="9:00">9:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                            <option value="18:00">18:00</option>
                            <option value="19:00">19:00</option>
                            <option value="20:00">20:00</option>
                            <option value="21:00">21:00</option>
                            <option value="22:00">22:00</option>
                            <option value="23:00">23:00</option>
                        </select>
                    </div>

                    <div class="select-wrapper">
                        <select name="duration_3" id="duration_3" value="<?php echo $row['usersDuration_3'] ?>">
                            <option value="">- Duration -</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                </div>
            </br>
                <div class="6u 12u$(small)" >
                    <input type="text" id='origin_3' name='origin_3' placeholder="Origin"  value="<?php echo $row['usersOrg_3']?>">
                </div>
            </br>
        
    <button class="button special" type="submit" name="update"> Update Your Profile </button>

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
            echo "<h4>Profile Created</h4>";
        }
    }   
    ?>

    <hr class="major" />

</body>
</html>
