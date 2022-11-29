<?php
if (!empty($_GET['ville'])) // If we validate the form with a city then we display
{
    $ville = $_GET['ville'];
} 
else // else we display either the cookies if they exist or the capital
{
    if (!empty($_COOKIE["villepref"])) // If there is a cookie then we take the value stored in it
    {
        $ville = $_COOKIE["villepref"];
    }
    else // else the city is Paris
    {
        $ville = 'Paris';
    }
}
error_reporting(0);
$get = json_decode(file_get_contents('http://ip-api.com/json/') , true);
?>