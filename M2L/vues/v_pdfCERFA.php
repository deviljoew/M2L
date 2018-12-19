<?php

ob_get_clean();
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetTitle('Reçu CERFA don',true);
$pdf->SetFont('Arial','',11);
$pdf->SetFillColor(210,210,200);
$pdf->SetFont('Arial','',9);
class PDF extends FPDF{

function Header(){
  // Logo
  $this->Image('./images/cerfa.png',10,6,30);
  // Police Arial gras 15
  $this->SetFont('Arial','',11);
  // Décalage à droite
  $this->Cell(90);
  // Titre
  $this->Cell(30,10,'Reçu au titre des dons à certains organismes d\'intérêt général',0,0,'C');
  // Saut de ligne
  $this->Ln(20);

  $this->SetFont('Arial','',9);
  //n° CERFA
  $this->Cell(30,10,'N° 115080*02',0,0,'C');
  // Décalage à droite
  $this->Cell(120);
  // Numero du recu
  $this->Cell(30,10,'Numero d\'orde du reçu:',0,1,'C');
  $this->Cell(150);
  $this->SetFont('Arial','',14);
  $this->Cell(30,10,$numrecu.'',1,1,'C');
}

}
$pdf->Cell(190, 8, "Bénéficiaire des versements", 1, 1, "C", true);
$pdf->SetFont('Arial','',12);
$pdf->SetFillColor(255,255,255);
$pdf->Cell(190, 8, "Nom ou dénomination : \n", 0, 0, "C", true); $pdf->Cell(190, 8, $nomclub, 0, 1, "C", true);
$pdf->Cell(190, 8, "Adresse : \n" . $adresseclub , 0, 1, "C", true);
$pdf->Cell(190, 8, "Oeuvre ou organisme d'intérêt général", 0, 1, "C", true);

$pdf->SetFont('Arial','',14);
$pdf->SetFillColor(210,210,200);
$pdf->Cell(190, 8, "Donateur", 1, 1, "C", true);
$pdf->SetFont('Arial','',12);

$pdf->MultiCell(190,8, "\nNom : ".$nom." \nAdresse :".$adresse." \nCode postal : ".$cp."     Commune : ".$ville." \n ", 1, "L", false);
$pdf->MultiCell(190,8, "\nLe bénéficiaire reconnait avoir reçu au titre des versements ouvrant droit à réduction d'impôt, la somme de : $total \n
Somme en toute lettre : ".$totalEnLettre." euros \n
Date du paiement : ".$date."\n
Motif du versement : Autres \n                                                                               Date et signature: \n\n ", 1, "L", false);

$pdf->Output();

?>
