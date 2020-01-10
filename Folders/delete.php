<?php
$uid = filter_input(INPUT_POST, 'uid');
if (!empty($uid)){
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
        $sql = "DELETE FROM utasok
        WHERE id=$uid";
        if ($conn->query($sql)){
            echo "Record is updated sucessfully";
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
    echo "ID nem lehet üres.";
    die();
}
?>