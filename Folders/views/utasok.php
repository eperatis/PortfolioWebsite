<?php include_once "_header.php"; ?>
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
      header('location: http://localhost:8888/website/?p=login');
      header("refresh:0.015;url=http://localhost:8888/website/?p=login");
    $message = "Be kell jelentkeznie!";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
?>
<div>
    <h1>Jelenlegi utasok</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Név</th>
            <th>Ülés</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "root", "root", "website");
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT id, uname, ules FROM utasok;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["uname"] . "</td><td>"
        . $row["ules"]. "</td></tr>";
        }
        echo "</table>";
        } else { echo "0 results"; }
        $conn->close();
        ?>
    </table>
</div>

<div>
    <h1>Utasok hozzáadása</h1>
    <form method="post" action="add.php">
        Név : <input type="text" name="uname"><br><br>
        Ülés : <input type="text" name="ules"><br><br>
        <input type="submit" value="Adatok elküldése">
    </form>
</div>

<div>
    <h1>Módosítás</h1>
    <form method="post" action="update.php">
        ID : <input type="text" name="uid"><br><br>
        Név : <input type="text" name="uname"><br><br>
        Ülés : <input type="text" name="ules"><br><br>
        <input type="submit" value="Adatok frissítése">
    </form>
</div>

<div>
<h1>Törlés</h1>
    <form method="post" action="delete.php">
        ID : <input type="text" name="uid"><br><br>
        <input type="submit" value="Törlés">
    </form>
</div>

<?php include_once "_footer.php"; ?>