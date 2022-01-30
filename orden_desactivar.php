<?php 

	$con=mysqli_connect('localhost','root','','db_rascon');

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM `orden` WHERE CONCAT(`IdOrden`, `IdCliente`, `IdEmpleado`, `IdSucursal`, `Observaciones`, `FechaEntrega`, `IdClienteVehiculo`,, `IdTipoTrabajo`, `Credito`, `ActivoOrden` ) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `orden` WHERE ActivoOrden in (0,1) and Activo = 0";
    $search_result = filterTable($query);
}

function filterTable($query)
{
    $con = mysqli_connect("localhost", "root", "", "db_rascon");
    $filter_Result = mysqli_query($con, $query);
    return $filter_Result;
}

    if(isset($_POST['Guardar'])){
        $IdOrden = $_GET['IdOrden'];
                $consulta_insert=$con->prepare('UPDATE orden SET
                ActivoOrden=0,
                WHERE IdOrden=:IdOrden;'
                );
                $consulta_insert ->execute(array(
                ':IdOrden' =>$IdOrden,
            ));
            header('Location:orden_desactivar.php');
    
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
		<link rel="stylesheet" href="assets/css/tabla.css">
        <link rel="stylesheet" href="assets/css/botones.css">

        <?php
            include "leftsidebar.php";
            leftsidebar();
        ?>
		<body id="body-pd">
       <span class="nav__name"><h1>ORDEN / DESACTIVAR</h1></span>
      
        
        <br><br>
<form action="orden_desactivar.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Buscar cliente"><a>                                                     </a><input class="botonbuscar" type="submit" name="search" value="Buscar"><br><br>
	<table style= "border: 2px solid black">
		<tr style= "background-color: black;" class="infotabla">
            <td width="100px">Id_Orden</td>
			<td width="100px">Cliente</td>
			<td width="130px">Atiende</td>
			<td width="130px">Sucursal</td>
			<td width="100px">Concepto</td>
			<td width="150px">Fecha de entrega</td>
			<td width="100px">Vehículo</td>
			<td width="150px">Tipo de trabajo</td>
			<td width="130px">Costo total</td>
            <td width="150px">Activo</td>
			<td width="150px">Desactivar</td>
		</tr>

                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['IdOrden'];?></td>
                    <td><?php echo $row['IdCliente'];?></td>
                    <td><?php echo $row['IdEmpleado'];?></td>
                    <td><?php echo $row['IdSucursal'];?></td>
                    <td><?php echo $row['Observaciones'];?></td>
                    <td><?php echo $row['FechaEntrega'];?></td>
                    <td><?php echo $row['IdClienteVehiculo'];?></td>
                    <td><?php echo $row['IdTipoTrabajo'];?></td>
                    <td><?php echo $row['Total'];?></td>
                    <td><?php echo $row['ActivoOrden'];?></td>
                    <td><a name="Guardar" href="orden_desactivar_accion.php?IdOrden=<?php echo $row['IdOrden']; ?>"  class="btn__update" >Desactivar</a></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>

	</table>


        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/input.js"></script>
    </body>
</html>