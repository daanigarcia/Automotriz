<?php 

include ("conexion.php");

if (isset($_POST['Ingresar'])) {
    if (strlen($_POST['Nombre']) >= 1 && strlen($_POST['UserName']) >= 1 && strlen($_POST['Llave']) >= 1) {
	    $Nombre = $_POST['Nombre'];
	    $UserName = $_POST['UserName'];
        $Llave = $_POST['Llave'];
	    $consulta_insert=$con->prepare ('INSERT INTO login(Nombre, UserName, Llave) VALUES
         (:Nombre,:UserName,:Llave)');
        $consulta_insert ->execute(array(
            ':Nombre'=>$Nombre,
            ':UserName'=>$UserName,
            ':Llave'=>$Llave
        ));
        header('Location:login.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
            <!-- ===== CSS ===== -->
            <link rel="stylesheet" href="assets/css/login.css">

        
</head>
<body>
    <center><br><br><br><br>
    <h2>Crear cuenta</h2>
        <h3>Sistema Automotriz Leo Jr.</h3>

        <form method="post">
        <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Nombre" Class="input_text" required>
                        <div class="underline"></div>
                        <label>NOMBRE</label>
                    </div>
                    </div>


                    <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="UserName" Class="input_text" required>
                        <div class="underline"></div>
                        <label>USUARIO</label>
                    </div>
                    </div>
                    <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Llave" Class="input_text" required>
                        <div class="underline"></div>
                        <label>CONTRASEÑA</label>
                    </div>
                    </div>
                    <input type="submit"  value="" name="Ingresar" id="boton1" style='width:341px; height:52px'>       
                   
       
        </form>
    </center>


            <!-- ===== IONICONS ===== -->
            <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
</body>
</html>