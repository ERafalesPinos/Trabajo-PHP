<?php
    
    session_start();
    if ((isset ($_REQUEST['Nombre'])) and $_REQUEST['Nombre'] != "") {
        if ((isset ($_REQUEST['Contraseña'])) and $_REQUEST['Contraseña'] != "") {
            if ((isset ($_REQUEST['Mail'])) and $_REQUEST['Mail'] != "") {
                
                $name = $_REQUEST['Nombre'];
                $paswd = $_REQUEST['Contraseña'];
                $mail = $_REQUEST['Mail']; 
                $servername = "localhost";
                $database = "calbello";
                $username = "root";
                $password = "";

                //SQL CONNECTION

                $conn = mysqli_connect($servername, $username, $password, $database);
                
                //CHECK NO DUPLICATED USERS

                $sqlcheck = "SELECT EMAIL FROM clientes where EMAIL like '{$mail}';";
                $execheck = $conn->query($sqlcheck);
                    
                while($row = $execheck->fetch_assoc()) {
                        $check = $row['EMAIL'];
                    }
                    if (isset ($check)) {
                        $error = "Ya existe un usuario con ese correo";
                        $INTERROGACION = "NO";
                    } else {
                        $sql = "INSERT INTO clientes (NOMBRE,CONTRASEÑA,EMAIL) VALUES ('$name','$paswd','$mail');";
                        $exe = $conn->query($sql);
                        $INTERROGACION = "GOD";
                    }

                //SEND USER TO PERSONAL
                $_SESSION['INTERROGACION'] = $INTERROGACION;
                $_SESSION['USER'] = $name;
                $_SESSION['PASS'] = $paswd;
                header("location: index.php");
            }
            else {
                $error = "Hemos encontrado un error haciendo referencia al campo del Email introducido, Compruebe que es válido o que ha introducido.";
            }
        }
        else {
            $error = "Hemos encontrado un error haciendo referencia al campo de la contraseña, debe añadir una";
        }
    }
    else {
        $error = "Hemos encontrado un error haciendo referencia al campo del nombre, asegurese de introducir un nombre";
    }

    if (isset ($error)) {
        $_SESSION['error'] = $error;
        $_SESSION['Nombre'] = $_REQUEST['Nombre'];
        $_SESSION['Contraseña'] = $_REQUEST['Contraseña'];
        $_SESSION['Mail'] = $_REQUEST['Mail'];
        header ("location: index.php");
    }
?>
