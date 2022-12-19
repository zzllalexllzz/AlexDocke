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
    <!-- Logout Modal Partidas-->
    <div class="modal fade" id="anadirPartida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">NUEVO PARTIDA</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class='user' action='enrutador.php' method='POST'>
                        <div class='form-group'>
                            <input type='date' name='fecha' class='form-control' placeholder='Fecha'>
                        </div>
                        <div class='form-group'>
                            <input type='text' name='hora' class='form-control' placeholder='Hora'>
                        </div>
                        <div class='form-group'>
                            <input type='text' name='ciudad' class='form-control' placeholder='Ciudad'>
                        </div>
                        <div class='form-group'>
                            <input type='text' name='lugar' class='form-control' placeholder='Lugar'>
                        </div>
                        <div class='form-group'>
                                <select name='cubierto' class='form-control '>
                                    <option value='si'>Cubierto</option>
                                    <option value='no'>No Cubierto</option>
                                </select>
                        </div>
                        <div class='form-group'>
                            <input type='hidden' name='estado' value="abierta" >
                        </div>

                        <input type='hidden' name='accion' value='crearPartida'>
                        <button type='submit' class='btn btn-success btn-user btn-block'>
                            Crear Partida
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