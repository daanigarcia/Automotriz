<?php 

	$con=mysqli_connect('localhost','root','','db_rascon');

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM `cobranza` WHERE CONCAT(`IdCobranza`, `FechaPago`, `TipodePago`, `IdOrden`, `Total`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `cobranza`";
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

        <span class="nav__name"><h1>COBRANZA / BUSCAR</h1></span>
      
        
        <br><br>
<form action="cobranza_buscar.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Buscar cobranza"><a>                                                     </a><input class="botonbuscar" type="submit" name="search" value="Buscar"><br><br>
	<table style= "border: 2px solid black">
		<tr style= "background-color: black;" class="infotabla">
			<td width="100px">Id_Cobranza</td>
			<td width="130px">Id_Orden</td>
			<td width="150px">Tipo de pago</td>
			<td width="130px">Fecha de pago</td>
			<td width="130px">Total final</td>
            <td colspan="2">Acción</td>
		</tr>

                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['IdCobranza'];?></td>
                    <td><?php echo $row['IdOrden'];?></td>
                    <td><?php echo $row['TipodePago'];?></td>
                    <td><?php echo $row['FechaPago'];?></td>
                    <td><?php echo $row['Total'];?></td>
                    <td><a href="cobranza_editar.php?IdCobranza=<?php echo $row['IdCobranza']; ?>"  class="btn__update" >Editar</a></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
	</table>
	
	<br><br>
	<a href="pdf_cobranza.php" target="_blank">
    <button>Generar reporte</button>
    </a> 

        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/input.js"></script>
    </body>
</html>