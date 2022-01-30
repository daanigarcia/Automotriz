<?php 
include ("conexion.php");

if(isset($_GET['IdEmpleado'])){
    $IdEmpleado=(int) $_GET['IdEmpleado'];

    $buscar_id=$con->prepare('SELECT * FROM empleado WHERE IdEmpleado=:IdEmpleado LIMIT 1');
    $buscar_id->execute(array(
        ':IdEmpleado'=>$IdEmpleado
    ));
    $resultado=$buscar_id->fetch();
}else{
    header('Location: empleados_desactivar.php');
}
    if(isset($_POST['Guardar'])){
        $IdEmpleado = $_GET['IdEmpleado'];
        $Nombre = $_POST['Nombre'];
        $Fecha_Nacimiento = $_POST ['Fecha_Nacimiento'];
        $Estado_Civil = $_POST ['Estado_Civil'];
        $CURP = $_POST ['CURP'];
        $Telefono_1 = $_POST ['Telefono_1'];
        $Telefono_2 = $_POST ['Telefono_2'];
        $Telefono_3 = $_POST ['Telefono_3'];
        $Correo = $_POST ['Correo'];
        $Domicilio = $_POST ['Domicilio'];
        $Codigo_Postal = $_POST ['Codigo_Postal'];
        $Puesto = $_POST ['Puesto'];
        $Sueldo = $_POST ['Sueldo'];
        $Activo = $_POST ['Activo'];
        $IdSucursal = $_POST ['IdSucursal'];
    
                $consulta_insert=$con->prepare('UPDATE empleado SET
                Activo= 0
                WHERE IdEmpleado=:IdEmpleado;'
                );
                $consulta_insert ->execute(array(
                ':IdEmpleado' =>$IdEmpleado,
            ));
            header('Location:empleados_desactivar.php');
    
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
       <span class="nav__name"><h1>¿Deseas desactivar al empleado?</h1></span>

       <form action="" method="post">
            <a href="empleados_desactivar.php">   <img src="assets/img/cancelar.png" alt=""> </a>
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