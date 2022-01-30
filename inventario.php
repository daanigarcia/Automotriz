<?php
include ("conexion.php");
    
    if(isset($_POST['Guardar'])){
        $Articulo = $_POST['Articulo'];
        $Descripcion = $_POST ['Descripcion'];
        $Marca = $_POST ['Marca'];
        $Costo = $_POST ['Costo'];
        $Precio = $_POST ['Precio'];
        $Cantidad = $_POST ['Cantidad'];
        $IdProovedor = $_POST ['IdProovedor'];
        $IdSucursal = $_POST ['IdSucursal'];
    
        if(!empty($Articulo) && !empty($Costo) && !empty($Precio)){
                $consulta_insert=$con->prepare('INSERT INTO Inventario(Articulo, Descripcion, Marca, Costo, Precio, Cantidad, IdProovedor, IdSucursal, Activo) VALUES 
                (:Articulo, :Descripcion, :Marca, :Costo, :Precio, :Cantidad, :IdProovedor, :IdSucursal, 1)');
                $consulta_insert ->execute(array(
                ':Articulo' =>$Articulo,
                ':Descripcion' =>$Descripcion,
                ':Marca' =>$Marca,
                ':Costo' =>$Costo,
                ':Precio' =>$Precio,
                ':Cantidad' =>$Cantidad,
                ':IdProovedor' =>$IdProovedor,
                ':IdSucursal' =>$IdSucursal,
            ));
            header('Location:inventario.php');
        } else{
            echo "<script> alert('Los campos estan vacios');</script>";
        }
    
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
        <link rel="stylesheet" href="assets/css/botones.css">
        <?php
            include "leftsidebar.php";
            leftsidebar();
        ?>

        <span class="nav__name"><h1>INVENTARIO</h1></span>

        <br><br>
      <form action="" method="post">
      <table>
      <!-- Fila 1  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Articulo" Class="input_text" required>
                        <div class="underline"></div>
                        <label>ARTÍCULO</label>
                    </div>
                </div>
            </td>

            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Marca" Class="input_text" required>
                        <div class="underline"></div>
                        <label>MARCA</label>
                    </div>
                </div>
            </td>
        </tr>
        <!-- Fila 2  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Descripcion" Class="input_text" required>
                        <div class="underline"></div>
                        <label>DESCRIPCIÓN</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Costo" Class="input_text" required>
                        <div class="underline"></div>
                        <label>COSTO</label>
                    </div>
                </div>
            </td>
        </tr>
        <!-- Fila 3  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Cantidad" Class="input_text" required>
                        <div class="underline"></div>
                        <label>CANTIDAD</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Precio" Class="input_text" required>
                        <div class="underline"></div>
                        <label>PRECIO LISTA</label>
                    </div>
                </div>
            </td>
        </tr>
        <!-- Fila 4  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="">
                        <label class="imagetitle">PROVEEDOR</label><br>
				<select name="IdProovedor" class="combo">
                     <?php
                        include ("conexion.php");
                        $sql = "Select * From proovedor where activo = 1";
                        $stmt= $con->prepare($sql);
                        $result = $stmt->execute();
                        $rows=$stmt->fetchALL(\PDO::FETCH_OBJ);
                        
                        foreach ($rows as $row) {
                            ?>  
                                 <option value="<?php print ($row->IdProovedor); ?>"><?php print ($row->NombreEmpresa); ?></option>
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
      </table>
      <br><br>
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀  <a href="inventario.php">   <img src="assets/img/cancelar.png" alt=""> </a>
            <input type="submit"  value="" name="Guardar" id="boton4" style='width:205px; height:52px'> 
      
      
      </form>



        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/input.js"></script>
    </body>
</html>