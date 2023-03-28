<?php
require 'connexion.php';

$idSerie = $_GET["idSerie"];

$requeteSuppr = $linkpdo->exec("DELETE FROM t_serie WHERE idSerie = '$idSerie'");

if ($requeteSuppr === false) 
{
    var_dump($linkpdo->errorInfo());
    die("Error query method");
} 
else 
{
    header('Location: index.php');
    exit();
}

?>