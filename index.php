<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WatchList</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="addElement">
        <h1>WatchList</h1>
        <form class="formAddElement" method="post" action="addElement.php">
                <input type="text" id="elementInput" name="nomSerie" placeholder="Quelle série voulez-vous ajouter?">
                <input type="number" id="elementInput" name="nbSaisonTot" placeholder="Nombre de saisons">
                <input type="number" id="elementInput" name="nbSaisonVues" placeholder="Nombre de saison vues">
                <input type="submit" id="submit" value="Ajouter">
        </form>
    </section>

    <section class="elementList">
        <h1>Liste</h1>
        <table>
       <?php
            require 'connexion.php';
            
            $requete = $linkpdo->query("SELECT * FROM t_serie");
            
            if ($requete == false)
            {
                echo "Error query method";
            }
            while($row = $requete->fetch(PDO::FETCH_ASSOC)) : 
            ?>
        
                <tr class="affichageElements">
                    <!-- Remplissage des colonnes-->
                    <td class="nomTab"><?php echo htmlspecialchars($row['nomSerie']); ?></td>
                    <td class="saisonsTab"><?php echo htmlspecialchars($row['nbSaisonVues']); ?> / <?php echo htmlspecialchars($row['nbSaisonTot']); ?> </td>
                    <td>
                    <?php 
						$idSerie = htmlspecialchars($row['idSerie']); 
						echo "<a href='modifSerie.php?idSerie=$idSerie'>Modifier</a>";
					?>
				    </td>
                    <td>
					<?php 
						$idSerie = htmlspecialchars($row['idSerie']); 
						echo "<a href='supprSerie.php?idSerie=$idSerie'>Supprimer</a>";
					?>
				    </td>
                </tr>			
                                        
        <?php 
            endwhile; 
        ?>
            </table>
    </section>
    
</body>
</html>