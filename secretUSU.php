<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$servername = "localhost";
$database = "calbello";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password, $database);
session_start();
$IDU = $_REQUEST['IDU'];
?>



    <h3>Introduzca la nueva contraseña<h3>
        <form action="" method="post">
            <label for="PASS">Nueva contraseña: 
                <input type="password" name="PASS" id="PASS"/>
            </label>
            <br><br>
                <input type="submit" value="Enviar"/>
        </form>
    <br>
    <button>
        <a href="secret.php">Volver a la pagina principal</a>
    </button>
<?php

    if (isset($_REQUEST['PASS']) && $_REQUEST['PASS'] != "") {
        $sqlP = "SELECT CONTRASEÑA FROM clientes where ID = $IDU";
        $exeP = $conn->query($sqlP);

        while ($rowP = $exeP->fetch_assoc()) {
            $USUOLDPASS = $rowP['CONTRASEÑA'];
        }

        if ($USUOLDPASS == $_REQUEST['PASS']) {
            echo "No puedes cambiar la contraseña a la misma de antes";
        }  else {
            $NEWPASS = $_REQUEST['PASS'];
            $sqlPY = "UPDATE clientes 
                            SET CONTRASEÑA = '$NEWPASS' 
                                where ID = $IDU ;";
            $exePY = $conn->query($sqlPY);
            
            header("location: secret.php");
        }
    }
     else {
        echo "";
    }

?>


</body>
</html>