<?php include('server.php') ?>
<?php include_once "_header.php"; ?>
<?php if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: http://localhost:8888/website/?p=login");
  }
?>
<?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="http://localhost:8888/website/?p=login&logout" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>

  	<div><h1>Bejelentkezés</h1></div>
	 
  <form method="post" action="views/login.php">
  	<div>
  		<label>Felhasználónév</label><br>
  		<input type="text" name="username"><br>
  		<label>Jelszó</label><br>
  		<input type="password" name="password"><br>
        <p>
            <input type="submit" name="login_user" value="Belépés"/><br>
            Még nincs regisztrálva? <a href="http://localhost:8888/website/?p=regist">Sign up</a>
  	    </p>
  	</div>
  </form>
  <?php include_once "_footer.php"; ?>