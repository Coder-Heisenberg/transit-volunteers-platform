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