<div class="col-12 p-0">
        <header>
          <nav class="navbar navbar-expand-lg navbar-dark barraNavegacion">
            <a class="navbar-brand" href="index.php"><img class="logo-barra" src="images/digitalTurismoLogoBlanco.png" alt="logo"> </a>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon menu-hamburguesa"></span>
            </button>
            
            <div class="collapse navbar-collapse div-barralinks" id="navbarSupportedContent">
              <ul class="navbar-nav contenedor-links">
                <li class="nav-item items-barra">
                  <a class="nav-link" href="index.php"><i class="fas fa-home"></i><p>HOME</p></a>
                </li>
                <li class="nav-item items-barra">
                  <a class="nav-link" href="faq.php"><i class="far fa-question-circle"></i><p>FAQ</p></a>
                </li>
                <li class="nav-item items-barra">
                  <a class="nav-link" href="productos.php"><i class="fas fa-suitcase"></i><p>DESTINOS</p></a>
                </li>
              </ul>
              
              <?php if(!isset($_SESSION["nombre_usuario"])): ?>
              <a href="login.php"><button class="btn my-2 my-sm-0 boton-ingreso" type="submit"><i class="fas fa-user"></i>INGRESAR</button></a>
              <?php else : ?>
                <ul class="navbar-nav ml-md-auto">
									<li class="nav-item dropdown ">
										 <a class="nav-link dropdown-toggle boton-ingreso p-2 d-flex justify-content-center align-items-center text-uppercase text-white" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown"><?= $_SESSION["nombre_usuario"] ?></a>
										<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <?php if ($_SESSION["email"] == "admin@admin.com" ): ?>
                      <a class="dropdown-item" href="adminIndex.php">Mi perfil</a>
                    <?php else: ?>
                        <a class="dropdown-item" href="user.php">Mi perfil</a>
                    <?php endif; ?>
											

											  <div class="dropdown-divider"></div>
											 
											 <a class="dropdown-item" href="logout.php">Salir</a>
										</div>
									</li>
								</ul>
              <?php endif; ?> 

            </div>
          </nav>
        </header> 
</div>