<?php include('server.php') ?>
<?php include_once "_header.php"; ?>
<?php if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: http://localhost:8888/website/?p=login");
  }
?>
<?php  if (isset($_SESSION['username'])) : ?>
	<div>
            <h1>Üdvözöllek <strong><?php echo $_SESSION['username']; ?>!</strong></h1>
            <p>Jelekezz ki a kijelentkezésre kattintva vagy jelentkezz be egy másik fiókba lent.</p>
             <h2><a href="http://localhost:8888/website/?p=login&logout='1'" style="color: red;">Kijelentkezés</a> </h2>
        </div>
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