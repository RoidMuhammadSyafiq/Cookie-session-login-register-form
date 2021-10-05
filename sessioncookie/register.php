<?php
include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yinka Enoch Adedokun">
	<title>Register Page</title>
    <link rel="stylesheet" href="tema.css">
    
</head>
<body>
	<!-- Main Content -->
	<?php 
	session_start();

	?>
	<script>
		function check(){
			let x = document.forms["baseform"]["username"].value;
			let y = document.forms["baseform"]["password"].value;
			if(x == "" && y== ""){alert("Username and/or password blank");
    return false;

			}
			let x = document.forms["baseform"]["term"].value;
				if (x==""){
					alert("you must agree term and service");
					return false;

				}
		
			}
	
		
			</script>
	<div class="container-fluid">
		<div class="row main-content bg-success text-center">
			<div class="col-md-4 text-center company__info">
				<span class="company__logo"><h2><span class="fa fa-android"></span></h2></span>
				
				<img src="src/Chaldea.png" alt="gambar.jpg" style="width: 200px; padding: 60px;">	
				<br>
				<br>
				<h4 style="width: 200px;"></h4>
				
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form " style="width: 400px; text-align: center;">
				<div class="container-fluid">
					<div class="row">
						<h2 >Register</h2>
					</div>
					<div class="row">
						<form name="baseform" control="" class="form-group" action="profil.php" method="POST" onsubmit="return check()" action="">
							<div class="row">
								<input type="text" name="username" id="username" class="form__input" placeholder="Username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>">
							</div>
							<div class="row">
								<!-- <span class="fa fa-lock"></span> -->
								<input type="password" name="password" id="password" class="form__input" placeholder="Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
							</div>
							<div class="row">
								<input type="checkbox" name="term" id="term" class="">
								<label for="term">Agree Term and Service</label>
							</div>
							<div class="row">
								<input type="submit" value="Submit" class="btn" name="submit">
							</div>
						</form>
					</div>
					<div class="row">
						<p style="color: white;">already have an account? <a href="sign.php">Log in Here</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$pass = $_POST['password'];

				$insert = mysqli_query($conn,"INSERT INTO `akun`(`nama`, `pass`) VALUES ('$username','$pass')");
				mysqli_query($db, $query);
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: profil.php');
			}
	
		
		
	
	?>
	
</body>
</html>