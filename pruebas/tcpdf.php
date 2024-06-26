<?php

global $pdo;
// Include the main TCPDF library (search for installation path).
require_once('../app/templeates/TCPDF-main/tcpdf.php');
include('../app/config.php');

// cargar el encabezado
$query_informaciones = $pdo->prepare("SELECT * FROM tb_informaciones WHERE estado = '1'");
$query_informaciones->execute();
$informaciones = $query_informaciones->fetchAll(PDO::FETCH_ASSOC);
$contador_informaciones = 0;
foreach ($informaciones as $informacione) {
    $contador_usuario = $contador_informaciones + 1;
    $id_informacion = $informacione['id_informacion'];
    $nombre_parqueo = $informacione['nombre_parqueo'];
    $actividad_empresa = $informacione['actividad_empresa'];
    $sucursal = $informacione['sucursal'];
    $direccion = $informacione['direccion'];
    $zona = $informacione['zona'];
    $telefono = $informacione['telefono'];
    $provincia = $informacione['provincia'];
    $pais = $informacione['pais'];
}

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(79,80), true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Nicola Asuni');
$pdf->setTitle('TCPDF Example 002');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(5, 5, 5);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, 5);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('Helvetica', '', 7);

// add a page
$pdf->AddPage();



// create some HTML content
$html = '
<div>
    <P style="text-align: center">
        <b>'.$nombre_parqueo.'</b><br>
        '.$actividad_empresa.' <br>
        SUCURSAL No '.$sucursal.' <br>
        '.$direccion.' <br>
        ZONA: '.$zona.' <br>
        TELÉFONO: '.$telefono.' <br>
        '.$provincia.' - '.$pais.' <br>
        ---------------------------------------------------------------------------------
        <div style="text-align: left;">
            <b>DATOS DEL CLIENTE</b> <br>
            <b>SEÑOR/A:</b> DIEGO TRINIDAD <br>
            <b>DNI.:</b> 20365778 <br>
            --------------------------------------------------------------------------------- <br>
            <b>Cuvículo de paqueo:</b> 10    <br>
            <b>Fecha de ingreso:</b> 12/03/2024 <br>
            <b>Hora de ingreso:</b> 15:38 <br>
            --------------------------------------------------------------------------------- <br>
            <b>USUARIO:</b> MORRONE PABLO
        </div>
    </P>
</div>
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');





//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
