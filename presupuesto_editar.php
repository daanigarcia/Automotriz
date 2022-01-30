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
    header('Location: presupuesto_buscar.php');
}

    if(isset($_POST['Guardar'])){
        $Observaciones = $_POST ['Observaciones'];
	    $IdClienteVehiculo = $_POST ['IdClienteVehiculo'];
        $IdCliente = $_POST['IdCliente'];
        $IdSucursal = $_POST ['IdSucursal'];
        $Fechapropuesta = $_POST ['Fechapropuesta'];


                $consulta_insert=$con->prepare('UPDATE orden SET
                Observaciones=:Observaciones,
				IdClienteVehiculo=:IdClienteVehiculo, 
                IdCliente=:IdCliente, 
                IdSucursal=:IdSucursal, 
                Fechapropuesta=:Fechapropuesta,
                Activo=1
                WHERE IdOrden=:IdOrden;'
                );
                $consulta_insert ->execute(array(
                ':Observaciones' =>$Observaciones,
                ':IdClienteVehiculo' =>$IdClienteVehiculo,
                ':IdCliente' =>$IdCliente,
                ':IdSucursal' =>$IdSucursal,
                ':Fechapropuesta' =>$Fechapropuesta,
                ':IdOrden' =>$IdOrden,
            ));
            header('Location:presupuesto_buscar.php');
    
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

        <span class="nav__name"><h1>PRESUPUESTO / EDITAR</h1></span>

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
                        <label class="imagetitle">FECHA PROPUESTA</label><br>
						<input type="date" name="Fechapropuesta" value="<?php if($resultado) echo $resultado['Fechapropuesta']; ?>" Class="input_text">
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
                        <label class="imagetitle">VEHÍCULO</label><br>
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
            <td>
            <div class="wrapper">
                    <div>
					<label class="imagetitle">SUCURSAL</label><br>
                    <input readonly="readonly" type="text" name="IdSucursal" value="<?php if($resultado) echo $resultado['IdSucursal']; ?>" Class="input_text">
                    </div>
                </div>
            </td>
        </tr>
        <!-- Fila 3  -->
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
        </table>                  
        
        ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀  <a href="presupuesto_buscar.php">   <img src="assets/img/cancelar.png" alt=""> </a>
            <input type="submit"  value="" name="Guardar" id="boton4" style='width:205px; height:52px'> 
            </form> 

        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/input.js"></script>
    </body>
</html>