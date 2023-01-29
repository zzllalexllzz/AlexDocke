<?php 
class  VistaArticuloForm{

    public static function render(){
        include_once("./cabecera.php");
        ?>
            <div class="mt-5">
                <h5 class="text-center">Introduzca el articulo que busca</h5>
                <form action="enrutador.php" method="post">
                    <center>
                    <div class="input-group w-50 align-content-center">
                        <textarea class="form-control border border-5 border-info" aria-label="With textarea" rows="20" cols="80" name="articulo" required></textarea>
                    </div>
                </center>
                    <input type="hidden" name="accion" value="crearArticulo">
                    <center> <button type="submit" class="btn btn-outline-success mt-5 mb-3">GENERAR ARTICULO</button></center>
                    </form>
            </div>
        <?php 
        include_once("./pie.php");
    }
}

?>