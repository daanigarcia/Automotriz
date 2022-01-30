<?php 

	$con=mysqli_connect('localhost','root','','db_rascon');

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM `orden` WHERE CONCAT(`IdOrden`, `Observaciones`, `Celular`, `IdOrdenVehiculo`, `IdOrden`, `IdEmpleado`, `IdSucursal`, `Cantidad`, `IdTipoTrabajo`, `IdInventario`, `Credito`, `Fechapropuesta`, `Fechaentrega`, `Activo`, `ActivoOrden` ) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `orden`";
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
                Activo=0,
                WHERE IdOrden=:IdOrden;'
                );
                $consulta_insert ->execute(array(
                ':IdOrden' =>$IdOrden,
            ));
            header('Location: presupuesto_desactivar.php');
    
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
        <link rel="stylesheet" href="assets/css/tabla.css">

        <?php
            include "leftsidebar.php";
            leftsidebar();
        ?>
		<body id="body-pd">
       <span class="nav__name"><h1>PRESUPUESTO / DESACTIVAR</h1></span>
      
        
        <br><br>
<form action="presupuesto_desactivar.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Buscar presupuesto"><a>                                                     </a><input class="botonbuscar" type="submit" name="search" value="Buscar"><br><br>
	<table style= "border: 2px solid black">
		<tr style= "background-color: black;" class="infotabla">
			<td width="50px">Id_Presupuesto</td>
			<td width="150px">orden</td>
			<td width="130px">Fecha propuesta</td>
			<td width="130px">Sucursal</td>
			<td width="130px">Vehículo</td>
			<td width="130px">Concepto</td>
		    <td width="150px">Activo</td>
			<td width="150px">Desactivar</td>
		</tr>

                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['IdOrden'];?></td>
                    <td><?php echo $row['IdOrden'];?></td>
                    <td><?php echo $row['Fechapropuesta'];?></td>
                    <td><?php echo $row['IdSucursal'];?></td>
                    <td><?php echo $row['IdClienteVehiculo'];?></td>
                    <td><?php echo $row['Observaciones'];?></td>
                    <td><?php echo $row['Activo'];?></td>
                    <td><a name="Guardar" href="presupuesto_desactivar_accion.php?IdOrden=<?php echo $row['IdOrden']; ?>"  class="btn__update" >Desactivar</a></td>
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