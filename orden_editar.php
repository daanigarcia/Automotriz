<?php
include ("conexion.php");

if(isset($_GET['IdOrden'])){
    $IdOrden=(int) $_GET['IdOrden'];

    $buscar_id=$con->prepare('SELECT * FROM orden WHERE IdOrden=:IdOrden LIMIT 1');
    $buscar_id->execute(array(
        ':IdOrden'=>$IdOrden
    ));
    $resultado=$buscar_id->fetch();
}else{
    header('Location: orden_buscar.php');
}

    if(isset($_POST['Guardar'])){
        $Observaciones = $_POST ['Observaciones'];
	    $IdClienteVehiculo = $_POST ['IdClienteVehiculo'];
        $IdCliente = $_POST['IdCliente'];
        $IdEmpleado = $_POST ['IdEmpleado'];
        $IdSucursal = $_POST ['IdSucursal'];
        $IdTipoTrabajo = $_POST ['IdTipoTrabajo'];
        $FechaEntrega = $_POST ['FechaEntrega'];
        $Total = $_POST ['Total'];


                $consulta_insert=$con->prepare('UPDATE orden SET
                Observaciones=:Observaciones,
				IdClienteVehiculo=:IdClienteVehiculo, 
                IdCliente=:IdCliente, 
                IdEmpleado=:IdEmpleado, 
                IdSucursal=:IdSucursal, 
                IdTipoTrabajo=:IdTipoTrabajo, 
                FechaEntrega=:FechaEntrega,
				Total=:Total,
                Activo=0,
                ActivoOrden=1
                WHERE IdOrden=:IdOrden;'
                );
                $consulta_insert ->execute(array(
                ':Observaciones' =>$Observaciones,
                ':IdClienteVehiculo' =>$IdClienteVehiculo,
                ':IdCliente' =>$IdCliente,
                ':IdEmpleado' =>$IdEmpleado,
                ':IdSucursal' =>$IdSucursal,
                ':IdTipoTrabajo' =>$IdTipoTrabajo,
                ':FechaEntrega' =>$FechaEntrega,
                ':Total' =>$Total,
                ':IdOrden' =>$IdOrden,
            ));
            header('Location:orden_editar.php');
    
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

        <span class="nav__name"><h1>ORDEN / EDITAR</h1></span>

        <br><br>
        <form action="" method="post">
        <table>
        <!-- Fila 1  -->
        <tr>
        <td>
            <div class="wrapper">
                    <div>
					<label class="imagetitle">CLIENTE</label><br>
                    <input readonly="readonly" type="text" name="IdCliente" value="<?php if($resultado) echo $resultado['IdCliente']; ?>" Class="input_text">
                    </div>
                </div>
            </td>
            <td>
            <div class="wrapper">
                    <div class="">
                        <label class="imagetitle">FECHA DE ENTREGA</label><br>
						<input type="date" name="FechaEntrega" value="<?php if($resultado) echo $resultado['FechaEntrega']; ?>" Class="input_text">
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
                        <label class="imagetitle">ATIENDE</label><br>
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
                    <div>
					<label class="imagetitle">SUCURSAL</label><br>
                    <input readonly="readonly" type="text" name="IdSucursal" value="<?php if($resultado) echo $resultado['IdSucursal']; ?>" Class="input_text">
                    </div>
                </div>
            </td>
            <td>
            <div class="wrapper">
                    <div class="">
                        <label class="imagetitle">TIPO DE TRABAJO</label><br>
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
                    <input type="text" name="Observaciones" value="<?php if($resultado) echo $resultado['Observaciones']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>CONCEPTO</label>
                    </div>
                </div>
            </td>
            <td>
            <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Total" value="<?php if($resultado) echo $resultado['Total']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>COSTO TOTAL</label>
                    </div>
                </div>
            </td>
        </tr>
        </table>                  
        
        ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀  <a href="orden_buscar.php">   <img src="assets/img/cancelar.png" alt=""> </a>
            <input type="submit"  value="" name="Guardar" id="boton4" style='width:205px; height:52px'> 
            </form>

        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/input.js"></script>
    </body>
</html>