<?php 

	$con=mysqli_connect('localhost','root','','db_rascon');

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM `inventario` WHERE CONCAT(`IdInventario`, `Articulo`, `Descripcion`, `Marca`, `Costo`, `Precio`, `Cantidad`, `IdProovedor`,`IdSucursal`, `Activo`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `inventario`";
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
       <span class="nav__name"><h1>INVENTARIO / DESACTIVAR</h1></span>
      
        
        <br><br>
<form action="inventario_desactivar.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Buscar inventario"><a>                                                     </a><input class="botonbuscar" type="submit" name="search" value="Buscar"><br><br>
	<table style= "border: 2px solid black">
		<tr style= "background-color: black;" class="infotabla">
			<td width="150px">Id_Inventario</td>
			<td width="130px">Artículo</td>
			<td width="180px">Descripción</td>
			<td width="100px">Marca</td>
			<td width="130px">Proveedor</td>
			<td width="150px">Sucursal</td>
			<td width="100px">Costo</td>
			<td width="130px">Precio lista</td>
			<td width="100px">Cantidad</td>
            <td width="150px">Activo</td>
			<td width="150px">Desactivar</td>
		</tr>

                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['IdInventario'];?></td>
                    <td><?php echo $row['Articulo'];?></td>
                    <td><?php echo $row['Descripcion'];?></td>
                    <td><?php echo $row['Marca'];?></td>
                    <td><?php echo $row['IdProovedor'];?></td>
                    <td><?php echo $row['IdSucursal'];?></td>
                    <td><?php echo $row['Costo'];?></td>
                    <td><?php echo $row['Precio'];?></td>
                    <td><?php echo $row['Cantidad'];?></td>
                    <td><?php echo $row['Activo'];?></td>
                    <td><a name="Guardar" href="inventario_desactivar_accion.php?IdInventario=<?php echo $row['IdInventario']; ?>"  class="btn__update" >Desactivar</a></td>
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