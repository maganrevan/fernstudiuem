<?php

require_once 'classes/class_client.php';
if ( $_SERVER[ 'HTTP_REFERER' ] )
{
    //Hole die vorhergehende Seite
    $back    = $_SERVER[ 'HTTP_REFERER' ];
    //Trenne den String in ein Array auf
    $explode = explode("/", $back);
    //Überprüfe, ob die vorhergehende Seite der Index ist.
    if ( $explode[ 3 ] == 'PHP03' && ($explode[ 4 ] == 'reg.php') )
    {
        $client   = new client();
        $name     = $_POST[ 'name' ];
        $surename = $_POST[ 'vorname' ];
        $street   = $_POST[ 'strasse' ];
        $email    = $_POST[ 'email' ];
        $post     = $_POST[ 'plz' ];
        $city     = $_POST[ 'ort' ];
        $login    = $_POST[ 'login' ];
        $pass     = $_POST[ 'pass' ];
        $client->regis($login, $pass, $name, $surename, $street, $email, $city, $post);
        echo('Sie wurden erfolgreich angemeldet. Bitte nutzen Sie den Link zur Startseite.');
        echo(nl2br('<br /><a href="index.php">Startseite</a>'));
    }
}
else
{
    //Fehlerausgabe und Verweis auf die Startseite
    echo nl2br("Zugriff verweigert. Bitte loggen Sie sich &uuml;ber die Startseite ein.\n");
    echo('<a href="index.php">Startseite</a>');
}
?>

