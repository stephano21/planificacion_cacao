<nav class="navbar sticky-top " style="background-color: #A78B6D;">
    <div class="container-fluid">
        <a class="navbar-brand" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
        </a>
        <div class="navbar-brand">
            <a href="/home"><img src="../static/img/logo.jpg" height="60" width="60" class="rounded-circle"></a>
        </div>
    </div>

    <!-- off canvvas -->
    <div class="offcanvas offcanvas-start" style="background-color: #A78B6D;" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <a href="/home"><img src="../static/img/logo.jpg" height="60" width="60" class="rounded-circle"></a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body ">
            <div class="container-menu">
                <div class="cont-menu">
                    <ul class="dropdown-menu show row">
                        <li style="margin: 1px 150px;"><a href="/home" class="dropdown-item"></a></li>
                        <li><a href="/home" class="dropdown-item">Inicio </a></li>
                        <li><a href="/planificacion" class="dropdown-item">Planificación</a></li>
                        <li><a href="/produccion" class="dropdown-item">Produccion</a></li>



                        <br><br><br><br><br><br><br><br><br><br><br><br>
                        <!-- <ul><a href="resetcontra.php">Cambiar contraseña</a></ul> -->
                        <li><a href="../php/scripts/close.php" class="dropdown-item">Cerrar Sesion</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>