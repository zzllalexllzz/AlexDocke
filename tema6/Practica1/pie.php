        </div>
    </div>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal Regalos-->
    <div class="modal fade" id="añadirRegalo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">NUEVO REGALO</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class='user' action='enrutador.php' method='POST'>
                        <div class='form-group'>
                            <input type='hidden' name='idUsuario' class='form-control' value="<?= unserialize( $_SESSION["usuario"])->getId() ?>">
                        </div>
                        <div class='form-group'>
                            <input type='text' name='nombre' class='form-control' placeholder='Nombre'>
                        </div>
                        <div class='form-group'>
                            <input type='text' name='destinatario' class='form-control' placeholder='Destinatario'>
                        </div>
                        <div class='form-group'>
                            <input type='number' name='precio' class='form-control' placeholder='Precio'>
                        </div>
                        <div class='form-group'>
                                <select name='estado' class='form-control '>
                                    <option selected>Estado</option>
                                    <option value='pendiente'>Pendiente</option>
                                    <option value='comprando'>Comprado</option>
                                    <option value='envuelto'>Envuelto</option>
                                    <option value='entregado'>Entregado</option>
                                </select>
                        </div>
                        <div class='form-group'>
                            <input type='text' name='anio' class='form-control' placeholder='Año'>
                        </div>

                        <input type='hidden' name='accion' value='crearRegalo'>
                        <button type='submit' class='btn btn-success btn-user btn-block'>
                            Crear Regalo
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Logout Modal Enlaces-->
    <div class="modal fade" id="añadirEnlace" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">NUEVO ENLACE</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class='user' action='enrutador.php' method='POST' enctype="multipart/form-data">
                        <div class='form-group'>
                            <input type='hidden' name='idRegalo' class='form-control' value='<?= $_GET["id"] ?>'>
                        </div>
                        <div class='form-group'>
                            <input type='text' name='nombre' class='form-control' placeholder='Nombre'>
                        </div>
                        <div class='form-group'>
                            <input type='text' name='web' class='form-control' placeholder='Enlace Web'>
                        </div>
                        <div class='form-group'>
                            <input type='number' name='precio' class='form-control' placeholder='Precio'>
                        </div>
                        <div class='form-group'>
                            <input type='file' name='imagen' class='form-control' placeholder=''>
                        </div>
                        <div class='form-group'>
                            <select name='prioridad' class='form-control '>
                                <option selected>Prioridad</option>
                                <option value='0'>Baja</option>
                                <option value='1'>Media</option>
                                <option value='2'>Alta</option>
                            </select>
                        </div>

                        <input type='hidden' name='accion' value='crearEnlace'>
                        <button type='submit' class='btn btn-success btn-user btn-block'>
                            Crear Regalo
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Logout Modal Cerrar Sesion-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">CERRAR SESIÓN</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">¿Esta seguro de salir de esta pagina y cerrar la sesión?.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="enrutador.php?accion=destroy">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="style/texturas/jquery/jquery.min.js"></script>
    <script src="style/texturas/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="style/texturas/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="style/js/sb-admin-2.min.js"></script>

</body>

</html>