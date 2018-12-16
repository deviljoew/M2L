<?php

ob_get_clean();
class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    $this->Image('./images/cerfa.png',10,6,30);
    // Police Arial gras 15
    $this->SetFont('Arial','B',14);
    // Décalage à droite
    $this->Cell(80);
    // Titre
    $this->Cell(30,10,'Reçu au titre des dons à \n certains organismes d\'intérêt général',0,0,'C');
    // Saut de ligne
    $this->Ln(20);
    $this->SetFont('Arial','',12);
    //n° CERFA
    $this->Cell(30,10,'N° 115080*02',0,0,'C');
    // Décalage à droite
    $this->Cell(120);
    // Numero du recu
    $this->Cell(30,10,'Numero d\'orde du reçu:',0,1,'C');
    $this->Cell(150);
    $this->SetFont('Arial','B',12);
    $this->Cell(30,10,'2016-14',1,1,'C');



}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/1',0,0,'C');
}
// Chargement des données
function LoadData($file)
{
    // Lecture des lignes du fichier
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetTitle('Reçu CERFA don',true);
$pdf->SetFont('Arial','B',14);
$pdf->SetFillColor(210,210,200);
$pdf->Cell(190, 8, "Bénéficiaire de versements", 1, 1, "C", true);
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(190,5, "\nNom ou dénomination : \n
Adresse : \n
............................................................................................................................................................... \n
                                       Oeuvre ou organisme d'intérêt général \n ", 1, "L", false);
$pdf->SetFont('Arial','B',14);
$pdf->SetFillColor(210,210,200);
$pdf->Cell(190, 8, "Donateur", 1, 1, "C", true);
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(190,8, "\nNom : \nAdresse : \nCode postal :                     Commune : \n ", 1, "L", false);
$pdf->MultiCell(190,8, "\nLe bénéficiaire reconnait avoir reçu au titre des versements ouvrant droit à réduction d'impôt, la somme de : \n
Somme en toute lettre : \n
Date du paiement : \n
Motif du versement : Autres \n
                                                                                                                         Date et signature: \n
                                                                                                                         \n
                                                                                                                         ", 1, "L", false);

$header = array('Pays', 'Capitale', 'Superficie (km²)', 'Pop. (milliers)');
// Chargement des données
$data = 'pays.txt';
$pdf->SetFont('Arial','',14);
$pdf->Output();

?>
