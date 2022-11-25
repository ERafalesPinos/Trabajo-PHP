<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<style>
html {
    font-family: cursive;
    background-color:  #d4e6f1 ;
}
a {
    color:#2e86c1   ;
    text-decoration:none;
}
button {
    background:white;
    color:#2e86c1   ;
    text-decoration:none;
    font-size:14px;
}
</style>
<body>
<?php
    session_start();
    $servername = "localhost";
    $database = "calbello";
    $username = "root";
    $password = "";

    $con = mysqli_connect($servername, $username, $password, $database);
?>    
    <h2>Estamos abiertos de lunes a Sabados</h2>

    <form action="checkreserva.php" method="POST">
        <label for="date">¿Que dia quieres realizar la reserva? </labeL>
        <input type="date" name="date" id="date" placeholder="MM/DD/YYYY" min="<?= date('Y-m-d'); ?>" max="" value="<?= date('Y-m-d'); ?>" />
            <br><br>
            <label for="hora">¿A qué hora?</label> 
        <select name="hora" id="hora">
            <option value="09:00-09:30">09:00 - 09:30</option>
            <option value="09:30-10:00">09:30 - 10:00</option>
            <option value="10:00-10:30">10:00 - 10:30</option>
            <option value="10:30-11:00">10:30 - 11:00</option>
            <option value="11:00-11:30">11:00 - 11:30</option>
            <option value="11:30-12:00">11:30 - 12:00</option>        
            <option value="12:00-12:30">12:00 - 12:30</option>
            <option value="12:30-13:00">12:30 - 13:00</option>
            <option value="13:00-13:30">13:00 - 13:30</option>
            <option value="13:30-14:00">13:30 - 14:00</option>
            <option value="14:00-14:30">14:00 - 14:30</option>        
            <option value="14:30-15:00">14:30 - 15:00</option>
            <option value="15:00-15:30">15:00 - 15:30</option>
            <option value="15:30-16:00">15:30 - 16:00</option>
            <option value="16:00-16:30">16:00 - 16:30</option>
            <option value="16:30-17:00">16:30 - 17:00</option> 
            <option value="17:00-17:30">17:00 - 17:30</option>        
            <option value="17:30-17:00">17:30 - 18:00</option>
            <option value="18:00-18:30">18:00 - 18:30</option>
            <option value="18:30-18:00">18:30 - 18:00</option>
            <option value="19:00-19:30">19:00 - 19:30</option>
            <option value="19:30-20:00">19:30 - 20:00</option>
        </select>
            <br><br>
        <label for ="worker">Por quien quieres ser atendid@?</lable>
        <select name="worker" id="worker">
            <?php
            $sql = "SELECT * FROM trabajadores where ESTADO = 'ACTIVO'";
            $exe = $con->query($sql);
            while ($row = $exe->fetch_assoc()) {
                echo '<option value=';
                echo $row['ID'];
                echo '>';
                echo $row['NOMBRE'];
                echo "</option>";
            }
            ?>
        </select>
        <br><br>
        <button tpye="submit">Realizar la reserva</button>           
        <br><br>
        <button>
            <a href="personal.php">Volver a la zona personal</a>
        </button>
    </form>


<?php
    if (isset($_SESSION['$error'])){
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo $_SESSION['$error'];
        unset($_SESSION['$error']);
        }
        else {
            echo "";
        }
?>


</body>
</html>


