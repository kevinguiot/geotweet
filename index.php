<?php
// On inclut la classe de Twitter
require_once('class/twitter.class.php');

// On inclut les fichiers
include('include/config.inc.php');
include('include/functions.php');

// On regarde si l'utilisateur doit se connecter
if(!isConnectToTwitter()) {
    
    // On demande la connexion
    include('login.php');
    
} else {
    
    //On se connecte à Twitter avec les informations mentionnées
    $twitter = new Twitter(
        $_COOKIE['consumerKey'],
        $_COOKIE['consumerSecret'],
        $_COOKIE['accessToken'],
        $_COOKIE['accessTokenSecret']
    );

    // On recherche les tweets qui contiennent le hashtag LPDev
    $results = $twitter->search('#TeamWS');
    
    // On créé notre tableau de coordonnées (pour les marqueurs)
    $coordonnees = array();
    
    // On parcourt les tweets
    foreach($results as $key => $result) {
       
        // On récupère les coordonnées
        if(!empty($result->geo->coordinates)) {
            
            $coordinates = $result->geo->coordinates; 
        
            // S'il y a des coordonnées
            if(!empty($coordinates)) {
        
                //On récupère la longitude
                $longitude = $coordinates[1];
        
                //On récupère la latitude
                $latitude = $coordinates[0];
                
                //On récupère le tweet
                $text = str_replace("\n", "", $result->text);
                
                //On rajoute les informations dans le tableau
                $coordonnees[$key]['position'] = '{lat: '.$latitude.', lng: '.$longitude.'}';
                $coordonnees[$key]['text'] = $text;
                $coordonnees[$key]['name'] = $result->user->name;
                $coordonnees[$key]['screen_name'] = $result->user->screen_name;
            }
        }
    }

    // On affiche la maps
    include('maps.php');
}
?>