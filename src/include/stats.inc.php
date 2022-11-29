<?php
if (!empty($_GET['ville']))
{
    $table = [];
    $trouver = false;
    $csv = new SplFileObject('./compteur/cptville.csv', 'r+');
    $csv->setFlags(SplFileObject::READ_CSV | SplFileObject::DROP_NEW_LINE);
    $csv->setCsvControl(';');
    foreach ($csv as $ligne)
    {
        if ($ligne === [NULL]) // If the line is empty, go to the next one
        {
            continue;
        }
        if ($ligne[0] == $_GET['ville']) // If we find the city in the file, we increment by 1
        {
            $ligne[1] += 1;
            $trouver = true;
        }
        $table[] = $ligne;
    }
    if (!$trouver) // If the city is not found in the file, write the name of the city and increment by 1
    {
        $table[] = [$_GET['ville'], 1];
    }
    $csv->rewind();
    foreach ($table as $entrer)
    {
        $csv->fputcsv($entrer);
    }
}
?>