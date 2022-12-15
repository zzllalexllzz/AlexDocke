<?php
class ControladorUsuario{

    //metodo que muestra el formulario del loguin
    public static function loginUser(){
        VistaUserFormulario::render("");
    }

    //metodo que muestra el formulario con el error del usuario
    public static function loginUserError() {
        $mensaje = "Error de login, prueba otra vez";
        VistaUserFormulario::render($mensaje);
    }

    //metodo que comprueba que el usuario existe el al base de datos
    public static function chequearLogin($login){
        $usuario = null;
        $valido = UsuariosBD::chequearLogin($login, $usuario);

        //Error login
        if ($valido == 0) {
            echo "<script>window.location='enrutador.php?accion=error';</script>";
        }

        //Login correcto
        if ($valido == 1) {
            $_SESSION['usuario'] = serialize($usuario);
            echo "<script>window.location='enrutador.php?accion=mostrarRegalos';</script>";
        }
    }

    //metodo para generar un pdf de los regalos y sus enlaces.
    public static function generarPdf($id) {

        $regalos = RegalosBD::getRegalos($id);
        $enlaces = EnlacesBD::todosEnlaces();
        //Load Composer's autoloader
        require './vendor/autoload.php';
            // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('Alexander Barahona');
        $pdf->setTitle('Regalos de Navidad');
        $pdf->setSubject('Regalos');
        $pdf->setKeywords('PDF, PDF,regalos');


        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->setFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $pdf->setFont('dejavusans', '', 12, '', true);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

        // set text shadow effect
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

        // Set some content to print
        $pdf->SetFont('dejavusans', 'B', 24);
        $pdf->Cell(0, 10, 'Base de Datos de Regalos', 0, 1);
        $pdf->ln();

        $pdf->setFont('dejavusans', '', 12, '', true);

        //muestra los regalos con sus enlaces  en forma de lista
            $html= "<dl>";
            foreach ($regalos as $regalo) {
                $html.="<dt>".$regalo->getId()." - ".$regalo->getNombre()." - ".$regalo->getDestinatario()." - ".$regalo->getPrecio()." - ".$regalo->getEstado()." - ".$regalo->getAnio()."</dt>";
                foreach ($enlaces as $enlace) {
                    if ($regalo->getId() == $enlace->getIdRegalo()) {
                        $html.="<dd>".$enlace->getIdRegalo()." - ".$enlace->getNombre()." - ".$enlace->getWeb()." - ".$enlace->getPrecio()." - ".$enlace->getPrioridad()."</dd>";
                    }
                }
            }
            $html.= "</dl>";


        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // ---------------------------------------------------------

        echo "Generando ...";

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $flujo = $pdf->Output('RegalosDeNavidad.pdf', 'S');
        file_put_contents("RegalosDeNavidad.pdf", $flujo);

        echo "Generado.";

        //============================================================+
        // END OF FILE
        //============================================================+
        echo "<script>window.location='enrutador.php?accion=mostrarRegalos';</script>";
    }
}
?>