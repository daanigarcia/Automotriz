<?php 

	$con=mysqli_connect('localhost','root','','db_rascon');

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM `empleado` WHERE `Activo`=1 and CONCAT(`IdEmpleado`, `Nombre`, `Fecha_Nacimiento`, `Estado_Civil`, `CURP`, `Telefono_1`, `Telefono_2`, `Correo`, `Domicilio`, `Codigo_Postal`,`Puesto`,`Sueldo`, `IdSucursal`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `empleado` WHERE `Activo`=1";
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

        <span class="nav__name"><h1>EMPLEADOS / BUSCAR</h1></span>
      
        
        <br><br>
<form action="empleados_buscar.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Buscar empleado"><a>                                                     </a><input class="botonbuscar" type="submit" name="search" value="Buscar"><br><br>
	<table style= "border: 2px solid black">
		<tr style= "background-color: black;" class="infotabla">
			<td width="100px">Id_Empleado</td>
			<td width="150px">Nombre completo</td>
			<td width="130px">Fecha de nacimiento</td>
			<td width="130px">Estado civil</td>
			<td width="100px">CURP</td>
			<td width="130px">Teléfono 1</td>
			<td width="150px">Teléfono 2</td>
			<td width="100px">Correo electrónico</td>
			<td width="150px">Dirección</td>
			<td width="150px">Código postal</td>
			<td width="150px">Puesto</td>
			<td width="150px">Sueldo</td>
			<td width="150px">Sucursal</td>
            <td colspan="2">Acción</td>
		</tr>

                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['IdEmpleado'];?></td>
                    <td><?php echo $row['Nombre'];?></td>
                    <td><?php echo $row['Fecha_Nacimiento'];?></td>
                    <td><?php echo $row['Estado_Civil'];?></td>
                    <td><?php echo $row['CURP'];?></td>
                    <td><?php echo $row['Telefono_1'];?></td>
                    <td><?php echo $row['Telefono_2'];?></td>
                    <td><?php echo $row['Correo'];?></td>
                    <td><?php echo $row['Domicilio'];?></td>
                    <td><?php echo $row['Codigo_Postal'];?></td>
                    <td><?php echo $row['Puesto'];?></td>
                    <td><?php echo $row['Sueldo'];?></td>
					<td><?php echo $row['IdSucursal'];?></td>
                    <td><a href="empleados_editar.php?IdEmpleado=<?php echo $row['IdEmpleado']; ?>"  class="btn__update" >Editar</a></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>

	</table>

		<br><br>
	<a href="pdf_empleados.php" target="_blank">
    <button>Generar reporte</button>
    </a> 

        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/input.js"></script>
    </body>
</html>