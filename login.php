<?php
// On inclut la classe
require_once('class/twitter.class.php');

// On vérifie que nous ne sommes pas connectés
if(!isConnectToTwitter()) {

    // On vérifie si un formulaire est envoyé
    if(!empty($_POST)) {
    
        //On parcourt les informations du formulaire
        foreach($_POST as $key => $post) {
            
            // On ajoute la valeur dans la variable nommée par le cookie
            ${$key} = $post;
        }
        
        // On se connecte à Twitter avec les informations mentionnées
        $twitter = new Twitter(
            $consumerKey,
            $consumerSecret,
            $accessToken,
            $accessTokenSecret
        );
        
        // On effectue un test de récupération d'informations
        try {
            
            //On récupère les tweets qui contiennent le hashtag #php
            $results = $twitter->search('#php');
            
            // On parcourt le nom des cookies
            foreach($cookies as $cookie) {
                
                // On enregistre le cookie
                setcookie($cookie, ${$cookie});                
            }
        
        } catch (Exception $e) {
            echo 'Une erreur s\'est produite: <br><b>',  $e->getMessage(), "</b>";
        }
        
    } else {
        
        // On affiche le formulaire
        ?>
        
        <form method="post">
            <table>
                <?php
                //On parcourt le nom des cookies
                foreach($cookies as $cookie) {
                    echo '<tr>';
                    echo '<td>'.$cookie.'</td>';
                    echo '<td><input type="text" name="'.$cookie.'"></td>';
                    echo '</tr>';
                }
                ?>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Se connecter à l'A.P.I Twitter">
                    </td>
                </tr>
            </table>
        </form>
        
        <?php
    }
}
?>