<?php

// On vérifie que nous ne sommes pas connectés
if(!isConnectToTwitter()) {

    // On vérifie si un formulaire est envoyé
    if(!empty($_POST)) {
    
        //On parcourt les informations du formulaire
        foreach($_POST as $key => $post) {
            
            // On ajoute la valeur dans la variable nommée par le cookie
            ${$key} = $post;
        }

        // Si toutes les informations de connexion sont mentionnées
        if(
           !empty($consumerKey) &&
           !empty($consumerSecret) &&
           !empty($accessToken) &&
           !empty($accessTokenSecret)
        ) {

            // On se connecte à Twitter avec les informations mentionnées
            $twitter = new Twitter(
                $consumerKey,
                $consumerSecret,
                $accessToken,
                $accessTokenSecret
            );
            
            $testConnexionTwitter = testConnexionTwitter($twitter);
            
            if($testConnexionTwitter) {
            // On parcourt le nom des cookies
            foreach($cookies as $cookie) {
            
            // On enregistre le cookie
            setcookie($cookie, ${$cookie});
            }
            
            // On redirige l'utilisateur
            header('location: index.php');
            exit;
            } else {
            echo "<b>Une erreur s'est produite lors de la connexion à Twitter.</b>"
            }

        } else {
            echo "<b>Veuillez remplir toutes les informations.</b>";
        }
        
        echo '<hr>';
    }
    // On affiche le formulaire
    ?>
    
    <p style="font-weight:bold;">Veuillez saisir vos identifiants de connexion à l'A.P.I Twitter.</p>
    
    <form method="post">
        
        <table border="1">
            <?php
            //On parcourt le nom des cookies
            foreach($cookies as $cookie) {
                echo '<tr>';
                echo '<td>'.$cookie.'</td>';
                echo '<td><input type="text" name="'.$cookie.'"></td>';
                echo '</tr>';
            }
            ?>
        </table>
        
        <hr>
        
        <input type="submit" value="Se connecter à l'A.P.I Twitter">
    </form>
    
    <?php
}
?>