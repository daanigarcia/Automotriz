<?php
include ("conexion.php");

if(isset($_GET['IdEmpleado'])){
    $IdEmpleado=(int) $_GET['IdEmpleado'];

    $buscar_id=$con->prepare('SELECT * FROM empleado WHERE IdEmpleado=:IdEmpleado LIMIT 1');
    $buscar_id->execute(array(
        ':IdEmpleado'=>$IdEmpleado
    ));
    $resultado=$buscar_id->fetch();
}else{
    header('Location: empleados_buscar.php');
}

    if(isset($_POST['Guardar'])){
        $IdEmpleado = $_GET['IdEmpleado'];
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
    
        if(!empty($Nombre) && !empty($Fecha_Nacimiento) && !empty($Estado_Civil) && !empty($CURP) && !empty($Telefono_1) && !empty($Telefono_2) && !empty($Correo) && !empty($Domicilio) && !empty($Codigo_Postal) && !empty($Puesto) && !empty($Sueldo) && !empty($IdSucursal)){
            if(!filter_var($Correo,FILTER_VALIDATE_EMAIL)){
                echo "<script> alert('Correo no válido');</script>";
            } else {
                $consulta_insert=$con->prepare('UPDATE empleado SET
                Nombre=:Nombre, 
                Fecha_Nacimiento=:Fecha_Nacimiento, 
                Estado_Civil=:Estado_Civil, 
                CURP=:CURP, 
                Telefono_1=:Telefono_1, 
                Telefono_2=:Telefono_2,
				Correo=:Correo,
				Domicilio=:Domicilio,
				Codigo_Postal=:Codigo_Postal,
				Puesto=:Puesto,
				Sueldo=:Sueldo,
				IdSucursal=:IdSucursal
                WHERE IdEmpleado=:IdEmpleado;'
                );
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
                ':IdSucursal' =>$IdSucursal,
                ':IdEmpleado' =>$IdEmpleado,
            ));
            header('Location:empleados_buscar.php');
            }
        } else{
            echo "<script> alert('Los campos están vacios');</script>";
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

        <span class="nav__name"><h1>EMPLEADOS / EDITAR</h1></span>

        <br><br>
      <form action="" method="post">
      <table>
      <!-- Fila 1  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Nombre" value="<?php if($resultado) echo $resultado['Nombre']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>NOMBRE COMPLETO</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="IdSucursal" value="<?php if($resultado) echo $resultado['IdSucursal']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>ID_Sucursal</label>
                    </div>
                </div>
            </td>
        </tr>
        <!-- Fila 2  -->
        <tr>
        <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Codigo_Postal" value="<?php if($resultado) echo $resultado['Codigo_Postal']; ?>" Class="input_text" >
                        <div class="underline"></div>
                        <label>CÓDIGO POSTAL</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Correo" value="<?php if($resultado) echo $resultado['Correo']; ?>" Class="input_text" >
                        <div class="underline"></div>
                        <label>CORREO ELECTRÓNICO</label>
                    </div>
                </div>
            </td>
        </tr>
        <!-- Fila 3  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Estado_Civil" value="<?php if($resultado) echo $resultado['Estado_Civil']; ?>" Class="input_text" >
                        <div class="underline"></div>
                        <label>ESTADO CIVÍL</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Domicilio" value="<?php if($resultado) echo $resultado['Domicilio']; ?>" Class="input_text" >
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
                    <input type="text" name="CURP" value="<?php if($resultado) echo $resultado['CURP']; ?>" Class="input_text" >
                        <div class="underline"></div>
                        <label>CURP</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Puesto" value="<?php if($resultado) echo $resultado['Puesto']; ?>" Class="input_text" >
                        <div class="underline"></div>
                        <label>PUESTO</label>
                    </div>
                </div>
            </td>
        </tr>
		          <!-- Fila 5  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Telefono_1" value="<?php if($resultado) echo $resultado['Telefono_1']; ?>" Class="input_text" >
                        <div class="underline"></div>
                        <label>TELÉFONO 1</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Sueldo" value="<?php if($resultado) echo $resultado['Sueldo']; ?>" Class="input_text" >
                        <div class="underline"></div>
                        <label>SUELDO</label>
                    </div>
                </div>
            </td>
        </tr>
		  		  <!-- Fila 6  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Telefono_2" value="<?php if($resultado) echo $resultado['Telefono_2']; ?>" Class="input_text" >
                        <div class="underline"></div>
                        <label>TELÉFONO 2</label>
                    </div>
                </div>
            </td>
        </tr>
        <td>
                <div class="wrapper">
                    <div class="">
                        <label class="imagetitle">FECHA DE NACIMIENTO</label><br>
						<input type="date" name="Fecha_Nacimiento" value="<?php if($resultado) echo $resultado['Fecha_Nacimiento']; ?>" Class="input_text" >
                    </div>
                </div>
            </td>
      </table>  


      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀  <a href="empleados_editar.php">   <img src="assets/img/cancelar.png" alt=""> </a>
            <input type="submit"  value="" name="Guardar" id="boton4" style='width:205px; height:52px'> 
      
   

        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/input.js"></script>
    </body>
</html>