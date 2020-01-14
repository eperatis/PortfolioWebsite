<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', 'root', 'website');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username))
  { 
    array_push($errors, "Username is required");
    $errors["username"][] = "A felhasználónevet meg kell adni!"; 
  }
  if (empty($email)) 
  { 
    $errors["email"][] = "Az email címet meg kell adni.";
    array_push($errors, "Email is required"); 
  }
  if (empty($password_1)) 
  { 
    $errors["password"][] = "Meg kell adnia egy jelszót!";
    array_push($errors, "Password is required"); 
  }
  if ($password_1 != $password_2) {
    $errors["passwordconfirm"][] = "A jelszavak nem egyeznek meg!";
	  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
      $errors["username"][] = "A felhasználónév foglalt!";
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
      $errors["email"][] = "Az email már használatban van!";
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	header('location: http://localhost:8888/website/?p=home');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "nevet meg kell adni");
      $errors["username"][] = "A felhasználó nevet meg kell adni!";
  }
  if (empty($password)) {
  	array_push($errors, "jelszo kell");
      $errors["password"][] = "A jelszót meg kell adni!";
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
      header("refresh:0.015;url=http://localhost:8888/website/?p=utasok");
  	  $message = "Sikeres bejelentkezés!";
      echo "<script type='text/javascript'>alert('$message');</script>";
  	}else {
  		array_push($errors, "rossz jelszo");
      $errors["password"][] = "Hibás jelszó!";
  	}
  }
}

?>