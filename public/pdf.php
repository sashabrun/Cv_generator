<?php
if (isset($_POST['CV1'])) {
    pdfGenerator('CV1');
}
if (isset($_POST['CV2'])) {
    pdfGenerator('CV2');
}
if (isset($_POST['CV3'])) {
    pdfGenerator('CV3');
}
use dompdf\vendor\dompdf\dompdf\src\Dompdf;

function pdfGenerator($template)
{
    require_once 'uploads/dompdf/autoload.inc.php';

    $dompdf = new Dompdf();
    ob_start();
    include "../Front/Template/" . $template;
    $html = ob_get_clean();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream('cv.pdf');
}
?>