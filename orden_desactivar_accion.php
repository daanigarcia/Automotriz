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
    header('Location: orden_desactivar.php');
}
    if(isset($_POST['Guardar'])){
        $IdOrden = $_GET['IdOrden'];
        $Nombre = $_POST['Nombre'];
        $Direccion = $_POST ['Direccion'];
        $RFC = $_POST ['RFC'];
        $Telefono = $_POST ['Telefono'];
        $Celular = $_POST ['Celular'];
        $Correo = $_POST ['Correo'];
    
                $consulta_insert=$con->prepare('UPDATE orden SET
                ActivoOrden= 0
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
       <span class="nav__name"><h1>¿Deseas desactivar la orden?</h1></span>

       <form action="" method="post">
            <a href="orden_desactivar.php">   <img src="assets/img/cancelar.png" alt=""> </a>
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