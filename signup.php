<?php
require 'config.php';

  if(isset($_POST["submitsignup"])){
	$email = $_POST["emailsignup"];
	$password = $_POST["passwordsignup"];
	//$confirmation = $_POST["confirmation"];
	$result = mysqli_query($conn, "SELECT * FROM adherent WHERE email = '$email'");
	$row = mysqli_fetch_assoc($result);
  
  ///////////////////////condition de confirmation et verifier le mot pass
  
	if(mysqli_num_rows($result) > 0){
	  if($password == $row['pswd_adh']) {
		$_SESSION["login"] = true;
		$_SESSION["id_adherent"] = $row["id_adherent"];
		header("Location: index.php");
	  }
	  else{
		echo
		"<script> alert('This account is already exist or Wrong Password'); </script>";
	  }
	}
	else{
	  echo
	  "<script> alert('User Not Registered'); </script>";
	}
  }

?>
<?php

if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
/// check email and phone if something wrong ////
if(isset($_POST["submit"])){
  $name = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $n_cin = $_POST["n_cin"];
  $phone =$_POST["telephone"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmation = $_POST["confirmation"];
  
  $duplicate = mysqli_query($conn, "SELECT * FROM `adherent` WHERE `email` = '$email'");
  $row= mysqli_fetch_array($duplicate);


  if($email == $row['email'] OR ($phone == "") OR ($password == "")){
    echo
      "<script> alert('email already exist OR number,password is empty '); </script>";  
  }
 
  else{
    if($password == $confirmation){
        $query = "INSERT INTO adherent (firstname_adherent, lastname_adherent, n_cin, telephone , email , `pswd_adh` ) VALUES('$name','$lastname','$n_cin', '$phone' ,'$email' , '$password')";
        mysqli_query($conn, $query);
		$_SESSION["name"]=$name;
      echo
      header("Location: index.php");
	  echo
	  "<script> alert('Registration Successful'); </script>";
	  "<script> alert('please complete ur information in ur profile');</script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }

  }

//   if($phone == ""){
//     error_reporting(E_WARNING);
// }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="signup.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2ff52a64bf.js" crossorigin="anonymous"></script>
    <title>Signin and Signup</title>
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#" method="Post">
			<h1>Create Account</h1>
			<input type="text" placeholder="First Name"  name="firstname"/>
			<input type="text" placeholder="Last Name"name="lastname"/>
			<input type="text" placeholder="N_cin" name="n_cin" />
			<input type="number" placeholder="Telephone" name="telephone"/>
			<input type="email" placeholder="Email" name="email"/>
			<input type="password" placeholder="Password" name="password"/>
			<input type="password" placeholder="Confirmation Password" name="confirmation"/>
			<button type="submit" name="submit">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#" method="Post">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="email" placeholder="Email" name="emailsignup"/>
			<input type="password" placeholder="Password" name="passwordsignup" />
			<a href="#">Forgot your password?</a>
			<button type="submit" name="submitsignup">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
    <script src="main.js"></script>
</body>
</html>