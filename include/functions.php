<?php

/**
 * Permet de savoir si l'utilisateur est connecté à l'A.P.I Twitter
 *
 * @return array cookies
 */
function isConnectToTwitter() {
    
    // Déclaration
    bool $isConnect = false;

    // On récupère le nom des cookies
    global $cookie;
    
    // On regarde si les cookies existent
    foreach($cookies as $cookie) {    
        
        if(!empty($_COOKIE[$cookie])) {
            ${$cookie} = $_COOKIE[$cookie];
        } else {
            $isConnect = false;
        }
    }
    
    //On retourne la réponse
    return $isConnect;
}
?>