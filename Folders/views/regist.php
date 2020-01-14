<?php include('server.php') ?>
<?php include_once "_header.php"; ?>
<form method="post" action="http://localhost:8888/website/?p=regist">
  	<div>
  	  <label>Felhasználónév</label><br>
		<?php if (isset($errors['username'])) : ?>
			<?php foreach($errors['username'] as $error) : ?>
				<p id="has_error"><?php echo $error; ?></p>
			<?php endforeach; ?>
		<?php endif; ?>
  	  <input type="text" name="username" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ""; ?>"><br>
  	  <label>Email</label><br>
		<?php if (isset($errors['email'])) : ?>
			<?php foreach($errors['email'] as $error) : ?>
				<p id="has_error"><?php echo $error; ?></p>
			<?php endforeach; ?>
		<?php endif; ?>
  	  <input type="text" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ""; ?>"><br>
  	  <label>Jelszó</label><br>
		<?php if (isset($errors['password'])) : ?>
			<?php foreach($errors['password'] as $error) : ?>
				<p id="has_error"><?php echo $error; ?></p>
			<?php endforeach; ?>
		<?php endif; ?>
  	  <input type="password" name="password_1"><br>
  	  <label>Jelszó mégegyszer</label><br>
		<?php if (isset($errors['passwordconfirm'])) : ?>
			<?php foreach($errors['passwordconfirm'] as $error) : ?>
				<p id="has_error"><?php echo $error; ?></p>
			<?php endforeach; ?>
		<?php endif; ?>
        <input type="password" name="password_2" id="passwd"><br>
        <p>
            <input type="submit" name="reg_user" value="Regisztráció"/>
        </p>
        <p>
  		    Már regisztrált? <a href="http://localhost:8888/website/?p=login">Lépjen be!</a>
  	    </p>
  	</div>
</form>

  

<?php foreach($errors['username'] as $error) : ?>
	<p><?php echo $error; ?></p>
<?php endforeach; ?>


<?php include_once "_footer.php"; ?>