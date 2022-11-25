<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal</title>
</head>
<style>
html {
    background-color:  #d4e6f1 ;
    font-family: cursive;
}

#div1 {
    background-color: #2e86c1 ;
    float:left;
    width: 49%;
    text-align: center;
    color:white;
    padding:5px;
}
#div2 {
    float: right;
    background-color: #2e86c1 ;
    width: 49%;
    padding:5px;
    color:white;
}
a {
    color:#2e86c1   ;
    text-decoration:none;
}
button {
    background:white;
    box-shadow:3px 3px 5px ivory;
}
</style>
<body>

<?php
    session_start();

    $date =  getdate();
    $ID = $_SESSION['ID'];

    $servername = "localhost";
    $database = "calbello";
    $username = "root";
    $password = "";

    $con = mysqli_connect($servername, $username, $password, $database);
?>

    <div id="div1">
        <p>Bienvenido a tu area personal <?php echo $_SESSION['USER'];?></p>
        <p>Aqui podras controlar tus reservas</p>
        <p>La fecha de hoy es: <?php echo $date['weekday'] ;echo "-"; echo $date['mday'];echo "-"; echo $date['month'] ;?></p>
        <button>
            <a href="reservas.php">Realizar una reserva</a>
        </button>
        <br><br>
        <button>
            <a href='logout.php'>Log out</a>
        </button>
    </div>
    <div id ="div2">
        <p>Estado de tus reservas</p>
    
    
<?php 
    $sql = "SELECT * FROM reservas where IDCLIENTE like '{$ID}';";
    $data = $con->query($sql);

    while ($row = $data->fetch_assoc()) {
        echo "<table>";
            echo "<tr>";
                echo "<td>";
                  echo "A fecha de: "; echo $row['DIA'];
                  echo " a las "; echo $row['HORA'];
                  echo " ";
                echo '<button>';
                    echo '<a href="checkreserva.php?ID='.$row['ID'].'">-·Eliminar·-</a>';
                echo "</button>";
                echo "</td>";
            echo "</tr>";
    }

?>
    </div>

    </body>
</html>
