<?php
// Vérifie si le formulaire pour générer le CV1 est soumis
if (isset($_POST['CV1'])) {
    // Appelle la fonction pdfGenerator avec le modèle 'CV1'
    pdfGenerator('CV1');
}

// Vérifie si le formulaire pour générer le CV2 est soumis
if (isset($_POST['CV2'])) {
    // Appelle la fonction pdfGenerator avec le modèle 'CV2'
    pdfGenerator('CV2');
}

// Vérifie si le formulaire pour générer le CV3 est soumis
if (isset($_POST['CV3'])) {
    // Appelle la fonction pdfGenerator avec le modèle 'CV3'
    pdfGenerator('CV3');
}

// Fonction pour générer un fichier PDF à partir d'un modèle
function pdfGenerator($template)
{
    // Inclut la bibliothèque Dompdf
    require_once 'uploads/dompdf/autoload.inc.php';

    // Crée une nouvelle instance de Dompdf
    $dompdf = new Dompdf();

    // Capture la sortie HTML générée par l'inclusion du modèle
    ob_start();
    include "../Front/Template/" . $template;
    $html = ob_get_clean();

    // Charge le HTML dans Dompdf
    $dompdf->loadHtml($html);

    // Définit le format du papier et l'orientation (portrait)
    $dompdf->setPaper('A4', 'portrait');

    // Rend le PDF
    $dompdf->render();

    // Affiche le PDF dans le navigateur avec le nom de fichier 'cv.pdf'
    $dompdf->stream('cv.pdf');
}
?>
