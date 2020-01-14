<?php include('server.php') ?>
<?php include_once "_header.php"; ?>
<form method="post" action="views/regist.php">
  	<div>
  	  <label>Felhasználónév</label><br>
  	  <input type="text" name="username" value="<?php echo $username; ?>"><br>
  	  <label>Email</label><br>
  	  <input type="text" name="email" value="<?php echo $email; ?>"><br>
  	  <label>Jelszó</label><br>
  	  <input type="password" name="password_1"><br>
  	  <label>Jelszó mégegyszer</label><br>
        <input type="password" name="password_2" id="passwd"><br>
        <p>
            <input type="submit" name="reg_user" value="Regisztráció"/>
        </p>
        <p>
  		    Már regisztrált? <a href="http://localhost:8888/website/?p=login">Lépjen be!</a>
  	    </p>
  	</div>
  </form>
<?php include_once "_footer.php"; ?>