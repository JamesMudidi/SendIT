<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
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
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($destination)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		if(empty($date)) {
			echo "<font color='red'>Date field is empty.</font><br/>";
		}

		if(empty($price)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}
		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE parcel SET name='$name',pickup='$pickup',destination='$destination',date='$date',price='$price' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM parcel WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$pickup = $res['pickup'];
	$destination = $res['destination'];
	$date = $res['date'];
	$price = $res['price'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
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

	<form action="add.php" method="post" name="form1">
		<table width="50%" border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Pickup</td>
				<td><input type="text" name="pickup" value="<?php echo $pickup;?>"></td>
			</tr>
			<tr> 
				<td>Destination</td>
				<td><input type="text" name="destination" value="<?php echo $destination;?>"></td>
			</tr>
			<tr> 
				<td>date</td>
				<td><input type="text" name="date" value="<?php echo $date;?>"></td>
			</tr>
			<tr> 
				<td>price</td>
				<td><input type="text" name="price" value="<?php echo $price;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
