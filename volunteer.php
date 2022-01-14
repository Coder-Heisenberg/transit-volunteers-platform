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
				    <h2>Manage Volunteers</h2>
				</section>		
		    </div>

<?php
    if (isset($_SESSION["useruid"])) {
        include_once('includes/dbconnect.php');
        $current_user = $_SESSION["useruid"];
        if ($current_user == 'admin') {
            $my_query = "select * from profiles";
            $result = mysqli_query($connection, $my_query); ?>
        <table>
                    <t>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Date of Birth</th>
                        <th>Skills</th>
                        <th>Available Day</th>
                        <th>From</th>
                        <th>Duration</th>
                        <th>Address</th>
                        <th>Action</th>
                    </t>
        <?php
        while($row = mysqli_fetch_assoc($result)) {?>
            <tr>
                <td><?php echo $row['profilesID']; ?></td>
                <td><?php echo $row['usersFirst']; ?></td>
                <td><?php echo $row['usersLast']; ?></td>
                <td><?php echo $row['usersPhone']; ?></td>
                <td><?php echo $row['usersDOB']; ?></td>
                <td><?php echo $row['usersSkill']; ?></td>
                <td><?php echo $row['usersDay_1']; ?></td>
                <td><?php echo $row['usersFrom_1']; ?></td>
                <td><?php echo $row['usersDuration_1']; ?></td>
                <td><?php echo $row['usersOrg_1']; ?></td>
                <td>
                    <a href="viewprofile.php?updatingID=<?php echo $row['profilesID']; ?>" style="color:white;" >View</a></br>
                    <a href="editprofile.php?updatingID=<?php echo $row['profilesID']; ?>" style="color:#EAAA00;" >Edit</a></br>
                    <a href="deleteprofile.php?deleteingID=<?php echo $row['profilesID']; ?>" onclick="return confirm('Are you sure you want to delete this volunteer profile?');" style="color:red;" style="color:red;">Delete</a>
                </td>
                
            </tr>
<?php
            } ?>
        </table>
            <button class="button special" type="submit" onclick="location.href='profile.php'" name="submit"> Add New Volunteer </button>
        <?php
        }
    }
?> 

<hr class="major" />

</body>
</html>