<?php 
include ("conexion.php");

if(isset($_GET['IdInventario'])){
    $IdInventario=(int) $_GET['IdInventario'];

    $buscar_id=$con->prepare('SELECT * FROM inventario WHERE IdInventario=:IdInventario LIMIT 1');
    $buscar_id->execute(array(
        ':IdInventario'=>$IdInventario
    ));
    $resultado=$buscar_id->fetch();
}else{
    header('Location: inventario_desactivar.php');
}
    if(isset($_POST['Guardar'])){
        $IdInventario = $_GET['IdInventario'];
        $Nombre = $_POST['Nombre'];
        $Direccion = $_POST ['Direccion'];
        $RFC = $_POST ['RFC'];
        $Telefono = $_POST ['Telefono'];
        $Celular = $_POST ['Celular'];
        $Correo = $_POST ['Correo'];
    
                $consulta_insert=$con->prepare('UPDATE inventario SET
                Activo= 0
                WHERE IdInventario=:IdInventario;'
                );
                $consulta_insert ->execute(array(
                ':IdInventario' =>$IdInventario,
            ));
            header('Location:inventario_desactivar.php');
    
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
       <span class="nav__name"><h1>¿Deseas desactivar al inventario?</h1></span>

       <form action="" method="post">
            <a href="inventario_desactivar.php">   <img src="assets/img/cancelar.png" alt=""> </a>
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