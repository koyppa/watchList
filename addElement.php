<?php
    require 'connexion.php';

    $nomSerie       = $_POST['nomSerie'];
    $nbSaisonTot    = $_POST['nbSaisonTot'];
    $nbSaisonVues   = $_POST['nbSaisonVues'];

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
        $requeteAjout = $linkpdo ->query("INSERT INTO t_serie (nomSerie, nbSaisonTot, nbSaisonVues)
			                            VALUES ('$nomSerie', '$nbSaisonTot', '$nbSaisonVues')");
			
        if ($requeteAjout === false) 
        {
            var_dump($linkpdo->errorInfo());
            die("<script>alert('ERREUR')</script>");
        } 
        else
        {
            header('Location: index.php');
            exit();
        }
    }

    

?>