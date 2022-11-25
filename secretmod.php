<?php
    session_start();
    echo $_SESSION['identificador'];

    //FUNCIONES           
                function FUNCIONAMIENTO2() {
        //FUNCION CON LOS 2 VALORES A EDITAR
                    
                    $servername = "localhost";
                    $database = "calbello";
                    $username = "root";
                    $password = "";
                    $conn = mysqli_connect($servername, $username, $password, $database);
                    $INT2 = $_REQUEST['USER'];
                    $INT3 = $_REQUEST['Password'];
                    $VAL = $_SESSION['identificador'];

                    $sql = "UPDATE trabajadores set NOMBRE = '$INT2',
                                                    CONTRASEÑA = '$INT3'
                                                        where ID = $VAL;";
                    $conn->query($sql);
                    header ("location: secret.php");
                }
                
                function FUNCIONAMIENTO1() {
        //FUNCION CON LOS 1 VALORES A EDITAR Y SUS POSIBLES COMBINACIONES
                    $servername = "localhost";
                    $database = "calbello";
                    $username = "root";
                    $password = "";
                    $conn = mysqli_connect($servername, $username, $password, $database);
                    $INT2 = $_REQUEST['USER'];
                    $INT3 = $_REQUEST['Password'];
                    $VAL = $_SESSION['identificador'];

                    if ($INT2 != "") {

                        $sql2 = "UPDATE trabajadores set NOMBRE = '$INT2'
                                                            where ID = '$VAL';";
                        $conn->query($sql2);
                        header ("location: secret.php");
                    } elseif ($INT3 != "") {
                        
                        $sql2 = "UPDATE trabajadores set CONTRASEÑA = '$INT3'
                                                            where ID = '$VAL';";
                        $conn->query($sql2);
                        header ("location: secret.php");
                    } 
                }
//SOMETHING
    
    if ($_REQUEST['USER'] != "" && $_REQUEST['Password'] != "") {
        FUNCIONAMIENTO2();
    }
 
    elseif ($_REQUEST['USER'] != "" || $_REQUEST['Password'] != "") {
        FUNCIONAMIENTO1();
    }
    else {
        echo "No has introducido nada";
    }

        
    ?>