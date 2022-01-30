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
    header('Location: inventario_buscar.php');
}

    if(isset($_POST['Guardar'])){
        $Articulo = $_POST['Articulo'];
        $Descripcion = $_POST ['Descripcion'];
        $Marca = $_POST ['Marca'];
        $Costo = $_POST ['Costo'];
        $Precio = $_POST ['Precio'];
        $Cantidad = $_POST ['Cantidad'];
        $IdProovedor = $_POST ['IdProovedor'];
        $IdSucursal = $_POST ['IdSucursal'];


                $consulta_insert=$con->prepare('UPDATE inventario SET
                Articulo=:Articulo,
				Descripcion=:Descripcion, 
                Marca=:Marca, 
                Costo=:Costo, 
                Precio=:Precio, 
                Cantidad=:Cantidad, 
                IdProovedor=:IdProovedor,
				IdSucursal=:IdSucursal
                WHERE IdInventario=:IdInventario;'
                );
                $consulta_insert ->execute(array(
                ':Articulo' =>$Articulo,
                ':Descripcion' =>$Descripcion,
                ':Marca' =>$Marca,
                ':Costo' =>$Costo,
                ':Precio' =>$Precio,
                ':Cantidad' =>$Cantidad,
                ':IdProovedor' =>$IdProovedor,
                ':IdSucursal' =>$IdSucursal,
                ':IdInventario' =>$IdInventario,
            ));
            header('Location:inventario_editar.php');
    
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

        <span class="nav__name"><h1>INVENTARIO / EDITAR</h1></span>

        <br><br>
     <form action="" method="post">
      <table>
      <!-- Fila 1  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Articulo" value="<?php if($resultado) echo $resultado['Articulo']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>ARTÍCULO</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Cantidad" value="<?php if($resultado) echo $resultado['Cantidad']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>CANTIDAD</label>
                    </div>
                </div>
            </td>
        </tr>
        <!-- Fila 2  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Descripcion" value="<?php if($resultado) echo $resultado['Descripcion']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>DESCRIPCIÓN</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Costo" value="<?php if($resultado) echo $resultado['Costo']; ?>" Class="input_text">
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
                    <input type="text" name="Marca" value="<?php if($resultado) echo $resultado['Marca']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>MARCA</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Precio" value="<?php if($resultado) echo $resultado['Precio']; ?>" Class="input_text">
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
                    <div>
					<label class="imagetitle">EMPRESA</label><br>
                    <input readonly="readonly" type="text" name="IdProovedor" value="<?php if($resultado) echo $resultado['IdProovedor']; ?>" Class="input_text">
                    </div>
                </div>
            </td>

            <td>
            <div class="wrapper">
                    <div>
					<label class="imagetitle">SUCURSAL</label><br>
                    <input readonly="readonly" type="text" name="IdSucursal" value="<?php if($resultado) echo $resultado['IdSucursal']; ?>" Class="input_text">
                    </div>
                </div>

            </td>
        </tr>
        
      </table>
      <br><br><br>
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀  ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀ <a href="inventario_editar.php">   <img src="assets/img/cancelar.png" alt=""> </a>
            <input type="submit"  value="" name="Guardar" id="boton4" style='width:205px; height:52px'> 
      
      
      </form>

        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/input.js"></script>
    </body>
</html>