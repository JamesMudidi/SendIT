<!DOCTYPE HTML>
<html>
<head>
    <title>SendIT | Register</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
</head>  
<body> 
    <header>
        <h1 class="logo">SendIT</h1>
        <nav>
            <ul>
                <li><a href="login.php">Home</a></li>
            </ul>
        </nav>
        <div class="clear"></div>
    </header>
    <div id="container">
		<h1>Register</h1>
		<p>Complete the form below to get access to all our services</p>
    <div id="container" class="formx">
	   <p>If you are already a member<br>&nbsp;<br><strong><a href="login.php">Login Here</a></strong></p>  
			<form class="login-form" action="" method="POST">
				<table class="data-table">
					<tr>
						<td><input type="text" name="user" placeholder="Name"></td>
					</tr>
					<tr>
						<td><input type="text" name="email" placeholder="Email"></td>
					</tr>
					<tr>
						<td><input type="password" name="pass" placeholder="Password"></td>
					</tr>
					<tr>
						<td><input type="submit" value="Register" name="submit" /></td>
					</tr>
				</table>
			</form>
	<div>
<?php  
if(isset($_POST["submit"])){  
if(!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['email'])) {  
    $user=$_POST['user'];  
    $email=$_POST['email'];  
    $pass=$_POST['pass'];  
    $con=mysqli_connect('localhost','root','') or die(mysql_error());  
    mysqli_select_db($con, 'andela') or die();  
  
    $query=mysqli_query($con, "SELECT * FROM login WHERE user='".$user."'"); 
    if(mysqli_num_rows($query)>=1){
        echo "Oh No!, That username already exists! Please try again with another.";
    } 
    else {$sql="INSERT INTO login(user,email,pass) VALUES('$user','$email','$pass')";  
  
    $result=mysqli_query($con, $sql);  
        if($result){  
    echo "Yes!! Account Successfully Created. Now Login.";  
    } else {  
    echo "Oh No! We have Failed to create that account!";  
    }  
    }  
  
} else {  
    echo "Ooops!, All fields are required";  
}  
}
?>

 	<footer>
        Copyright &copy; SendIT <?php echo date('Y') ?>, All rights reserved.
    </footer>

</body>  
</html>