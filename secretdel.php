<?php

session_start();

if (isset($_REQUEST['RES']) && $_REQUEST['RES'] == "yes" ) {
    $id = $_SESSION['ID'];
    $servername = "localhost";
    $database = "calbello";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $database);
    $INT4 = $_REQUEST['state'];

    $sql = "UPDATE trabajadores
                    set ESTADO = 'INACTIVO'
                             where ID like $id";
    $conn->query($sql);
    header ("location: secret.php");               
} else {
    header ("location: secret.php");   
}
?>
