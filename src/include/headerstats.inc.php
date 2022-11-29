<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Météo De France - Projet</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./style/style.css" />
    <link rel="shortcut icon" href="./images/favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <header>
        <div class="container">
            <?php
            date_default_timezone_set('Europe/Paris');
            $heure = (date('H'));

            // If it's daytime, we display a sun
            if ($heure >= 8 && $heure <= 19)
            {
                echo '<img src="./images/soleil.svg" alt="logodujour"/>';
            }
            else// we display a moon
            {
                echo '<img src="./images/lune.svg" alt="logodelanuit"/>';
            }
            ?>
            <h3 class="logo">Météo De France</h3>
            <nav class="menu">
                <ul class="ulmenu">
                    <li class="limenu"><a class="amenu" href="../index.html">INDEX</a></li>
                    <li class="limenu"><a class="amenu" href="./index.php">METEO</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <hr />
    <?php
    /*
    *	  Set of functions called to ensure certain basic functions of the web page (Number of visitors)
    */
    include "./include/fonction.inc.php";  
    ?>