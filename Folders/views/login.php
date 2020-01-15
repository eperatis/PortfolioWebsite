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
             <h2><a href="<?php echo url('login&logout'); ?>" style="color: red;">Kijelentkezés</a> </h2>
        </div>
    <?php endif ?>
</div>

  	<div><h1>Bejelentkezés</h1></div>
	 
  <form method="post" action="<?php echo url('login'); ?>">
  	<div>
  		<label>Felhasználónév</label><br>
		  <?php if (isset($errors['username'])) : ?>
			<?php foreach($errors['username'] as $error) : ?>
				<p id="has_error"><?php echo $error; ?></p>
			<?php endforeach; ?>
		<?php endif; ?>
  		<input type="text" name="username" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ""; ?>"><br>
  		<label>Jelszó</label><br>
		  <?php if (isset($errors['password'])) : ?>
			<?php foreach($errors['password'] as $error) : ?>
				<p id="has_error"><?php echo $error; ?></p>
			<?php endforeach; ?>
		<?php endif; ?>
  		<input type="password" name="password"><br>
        <p>
            <input type="submit" name="login_user" value="Belépés"/><br>
            Még nincs regisztrálva? <a href="<?php echo url('regist'); ?>">Sign up</a>
  	    </p>
  	</div>
  </form>
  <?php include_once "_footer.php"; ?>