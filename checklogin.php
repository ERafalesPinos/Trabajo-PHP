<?php
session_start();    
                $paswd = $_POST['Contraseña'];
                $mail = $_POST['Mail']; 
                $servername = "localhost";
                $database = "calbello";
                $username = "root";
                $password = "";
                $conn = mysqli_connect($servername, $username, $password, $database);

                $sql = "SELECT * FROM `clientes`
                             where contraseña like '{$paswd}'
                             and EMAIL like '{$mail}';";

                $compara = $conn->query($sql);

 
                       if (mysqli_num_rows($compara) !=0) {
                            while($row = $compara->fetch_assoc()) {
                                
                                if ($row['ID'] == 1) {
                                    header("location: secret.php");
                                } else {
                                $_SESSION['ID'] = $row['ID'];
                                $_SESSION['USER'] = $row['NOMBRE'];
                                $_SESSION['PASS'] = $row['CONTRASEÑA'];
                                header("location: personal.php");
                                }          
                        } }
                           else {
                                $_SESSION['error'] = "Contraseña erronea";
                                header("location: login.php");
                        }
                
/*
                //comparar desde el select mail
                $sql = "SELECT * FROM clientes where EMAIL like '{$mail}';";
                $sql2 = "SELECT CONTRASEÑA FROM clientes where EMAIL like '{$mail}';";
                $compara2 = $conn->query($sql2);
                $compara = $conn->query($sql);              
*/
/*    
                if ($mail == $compara) {
                    echo "Es Igual";
                }
                else {
                    echo "BOOM";
                }*/



?>
