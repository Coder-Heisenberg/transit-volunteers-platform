<?php
    include_once 'header.php';
	
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
				    <h2>Pending Tasks</h2>
				</section>
		    </div>
            	

<?php
    if (isset($_SESSION["useruid"])) {
        include_once('includes/dbconnect.php');
        $current_user = $_SESSION["useruid"];
        if ($current_user == 'admin') {
            $my_query = "select * from tasks";
            $result = mysqli_query($connection, $my_query); ?>
        <table>
                    <t>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Number of volunteer</th>
                        <th>Date of Task</th>
                        <th>Start Time</th>
                        <th>Duration (in hours)</th>
                        <th>Number of Passengers</th>
                        <th>Pick-up Address</th>
                        <th>Drop-off Address</th>
                        <th>Action</th>
                    </t>
        <?php
        while($row = mysqli_fetch_assoc($result)) {?>
            <tr>
                <td><?php echo $row['tasksID']; ?></td>
                <td><?php echo $row['tasksType']; ?></td>
                <td><?php echo $row['tasksVolnum']; ?></td> <!--volunteer phone number-->
                <td><?php echo $row['tasksDate']; ?></td>
                <td><?php echo $row['tasksStart']; ?></td> <!--start time-->
                <td><?php echo $row['tasksDuration']; ?></td> <!--switch out for end time-->
                <td><?php echo $row['tasksCusnum']; ?></td> <!--number of passengers-->
                <td><?php echo $row['tasksPickup']; ?></td>
                <td><?php echo $row['tasksDropoff']; ?></td>
                
                <td>
                    <a href="edittask.php?updatingID=<?php echo $row['tasksID']; ?>" style="color:#EAAA00;" >Edit</a>
                    <a href="deletetask.php?deleteingID=<?php echo $row['tasksID']; ?>" onclick="return confirm('Are you sure you want to delete this task?');" style="color:red;">Delete</a>
                </td>
                
            </tr>
<?php
        } ?>
        </table>
        <button class="button special" type="submit" onclick="location.href='newtask.php'" name="submit"> Add New Task </button>
        <?php
        }
    }
?> 

<hr class="major" />

    <div class="inner">
        <div class="row">
	    	<section class="6u 12u$(medium)">
	    	    <h2>Scheduled Tasks</h2>
	    	</section>		
	    </div>

    <table>
        <t>
            <th>ID</th>
            <th>Type</th>
            <th>Assigned Volunteer</th>
            <th>Contact Information</th>
            <th>Date of Task</th>
            <th>Start Time</th>
            <th>Duration (in hours)</th>
            <th>Number of Passengers</th>
            <th>Pick-up Address</th>
            <th>Drop-off Address</th>
            <th>Action</th>
        </t>
			
        <tr>
            <td>8</td>
            <td>Communication</td>
            <td>John Doe</td>
            <td>3043832222</td>
            <td>06/25/2021</td>
                    <td>14:00</td>
                    <td>1</td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
				<td>
					<a href="" style="color:green;" >Contact Volunteer</a>
					<a href="" onclick="return confirm('Are you sure you want to cancel this task?');" style="color:red;">Cancel Task</a>
				</td>      
        </tr>

	</table>


    <div class="inner">
        <div class="row">
	    	<section class="6u 12u$(medium)">
	    	    <h2>Completed Tasks</h2>
	    	</section>		
	    </div>

    <table>
        <t>
            <th>ID</th>
            <th>Type</th>
            <th>Assigned Volunteer</th>
            <th>Contact Information</th>
            <th>Date of Task</th>
            <th>Start Time</th>
            <th>Duration (in hours)</th>
            <th>Number of Passengers</th>
            <th>Pick-up Address</th>
            <th>Drop-off Address</th>
            <th>Action</th>
        </t>
			
        <tr>
            <td>8</td>
            <td>Communication</td>
            <td>John Doe</td>
            <td>3043832222</td>
            <td>06/25/2021</td>
                    <td>14:00</td>
                    <td>1</td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
				<td>
					<a href="" style="color:green;" >Contact Volunteer</a>
					<a href="" onclick="return confirm('Are you sure you want to cancel this task?');" style="color:red;">Cancel Task</a>
				</td>      
        </tr>

	</table>

</body>
</html>