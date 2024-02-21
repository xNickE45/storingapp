<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
if(empty($attractie))
{ 
    $errors[]= "Vuldeattractie-naamin.";
}
$type = $_POST['type'];
$capaciteit = $_POST['capaciteit']; 
if(isset($_POST['prioriteit']))
{
    $prioriteit = 1;
}
else
{
    $prioriteit = 0;
}
$melder = $_POST['melder'];
$overig = $_POST['overig'];

// echo $attractie . " / " . $capaciteit . " / " . $melder;

//1. Verbinding
require_once '../../../config/conn.php';

//2. Query
$query = "INSERT INTO meldingen (attractie, type, capaciteit, prioriteit, melder, overige_info) VALUES(:attractie, :type, :capaciteit, :prioriteit, :melder, :overige_info)";
//3. Prepare
$statement = $conn->prepare($query);
//4. Execute
$statement->execute([
    ":attractie" => $attractie,
    ":type" => $type,
    ":capaciteit" => $capaciteit,
    ":prioriteit" => $prioriteit,
    ":melder" => $melder,
    ":overige_info" => $overig
]);

$items = $statement->fetchALL(PDO::FETCH_ASSOC);

header("location: ".$base_url."/resources/views/meldingen/index.php?msg=Melding opgeslagen");