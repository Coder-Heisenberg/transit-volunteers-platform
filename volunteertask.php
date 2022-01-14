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
				    <h2>Your Task Dashboard</h2>
				</section>		
			</div>

			<div class="row">
			<section class="6u 12u$(medium)">
				<h3>Invitations</h3>
			</section>
			</div>	

			<table>
                    <t>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Date of Task</th>
                        <th>Start Time</th>
                        <th>Duration (in hours)</th>
                        <th>Number of Passengers</th>
                        <th>Pick-up Address</th>
                        <th>Drop-off Address</th>
                        <th>Action</th>
                    </t>

					<tr>
					<td>17</td>
					<td>Driving</td>
					<td>07/02/2021</td>
					<td>9:00</td>
					<td>2</td>
					<td>2</td>
					<td>327 Morgan Ct, Morgantown, WV, 26508</td>
					<td>Ruby Memorial Hospital, Morgantown, WV, 26505</td>
					<td>
						<a href="" onclick="return confirm('Accepting Task?');" style="color:green;" >Accept</a>
						<a href="" onclick="return confirm('Rejecting Task?');" style="color:red;">Reject</a>
					</td>      
            </tr>
			</table>
			</br>


			<div class="row">
			<section class="6u 12u$(medium)">
				<h3>Scheduled Tasks</h3>
			</section>
			</div>	

			<table>
                    <t>
                        <th>ID</th>
                        <th>Type</th>
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
					<td>Passenger Assistance</td>
					<td>06/25/2021</td>
					<td>14:00</td>
					<td>1</td>
					<td>N/A</td>
					<td>N/A</td>
					<td>N/A</td>
					<td>
						<a href="contact.php" style="color:green;" >Contact Agent</a>
					</td>      
            </tr>
		