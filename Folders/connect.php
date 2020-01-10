<?php
$uname = filter_input(INPUT_POST, 'uname');
$ules = filter_input(INPUT_POST, 'ules');
if (!empty($uname)){
if (!empty($ules)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "website";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO utasok (uname, ules)
values ('$uname','$ules')";
if ($conn->query($sql)){
echo "New record is inserted sucessfully";
header("Location: http://localhost:8888/website/?p=utasok");
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "Ülés nem lehet üres.";
die();
}
}
else{
echo "Név nem lehet üres.";
die();
}
?>