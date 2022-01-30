<?php
include ("conexion.php");
    
    if(isset($_POST['Guardar'])){
        $Nombre = $_POST['Nombre'];
        $Fecha_Nacimiento = $_POST ['Fecha_Nacimiento'];
        $Estado_Civil = $_POST ['Estado_Civil'];
        $CURP = $_POST ['CURP'];
        $Telefono_1 = $_POST ['Telefono_1'];
        $Telefono_2 = $_POST ['Telefono_2'];
        $Correo = $_POST ['Correo'];
        $Domicilio = $_POST ['Domicilio'];
        $Codigo_Postal = $_POST ['Codigo_Postal'];
        $Puesto = $_POST ['Puesto'];
        $Sueldo = $_POST ['Sueldo'];
        $IdSucursal = $_POST ['IdSucursal'];

    
        if(!empty($Nombre) && !empty($Estado_Civil) && !empty($CURP) && !empty($Telefono_1) && !empty($Codigo_Postal) && !empty($Correo)){
                $consulta_insert=$con->prepare('INSERT INTO Empleado(Nombre, Fecha_Nacimiento, Estado_Civil, CURP, Telefono_1, Telefono_2, 
                Correo, Domicilio, Codigo_Postal, Puesto, Sueldo, IdSucursal, Activo) VALUES 
                (:Nombre, :Fecha_Nacimiento, :Estado_Civil, :CURP, :Telefono_1, :Telefono_2, :Correo, :Domicilio, :Codigo_Postal,
                 :Puesto, :Sueldo, :IdSucursal, 1)');
                $consulta_insert ->execute(array(
                ':Nombre' =>$Nombre,
                ':Fecha_Nacimiento' =>$Fecha_Nacimiento,
                ':Estado_Civil' =>$Estado_Civil,
                ':CURP' =>$CURP,
                ':Telefono_1' =>$Telefono_1,
                ':Telefono_2' =>$Telefono_2,
                ':Correo' =>$Correo,
                ':Domicilio' =>$Domicilio,
                ':Codigo_Postal' =>$Codigo_Postal,
                ':Puesto' =>$Puesto,
                ':Sueldo' =>$Sueldo,
                ':IdSucursal' =>$IdSucursal
            ));
            header('Location:empleados.php');    
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
<body id="body-pd">

        <span class="nav__name"><h1>EMPLEADO</h1></span>

        <br>
      <form action="" method="post">
      <table>
      <!-- Fila 1  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Nombre" Class="input_text" required>
                        <div class="underline"></div>
                        <label>NOMBRE COMPLETO</label>
                    </div>
                </div>
            </td>
            <td>
				<div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="CURP" Class="input_text" required>
                        <div class="underline"></div>
                        <label>CURP</label>
                    </div>
                </div>
            </td>
        </tr>
        <!-- Fila 2  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="">
                        <label class="imagetitle">FECHA DE NACIMIENTO</label><br>
						<input type="date" name="Fecha_Nacimiento" Class="input_text" required>
                    </div>
                </div>
            </td>
            <td>
            <div class="wrapper">
                    <div class="">
                        <label class="imagetitle">SUCURSAL</label><br>
						<select name="IdSucursal" class="combo">
                        <?php
                        include ("conexion.php");
                        $sql = "Select IdSucursal,Nombre From sucursal order by IdSucursal";
                        $stmt= $con->prepare($sql);
                        $result = $stmt->execute();
                        $rows=$stmt->fetchALL(\PDO::FETCH_OBJ);
                        
                        foreach ($rows as $row) {
                            ?>  
                                 <option value="<?php print ($row->IdSucursal); ?>"><?php print ($row->Nombre); ?></option>
                            <?php
                            }
                        ?>
						</select>
                        </div>
                </div>
            </td>
        </tr>
        <!-- Fila 3  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Estado_Civil" Class="input_text" required>
                        <div class="underline"></div>
                        <label>ESTADO CIVÍL</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Domicilio" Class="input_text" required>
                        <div class="underline"></div>
                        <label>DIRECCIÓN</label>
                    </div>
                </div>
            </td>
        </tr>
        <!-- Fila 4  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Correo" Class="input_text" required>
                        <div class="underline"></div>
                        <label>CORREO ELECTRÓNICO</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Codigo_Postal" Class="input_text" required>
                        <div class="underline"></div>
                        <label>CÓDIGO POSTAL</label>
                    </div>
                </div>
            </td>
        </tr>
		          <!-- Fila 5  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Telefono_1" Class="input_text" required>
                        <div class="underline"></div>
                        <label>TELÉFONO 1</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Puesto" Class="input_text" required>
                        <div class="underline"></div>
                        <label>PUESTO</label>
                    </div>
                </div>
            </td>
        </tr>
		  		  <!-- Fila 6  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Telefono_2" Class="input_text" required>
                        <div class="underline"></div>
                        <label>TELÉFONO 2</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Sueldo" Class="input_text" required>
                        <div class="underline"></div>
                        <label>SUELDO</label>
                    </div>
                </div>
            </td>
        </tr>
      </table>
      <br>

      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀  ⠀⠀⠀⠀⠀⠀⠀<a href="empleados.php">   <img src="assets/img/cancelar.png" alt=""> </a>
            <input type="submit"  value="" name="Guardar" id="boton4" style='width:205px; height:52px'> 
      
        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/input.js"></script>
    </body>
</html>