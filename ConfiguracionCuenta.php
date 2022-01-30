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




        <ion-icon name="home-outline" class="nav__icon"></ion-icon>
        <span class="nav__name"><h1>CONFIGURACION DE LA CUENTA</h1></span>

        <br><br>
      <form action="" method="post">
      <table>
      <!-- Fila 1  -->
        <tr>
            <td>
                <div class="wrapper"> <div class="input-data">
                        <input type="text" name="Nombre" Class="input_text" required>
                        <div class="underline"></div>
                        <label>NOMBRE</label> 
                </div></div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Telefono" Class="input_text" required>
                        <div class="underline"></div>
                        <label>TELEFONO</label>
                    </div>
                </div>
            </td>
        </tr>
        <!-- Fila 2  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Direccion" Class="input_text" required>
                        <div class="underline"></div>
                        <label>PERSONA DE CONTACTO</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Celular" Class="input_text" required>
                        <div class="underline"></div>
                        <label>CELULAR</label>
                    </div>
                </div>
            </td>
        </tr>
        <!-- Fila 3  -->
        <tr>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="RFC" Class="input_text" required>
                        <div class="underline"></div>
                        <label>DIRECCION</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="wrapper">
                    <div class="input-data">
                        <input type="text" name="Correo" Class="input_text" required>
                        <div class="underline"></div>
                        <label>CORREO ELECTRONICO</label>
                    </div>
                </div>
            </td>
        </tr>
      </table>
      </form>


      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀   <a href="proveedor.php">   <img src="assets/img/cancelar.png" alt=""> </a>
            <input type="submit"  value="" name="Guardar" id="boton4" style='width:205px; height:52px'> 
      


        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/input.js"></script>
    </body>
</html>