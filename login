<!DOCTYPE HTML>
<html>
<head>
    <title>SendIT | Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
</head>  
<body> 
    <header>
        <h1 class="logo">SendIT</h1>
        <div class="clear"></div>
    </header>
    <div id="container">
		<h1>Home</h1>
		<h3>Welcome to <strong>SendIT</strong></h3>
	<p>SendIT is a Courier Service that helps users deliver Parcels to different destinations.</p>
	<p>SendIT provides Courier quotes based on weight categories.</p>
	<p><strong>Login Below to access our services</strong></p>
	</div>
    <div id="container" class="formx">
	   <p>If you have not yet Regestered on this platform<br>&nbsp;<br><strong><a href="register.php">Register Here</a></strong></p>  
			<form class="login-form" action="" method="POST">  
				<table class="data-table">
					<tr>
						<td><input type="text" name="user" placeholder="Username"></td>
					</tr>
					<tr>
						<td><input type="password" name="pass" placeholder="Password"></td>
					</tr>
					<tr>
						<td><input type="submit" value="Login" name="submit"/></td>
					</tr>
				</table>
			</form>
	<div>
	
<?php  
if(isset($_POST["submit"])){  
  
if(isset($_POST["submit"])){  
if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
    $user=$_POST['user'];  
    $pass=$_POST['pass'];  
    $con=mysqli_connect('localhost','root','') or die(mysql_error());  
    mysqli_select_db($con, 'andela') or die();  
    
    $query=mysqli_query($con, "SELECT * FROM login WHERE user='".$user."' AND pass='".$pass."'");  
    if(mysqli_num_rows($query) >=1)
    {  
    session_start();  
    $_SESSION['sess_user']=$user;  
  
    /* Redirect browser */  
    header("Location: index.php");  
    }
		else {  
			echo "Ooops!, Invalid Username or Password. Try Again";  
			}
	} else {  
    echo "Ooops!, All fields are required.";  
    }   
}
}
?>

 	<footer>
        Copyright &copy; SendIT <?php echo date('Y') ?>, All rights reserved.
    </footer>

</body>  
</html>  
