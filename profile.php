<?php
    include_once 'header.php';
	
	if (!isset($_SESSION["useruid"])) { #reroutes user to login if they are not logged in
		header("Location: login.php");
		die ();
	}
?>

    <div id="main">
		<section class="wrapper style1">
		
        <div class="inner">
            <div class="row">
				<section class="6u 12u$(medium)">
				    <h2>Your Profile</h2>
				</section>		
			</div>
    <?php
        if (isset($_SESSION["userid"])) {
            require_once("includes/dbconnect.php");
            $current_id = $_SESSION["userid"];
            $my_query = "select * from profiles where usersID=$current_id";
            $result = mysqli_query($connection, $my_query);

            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result); ?>
                <div class="row uniform"> 
                    <div class="6u 12u$(small)" >
                        <h3><?php echo $row['usersFirst']?> <?php echo $row['usersLast']?></h3>
                    </div>
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
                        <h5>Highest Level of Education</h4><?php echo $row['usersEducation']?>
                    </div>
                    <div class="6u 12u$(small)" >
                        <h5>Volunteer Group</h4><?php echo $row['usersGroup']?>
                    </div>
                </div>

                <hr class="minor" />
                <div class="row uniform"> 
                    <div class="6u 12u$(small)" >
                        <h5>Available Day 1</h4><?php echo $row['usersDay_1']?>
                    </div>
                    <div class="6u 12u$(small)" >
                        <h5>Time</h4><?php echo $row['usersFrom_1']?>
                    </div>
                    <div class="6u 12u$(small)" >
                        <h5>Duration</h4><?php echo $row['usersDuration_1']?>
                    </div>
                    <div class="6u 12u$(small)" >
                        <h5>Origin</h4><?php echo $row['usersOrg_1']?>
                    </div>
                </div></br>

                <hr class="minor" />
                <div class="row uniform"> 
                    <div class="6u 12u$(small)" >
                        <h5>Available Day 2</h4><?php echo $row['usersDay_2']?>
                    </div>
                    <div class="6u 12u$(small)" >
                        <h5>Time</h4><?php echo $row['usersFrom_2']?>
                    </div>
                    <div class="6u 12u$(small)" >
                        <h5>Duration</h4><?php echo $row['usersDuration_2']?>
                    </div>
                    <div class="6u 12u$(small)" >
                        <h5>Origin</h4><?php echo $row['usersOrg_2']?>
                    </div>
                </div></br>

                <hr class="minor" />
                <div class="row uniform"> 
                    <div class="6u 12u$(small)" >
                        <h5>Available Day 3</h4><?php echo $row['usersDay_3']?>
                    </div>
                    <div class="6u 12u$(small)" >
                        <h5>Time</h4><?php echo $row['usersFrom_3']?>
                    </div>
                    <div class="6u 12u$(small)" >
                        <h5>Duration</h4><?php echo $row['usersDuration_3']?>
                    </div>
                    <div class="6u 12u$(small)" >
                        <h5>Origin</h4><?php echo $row['usersOrg_3']?>
                    </div>
                </div></br>

                <button class="button special" type="submit" name="submit"><a href ="editprofile.php?updatingID=<?php echo $row['profilesID']; ?>" style="color:black;"> Edit Profile </a></button>
                <?php
            }
            else { ?>
            <form action="includes/profile-inc.php" method="post"> 
                <div class="row uniform">     
                    <div class="6u 12u$(small)" >
                        <input type="text" id='first' name='first' placeholder="First Name" require>
                    </div>

                    <div class="6u 12u$(small)" >
                        <input type="text" id='last' name='last' placeholder="Last Name" require>
                    </div>

                    <div class="6u 12u$(small)" >
                        <input type="text" id="phone" name="phone" placeholder="Phone Number" require>
                    </div>  

                    <div class="6u 12u$(small)" >
                        <span>Date of Birth</span>
                        <input type="date" id="dob" name="dob" placeholder="Date of Birth" style="color:black;">
                    </div>
                </div> 

                <div class="row uniform"><label >Skill</label>
                <div class="6u 12u$(small)">
                    <input type="checkbox" id="driving" name="skill[]" value="Driving">
                    <label for="driving">Driving</label>
                    <input type="checkbox" id="computer" name="skill[]" value="Computer">
                    <label for="computer">Computer</label>
                    <input type="checkbox" id="communication" name="skill[]" value="Communication">
                    <label for="communication">Communication</label>
                </div>
                </div>
                
                <div class="row uniform">
                    <div class="select-wrapper">
                        <select name="education" id="education">
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
                    <input type="text" id="group" name="group" placeholder="Volunteer Group (*Leave blank if not applicable)">
                    </div>
                </div></br>
                
                <label >Availability 1</label> 
                <div class="row uniform">       
                    <div class="select-wrapper">
                        <select name="day_1" id="day_1">
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
                        <select name="from_1" id="from_1">
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
                        <select name="duration_1" id="duration_1">
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
                    <input type="text" id='origin_1' name='origin_1' placeholder="Origin" require>
                </div></br>
            
            <label >Availability 2 (*Leave blank if not applicable)</label>     
            <div class="row uniform"> 
                    <div class="select-wrapper">
                        <select name="day_2" id="day_2">
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
                        <select name="from_2" id="from_2">
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
                        <select name="duration_2" id="duration_2">
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
                    <input type="text" id='origin_2' name='origin_2' placeholder="Origin" require>
                </div>
            </br>

        <label >Availability 3 (*Leave blank if not applicable)</label>        
        <div class="row uniform">       
                    <div class="select-wrapper">
                        <select name="day_3" id="day_3">
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
                        <select name="from_3" id="from_3">
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
                        <select name="duration_3" id="duration_3">
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
                    <input type="text" id='origin_3' name='origin_3' placeholder="Origin" require>
                </div>
            </br>
                
            <button class="button special" type="submit" name="submit"> Add Your Profile </button>

        </form> 
            <?php }
        }
        else {
    ?>
                <form action="includes/profile-inc.php" method="post"> 
                <div class="row uniform">     
                    <div class="6u 12u$(small)" >
                        <input type="text" id='first' name='first' placeholder="First Name" require>
                    </div>

                    <div class="6u 12u$(small)" >
                        <input type="text" id='last' name='last' placeholder="Last Name" require>
                    </div>

                    <div class="6u 12u$(small)" >
                        <input type="text" id="phone" name="phone" placeholder="Phone Number" require>
                    </div>  

                    <div class="6u 12u$(small)" >
                        <span>Date of Birth</span>
                        <input type="date" id="dob" name="dob" placeholder="Date of Birth" style="color:black;">
                    </div>
                </div> 

                <div class="row uniform"><label >Skill</label>
                <div class="6u 12u$(small)">
                    <input type="checkbox" id="driving" name="skill[]" value="Driving">
                    <label for="driving">Driving</label>
                    <input type="checkbox" id="computer" name="skill[]" value="Computer">
                    <label for="computer">Computer</label>
                    <input type="checkbox" id="communication" name="skill[]" value="Communication">
                    <label for="communication">Communication</label>
                </div>
                </div>
                
                <div class="row uniform">
                    <div class="select-wrapper">
                        <select name="education" id="education">
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
                    <input type="text" id="group" name="group" placeholder="Volunteer Group (*Leave blank if not applicable)">
                    </div>
                </div></br>

                <label >Availability 1</label>  
                <div class="row uniform">      
                    <div class="select-wrapper">
                        <select name="day_1" id="day_1">
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
                        <select name="from_1" id="from_1">
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
                        <select name="duration_1" id="duration_1">
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
                    <input type="text" id='origin_1' name='origin_1' placeholder="Origin" require>
                </div></br>
            
            <label >Availability 2 (*Leave blank if not applicable)</label>     
            <div class="row uniform"> 
               
                    <div class="select-wrapper">
                        <select name="day_2" id="day_2">
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
                        <select name="from_2" id="from_2">
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
                        <select name="duration_2" id="duration_2">
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
                    <input type="text" id='origin_2' name='origin_2' placeholder="Origin" require>
                </div>
            </br>
        
        <label >Availability 3 (*Leave blank if not applicable)</label> 
        <div class="row uniform">       
         
                    <div class="select-wrapper">
                        <select name="day_3" id="day_3">
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
                        <select name="from_3" id="from_3">
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
                        <select name="duration_3" id="duration_3">
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
                    <input type="text" id='origin_3' name='origin_3' placeholder="Origin" require>
                </div>
            </br>
                
            <button class="button special" type="submit" name="submit"> Add Your Profile </button>

        </form> 
    
    <?php
    }
    ?>

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