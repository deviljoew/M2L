<?php


/**
 * teste si une chaîne a un format de code postal
 *
 * Teste le nombre de caractères de la chaîne et le type entier (composé de chiffres)
 * @param $codePostal : la chaîne testée
 * @return : vrai ou faux
*/
function estUnCp($codePostal)
{

   return strlen($codePostal)== 5 && estEntier($codePostal);
}


/**
 * teste si une chaîne a un format de code postal
 *
 * Teste le nombre de caractères de la chaîne et le type entier (composé de chiffres)
 * @param $codePostal : la chaîne testée
 * @return : vrai ou faux
*/
function CreerChiffreEnLettre($total)
{
  $totalExplode = explode(".", $total);
  $totalEntier = $totalExplode[0];
  $totalDecimal = $totalExplode[1];

  $retourEntier = enlettres($totalEntier);
  $retourDecimal = enlettres($totalDecimal);

  $retourTotal = $retourEntier . " et " .$retourDecimal;

  return $retourTotal;
}


/**
 * teste si une chaîne est un entier
 *
 * Teste si la chaîne ne contient que des chiffres
 * @param $valeur : la chaîne testée
 * @return : vrai ou faux
*/
function estEntier($valeur)
{
	return preg_match("/[^0-9]/", $valeur) == 0;
}
?>
