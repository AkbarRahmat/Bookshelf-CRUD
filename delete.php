<?php 
if (!isset ($_GET["index"]) ||
    !is_numeric ($_GET["index"])){
        header("Location: index.php");
        exit();
    }



$index = $_GET["index"];

$getJSONFile = file_get_contents("buku.json");
$buku = json_decode($getJSONFile, true);


unset($buku[$index]);
$buku = array_values($buku);

$data = json_encode($buku, JSON_PRETTY_PRINT);
file_put_contents("buku.json", $data);

header("Location: index.php");

?>