

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
            <!-- ===== CSS ===== -->
            <link rel="stylesheet" href="assets/css/login.css">
            <link rel="stylesheet" href="assets/css/estilos.css">
            <link rel="stylesheet" href="assets/css/botones.css">

<body style="background-color:#E7EFFD">
</body>
        
</head>
<body>


    <center><br><br><br><br>
    <h2>Iniciar sesión</h2>
        <h3>Sistema Automotriz Leo Jr</h3>
        <form method="post" action="validar.php">

        <div  class="wrapper" style="background-color:#E7EFFD">
                    <div class="input-data">
                        <input type="text" name="txtusuario" required style="background-color:#E7EFFD">
                        <div class="underline"></div>
                        <label>USUARIO</label>
                    </div>
                    </div>


                    <div class="wrapper" style="background-color:#E7EFFD">
                    <div class="input-data">
                        <input type="password" name="txtpassword" required style="background-color:#E7EFFD">
                        <div class="underline"></div>
                        <label>CONTRASEÑA</label>
                    </div>
                    </div>
                    <br>
                    <input type="submit" name="Ingresar" id="boton2" style='width:341px; height:52px'>   
                    
                    <br><br>
    </form>
 
    </center>
            <!-- ===== IONICONS ===== -->
            <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
</body>
</html>