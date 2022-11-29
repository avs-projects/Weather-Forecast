<?php
/**
 *   API for detailed day information
 */
$string = "https://api.openweathermap.org/data/2.5/forecast?q=" . $ville . "&lang=fr&units=metric&APPID=c0c4a4b4047b97ebc5948ac9c48c0559"; // Connexion avec lien et clé spécifique
$data = json_decode(file_get_contents($string) , true);

/*
    Establish the dates of the days
*/
$date = array(
    date("j-m-y") ,
    date("j-m-y", time() + 24 * 3600) ,
    date("j-m-y", time() + 48 * 3600) ,
    date("j-m-y", time() + 72 * 3600) ,
    date("j-m-y", time() + 96 * 3600)
);

$info = array(
    "Aujourd'hui",
    "Demain",
    "J+2",
    "J+3",
    "J+4"
);
/*
    Placing the divs together
*/
echo '<div class="slideshow-container">';

/*
    The different days
*/
for ($i = 1;$i <= 5;$i++)
{ // Loop intended for days
    echo '<div class="mySlides fade">';
    echo '<div class="numeroslide">' . $i . '/ 5</div>';
    echo '<h4>' . $info[$i - 1] . '</h4>';
    echo $date[$i - 1] . "<br />";
    echo '<ul class="uljour">';
    // Loop for hours
    foreach ($data['list'] as $hour => $value):
        echo '<li class="listejour">';
        $dateapi = date("j-m-y", $value[dt]); // Date from the API, we converted it from the given format to d-m-y format
        if ($dateapi == $date[$i - 1]) // Comparison: if the day of the browser is equivalent to the day of the API then we display the hours of the day
        
        {
            echo '<p>' . date("H:i", $value[dt]) . "<br />"; // Hour
            echo '<img src="http://openweathermap.org/img/wn/' . $value[weather][0][icon] . '@2x.png" alt="logo" width="40" height="40" />'; // Atmospheric conditions icon
            echo "<br />" . $value[main][temp] . " °C <br /></p>"; // Temperature
            
        }
        echo '</li>';
    endforeach; // end loop
    echo '</ul>';
    echo '</div>';
}

/*
    Implementation of the transition to the following days
*/
echo '<a class="precedent" onclick="plusSlides(-1)">&#10094;</a>';
echo '<a class="suivant" onclick="plusSlides(1)">&#10095;</a>';
echo '</div>';
echo '<br/>';
/*
    Div that includes the onclick links
*/
echo '<div>';
echo '<span class="dot" onclick="currentSlide(1)"></span>';
echo '<span class="dot" onclick="currentSlide(2)"></span>';
echo '<span class="dot" onclick="currentSlide(3)"></span>';
echo '<span class="dot" onclick="currentSlide(4)"></span>';
echo '<span class="dot" onclick="currentSlide(5)"></span>';
echo '</div>';
?>

<script src="./javascript/slides.js"></script><!-- <p>Call of the Javascript script allowing to set up the sliding of the days in the weather display</p> -->