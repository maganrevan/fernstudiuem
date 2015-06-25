<?PHP

require_once 'classes/class_client.php';

error_reporting(E_ALL ^ E_NOTICE);
//Sicherheitsabfrage, ob der Nutzer über den Index kommt, andere Werte werden nicht zugelassen.
if ( $_SERVER[ 'HTTP_REFERER' ] )
{
    //Hole die vorhergehende Seite
    $back    = $_SERVER[ 'HTTP_REFERER' ];
    //Trenne den String in ein Array auf
    $explode = explode("/", $back);
    //Überprüfe, ob die vorhergehende Seite der Index ist.
    if ( $explode[ 3 ] == 'PHP03' && ($explode[ 4 ] == '' || $explode[ 4 ] == 'index.php') )
    {
            $login  = $_POST[ 'login' ];
            $pass   = $_POST[ 'pass' ];
            $client = new client($login, $pass);
            $aClient = $client->get_Client();
            if ( $aClient['kndLogin'] == 'admin' && $aClient['kndPass'] == 'Lilie1123581321' )
            {
                header('location: backend/index.php');
                exit(1);
            }
            else if($client->ok)
            {
                header('location: webshop.php');
                exit(1);
            }
            else
            {
                header('location: reg.php');
                exit(1);
            }
    }
    else
    {
        //Fehlerausgabe und Verweis auf die Startseite
        echo nl2br("Zugriff verweigert. Bitte loggen Sie sich &uuml;ber die Startseite ein.\n");
        echo('<a href="index.php">Startseite</a>');
    }
}
else
{
    //Fehlerausgabe und Verweis auf die Startseite
    echo nl2br("Zugriff verweigert. Bitte loggen Sie sich &uuml;ber die Startseite ein.\n");
    echo('<a href="index.php">Startseite</a>');
}
?>

