<?php
    include_once 'header.php';
    include_once 'includes/dbconnect.php';

    if(isset($_GET['updatingID'])) {
        echo $_GET['updatingID'];
    }

    $updatingTask =  $_GET['updatingID'];
    print_r($_GET);
    $my_query = "select * from tasks where tasksID='$updatingTask'";
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
				    <h2>Update Task</h2>
				</section>		
			</div>


<form action="includes/newtask-inc.php" method="update">
    <input type="hidden" name="updatingID" value="<?php echo $row['tasksID'] ?>" />

    <div class="row uniform">  
          
        <div class="select-wrapper">
            <select name="type" id="type" >
                <option value="">- Type of Task -</option>
                <option value="Driving">Driving</option>
                <option value="Communication">Communication</option>
                <option value="Passenger Assistance">Passenger Assistance</option>
            </select>
        </div>
    </div>

    <div class="row uniform">  
        <div class="6u 12u$(small)" >
            <input type="text" id="volnum" name="volnum" value="<?php echo $row['tasksVolnum'] ?>" placeholder="Number of Volunteers">
        </div> 

        <div class="6u 12u$(small)" >
            <span>Date of Task</span>
            <input type="date" id="taskdate" name="taskdate" value="<?php echo $row['tasksDate'] ?>" placeholder="Date of Task" style="color:black;">
        </div>
    </div>

    <div class="row uniform">  
        <div class="select-wrapper">
            <select name="taskstart" id="taskstart" value="<?php echo $row['tasksStart'] ?>">
                <option value="">- Start Time -</option>
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
            <select name="taskduration" id="taskduration" value="<?php echo $row['tasksDuration'] ?>">
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

        <div class="6u 12u$(small)" >
            <input type="text" id="cusnum" name="cusnum" value="<?php echo $row['tasksCusnum'] ?>" placeholder="Number of Passengers/Customers">
        </div> 
    </div>  

    <div class="row uniform">  
        <div class="6u 12u$(small)" >
            <input type="text" id="pickup" name="pickup" value="<?php echo $row['tasksPickup'] ?>" placeholder="Pick-up Address">
        </div> 
    </div>

    <div class="row uniform">  
        <div class="6u 12u$(small)" >
            <input type="text" id="dropoff" name="dropoff" value="<?php echo $row['tasksDropoff'] ?>" placeholder="Drop-off Address">
        </div> 
    </div></br>

    <input type="hidden" name="updatingID" value="<?php if(isset($_GET['updatingID'])) echo $_GET['updatingID'];?>" />

    <button class="button special" type="submit" name="update"> Update New Task </button>

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
           # echo "<h4>Update Successful</h4>";
        }
    }   
    ?>


<hr class="major" />

</body>
</html>