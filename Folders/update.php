<?php
$uid = filter_input(INPUT_POST, 'uid');
$uname = filter_input(INPUT_POST, 'uname');
$ules = filter_input(INPUT_POST, 'ules');
if (!empty($uid)){
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
                $sql = "UPDATE utasok
                SET uname='$uname', ules='$ules'
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
            echo "Ülés nem lehet üres.";
            die();
        }
    }
    else{
        echo "Név nem lehet üres.";
        die();
    }
}
else{
    echo "ID nem lehet üres.";
    die();
}
?>