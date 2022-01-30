<?php
include ("conexion.php");
    
    if(isset($_POST['Guardar'])){
        $IdOrden = $_POST ['IdOrden'];
	    $TipodePago = $_POST ['TipodePago'];
        $FechaPago = $_POST['FechaPago'];
        $Total = $_POST ['Total'];
    
                $consulta_insert=$con->prepare('INSERT INTO cobranza(IdOrden, TipodePago, FechaPago, Total) VALUES 
                (:IdOrden, :TipodePago, :FechaPago, :Total)');
                $consulta_insert ->execute(array(
                ':IdOrden' =>$IdOrden,
                ':TipodePago' =>$TipodePago,
                ':FechaPago' =>$FechaPago,
                ':Total' =>$Total
            ));
        header('Location:Cobranza.php');
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
        
        <span class="nav__name"><h1>COBRANZA</h1></span>

        <br><br>
        <form action="" method="post">
        <table>
        <tr>
            <td>
                <div class="wrapper">
                    <div class="">
                        <label class="imagetitle">ORDEN</label><br>
						<select name="IdOrden" class="combo">
                        <?php
                        include ("conexion.php");
                        $sql = "Select IdOrden From orden where ActivoOrden = 1 order by IdOrden";
                        $stmt= $con->prepare($sql);
                        $result = $stmt->execute();
                        $rows=$stmt->fetchALL(\PDO::FETCH_OBJ);
                        
                        foreach ($rows as $row) {
                            ?>  
                                 <option value="<?php print ($row->IdOrden); ?>"><?php print ($row->IdOrden); ?></option>
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
                        <label class="imagetitle">FECHA DE PAGO</label><br>
						<input type="date" name="FechaPago" Class="input_text" required>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="TipodePago" Class="input_text" required>
                        <div class="underline"></div>
                        <label>TIPO DE PAGO</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Total" Class="input_text" required>
                        <div class="underline"></div>
                        <label>TOTAL FINAL</label>
                    </div>
                </div>
            </td>
        </tr>
        </table>
        <br><br><br><br><br><br><br><br><br><br>

        ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀  <a href="cobranza.php">   <img src="assets/img/cancelar.png" alt=""> </a>
            <input type="submit"  value="" name="Guardar" id="boton4" style='width:205px; height:52px'> 
      
        </form>


            <!-- ===== IONICONS ===== -->
            <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/input.js"></script>
    </body>
</html>