<?php include_once "_header.php"; ?>
<form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label><br>
  	  <input type="text" name="username" value="<?php echo $username; ?>"><br>
  	  <label>Email</label><br>
  	  <input type="text" name="email" value="<?php echo $email; ?>"><br>
  	  <label>Password</label><br>
  	  <input type="password" name="password_1"><br>
  	  <label>Confirm password</label><br>
  	  <input type="password" name="password_2"><br>
        <input type="submit" name="reg_user" value="Regisztráció"/>
        <p>
  		    Already a member? <a href="login.php">Sign in</a>
  	    </p>
  	</div>
  </form>
<?php include_once "_footer.php"; ?>