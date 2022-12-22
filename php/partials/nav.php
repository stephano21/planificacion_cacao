<nav class="navbar bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
        </a>
        <div class="navbar-brand">
            <h1>k</h1>
        </div>
    </div>

    <!-- off canvvas -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container-menu">
                <div class="cont-menu">
                    <nav>
                        <a href="modulo_registro.php">Inicio</a>
                        <a href="formulario_productos.php">Registro de productos</a>
                        <a href="formulario_planificacion.php">Registro de planificación</a>
                        <a href="formulario_insumos.php?plan_codigo=0">Registro de insumos</a>
                        <a href="formulario_terreno.php">Registro de Terreno</a>


                        <a href="formulario_cosecha.php">Registro de cosecha</a>

                        <a href="reportes.php">Reportes de la producción</a>
                        <br><br><br><br><br><br>
                        <a href="resetcontra.php">Cambiar contraseña</a>
                        <a href="cerrarsesion.php">Cerrar Sesion</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</nav>