<?php
include ("conexion.php");
    
    if(isset($_POST['Guardar'])){
        $IdCliente = $_POST['IdCliente'];
        $IdSucursal = $_POST ['IdSucursal'];
        $IdClienteVehiculo = $_POST ['IdClienteVehiculo'];
        $Fechapropuesta = $_POST ['Fechapropuesta'];
        $Observaciones = $_POST ['Observaciones'];
 
                $consulta_insert=$con->prepare('INSERT INTO orden(IdCliente, IdSucursal, IdClienteVehiculo, Fechapropuesta, Observaciones, Activo) VALUES 
                (:IdCliente, :IdSucursal, :IdClienteVehiculo, :Fechapropuesta, :Observaciones, 1)');
                $consulta_insert ->execute(array(
                ':IdCliente' =>$IdCliente,
                ':IdSucursal' =>$IdSucursal,
                ':IdClienteVehiculo' =>$IdClienteVehiculo,
                ':Fechapropuesta' =>$Fechapropuesta,
                ':Observaciones' =>$Observaciones
            ));
            header('Location:presupuesto.php');   
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
        <body id="body-pd">
        <?php
            include "leftsidebar.php";
            leftsidebar();
        ?>
        
        <span class="nav__name"><h1>PRESUPUESTO</h1></span>       
        <br><br>
        <!-- Fila 1  -->
        <form action="" method="post">
        <table>
        <!-- Fila 1  -->
        <tr>
        <td>
            <div class="wrapper">
                    <div class="">
                        <label class="imagetitle">CLIENTE</label><br>
						<select name="IdCliente" class="combo">
                        <?php
                        include ("conexion.php");
                        $sql = "Select IdCliente,Nombre From Cliente where activo = 1 order by IdCliente";
                        $stmt= $con->prepare($sql);
                        $result = $stmt->execute();
                        $rows=$stmt->fetchALL(\PDO::FETCH_OBJ);
                        
                        foreach ($rows as $row) {
                            ?>  
                                 <option value="<?php print ($row->IdCliente); ?>"><?php print ($row->Nombre); ?></option>
                            <?php
                            }
                        ?>
                        
						</select>
                        </div>
                </div>
            </td>
            <td>
            <div class="wrapper">
                    <div class="">
                        <label class="imagetitle">SUCURSAL</label><br>
						<select name="IdSucursal" class="combo">
                        <?php
                        include ("conexion.php");
                        $sql = "Select IdSucursal,Nombre From sucursal order by IdSucursal";
                        $stmt= $con->prepare($sql);
                        $result = $stmt->execute();
                        $rows=$stmt->fetchALL(\PDO::FETCH_OBJ);
                        
                        foreach ($rows as $row) {
                            ?>  
                                 <option value="<?php print ($row->IdSucursal); ?>"><?php print ($row->Nombre); ?></option>
                            <?php
                            }
                        ?>
						</select>
                        </div>
                </div>
            </td>
        </tr>  
        <!-- Fila 2  -->
        <tr>
            <td>
            <div class="wrapper">
                    <div class="">
                        <label class="imagetitle">FECHA</label><br>
						<input type="date" name="Fechapropuesta" Class="input_text" required>
                    </div>
                </div>
            </td>
            <td>
            <div class="wrapper">
                    <div class="">
                        <label class="imagetitle">VEHÍCULO</label><br>
						<select name="IdClienteVehiculo" class="combo">
                        <?php
                        include ("conexion.php");
                        $sql = "Select IdClienteVehiculo,DescripcionVehiculo From vehiculo where activo=1 order by IdClienteVehiculo";
                        $stmt= $con->prepare($sql);
                        $result = $stmt->execute();
                        $rows=$stmt->fetchALL(\PDO::FETCH_OBJ);
                        
                        foreach ($rows as $row) {
                            ?>  
                                 <option value="<?php print ($row->IdClienteVehiculo); ?>"><?php print ($row->DescripcionVehiculo); ?></option>
                            <?php
                            }
                        ?>
                        
						</select>
                        </div>
                </div>
            </td>
        </tr>
        <!-- Fila 3  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="">
                        <label class="imagetitle">CONCEPTO</label><br>
						<textarea name="Observaciones" rows="5" cols="50"></textarea>
                    </div>
                </div>
    
            </td>
        </tr>
        </TABLE>
        <BR><BR><BR>
        ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀<a href="presupuesto.php">   <img src="assets/img/cancelar.png" alt=""> </a>
            <input type="submit"  value="" name="Guardar" id="boton4" style='width:205px; height:52px'> 
             
        </form>                    

        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/input.js"></script>
    </body>
</html>