<?php

ob_get_clean();
require('./util/tfpdf/tfpdf.php');
define("_SYSTEM_TTFONTS", "C:/Windows/Fonts/");

$pdf = new tFPDF();
$pdf->AddFont('DejaVu','','DejaVuSans.ttf',true);
$pdf->AddPage();
$pdf->SetTitle('Reçu CERFA don',true);
$pdf->SetFont('DejaVu','',14);
$pdf->SetFillColor(210,210,200);
$pdf->SetFont('DejaVu','',12);
// Logo
$pdf->Image('./images/cerfa.png',10,6,30);
// Police Arial gras 15
$pdf->SetFont('DejaVu','',13);
// Décalage à droite
$pdf->Cell(90);
// Titre
$pdf->Cell(30,10,'Reçu au titre des dons à certains organismes d\'intérêt général',0,0,'C');
// Saut de ligne
$pdf->Ln(20);
$pdf->SetFont('DejaVu','',12);
//n° CERFA
$pdf->Cell(30,10,'N° 115080*02',0,0,'C');
// Décalage à droite
$pdf->Cell(120);
// Numero du recu
$pdf->Cell(30,10,'Numero d\'orde du reçu:',0,1,'C');
$pdf->Cell(150);
$pdf->SetFont('DejaVu','',14);
$pdf->Cell(30,10,$numrecu,1,1,'C');



$pdf->Cell(190, 8, "Bénéficiaire des versements", 1, 1, "C", true);
$pdf->SetFont('DejaVu','',12);
$pdf->MultiCell(190,5, "\nNom ou dénomination : \n".$nomclub."\n
Adresse : \n".$adresseclub." \n
                                       Oeuvre ou organisme d'intérêt général \n ", 1, "L", false);
$pdf->SetFont('DejaVu','',14);
$pdf->SetFillColor(210,210,200);
$pdf->Cell(190, 8, "Donateur", 1, 1, "C", true);
$pdf->SetFont('DejaVu','',12);
$pdf->MultiCell(190,8, "\nNom : ".$nom." \nAdresse :".$adresse." \nCode postal : ".$cp."     Commune : ".$ville." \n ", 1, "L", false);
$pdf->MultiCell(190,8, "\nLe bénéficiaire reconnait avoir reçu au titre des versements ouvrant droit à réduction d'impôt, la somme de :  \n
Somme en toute lettre : ".$totalEnLettre." euros \n
Date du paiement : ".$date."\n
Motif du versement : Autres \n                                                                               Date et signature: \n\n ", 1, "L", false);

$pdf->SetFont('DejaVu','',14);
$pdf->Output();

?>
