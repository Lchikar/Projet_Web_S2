<!DOCTYPE html>
<html lang="fr" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">

<head>
<?php
session_start();
require_once 'MyPDO.db.include.php'; // connexion à la bdd


?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bienvenue à Bar à Gogo !">
    <meta name="keywords" content="bar etudiant">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
    <title>Rechercher bar</title>
</head>

<body>
	
		<nav id="menu" >
			<div id="classement">
				<div id="classer"  onClick="Afficher()"></div>
			</div>
			<div>
				<form id="formRecherche" method="get" action="">
					<input type="text" name="rechercher" id="rechercher" placeholder="Rechercher" />
				</form>
			</div>
			<a href="deconnexion.php" class="deconnexion">
                <div id="divDeco"></div>
            </a>
		</nav>
		
		<div id="AllBars">
			<?php
				$stmt =  MyPDO::getInstance()->prepare(
				"SELECT name, photo, 
				CONCAT (numStreet, ' ', street, ' ', postalCode,' ', cityName) as adresse, bartype.barType as type
				FROM Bar NATURAL JOIN City NATURAL JOIN BarBelongsType NATURAL JOIN bartype
				WHERE Bar.name = :recherche OR cityName= :recherche OR postalCode= :recherche OR barType= :recherche");
				$stmt->bindValue(':recherche', $_GET['rechercher']);
				$stmt->execute();	
				while($general = $stmt->fetch()){
					echo '<div id="affiche_bar" onClick="ChangePage()">';
							$src = "image/bars/".$general['photo'];
							echo ('<div id="picture"> <img class="photo"
							 src="'.$src.'"
							 alt='.$general['name'].'/>');
							 echo '</div>';
							 
							 echo('<br><div id="infos">');
							 echo "<br>".$general['name']."<br>";
							 echo "<br>".$general['adresse']."<br>";
							 echo "<br>Bar à ".$general['type']."<br>";
							 echo '</div>';
							 
							 echo '<div id="moy">';
							 $stmt2 =  MyPDO::getInstance()->prepare(
								"SELECT Mark.value as 'value'
								FROM Bar NATURAL JOIN Mark NATURAL JOIN markType 
								WHERE Bar.name =:bar AND markType.markType = 'generale'");
								$stmt2->bindValue(':bar', $general['name']); 
								
								$stmt2->execute();
								$cpt = 0; $somme = 0;	
								while($note = $stmt2->fetch()){
									$cpt ++;
									$somme += $note['value'];
								}
								if(0 == $cpt) $moy = 0;
								else $moy = $somme/$cpt;
								echo "<br>Note générale: ".$moy."/5";
								echo "</div>";
							echo "</div>";
						}
					?>
				</div>
		
		<!--deuxieme interface quand on clique sur le bouton-->
		
		<div id="hidden" style="display: none;" >
			<div id="croix" onClick="Cacher()">

			</div>
			<form id="mainForm" method="post">
	
 				 <div id="trier"><input type="submit"  value="Classer par :" /></div>
 	 				<div id="cocher">
 	 				<label><input type="radio" id="prix" name="tri" value="Prix" onClick="redir_Prix()">Prix</label>
    				<label><input type="radio" id="ambiance" name="tri" value="Ambiance" onClick="redir_Ambiance()">Ambiance</label>
    				<label><input type="radio" id="note" name="tri" value="Note" onClick="redir_Note()">Note</label>
    				<label><input type="radio" id="distance" name="tri" value="Distance" onClick="redir_Distance()">Distance</label>
    				</div>
    
    			<input type="submit"  value="Ajouter bar" />
    			<a href="deconnexion.php" class="deconnexion">
                    <div id="divDeco"></div>
                </a>
    	</form>
    </div>

	

    <script src="js/menu.js"></script>
</body>

</html>