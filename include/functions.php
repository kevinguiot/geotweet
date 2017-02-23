<?php

/**
 * Permet de savoir si l'utilisateur est connecté à l'A.P.I Twitter
 *
 * @return bool État de connexion à Twitter
 */
function isConnectToTwitter() {
    
    // Déclaration
    $isConnect = false;

    // On récupère le nom des cookies
    global $cookies;
    
    // On regarde si les cookies existent
    foreach($cookies as $cookie) {    
        
        if(!empty($_COOKIE[$cookie])) {
            ${$cookie} = $_COOKIE[$cookie];
        } else {
            $isConnect = false;
        }
    }
    
    // On se connecte à Twitter avec les informations mentionnées
    $twitter = new Twitter(
        $consumerKey,
        $consumerSecret,
        $accessToken,
        $accessTokenSecret
    );

    // On regarde si la connexion est bonne avec Twitter
    $testConnexionTwitter = testConnexionTwitter($twitter);
    
    // On retourne la réponse
    return $testConnexionTwitter;
}

/**
 * Permet de savoir si les informations de connexion à Twitter sont bonnes
 *
 * @param twitter => instance de la classe Twitter
 * 
 * @return bool État de connexion à Twitter
 */
function testConnexionTwitter( $twitter) {
    
    // On teste la connexion avec Twitter
    try {
        
        //On récupère les tweets qui contiennent le hashtag #php
        $results = $twitter->search('#php');
        
        // On définit la connexion comme réussie
        $isConnect = true;
        
    } catch (Exception $e) {
        $isConnect = false;
    }
 
    return $isConnect;    
}
?>