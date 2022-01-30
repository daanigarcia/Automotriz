<?php 

	$con=mysqli_connect('localhost','root','','db_rascon');

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM `proovedor` WHERE CONCAT(`IdProovedor`, `NombreEmpresa`, `Direccion`, `Telefono`, `Celular`, `Email`, `PersonaContacto`, `Activo`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `proovedor`";
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
       <span class="nav__name"><h1>PROVEEDOR / DESACTIVAR</h1></span>
      
        
        <br><br>
<form action="proveedor_desactivar.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Buscar proveedor"><a>                                                     </a><input class="botonbuscar" type="submit" name="search" value="Buscar"><br><br>
	<table style= "border: 2px solid black">
		<tr style= "background-color: black;" class="infotabla">
			<td width="130px">Id_Proveedor</td>
			<td width="150px">Nombre empresa</td>
			<td width="130px">Dirección</td>
			<td width="130px">Teléfono</td>
			<td width="130px">Celular</td>
			<td width="130px">Correo electrónico</td>
			<td width="150px">Persona contacto</td>
            <td width="150px">Activo</td>
			<td width="150px">Desactivar</td>
		</tr>

                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['IdProovedor'];?></td>
                    <td><?php echo $row['NombreEmpresa'];?></td>
                    <td><?php echo $row['Direccion'];?></td>
                    <td><?php echo $row['Telefono'];?></td>
                    <td><?php echo $row['Celular'];?></td>
                    <td><?php echo $row['Email'];?></td>
                    <td><?php echo $row['PersonaContacto'];?></td>
                    <td><?php echo $row['Activo'];?></td>
                    <td><a name="Guardar" href="proveedor_desactivar_accion.php?IdProovedor=<?php echo $row['IdProovedor']; ?>"  class="btn__update" >Desactivar</a></td>

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