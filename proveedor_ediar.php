<?php
include ("conexion.php");

if(isset($_GET['IdProovedor'])){
    $IdProovedor=(int) $_GET['IdProovedor'];

    $buscar_id=$con->prepare('SELECT * FROM proovedor WHERE IdProovedor=:IdProovedor LIMIT 1');
    $buscar_id->execute(array(
        ':IdProovedor'=>$IdProovedor
    ));
    $resultado=$buscar_id->fetch();
}else{
    header('Location: proveedor_buscar.php');
}

    if(isset($_POST['Guardar'])){
        $NombreEmpresa = $_POST['NombreEmpresa'];
        $Direccion = $_POST ['Direccion'];
        $Telefono = $_POST ['Telefono'];
        $Celular = $_POST ['Celular'];
        $Email = $_POST ['Email'];
        $PersonaContacto = $_POST ['PersonaContacto'];


                $consulta_insert=$con->prepare('UPDATE proovedor SET
                NombreEmpresa=:NombreEmpresa,
				Direccion=:Direccion, 
                Telefono=:Telefono, 
                Celular=:Celular, 
                Email=:Email, 
                PersonaContacto=:PersonaContacto
                WHERE IdProovedor=:IdProovedor;'
                );
                $consulta_insert ->execute(array(
                ':NombreEmpresa' =>$NombreEmpresa,
                ':Direccion' =>$Direccion,
                ':Telefono' =>$Telefono,
                ':Celular' =>$Celular,
                ':Email' =>$Email,
                ':PersonaContacto' =>$PersonaContacto,
                ':IdProovedor' =>$IdProovedor,
            ));
            header('Location:proveedor_ediar.php');
    
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/botones.css">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <title>INICIO</title>
    </head>
    <body id="body-pd">
    <?php
            include "leftsidebar.php";
            leftsidebar();
        ?>





        <ion-icon name="home-outline" class="nav__icon"></ion-icon>
        <span class="nav__name"><h1>PROVEEDOR / EDITAR</h1></span>
      
        
        <br><br>
      <form action="" method="post">
      <table>
      <!-- Fila 1  -->
        <tr>
            <td>
                <div class="wrapper"> <div class="input-data">
                        <input type="text" name="NombreEmpresa" value="<?php if($resultado) echo $resultado['NombreEmpresa']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>NOMBRE DE LA EMPRESA</label> 
                </div></div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Telefono" value="<?php if($resultado) echo $resultado['Telefono']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>TELÉFONO</label>
                    </div>
                </div>
            </td>
        </tr>
        <!-- Fila 2  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Direccion" value="<?php if($resultado) echo $resultado['Direccion']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>DIRECCIÓN</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Celular" value="<?php if($resultado) echo $resultado['Celular']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>CELULAR</label>
                    </div>
                </div>
            </td>
        </tr>
        <!-- Fila 3  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="PersonaContacto" value="<?php if($resultado) echo $resultado['PersonaContacto']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>PERSONA DE CONTACTO</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Email" value="<?php if($resultado) echo $resultado['Email']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>CORREO ELECTRÓNICO</label>
                    </div>
                </div>
            </td>
        </tr>
      </table>
      <br><br><br><br>
      

      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀   <a href="proveedor_ediar.php">   <img src="assets/img/cancelar.png" alt=""> </a>
            <input type="submit"  value="" name="Guardar" id="boton4" style='width:205px; height:52px'> 
      



        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/input.js"></script>
    </body>
</html>
