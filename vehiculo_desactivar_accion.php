<?php 
include ("conexion.php");

if(isset($_GET['IdClienteVehiculo'])){
    $IdClienteVehiculo=(int) $_GET['IdClienteVehiculo'];

    $buscar_id=$con->prepare('SELECT * FROM vehiculo WHERE IdClienteVehiculo=:IdClienteVehiculo LIMIT 1');
    $buscar_id->execute(array(
        ':IdClienteVehiculo'=>$IdClienteVehiculo
    ));
    $resultado=$buscar_id->fetch();
}else{
    header('Location: vehiculo_desactivar.php');
}
    if(isset($_POST['Guardar'])){
        $IdClienteVehiculo = $_GET['IdClienteVehiculo'];
        $DescripcionVehiculo = $_POST['DescripcionVehiculo'];
        $Serie = $_POST ['Serie'];
        $Modelo = $_POST ['Modelo'];
        $Placa = $_POST ['Placa'];
        $Marca = $_POST ['Marca'];
        $Color = $_POST ['Color'];
        $Año = $_POST ['Allo'];
        $KiloMetros = $_POST ['KiloMetros'];
        $Combustible = $_POST ['Combustible'];
        $Motor = $_POST ['Motor'];
        $Activo = $_POST ['Activo'];
        $Cliente = $_POST ['Cliente'];
    
                $consulta_insert=$con->prepare('UPDATE vehiculo SET
                Activo= 0
                WHERE IdClienteVehiculo=:IdClienteVehiculo;'
                );
                $consulta_insert ->execute(array(
                ':IdClienteVehiculo' =>$IdClienteVehiculo,
            ));
            header('Location:vehiculo_desactivar.php');
    
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
       <span class="nav__name"><h1>¿Deseas desactivar el vehiculo?</h1></span>

       <form action="" method="post">
            <a href="vehiculo_desactivar.php">   <img src="assets/img/cancelar.png" alt=""> </a>
            <input type="submit"  value="" name="Guardar" id="boton4" style='width:205px; height:52px'> 
            <table>

       
        </form>

        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/input.js"></script>
    </body>
</html>