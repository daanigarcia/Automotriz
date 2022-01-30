<?php
include ("conexion.php");
    
    if(isset($_POST['Guardar'])){
        $IdCliente = $_POST ['IdCliente'];
        $DescripcionVehiculo = $_POST['DescripcionVehiculo'];
        $Modelo = $_POST ['Modelo'];
        $Placa = $_POST ['Placa'];
        $Marca = $_POST ['Marca'];
        $Color = $_POST ['Color'];
        $Allo = $_POST ['Allo'];
        $KiloMetros = $_POST ['KiloMetros'];
        $Combustible = $_POST ['Combustible'];
        $Motor = $_POST ['Motor'];

    
        if(!empty($DescripcionVehiculo) && !empty($Modelo) && !empty($Placa) && !empty($Marca) && !empty($Color) && !empty($Allo)){
                $consulta_insert=$con->prepare('INSERT INTO vehiculo(IdCliente, DescripcionVehiculo, Modelo, Placa, Marca, Color, Allo, KiloMetros, Combustible, Motor, Activo) VALUES 
                (:IdCliente,:DescripcionVehiculo, :Modelo, :Placa, :Marca, :Color, :Allo, :KiloMetros, :Combustible, :Motor, 1)');
                $consulta_insert ->execute(array(
                ':IdCliente' =>$IdCliente,
                ':DescripcionVehiculo' =>$DescripcionVehiculo,
                ':Modelo' =>$Modelo,
                ':Placa' =>$Placa,
                ':Marca' =>$Marca,
                ':Color' =>$Color,
                ':Allo' =>$Allo,
                ':KiloMetros' =>$KiloMetros,
                ':Combustible' =>$Combustible,
                ':Motor' =>$Motor
            ));
            header('Location:vehiculo.php');
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

        <span class="nav__name"><h1>VEHÍCULO CLIENTE</h1></span>
    <br><br>
      <form action="" method="post">
      <table>
      <td>
            <div class="wrapper">
                    <div class="">
                        <label class="imagetitle">CLIENTE</label>
						<select name="IdCliente" class="combo">
                        <?php
                        include ("conexion.php");
                        $sql = "Select IdCliente,Nombre From Cliente where activo = 1 order by IdCliente";
                        $stmt= $con->prepare($sql);
                        $result = $stmt->execute();
                        $rows=$stmt->fetchALL(\PDO::FETCH_OBJ);
                        
                        foreach ($rows as $row) {
                            ?>  
                                 <option value="<?php print ($row->IdCliente); ?>"><?php print ($row->Nombre); ?></option>
                            <?php
                            }
                        ?>
                        
						</select>
                        </div>
                </div>
            </td>
            <td>
                <div class="wrapper"> <div class="input-data">
                        <input type="text" name="DescripcionVehiculo" Class="input_text" required>
                        <div class="underline"></div>
                        <label>DESCRIPCIÓN VEHÍCULO</label> 
                </div></div>
            </td>
        </tr>
      <!-- Fila 1  -->
        <tr>
        <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Color" Class="input_text" required>
                        <div class="underline"></div>
                        <label>COLOR</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Modelo" Class="input_text" required>
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
                        <input type="text" name="Placa" Class="input_text" required>
                        <div class="underline"></div>
                        <label>PLACA</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Marca" Class="input_text" required>
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
                        <input type="text" name="Allo" Class="input_text" required>
                        <div class="underline"></div>
                        <label>AÑO</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="KiloMetros" Class="input_text" required>
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
                        <input type="text" name="Combustible" Class="input_text" required>
                        <div class="underline"></div>
                        <label>COMBUSTIBLE</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Motor" Class="input_text" required>
                        <div class="underline"></div>
                        <label>MOTOR</label>
                    </div>
                </div>
            </td>
        </tr>
        <!-- Fila 5  -->
      </table>
      <br><br>
      
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀    ⠀<a href="clientes.php">   <img src="assets/img/cancelar.png" alt=""> </a>
            <input type="submit"  value="" name="Guardar" id="boton4" style='width:205px; height:52px'> 
      
   
    
      </form>



        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/input.js"></script>
    </body>
</html>