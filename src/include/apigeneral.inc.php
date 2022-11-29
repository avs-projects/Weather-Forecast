<?php
/**
*   API for general information on the current day
*/
$string = "https://api.openweathermap.org/data/2.5/weather?q=" . $ville . "&lang=fr&units=metric&APPID=c0c4a4b4047b97ebc5948ac9c48c0559"; // Connexion avec lien et clé spécifique
$data = json_decode(file_get_contents($string) , true);

/*
    Retrieving weather information from the API
*/
$nom = $data['name']; // Name of the city
$logo = "http://openweathermap.org/img/wn/" . $data['weather']['0']['icon'] . "@2x.png"; // Atmospheric conditions picture
$sleverconversion = date("H:i", $data['sys']['sunrise']); // Convert API sunrise date to time
$slever = "<img src='./images/slever.png' alt='leversoleil'/>" . "  " . $sleverconversion; // Sunrise
$scoucherconversion = date("H:i", $data['sys']['sunset']); // Convert API sunset date to time
$scoucher = "<img src='./images/scoucher.png' alt='couchersoleil'/>" . "  " . $scoucherconversion; // Sunset
$temperature = $data['main']['temp'] . " °C"; // Temperature
$visibiliteconversion = ($data['visibility']/1000); // Convert visibility from meters to kilometers
$visibilite = "<img src='./images/brouillard.png' alt='visibilite'/>" . "  " . $visibiliteconversion . " km"; // Visibility
$vent = "<img src='./images/vent.png' alt='vent'/> " . "  " . $data['wind']['speed'] . " km/h"; // Wind speed
$humidite = "<img src='./images/humidite.png' alt='humidite'/>" . "  " . $data['main']['humidity'] . " %"; // Humidity level
$pression = "<img src='./images/pression.png' alt='pression'/>" . "  " . $data['main']['pressure'] . " hPa"; // Atmospheric pressure

/*
    Viewing weather information
*/
echo '<div>';
echo '<h3>' . $nom . "</h3>";
echo '<div class="div1">';
echo '<p class="icon"><img src="' . $logo . '" alt="logo" /></p>';
echo '<p class="tempera">' . $temperature . "</p>";
echo '</div>';
echo '<div class="div2">';
echo '<p>' . $visibilite . "</p>";
echo '<p>' . $humidite . "</p>";
echo '</div>';
echo '<div class="div3">';
echo '<p>' . $vent . "</p>";
echo '<p>' . $pression . "</p>";
echo '</div>';
echo '<div class="div4">';
echo '<p>' . $slever . "</p>";
echo '<p>' . $scoucher . "</p>";
echo '</div>';
echo '</div>';
?>