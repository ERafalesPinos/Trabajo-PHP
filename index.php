<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Calbello</title>

<style>
html {
    background-color: black;
}
body{
    height: auto;
    width: auto;
    background-color: #CCEAF4;
}
p a label h3 {
    font-family:Papyrus, Herculanum, Party LET, Curlz MT, Harrington, fantasy;
}
#header {
    text-align: center;
    height:50px;
    background-color: #276e90;

    border-bottom: 1px solid black;
}
#header a {
    padding-right: 15px;
    padding-left: 15px;
    color: white; 

}
#bodytop {
    position: relative;
    height:auto;
    display:flex;
    text-align: center;
    color:white;
}
#Trabajador {
    width: 133%;
    height: 100%;
    margin: 5%;
    background-color: #A9A9A9;
    color: #232323;
}
#T {
    width: 100%;
    height: 70%;
    padding: 15%;
    border: 2px solid black;
    box-shadow: 5px 5px 10px black;
}
#T button {
    position: inherit;
    margin-top: 8%;
}
#bodymain {
    text-align: center;
    margin:50px;
    height:auto;
    color: #232323;
}
#bodymain2 {
    padding: 5px;
}
#PIE {
    background: black;
    text-align:center;
    color: aliceblue;
    
    }
</style>
</head>
<body>
    <?php
    session_start();
    ?>
    <header>
        <div id="header">
            <a href="login.php">Sign in</a>
            <a href="#">Contactanos</a>
            <img src="IMAGES/logo.png" width="97" id="logo">
            <a href="#">Horarios</a>
            <a href="#">Sobre nosotros</a>
        </div>
    </header>
        <div id="bodytop">
            <div id="Trabajador">
                <div id="T">
                    <p>Nombre trabajador random 1</p>
                    <img src="IMAGES/empleado.jpg" width="150px">
                    <p>Lorem ipsum Lorem ipsum</p>
                    <button type="button">Reserva ya!</button>
                </div>
            </div>
            <div id="Trabajador">
                <div id="T">
                    <p>Nombre trabajador random 2</p>
                    <img src="IMAGES/empleado.jpg" width="150px">
                    <p>Lorem ipsum Lorem ipsum</p>
                    <button type="button">Reserva ya!</button>
                </div>
            </div>
            <div id="Trabajador">
                <div id="T">
                    <p>Nombre trabajador random 3</p>
                    <img src="IMAGES/empleado.jpg" width="150px">
                    <p>Lorem ipsum Lorem ipsum</p>
                    <button type="button">Reserva ya!</button>
                </div>
            </div>
        </div>
        <div id="bodymain">
            <h3>¿Eres nuevo? Entonces registrate ahora mismo</h3>
            <form action="check.php" method="post">
                <div class="bodymain2">
                    <label for="Nombre" class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control" name="Nombre" id="Nombre" >
                    <label for="Contraseña" class="form-label">Password</label>
                    <input type="password" class="form-control" name="Contraseña" id="Contraseña">
                    <label for="Mail" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="Mail" id="Mail" >
                </div>
                <?php
                    if (isset ($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset ($_SESSION['error']);
                    }
                    if (isset($_SESSION['INTERROGACION']) && ($_SESSION['INTERROGACION'] == "GOD")) {
                        echo '<script>alert("Debes iniciar sesión con tu usuario para poder gestionar tus citas")</script>';
                        unset ($_SESSION['INTERROGACION']);
                    }  else {
                        echo "";
                    }
                ?>
                <div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <footer>
            <div id="PIE">
                <p>Lorem ipsum Lorem ipsum</p>
                <p>Lorem ipsum Lorem ipsum</p>
                <p>Lorem ipsum Lorem ipsum</p>
            </div>
        </footer>
</body>
</html>