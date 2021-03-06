<!DOCTYPE html>
<html lang="fr" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bienvenue à Bar à Gogo !">
    <meta name="keywords" content="bar etudiant">
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../css/ajout_bar.css">
    <link rel="stylesheet" type="text/css" href="../css/rating.css">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
    <title>Ajouter un bar</title>
</head>

<body id="ajoutBar">
    <nav id="menu">
        <div id="classement">
            <div id="afficher" onClick="Afficher()"></div>
        </div>
        <div>
            <form id="formRecherche" method="get" action="recherche_bar.php">
                <input type="text" name="rechercher" placeholder="Rechercher" />
            </form>
        </div>
        <a href="../php/deconnexion.php" class="deconnexion">
            <div class="divDeco"></div>
        </a>
    </nav>
    <!--deuxieme interface quand on clique sur le bouton-->

    <div id="hidden" style="display: none;">
        <div id="croix" onClick="Cacher()">

        </div>
        <form id="mainForm" method="post">

            <div id="trier"><input type="submit" value="Classer par :" /></div>
            <div id="cocher">
                <label><input type="radio" id="note" name="tri" value="Note" onClick="redir_Note()">Note générale</label>
                <label><input type="radio" id="prix" name="tri" value="Prix" onClick="redir_Prix()">Prix</label>
                <label><input type="radio" id="ambiance" name="tri" value="Ambiance" onClick="redir_Ambiance()">Ambiance</label>
                <label><input type="radio" id="distance" name="tri" value="Distance" onClick="redir_Distance()">Distance</label>
            </div>

            <input type="button" value="Ajouter bar" onClick="redir_Ajout()" />
        </form>
    </div>


    <main>
        <h1>Ajouter un bar</h1>
        <?php
                if(isset($_GET['err'])){
                    if ($_GET['err']=='errBarExisteDeja'){
                        $message = '<h3>Ce bar a déjà été renseigné sur le site !</h3>';
                        echo $message;
                    }
                    if ($_GET['err']=='errOubli'){
                        $message = '<h3>Tous les champs obligatoires n\'ont pas été renseignés.</h3>';
                        echo $message;
                    }
                }
            ?>
        <form id="form_ajout_bar" method="post" action="../php/ajout_bar.php" enctype="multipart/form-data">
            <input type="text" name="nom_bar" id="input_nom_bar" placeholder="Nom du bar*" required />
            <div id="adresse_bar">
                <h2>Adresse du bar :</h2>
                <input type="text" name="numero_rue" id="input_numero_rue" placeholder="Numéro de rue*" required />
                <input type="text" name="adresse" id="input_adresse_bar" placeholder="Adresse*" required />
                <input type="text" name="ville" id="input_ville_bar" placeholder="Ville*" required />
                <input type="text" name="code_postal" id="input_code_postal" placeholder="Code postal*" required />
            </div>
            <div id="infos_sup">
                <h2>Informations supplémentaires :</h2>
                <input type="text" name="telephone_bar" id="input_telephone" placeholder="Téléphone" />
                <input type="text" name="site_web" id="input_site_web" placeholder="Site web" />
                <!--<input type="hidden" name="MAX_FILE_SIZE" value="1000000">-->
                <label for="ajout_photo" id="label_photo">Photo du bar : </label>
                <input type="file" name="ajout_photo" id="ajout_photo" accept="image/png, image/jpg" />
                <div id="div_select">
                    <select id="type_bar" name="type_bar">
                        <option>Cocktail</option>
                        <option>Lounge</option>
                        <option>Shooter</option>
                        <option>Biere</option>
                        <option>Geek</option>
                        <option>Irlandais</option>
                        <option>Dansant</option>
                        <option>Punk</option>
                        <option>Kawaii</option>
                    </select>
                </div>
                <textarea name="plus_dinfos" id="input_plus_dinfos" cols="20" rows="5" placeholder="D'autres informations ?"></textarea>
            </div>
            <div id="notes_et_com">
                <h2>Tu peux déjà noter et commenter le bar que tu ajoutes : </h2>
                <div id="div_note1">

                    <div>
                        <h3 class="h3">Ambiance :</h3>
                    </div>
                    <div class="rating_amb">
                        <input id="staramb5" name="ambi1" type="radio" value="5" class="radio-btn hide" />
                        <label for="staramb5"><img src="../image/wine-glasses.png" height='35px' width='35px'></label>
                        <input id="staramb4" name="ambi2" type="radio" value="4" class="radio-btn hide" />
                        <label for="staramb4"><img src="../image/wine-glasses.png" height='35px' width='35px'></label>
                        <input id="staramb3" name="ambi3" type="radio" value="3" class="radio-btn hide" />
                        <label for="staramb3"><img src="../image/wine-glasses.png" height='35px' width='35px'></label>
                        <input id="staramb2" name="ambi4" type="radio" value="2" class="radio-btn hide" />
                        <label for="staramb2"><img src="../image/wine-glasses.png" height='35px' width='35px'></label>
                        <input id="staramb1" name="ambi5" type="radio" value="1" class="radio-btn hide" />
                        <label for="staramb1"><img src="../image/wine-glasses.png" height='35px' width='35px'></label>
                    </div>
                    <div>
                        <h3 class="h3">Prix :</h3>
                    </div>
                    <div class="rating_prix">
                        <input id="starprix5" name="prix1" type="radio" value="5" class="radio-btn hide" />
                        <label for="starprix5"><img src="../image/wine-glasses.png" height='35px' width='35px'></label>
                        <input id="starprix4" name="prix2" type="radio" value="4" class="radio-btn hide" />
                        <label for="starprix4"><img src="../image/wine-glasses.png" height='35px' width='35px'></label>
                        <input id="starprix3" name="prix3" type="radio" value="3" class="radio-btn hide" />
                        <label for="starprix3"><img src="../image/wine-glasses.png" height='35px' width='35px'></label>
                        <input id="starprix2" name="prix4" type="radio" value="2" class="radio-btn hide" />
                        <label for="starprix2"><img src="../image/wine-glasses.png" height='35px' width='35px'></label>
                        <input id="starprix1" name="prix5" type="radio" value="1" class="radio-btn hide" />
                        <label for="starprix1"><img src="../image/wine-glasses.png" height='35px' width='35px'></label>
                    </div>
                    <div>
                        <h3 class="h3">Distance :</h3>
                    </div>
                    <div class="rating_dist">
                        <input id="stardist5" name="dist1" type="radio" value="5" class="radio-btn hide" />
                        <label for="stardist5"><img src="../image/wine-glasses.png" height='35px' width='35px'></label>
                        <input id="stardist4" name="dist2" type="radio" value="4" class="radio-btn hide" />
                        <label for="stardist4"><img src="../image/wine-glasses.png" height='35px' width='35px'></label>
                        <input id="stardist3" name="dist3" type="radio" value="3" class="radio-btn hide" />
                        <label for="stardist3"><img src="../image/wine-glasses.png" height='35px' width='35px'></label>
                        <input id="stardist2" name="dist4" type="radio" value="2" class="radio-btn hide" />
                        <label for="stardist2"><img src="../image/wine-glasses.png" height='35px' width='35px'></label>
                        <input id="stardist1" name="dist5" type="radio" value="1" class="radio-btn hide" />
                        <label for="stardist1"><img src="../image/wine-glasses.png" height='35px' width='35px'></label>
                    </div>
                    <div>
                        <h3 class="h3">Général :</h3>
                    </div>
                    <div class="rating_gen">
                        <input id="stargen5" name="gen1" type="radio" value="5" class="radio-btn hide" />
                        <label for="stargen5"><img src="../image/wine-glasses.png" height='35px' width='35px'></label>
                        <input id="stargen4" name="gen2" type="radio" value="4" class="radio-btn hide" />
                        <label for="stargen4"><img src="../image/wine-glasses.png" height='35px' width='35px'></label>
                        <input id="stargen3" name="gen3" type="radio" value="3" class="radio-btn hide" />
                        <label for="stargen3"><img src="../image/wine-glasses.png" height='35px' width='35px'></label>
                        <input id="stargen2" name="gen4" type="radio" value="2" class="radio-btn hide" />
                        <label for="stargen2"><img src="../image/wine-glasses.png" height='35px' width='35px'></label>
                        <input id="stargen1" name="gen5" type="radio" value="1" class="radio-btn hide" />
                        <label for="stargen1"><img src="../image/wine-glasses.png" height='35px' width='35px'></label>
                    </div>
                </div>
                <textarea name="commentaire_ajout" id="commentaire_ajout" cols="20" rows="5" placeholder="Ton commentaire sur ce bar"></textarea>
            </div>
            <input type="submit" name="ajouter_un_bar" value="Ajouter ce bar" id="validation_ajout_bar">
        </form>
    </main>
    <footer>
        <p id="champs_obligatoires">* : champs obligatoires</p>
    </footer>
    <script src="../js/menu.js"></script>
    <script src="../js/redirection.js"></script>
</body>

</html>