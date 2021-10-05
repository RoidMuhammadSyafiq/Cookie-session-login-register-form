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
	<title>Login Page</title>
    <link rel="stylesheet" href="tema.css">
    
</head>
<body>
	<!-- pop up uname pass blank -->
<script>
		function check(){
			let x = document.forms["baseform"]["username"].value;
			let y = document.forms["baseform"]["password"].value;
			if(x == "" && y== ""){alert("Username and/or password blank");
    return false;

			}
			}
			</script>
	<!-- Main Content -->
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
						<h2 >Log In</h2>
					</div>
					<div class="row">
						<form control="" class="form-group" action="" method="POST"  name="baseform" onsubmit="return check()">
							<div class="row">
								<input type="text" name="username" id="username" class="form__input" placeholder="Username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>">
							</div>
							<div class="row">
								<!-- <span class="fa fa-lock"></span> -->
								<input type="password" name="password" id="password" class="form__input" placeholder="Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
							</div>
							<div class="row">
								<input type="checkbox" name="remember" id="remember" class="">
								<label for="remember_me">Remember Me!</label>
							</div>
							<div class="row">
								<input type="submit" value="Submit" class="btn">
							</div>
						</form>
					</div>
					<div class="row">
						<p style="color: white;">Don't have an account? <a href="register.php">Register Here</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
if (isset($_POST['login_user'])) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
  
		$password = md5($password);
		$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) {
		  $_SESSION['username'] = $username;
		  $_SESSION['success'] = "You are now logged in";
		  header('location: profil.php');
		}
	
  }
  
  ?>
	?>
	
</body>
</html>