<?php
// INDEX.PHP = ROUTEUR



// 1. appel du fichier contenant les différentes controleurs (require)

/* 2. try {
        

        . differentes conditions :
                - test de variables (existent ? leur contenu ?)
                - appel du bon contoleur en fonction de la condition, qui lui-mm appelle la bonne requete du modele
        
        . gestion des erreurs ds les blocs de condition avec 'throw new Exception('message')'
        

        . par défaut: appel du controleur qui appelle le fichier (vue) qui affiche le site par defaut (accueil du site)       
} 

catch(Exception $e) {
    echo 'Erreur : ' .$e->getMessage();
} OU :

catch(Exception $e) {

    $errorMessage = $e->getMessage();
    require('view/errorView.php'); // => exploiter variable $errorMessage ds le fichier 'errorView' pour afficher au visiteur une page qui contiendra les erreurs (+joli)

}

*/
