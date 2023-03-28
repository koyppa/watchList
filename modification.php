
<?php
require 'connexion.php';

if(isset($_POST['modify']))
{	
    $nomSerie = $_POST['nomSerie'];
    $nbSaisonTot = $_POST['nbSaisonTot'];
    $nbSaisonVues = $_POST['nbSaisonVues'];
    $idSerie = $_POST["idSerie"];

    if ($nomSerie == "" OR $nbSaisonVues == "" OR $nbSaisonTot == "")
    {
        echo '<script> alert("Element manquant")</script>';
    }
    else if ($nbSaisonVues > $nbSaisonTot)
    {
        echo '<script> alert("Nombre de saisons vues supérieur au nombre de saisons totales")</script>';
    }
    else
    {		
        
        $requeteModif = $linkpdo->exec("UPDATE t_serie SET nomSerie='$nomSerie', nbSaisonTot='$nbSaisonTot', nbSaisonVues='$nbSaisonVues'
                                        WHERE idSerie = '$idSerie'");
        
        if ($requeteModif === false) 
        {
            var_dump($linkpdo->errorInfo());
            die("Error query method during modif");
        } 
        else 
        {
            header('Location: index.php');
            exit();
        } 
    } 
}        
?>
    