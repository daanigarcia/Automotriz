<?php
include ("conexion.php");

if(isset($_GET['IdCliente'])){
    $IdCliente=(int) $_GET['IdCliente'];

    $buscar_id=$con->prepare('SELECT * FROM cliente WHERE IdCliente=:IdCliente LIMIT 1');
    $buscar_id->execute(array(
        ':IdCliente'=>$IdCliente
    ));
    $resultado=$buscar_id->fetch();
}else{
    header('Location: clientes_buscar.php');
}

    if(isset($_POST['Guardar'])){
        $IdCliente = $_GET['IdCliente'];
        $Nombre = $_POST['Nombre'];
        $Direccion = $_POST ['Direccion'];
        $RFC = $_POST ['RFC'];
        $Telefono = $_POST ['Telefono'];
        $Celular = $_POST ['Celular'];
        $Correo = $_POST ['Correo'];
    
        if(!empty($Nombre) && !empty($Direccion) && !empty($RFC) && !empty($Telefono) && !empty($Celular) && !empty($Correo)){
            if(!filter_var($Correo,FILTER_VALIDATE_EMAIL)){
                echo "<script> alert('Correo no válido');</script>";
            } else {
                $consulta_insert=$con->prepare('UPDATE Cliente SET
                Nombre=:Nombre, 
                Direccion=:Direccion, 
                RFC=:RFC, 
                Telefono=:Telefono, 
                Celular=:Celular, 
                Correo=:Correo
                WHERE IdCliente=:IdCliente;'
                );
                $consulta_insert ->execute(array(
                ':Nombre' =>$Nombre,
                ':Direccion' =>$Direccion,
                ':RFC' =>$RFC,
                ':Telefono' =>$Telefono,
                ':Celular' =>$Celular,
                ':Correo' =>$Correo,
                ':IdCliente' =>$IdCliente,
            ));
            header('Location:clientes_buscar.php');
            }
        } else{
            echo "<script> alert('Los campos estan vacios');</script>";
        }
    
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
        <?php
            include "leftsidebar.php";
            leftsidebar();
        ?>

        <span class="nav__name"><h1>CLIENTES / EDITAR</h1></span>

        <br><br>
      <form action="" method="post">
      <table>
      <!-- Fila 1  -->
      <tr>
            <td>
                <div class="wrapper"> <div class="input-data">
                        <input type="text" name="Nombre" value="<?php if($resultado) echo $resultado['Nombre']; ?>" Class="input_text" >
                        <div class="underline"></div>
                        <label>NOMBRE</label> 
                </div></div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Telefono" value="<?php if($resultado) echo $resultado['Telefono']; ?>" Class="input_text" >
                        <div class="underline"></div>
                        <label>TELEFONO</label>
                    </div>
                </div>
            </td>
        </tr>
        <!-- Fila 2  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Direccion" value="<?php if($resultado) echo $resultado['Direccion']; ?>" Class="input_text" >
                        <div class="underline"></div>
                        <label>DIRECCION</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Celular" value="<?php if($resultado) echo $resultado['Celular']; ?>" Class="input_text" >
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
                    <input type="text" name="RFC" value="<?php if($resultado) echo $resultado['RFC']; ?>" Class="input_text" >
                        <div class="underline"></div>
                        <label>RFC</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Correo" value="<?php if($resultado) echo $resultado['Correo']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>CORREO ELECTRONICO</label>
                    </div>
                </div>
            </td>
        </tr>
      </table>
      <br><br><br><br>
      </table>


      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀  <a href="clientes_editar.php">   <img src="assets/img/cancelar.png" alt=""> </a>
            <input type="submit"  value="" name="Guardar" id="boton4" style='width:205px; height:52px'> 
      
   

        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/input.js"></script>
    </body>
</html>