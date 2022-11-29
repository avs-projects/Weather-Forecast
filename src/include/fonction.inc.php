<?php
/*
*	Function to calculate the number of visitors
*/
function nbvisiteurs()
{
    if (file_exists('./compteur/cptvisites.txt')) // If the file exists
    {
        $ouverturefic = fopen('./compteur/cptvisites.txt', 'r+'); // We open the file
        $nombre = fgets($ouverturefic); // We recover
    }
    else
    {
        $ouverturefic = fopen('./compteur/cptvisites.txt', 'a+'); //We open
        $nombre = 0; // We instantiate at 0
    }
    if (!isset($_SESSION['compteur_de_visite'])) // If session is empty we fill
    {
        $_SESSION['compteur_de_visite'] = 'visite';
        $nombre++;
        fseek($ouverturefic, 0);
        fputs($ouverturefic, $nombre);
    }
    fclose($ouverturefic);
}
?>