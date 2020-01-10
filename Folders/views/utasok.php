<?php include_once "_header.php"; ?>
<h1>Utasok</h1>
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
    <h2>Utasok hozzáadása</h2>
    <form method="post" action="connect.php">
        Név : <input type="text" name="uname"><br><br>
        Ülés : <input type="text" name="ules"><br><br>
        <input type="submit" value="Adatok elküldése">
    </form>
</div>

<div>
    <h2>Módosítás</h2>
    <p>
        Add meg a módosítandó ID-át, majd add meg az új nevet és/vagy ülés számát, majd kattintson az adatok frissítésére.<br>
        Ha törölni szeretné az utast akkor csak adja meg az ID-t és kattintson a törlésre.
    </p>
    <form method="post" action="update.php">
        ID : <input type="text" name="uid"><br><br>
        Név : <input type="text" name="uname"><br><br>
        Ülés : <input type="text" name="ules"><br><br>
        <input type="submit" value="Adatok frissítése">
    </form>
</div>

<?php include_once "_footer.php"; ?>