<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

    <!-- PARTE DE LA MODIFICACIÓN -->
    
    <!-- PARTE DE LA MODIFICACIÓN -->
    
<?php
    session_start();
    if (isset ($_REQUEST['ID'])) {
    $action = substr($_REQUEST['ID'],1,10);
    $identificador = substr($_REQUEST['ID'],0,1);
    
    if ($action == "Modificar") {
    
    ?>

<h2>¿Que campos quieres modificar? </h2>

<h3>!Atencion, si no añades ningún valor en algún campo no se modificarán los demás campos¡</h3>

<form action="secretmod.php" method="POST">
    <br>
    <label for="Username">Nombre del usuario</label>
    <input type="text" name="USER" id="Username"/>
    <br><br>
    <label for="Passwd">Contraseña del usuario</label>
    <input type="text" name="Password" id="Passwd"/>
    <br><br>    
    <input type="submit" value="Guardar cambios"/>
</form>
    <br>
    <button>
        <a href="secret.php">Volver a la pagina principal</a>
    </button>
    
    
    <!-- PARTE DEL DELETE -->

    <!-- PARTE DEL DELETE -->

<?php
     
    $_SESSION['identificador'] = $identificador;
    
    } else {
        $_SESSION['ID'] = $_REQUEST['ID'];
        echo "¿Está seguro de eliminar al ususario ";
        echo $_REQUEST['ID'];
        echo " ?";
        echo "<br>";
        echo "<br>";
        echo "<button>";
        echo "<a href='secretdel.php?RES=yes'>Sí</a>";
        echo "</button>";
        echo "           ";
        echo "<button>";
        echo "<a href='secretdel.php?RES=no'>No</a>";
        echo "</button>";
    }
} else {
    //header("location:secret.php");
}


?>  
    <!-- PARTE DE LA DELETE RESERVAS -->

    <!-- PARTE DE LA DELETE RESERVAS -->

<?php

        if (isset($_REQUEST['IDR'])) {
            $IDR=$_REQUEST['IDR'];
            $servername = "localhost";
            $database = "calbello";
            $username = "root";
            $password = "";
            $conn = mysqli_connect($servername, $username, $password, $database);
            
            $sqlR = "DELETE FROM reservas WHERE ID LIKE $IDR;"; 
            $exe = $conn->query($sqlR);
            header ("location: secret.php");
        } else {
            $error = "ha ocurrido un problema, ponte en contacto con el administrador de la pagina web";
            $_SESSION['error'] = $error;
            header ("location: secret.php");
        }
?>
