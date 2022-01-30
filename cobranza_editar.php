<?php
include ("conexion.php");

if(isset($_GET['IdCobranza'])){
    $IdCobranza=(int) $_GET['IdCobranza'];

    $buscar_id=$con->prepare('SELECT * FROM cobranza WHERE IdCobranza=:IdCobranza LIMIT 1');
    $buscar_id->execute(array(
        ':IdCobranza'=>$IdCobranza
    ));
    $resultado=$buscar_id->fetch();
}else{
    header('Location: cobranza_buscar.php');
}

    if(isset($_POST['Guardar'])){
        $IdOrden = $_POST ['IdOrden'];
	    $TipodePago = $_POST ['TipodePago'];
        $FechaPago = $_POST['FechaPago'];
        $Total = $_POST ['Total'];


                $consulta_insert=$con->prepare('UPDATE cobranza SET
                IdOrden=:IdOrden,
				TipodePago=:TipodePago, 
                FechaPago=:FechaPago, 
                Total=:Total
                WHERE IdCobranza=:IdCobranza;'
                );
                $consulta_insert ->execute(array(
                ':IdOrden' =>$IdOrden,
                ':TipodePago' =>$TipodePago,
                ':FechaPago' =>$FechaPago,
                ':Total' =>$Total,
                ':IdCobranza' =>$IdCobranza,
            ));
            header('Location:cobranza_editar.php');
    
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

        <span class="nav__name"><h1>COBRANZA / EDITAR</h1></span>

        <br><br>
        <form action="" method="post">
        <table>
        <tr>
            <td>
                <div class="wrapper">
                    <div>
					<label class="imagetitle">ORDEN</label><br>
                    <input readonly="readonly" type="text" name="IdOrden" value="<?php if($resultado) echo $resultado['IdOrden']; ?>" Class="input_text">
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="">
                        <label class="imagetitle">FECHA DE PAGO</label><br>
						<input type="date" name="FechaPago" value="<?php if($resultado) echo $resultado['FechaPago']; ?>" Class="input_text">
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="TipodePago" value="<?php if($resultado) echo $resultado['TipodePago']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>TIPO DE PAGO</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                    <input type="text" name="Total" value="<?php if($resultado) echo $resultado['Total']; ?>" Class="input_text">
                        <div class="underline"></div>
                        <label>TOTAL FINAL</label>
                    </div>
                </div>
            </td>
        </tr>
        </table>
        <br><br><br><br><br><br><br><br><br><br>

        ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀  <a href="cobranza_editar.php">   <img src="assets/img/cancelar.png" alt=""> </a>
            <input type="submit"  value="" name="Guardar" id="boton4" style='width:205px; height:52px'> 
      
        </form>

        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/input.js"></script>
    </body>
</html>