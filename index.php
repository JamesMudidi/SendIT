<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM parcel ORDER BY id DESC"); // using mysqli_query instead

session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login.php");  
}
?>

<html>
<head>	
	<title>Homepage</title>
    <link rel="stylesheet" href="css/main.css">
</head>  
<body> 
    <header>
        <h1 class="logo">SendIT</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
			<h3 align="right">Welcome, <?=$_SESSION['sess_user'];?> | <a href="logout.php">Logout</a></h3>  
        </nav>
        <div class="clear"></div>
    </header>
	    <div id="container">
		<h1>Dashboard</h1>
		<p>Welcome to your Dashboard</p>
    <div id="container" class="formx">
	   <h3>Create your very fist parcel<br> and we will deliver it for you</h3> 

    <div id="container" class="formx">
	<a href="add.html">Create New Parcel</a><br/><br/>

	<table width='100%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Pickup</td>
		<td>Destination</td>
		<td>Date</td>
		<td>Price</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['name']."</td>";
		echo "<td>".$res['pickup']."</td>";
		echo "<td>".$res['destination']."</td>";	
		echo "<td>".$res['date']."</td>";	
		echo "<td>".$res['price']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
	
</body>
</html>
