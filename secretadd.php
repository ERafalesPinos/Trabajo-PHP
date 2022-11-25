<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="POST">
            <label for ="name">Introduce el nombre del trabajador: 
                <input type ="text" id="name" name="name">
            </label>
                <br><br>
            <label for ="pass">Introduce la contraseña de este: 
                <input type ="password" id="pass" name="pass">
            </label>
                <br><br>
            <input type="submit" value="Añadir">
        </form>

</body>
</html>


<?php

if (isset($_REQUEST['name']) && isset($_REQUEST['pass']) && 
        $_REQUEST['name'] != "" && $_REQUEST['pass'] != "") {
    $servername = "localhost";
    $database = "calbello";
    $username = "root";
    $password = "";
    $name=$_REQUEST['name'];
    $pas= $_REQUEST['pass'];
    $conn = mysqli_connect($servername, $username, $password, $database);
    $INT4 = "ACTIVO";

    $sqlCT = "SELECT * FROM trabajadores 
                            WHERE NOMBRE = '$name'
                            AND CONTRASEÑA = '$pas'";
    $exeCT = $conn->query($sqlCT);

    if (mysqli_num_rows($exeCT) != 0) {
        $sqlCTA = "UPDATE trabajadores
                            SET ESTADO = '$INT4'
                            WHERE NOMBRE = '$name'
                            AND   CONTRASEÑA = '$pas'";
        $conn->query($sqlCTA);   
        header("location:secret.php");         
    }   else {
        
        $sql = "INSERT INTO trabajadores (NOMBRE, CONTRASEÑA, ESTADO) VALUES ('$name', '$pas', '$INT4');";
        $conn->query($sql);
        header("location:secret.php");    
    }
}
else {
    echo "<br>";
    echo "Datos no válidos";
}

?>