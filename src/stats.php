<?php
session_start();
/*
    Call, header embedding
*/
include './include/headerstats.inc.php';
?>
<!-- <p>Call of the graph linked to the CSV data.csv file</p> -->
<div class="stats">
    <img src="./include/graph.inc.php" alt="graphique" />
</div>
<?php
/*
    Display of the number of visitors
*/
$nombre = file_get_contents("./compteur/cptvisites.txt");
echo '<strong>' . $nombre . '</strong> visites';
/*
    Call, embedding footer
*/
include './include/footer.inc.php'
?>