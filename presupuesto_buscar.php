<?php 

	$con=mysqli_connect('localhost','root','','db_rascon');

    $query = "SELECT * FROM `Orden` WHERE `Activo`=1 and `ActivoOrden`=0";
    $search_result = filterTable($query);

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
       <span class="nav__name"><h1>PRESUPUESTO / BUSCAR</h1></span>
      
        
        <br><br><br><br><br>
<form action="presupuesto_buscar.php" method="post">
	<table style= "border: 2px solid black">
		<tr style= "background-color: black;" class="infotabla">
			<td width="150px">Id_Presupuesto</td>
			<td width="150px">Fecha propuesta</td>
			<td width="100px">Sucursal</td>
			<td width="100px">Vehículo</td>
			<td width="350px">Concepto</td>
            <td width="100px">Acción</td>
            <td width="100px">Orden</td>

		</tr>
		<?php 
		$sql="SELECT * from orden WHERE `Activo`=1";
		$result=mysqli_query($con,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
                    <td><?php echo $mostrar['IdOrden'];?></td>
                    <td><?php echo $mostrar['Fechapropuesta'];?></td>
                    <td><?php echo $mostrar['IdSucursal'];?></td>
                    <td><?php echo $mostrar['IdClienteVehiculo'];?></td>
                    <td><?php echo $mostrar['Observaciones'];?></td>
					<td><a href="presupuesto_editar.php?IdOrden=<?php echo $mostrar['IdOrden']; ?>"  class="btn__update" >Editar</a></td>
                    <td><a href="orden_editar.php?IdOrden=<?php echo $mostrar['IdOrden']; ?>"  class="btn__update" >Generar</a></td>
		</tr>
	    <?php 
	        }
	    ?>
            </table>
        </form>
	</table>

	<br><br>
	<a href="pdf_orden.php" target="_blank">
    <button>Generar reporte</button>
    </a> 

        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/input.js"></script>
    </body>
</html>