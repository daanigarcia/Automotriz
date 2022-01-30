<?php 

	$con=mysqli_connect('localhost','root','','db_rascon');

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM `vehiculo` WHERE CONCAT(`IdClienteVehiculo`, `Serie`, `Modelo`, `Marca`, `Color`, `Allo`, `KiloMetros`, `Combustible`, `Motor`,`IdCliente`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `vehiculo`";
    $search_result = filterTable($query);
}

function filterTable($query)
{
    $con = mysqli_connect("localhost", "root", "", "db_rascon");
    $filter_Result = mysqli_query($con, $query);
    return $filter_Result;
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
       <span class="nav__name"><h1>VEHÍCULO CLIENTE / DESACTIVAR</h1></span>
      
        
        <br><br>
<form action="vehiculo_desactivar.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Buscar vehículo cliente"><a>                                                     </a><input class="botonbuscar" type="submit" name="search" value="Buscar"><br><br>
	<table style= "border: 2px solid black">
		<tr style= "background-color: black;" class="infotabla">
			<td width="150px">Id_VehículoCliente</td>
			<td width="100px">Serie</td>
			<td width="100px">Modelo</td>
			<td width="100px">Placa</td>
			<td width="100px">Marca</td>
			<td width="100px">Color</td>
			<td width="100px">Año</td>
			<td width="150px">Kilómetros</td>
			<td width="150px">Combustible</td>
			<td width="100px">Motor</td>
			<td width="130px">IdCliente</td>
            <td width="150px">Activo</td>
			<td width="150px">Desactivar</td>
		</tr>

                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['IdClienteVehiculo'];?></td>
                    <td><?php echo $row['Serie'];?></td>
                    <td><?php echo $row['Modelo'];?></td>
                    <td><?php echo $row['Placa'];?></td>
                    <td><?php echo $row['Marca'];?></td>
                    <td><?php echo $row['Color'];?></td>
                    <td><?php echo $row['Allo'];?></td>
                    <td><?php echo $row['KiloMetros'];?></td>
                    <td><?php echo $row['Combustible'];?></td>
                    <td><?php echo $row['Motor'];?></td>
                    <td><?php echo $row['IdCliente'];?></td>
                    <td><?php echo $row['Activo'];?></td>
                    <td><a name="Guardar" href="vehiculo_desactivar_accion.php?IdClienteVehiculo=<?php echo $row['IdClienteVehiculo']; ?>"  class="btn__update" >Desactivar</a></td>
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