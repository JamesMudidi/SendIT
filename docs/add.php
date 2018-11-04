<html>
<head>
	<title>Add Data</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header>
        <h1 class="logo">SendIT</h1>
        <nav>
            <ul>
                <li><a href="login.php">Home</a></li>
                <li><a href="member.php">Dashboard</a></li>
                <li><a href="profile.php">Profile</a></li>
            </ul>
        </nav>
        <div class="clear"></div>
    </header>
    <div id="container">

	<a href="index.php">Home</a>
	<br/><br/>

<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$pickup = mysqli_real_escape_string($mysqli, $_POST['pickup']);
	$destination = mysqli_real_escape_string($mysqli, $_POST['destination']);
	$date = mysqli_real_escape_string($mysqli, $_POST['date']);
	$price = mysqli_real_escape_string($mysqli, $_POST['price']);
		
	// checking empty fields
	if(empty($name) || empty($pickup) || empty($destination) || empty($date) || empty($price)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($pickup)) {
			echo "<font color='red'>Pickup field is empty.</font><br/>";
		}
		
		if(empty($destination)) {
			echo "<font color='red'>Destination field is empty.</font><br/>";
		}
		
		if(empty($date)) {
			echo "<font color='red'>Date field is empty.</font><br/>";
		}

		if(empty($price)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO parcel(name,pickup,destination,date,price) VALUES('$name','$pickup','$destination','$date','$price')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
