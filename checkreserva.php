<?php


session_start();

                $clie = $_SESSION['ID'];
                $worker = $_REQUEST['worker'];
                $date = $_REQUEST['date'];
                $time = $_REQUEST['hora']; 
                $servername = "localhost";
                $database = "calbello";
                $username = "root";
                $password = "";

                $conn = mysqli_connect($servername, $username, $password, $database);
            
                if (isset($_GET['ID'])) {
                    $delsql = "DELETE FROM reservas where ID='". $_GET['ID'] ."'";
                    $conn->query($delsql);
                    header ("location: personal.php");
                } else {
                // Compruebo que ese trabajador esta libre en esa fecha-hora
                    $check = "SELECT * FROM reservas WHERE IDTRABAJADOR='$worker' AND HORA='$time' AND DIA='$date'";
                    $result = $conn->query($check);
                    if(mysqli_num_rows($result)>0){
                        $error = "Buscate otra fecha";
                    }
                    
                // Comprobar que un cliente no reserva dos citas a la misma hora el mismo dia
                    $check = "SELECT * FROM reservas WHERE HORA='$time' AND DIA='$date' AND IDCLIENTE = '$clie'";
                    $result = $conn->query($check);
                    if(mysqli_num_rows($result)>0){
                        $error = "Ya tienes una reserva a esa hora y ese día";
                    }

                // Compruebo si hay errores
                if (isset($error)){
                    // hay errores
                    $_SESSION['$error']= $error;
                } else {
                    //me conecto y lo guardo
                    $sql2 = "INSERT INTO reservas (IDTRABAJADOR, IDCLIENTE, HORA, DIA) VALUES ('$worker','$clie','$time','$date');";
                    $execsql2 = $conn->query($sql2);

                }
                header ("location: reservas.php");
            }
        
?>