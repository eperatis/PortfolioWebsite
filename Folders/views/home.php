<?php include_once "_header.php"; ?>
<div>
    <h1>AirFlys Admin oldala</h1>
    <p>
    Utasok felvétele, moódosítása és törlése lehetséges.<br>
    Kérjül jelentkezzen be a jobb felnti Login menüpont használatával!
    </p>
    <p>Ha nincs fiókja kattintson a lenti regisztráció gombra.</p>
</div>
<form action="<?php echo url('regist'); ?>" method="POST">
    <input type="submit" value="Regisztráció" />
</form>
<?php include_once "_footer.php"; ?>