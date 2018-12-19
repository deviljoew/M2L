<?php

ob_get_clean();
require('./util/tfpdf/tfpdf.php');
define("_SYSTEM_TTFONTS", "C:/Windows/Fonts/");

$pdf = new tFPDF();
//$pdf->AddFont('DejaVu','','DejaVuSans.ttf',true);
$pdf->AddPage();
$pdf->SetTitle('Recu CERFA don',true);
$pdf->SetFont('Arial','',11);
$pdf->SetFillColor(210,210,210);
$pdf->SetFont('Arial','',9);

  // Logo
  $pdf->Ln(5);
  $pdf->Image('./images/cerfa.png',10,11,30);
  // Police Arial gras 15
  $pdf->SetFont('Arial','B',11);
  // Décalage à droite
  $pdf->Cell(90);
  // Titre
  $pdf->Cell(20,10,'Recu au titre des dons a certains organismes d\'interet general',0,0,'C');
  // Saut de ligne
  $pdf->Ln(20);

  $pdf->SetFont('Arial','',9);
  //n° CERFA
  $pdf->Cell(30,10,'N 115080*02',0,0,'C');
  // Décalage à droite
  $pdf->Cell(120);
  // Numero du recu
  $pdf->Cell(30,10,'Numero d\'orde du recu : ',0,1,'C');
  $pdf->Cell(150);
  $pdf->SetFont('Arial','B',14);
  $pdf->Cell(30,10,$numrecu.'',1,1,'C');
  $pdf->Ln(5);



$pdf->Cell(190, 8, "Beneficiaire des versements", 1, 1, "C", true);
$pdf->SetFont('Arial','',12);
$pdf->SetFillColor(255,255,255);
$pdf->MultiCell(190,8, "Nom ou denomination : ".$nomclub." \n \nAdresse :" . $adresseclub ." \n ", 1, "L", false);

$pdf->Ln(5);

$pdf->SetFont('Arial','B',14);
$pdf->SetFillColor(230,230,230);
$pdf->Cell(190, 8, "Oeuvre ou organisme d'interet general", 1, 1, "C", true);
$pdf->SetFont('Arial','',12);

$pdf->Ln(5);

$pdf->SetFont('Arial','B',14);
$pdf->SetFillColor(210,210,210);
$pdf->Cell(190, 8, "Donateur", 1, 1, "C", true);
$pdf->SetFont('Arial','',12);

$pdf->MultiCell(190,8, "Nom : ".$nom." \nAdresse : ".$adresse." \nCode postal : ".$cp."     Commune : ".$ville." \n ", 1, "L", false);
$pdf->MultiCell(190,8, "Le beneficiaire reconnait avoir recu au titre des versements ouvrant droit a reduction d'impot, la somme de : ".$total." €\n
Somme en toute lettre : $totalEnLettre euros \n
Date du paiement : ".$date."\n
Motif du versement : Autres \n                                                                               Date et signature: \n\n ", 1, "L", false);

$pdf->Output();

?>
