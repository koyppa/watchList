<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Récupération des infos -->
    <?php
	require 'connexion.php';

	$idSerie = $_GET["idSerie"];

	$requete = $linkpdo->query("SELECT * FROM t_serie WHERE idSerie = $idSerie");

	if ($requete == false) 
	{
		var_dump($linkpdo->errorInfo());
		die("Error query method");
	} 

	while ($data = $requete->fetch(PDO::FETCH_ASSOC))
	{
		$nomSerie       = htmlspecialchars($data['nomSerie']);
		$nbSaisonTot    = htmlspecialchars($data['nbSaisonTot']) ;
		$nbSaisonVues   = htmlspecialchars( $data['nbSaisonVues']);
	}

    // Affichage vérif
    // echo $nomSerie;

	?>

    <section class="modifyElement">
        <h1> Modifier </h1>
        <form class="formAddElement" method="post" action="modification.php">
            <?php  echo '<input type="text" id="elementInput" name="nomSerie" value="'. $nomSerie.'"> ' ?>
            <input type="number" id="elementInput" name="nbSaisonTot" value=<?php echo $nbSaisonTot ; ?>>
            <input type="number" id="elementInput" name="nbSaisonVues" value=<?php echo $nbSaisonVues ; ?>>
            <input type="hidden" name="idSerie" value=<?php echo $idSerie; ?> />
            <input type="submit" id="submit" name="modify" value="Modifier">
        </form>   
    </section>
    
</body>
</html>