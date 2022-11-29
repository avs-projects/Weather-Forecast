<?php
/**
*   File for designing the chart from the CSV file
*/

/*
    Calling data from the JpGraph library in the jpgraph directory
*/
include ("../jpgraph/src/jpgraph.php");
include ("../jpgraph/src/jpgraph_bar.php");

/*
    Reading the CSV file
*/
if (($handle = fopen("../compteur/cptville.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $tableauville[] = $data[0]; // Assignment of the column for the names of cities
        $tableauoccurence[] = $data[1]; // Assignment of the column intended for their repetition
    }
    fclose($handle);
}
 
/*
    Creation of the chart
*/

// Container with width and length
$graph = new Graph(900,400);

// Linear representation
$graph->SetScale("textlin");

// Setting margins
$graph->img->SetMargin(40,30,25,40);

// Creating the bar chart
$bplot = new BarPlot($tableauoccurence);

// Set font appearance
$bplot->value->SetFont(FF_ARIAL,FS_NORMAL,9);
// Modify the rendering of each value
$bplot->value->SetFormat('Occurence');

// Add bars to container
$graph->Add($bplot);

// The title
$graph->title->Set("Graphique HISTOGRAMME : Occurence par villes");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

// Title for horizontal axis (x axis) and vertical axis (y axis)
$graph->xaxis->title->Set("Ville");
$graph->yaxis->title->Set("Occurence");

$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

// Legend for the horizontal axis
$graph->xaxis->SetTickLabels($tableauville);

// Show graph
$graph->Stroke();
?>