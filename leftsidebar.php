<?php

    function leftsidebar(){

        echo '
        
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <title>INICIO</title>
    </head>
    <body id="body-pd">
        <div class="l-navbar" id="navbar">
            <nav class="nav">
                <div>
                    <div class="nav__brand">
                        <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
                       			   
                        <a href="#" class="nav__logo"></a>
                    </div>
                    <div class="nav__list">
                        <a href="index.php" class="nav__link active">
                            <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">INICIO</span>
                        </a>

<br><br>
                        <div  class="nav__link collapse">
                            <ion-icon name="car-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">VENTAS</span>
                            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>
                            <ul class="collapse__menu">
                                
                                <div  class="nav__link collapse">
                                    <ion-icon name="folder-outline" class="nav__icon"></ion-icon>
                                    <span class="nav__name"> <a href="clientes.php" class="collapse__sublink"> CLIENTE </a></span>
                                    <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>    
                                    <ul class="collapse__menu">
                               
                                <a href="clientes_buscar.php" class="collapse__sublink">Buscar</a>
                                <a href="clientes_desactivar.php" class="collapse__sublink">Desactivar</a>

                            </ul>
                            </div>
							
							                <div  class="nav__link collapse">
                    <ion-icon name="folder-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name"><a href="vehiculo.php" class="collapse__sublink">VEHICULO CLIENTE</a></span>
                    <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>    
                    <ul class="collapse__menu">
                          
                            <a href="vehiculo_buscar.php" class="collapse__sublink">Buscar</a>
                            <a href="vehiculo_desactivar.php" class="collapse__sublink">Desactivar</a>
            </ul>
            </div>
			
			                        <div  class="nav__link collapse">
                            <ion-icon name="folder-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name"><a href="orden.php" class="collapse__sublink">ORDEN</a></span>
                            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>    
                            <ul class="collapse__menu">
                               
                                <a href="orden_buscar.php" class="collapse__sublink">Buscar</a>
                                <a href="orden_desactivar.php" class="collapse__sublink">Desactivar</a>
                    </ul>
                    </div>
			
							
                            <div  class="nav__link collapse">
                                <ion-icon name="folder-outline" class="nav__icon"></ion-icon>
                                <span class="nav__name"><a href="presupuesto.php" class="collapse__sublink">PRESUPUESTO</a></span>
                                <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>    
                                <ul class="collapse__menu">
                          
                            <a href="presupuesto_buscar.php" class="collapse__sublink">Buscar</a>
                            <a href="presupuesto_desactivar.php" class="collapse__sublink">Desactivar</a>
                        </ul>
                        </div>


                    <div  class="nav__link collapse">
                        <ion-icon name="folder-outline" class="nav__icon"></ion-icon>
                        <span class="nav__name"><a href="cobranza.php" class="collapse__sublink">COBRANZA</a></span>
                        <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>    
                        <ul class="collapse__menu">
                        
                            <a href="cobranza_buscar.php" class="collapse__sublink">Buscar</a>
                           
                </ul>
                </div>



                           
                        </div>

                        <div  class="nav__link collapse">
                            <ion-icon name="clipboard-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">REGISTROS</span>
                            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>
                            <ul class="collapse__menu">
                                
                                <div  class="nav__link collapse">
                                    <ion-icon name="folder-outline" class="nav__icon"></ion-icon>
                                    <span class="nav__name"><a href="proveedor.php" class="collapse__sublink">PREOVEEDOR</a></span>
                                    <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>    
                                    <ul class="collapse__menu">
                                     
                                        <a href="proveedor_buscar.php" class="collapse__sublink">Buscar</a>
                                        <a href="proveedor_desactivar.php" class="collapse__sublink">Desactivar</a>
                                    </ul>
                                </div>

                            <div  class="nav__link collapse">
                                <ion-icon name="folder-outline" class="nav__icon"></ion-icon>
                                <span class="nav__name"><a href="inventario.php" class="collapse__sublink">INVENTARIO</a></span>
                                <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>    
                                <ul class="collapse__menu">
                                  
                                    <a href="inventario_buscar.php" class="collapse__sublink">Buscar</a>
                                    <a href="inventario_desactivar.php" class="collapse__sublink">Desactivar</a>
                        </ul>
                        </div>

                        <div  class="nav__link collapse">
                            <ion-icon name="folder-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name"><a href="empleados.php" class="collapse__sublink">EMPLEADOS</a></span>
                            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>    
                            <ul class="collapse__menu">
                             
                                <a href="empleados_buscar.php" class="collapse__sublink">Buscar</a>
                                <a href="empleados_desactivar.php" class="collapse__sublink">Desactivar</a>
                    </ul>
                    </div>

                            </ul>
                        </div>

                        <div class="nav__link collapse">
                  
                            <ion-icon name="newspaper-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">AGREGAR ADMINISTRADOR</span>

                            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                            <ul class="collapse__menu">
                                <a href="crearcuenta.php" class="collapse__sublink">CONFIGURACION</a>
                          
                            </ul>
                        </div>
<br><br>
                        <div class="nav__link collapse">
                  
                            <ion-icon name="create-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">NOTAS</span>

                            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                            <ul class="collapse__menu">
                                <a href="notas/index1.php" target="_blank" class="collapse__sublink">AGREGAR NOTA</a>
                          
                            </ul>
                        </div>
						
						
					     <div class="nav__link collapse">
                  
                            <ion-icon name="browsers-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">TRELLO</span>

                            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                            <ul class="collapse__menu">
                                <a href="trello/index.html" target="_blank" class="collapse__sublink">USAR TRELLO</a>
                          
                            </ul>
                        </div>
						

                    </div>
                </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <a href="ayuda.php" class="nav__link">
                    <ion-icon name="help-circle-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">AYUDA</span></a>
                </a>
            </nav>
        </div>
        
        ';
    }


?>