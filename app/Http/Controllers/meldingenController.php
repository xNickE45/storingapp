<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
if(empty($attractie))
{ 
    $errors[]= "Vul de attractie-naam in.";
}
$type = $_POST['type'];
if(empty($type))
{
    $errors[]="Vul voor type een geldige waarde in.";
}
$capaciteit = $_POST['capaciteit']; 
if(!is_numeric($capaciteit))
{
    $errors[]="Vul voor capaciteit een geldig getal in.";
}
if(isset($_POST['prioriteit']))
{
    $prioriteit = 1;
}
else
{
    $prioriteit = 0;
}
$melder = $_POST['melder'];
if(empty($melder))
{
    $errors[]="Voer je naam in dat jij de melder bent.";
}
$overig = $_POST['overig'];

if(isset($errors))
{
    var_dump($errors);die();
}


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