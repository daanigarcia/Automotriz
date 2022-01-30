<?php
include ("conexion.php");

if(isset($_GET['IdClienteVehiculo'])){
    $IdClienteVehiculo=(int) $_GET['IdClienteVehiculo'];

    $buscar_id=$con->prepare('SELECT * FROM vehiculo WHERE IdClienteVehiculo=:IdClienteVehiculo LIMIT 1');
    $buscar_id->execute(array(
        ':IdClienteVehiculo'=>$IdClienteVehiculo
    ));
    $resultado=$buscar_id->fetch();
}else{
    header('Location: vehiculo_buscar.php');
}

    if(isset($_POST['Guardar'])){
        $IdCliente = $_POST ['IdCliente'];
        $Serie = $_POST['Serie'];
        $Modelo = $_POST ['Modelo'];
        $Placa = $_POST ['Placa'];
        $Marca = $_POST ['Marca'];
        $Color = $_POST ['Color'];
        $Allo = $_POST ['Allo'];
        $KiloMetros = $_POST ['KiloMetros'];
        $Combustible = $_POST ['Combustible'];
        $Motor = $_POST ['Motor'];

                $consulta_insert=$con->prepare('UPDATE vehiculo SET
                IdCliente=:IdCliente,
				Serie=:Serie, 
                Modelo=:Modelo, 
                Placa=:Placa, 
                Marca=:Marca, 
                Color=:Color, 
                Allo=:Allo,
				KiloMetros=:KiloMetros,
				Combustible=:Combustible,
				Motor=:Motor
                WHERE IdClienteVehiculo=:IdClienteVehiculo;'
                );
                $consulta_insert ->execute(array(
                ':IdCliente' =>$IdCliente,
                ':Serie' =>$Serie,
                ':Modelo' =>$Modelo,
                ':Placa' =>$Placa,
                ':Marca' =>$Marca,
                ':Color' =>$Color,
                ':Allo' =>$Allo,
                ':KiloMetros' =>$KiloMetros,
                ':Combustible' =>$Combustible,
                ':Motor' =>$Motor,
                ':IdClienteVehiculo' =>$IdClienteVehiculo,
            ));
            header('Location:vehiculo_editar.php');
    
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

        <span class="nav__name"><h1>VEHÍCULO CLIENTE / EDITAR</h1></span>

        <br><br>
     <form action="" method="post">
      <table>
      <tr>
            <td>
            <div class="wrapper">
                    <div>
					<label class="imagetitle">CLIENTE</label><br>
                    <input readonly="readonly" type="text" name="IdCliente" value="<?php if($resultado) echo $resultado['IdCliente']; ?>" Class="input_text">
                    </div>
                </div>
            </td>
        </tr>
      <!-- Fila 1  -->
        <tr>
            <td>
                <div class="wrapper"> <div class="input-data">
                        <input type="text" name="Serie" value="<?php if($resultado) echo $resultado['Serie']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>SERIE</label> 
                </div></div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Modelo" value="<?php if($resultado) echo $resultado['Modelo']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>MODELO</label>
                    </div>
                </div>
            </td>
        </tr>
        <!-- Fila 2  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Placa" value="<?php if($resultado) echo $resultado['Placa']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>PLACA</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Marca" value="<?php if($resultado) echo $resultado['Marca']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>MARCA</label>
                    </div>
                </div>
            </td>
        </tr>
        <!-- Fila 3  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Allo" value="<?php if($resultado) echo $resultado['Allo']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>AÑO</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="KiloMetros" value="<?php if($resultado) echo $resultado['KiloMetros']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>KILÓMETROS</label>
                    </div>
                </div>
            </td>
        </tr>
        <!-- Fila 4  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Combustible" value="<?php if($resultado) echo $resultado['Combustible']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>COMBUSTIBLE</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Motor" value="<?php if($resultado) echo $resultado['Motor']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>MOTOR</label>
                    </div>
                </div>
            </td>
        </tr>
        <!-- Fila 5  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Color" value="<?php if($resultado) echo $resultado['Color']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>COLOR</label>
                    </div>
                </div>
            </td>
        </tr>
      </table>
      <br><br>
      
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀  <a href="vehiculo_editar.php">   <img src="assets/img/cancelar.png" alt=""> </a>
            <input type="submit"  value="" name="Guardar" id="boton4" style='width:205px; height:52px'> 
      
   
    
      </form>


        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/input.js"></script>
    </body>
</html>