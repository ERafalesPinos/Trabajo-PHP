<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido admin</h1>
    <h3>Todas las reservas realizadas</h3>
<?php
    $servername = "localhost";
    $database = "calbello";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset ($_SESSION['error']);
    } else {

    


    $sql = "SELECT * FROM reservas";
    $exe = $conn->query($sql);

    while ($row = $exe->fetch_assoc())  {
        echo "<table>";
            echo "<tr>";
                echo "<td>";
                    echo "Reserva Nº:" ;
                    echo $row['ID'];
                    echo " _-_-> ";
                    echo "Con el trabajador: ";
                    echo $row['IDTRABAJADOR'];
                    echo " _-_-> ";
                    echo "Por el cliente:";
                    echo $row['IDCLIENTE'];
                    echo " _-_->  ";
                    echo "de: ";
                    echo $row['HORA'];
                    echo " _-_-> ";
                    echo "El dia:";
                    echo $row['DIA'];
                    echo " _-_-> ";
                    $timecheck = substr($row['HORA'],6,11);
                        if ($row['DIA'] <= date("Y-m-d") || ( $row['DIA'] == date("Y-m-d") && $timecheck > date("H:i"))){
                                echo "Estado: Caducada";
                        } else {
                            echo "Estado: Pendiente";
                        }
                    echo '<a href="secretconf.php?IDR='.$row['ID'].'"> -·Eliminar·-</a>';
                echo "</td>";
            echo "</tr>";
        echo "</table>";
    }

    echo "<hr>";
    }
?>

    <h3>Citas por empleados:</h3>

    <?php
        
        $sqlT = "SELECT * FROM trabajadores where ESTADO = 'ACTIVO';";
        $exeT = $conn->query($sqlT);
        while ($row = $exeT->fetch_assoc()) {
            echo '<form action="" method="POST">';
                echo '<select name="worker" id="id">';
                    echo '<option value=';echo$row['ID'];echo ">"; echo $row['NOMBRE'];
                echo '</select>';
            echo '<input type="submit" value="Ordenar">';
        echo '</form>';
        echo "<br>";
        }

    ?>

<?php

    if(isset($_REQUEST['worker'])){
        $worker = $_REQUEST['worker'];

        $sql2 = "SELECT * FROM reservas where IDTRABAJADOR like '$worker'";
        $exe2 = $conn->query($sql2);

        if (mysqli_num_rows($exe2)>0) {
                while ($row2 = $exe2->fetch_assoc()) {
                    echo "<table>";
                        echo "<tr>";
                            echo "<td>";
                                echo "Reserva Nº:" ;
                                echo $row2['ID'];
                                echo " _-_-> ";
                                echo "Con el cliente:";
                                echo $row2['IDCLIENTE'];
                                echo " _-_->  ";
                                echo "A las: ";
                                echo $row2['HORA'];
                                echo " _-_-> ";
                                echo "El dia: ";
                                echo $row2['DIA'];
                            echo "</td>";
                        echo "</tr>";
                    echo "</table>";    }
            }   else {
                    echo "Este empleado no tiene ninguna reserva.";
            }
        echo "<br>";
    } else {
        echo "<p>No hay worker</p>";
    }
    echo "<hr>";
?>

    <h3>Trabajadores (MAX 9)</h3>
    
<?php

    $sql3 = "SELECT * FROM trabajadores";
    $exe3 = $conn->query($sql3);

    while ($row3 = $exe3->fetch_assoc()) {
        echo "<table>";
            echo "<tr>";
                echo "<td>";
                    echo "Trabajador:";
                    echo $row3['ID'];
                    echo " _-_-> ";
                    echo $row3['NOMBRE'];
                    echo "_-_> ";
                    echo $row3['ESTADO'];
                    echo " ";
                    echo '<a href="secretconf.php?ID='.$row3['ID'].'Modificar">Modificar</a>';
                    echo " ";
                    echo '<a href="secretconf.php?ID='.$row3['ID'].'">Eliminar</a>';
                    echo " ";
                    echo '<a href="secretadd.php">Añadir</a>';
                echo "</td>";
            echo "</tr>";
        echo "</table>";
    }
?>
    <hr>
    <h3>Usuarios</h3>

<?php

    $sqlU = "SELECT * FROM `clientes` where id not in (1); "; 
    $exeU = $conn->query($sqlU);

    while ($rowU = $exeU->fetch_assoc()) {
        echo "<table>";
            echo "<tr>";
                echo "<td>";
                    echo "ID usuario:->"; echo $rowU['ID']; echo "<- ";
                    echo "Nombre de cuenta de usuario:->";echo $rowU['NOMBRE']; echo "<- ";
                    echo "Email del usuario:->";echo $rowU['EMAIL']; echo "<- ";
                    echo '<a href="secretUSU.php?IDU='.$rowU['ID'].'">Gestionar</a>';
                echo "</td>";
            echo "</tr>";
        echo "</table>";
    }


?>

<?php
    echo "<hr>";
    echo "<a href='logout.php'>Log out</a>";
    echo "<hr>";
?>
</body>
</html>