<?php
include ("conexion.php");
    
    if(isset($_POST['Guardar'])){
        $Observaciones = $_POST ['Observaciones'];
	    $IdClienteVehiculo = $_POST ['IdClienteVehiculo'];
        $IdCliente = $_POST['IdCliente'];
        $IdEmpleado = $_POST ['IdEmpleado'];
        $IdSucursal = $_POST ['IdSucursal'];
        $IdTipoTrabajo = $_POST ['IdTipoTrabajo'];
        $FechaEntrega = $_POST ['FechaEntrega'];
        $Total = $_POST ['Total'];

    
                $consulta_insert=$con->prepare('INSERT INTO orden(Observaciones, IdClienteVehiculo, IdCliente, 
                IdEmpleado, IdSucursal, IdTipoTrabajo, FechaEntrega, ActivoOrden, Total) VALUES 
                (:Observaciones, :IdClienteVehiculo, :IdCliente, :IdEmpleado, :IdSucursal, :IdTipoTrabajo, :FechaEntrega, 1,:Total)');
                $consulta_insert ->execute(array(
                ':Observaciones' =>$Observaciones,
                ':IdClienteVehiculo' =>$IdClienteVehiculo,
                ':IdCliente' =>$IdCliente,
                ':IdEmpleado' =>$IdEmpleado,
                ':IdSucursal' =>$IdSucursal,
                ':IdTipoTrabajo' =>$IdTipoTrabajo,
                ':FechaEntrega' =>$FechaEntrega,
                ':Total' =>$Total
            ));
        header('Location:orden.php');
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
    
        <span class="nav__name"><h1>ORDEN</h1></span>    
        <br><br>

        <form action="" method="post">
        <table>
        <!-- Fila 1  -->
        <tr>
        <td>
            <div class="wrapper">
                    <div class="">
                        <label class="imagetitle">Cliente</label><br>
						<select name="IdCliente" class="combo">
                        <?php
                        include ("conexion.php");
                        $sql = "Select IdCliente,Nombre From Cliente WHERE ACTIVO = 1 order by IdCliente";
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
            <div class="wrapper">
                    <div class="">
                        <label class="imagetitle">FECHA DE ENTREGA</label><br>
						<input type="date" name="FechaEntrega" Class="input_text" required>
                    </div>
                </div>
            </td>
            <td>
        </tr>  
        <!-- Fila 2  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="">
                        <label class="imagetitle">Atiende</label><br>
						<select name="IdEmpleado" class="combo">
                        <?php
                        include ("conexion.php");
                        $sql = "Select IdEmpleado,Nombre From Empleado where activo= 1 order by IdEmpleado";
                        $stmt= $con->prepare($sql);
                        $result = $stmt->execute();
                        $rows=$stmt->fetchALL(\PDO::FETCH_OBJ);
                        
                        foreach ($rows as $row) {
                            ?>  
                                 <option value="<?php print ($row->IdEmpleado); ?>"><?php print ($row->Nombre); ?></option>
                            <?php
                            }
                        ?>
                        
						</select>
                        </div>
                </div>
            </td>
            <td>
            <div class="wrapper">
                    <div class="">
                        <label class="imagetitle">VEHICULO</label><br>
						<select name="IdClienteVehiculo" class="combo">
                        <?php
                        include ("conexion.php");
                        $sql = "Select IdClienteVehiculo,DescripcionVehiculo From vehiculo where activo=1 order by IdClienteVehiculo";
                        $stmt= $con->prepare($sql);
                        $result = $stmt->execute();
                        $rows=$stmt->fetchALL(\PDO::FETCH_OBJ);
                        
                        foreach ($rows as $row) {
                            ?>  
                                 <option value="<?php print ($row->IdClienteVehiculo); ?>"><?php print ($row->DescripcionVehiculo); ?></option>
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
            <td>
            <div class="wrapper">
                    <div class="">
                        <label class="imagetitle">Tipo de Trabajo</label><br>
						<select name="IdTipoTrabajo" class="combo">
                        <?php
                        include ("conexion.php");
                        $sql = "Select IdTipoTrabajo,Nombre From tipotrabajo order by IdTipoTrabajo";
                        $stmt= $con->prepare($sql);
                        $result = $stmt->execute();
                        $rows=$stmt->fetchALL(\PDO::FETCH_OBJ);
                        
                        foreach ($rows as $row) {
                            ?>  
                                 <option value="<?php print ($row->IdTipoTrabajo); ?>"><?php print ($row->Nombre); ?></option>
                            <?php
                            }
                        ?>
                        
						</select>
                        </div>
                </div>
            </td>
        </tr>
        <!-- Fila 4  -->
        <tr>
        <td>
            <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Observaciones" Class="input_text" required>
                        <div class="underline"></div>
                        <label>CONCEPTO</label>
                    </div>
                </div>
            </td>
            <td>
            <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Total" Class="input_text" required>
                        <div class="underline"></div>
                        <label>COSTO APROXIMADO</label>
                    </div>
                </div>
            </td>
        </tr>
        </table>
        <BR><BR><BR>                  
        
        ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀<a href="orden.php">   <img src="assets/img/cancelar.png" alt=""> </a>
            <input type="submit"  value="" name="Guardar" id="boton4" style='width:205px; height:52px'> 
            </form> 
        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/input.js"></script>
    </body>
</html>