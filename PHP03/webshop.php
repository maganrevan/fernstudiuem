<!DOCTYPE html>
<?PHP
require_once 'classes/class_client.php';
require_once 'classes/class_article.php';
$client = new client();
$article = new article();
//Hole das Artikel- und Clientarray
$aClient = $client->get_Client();
$aArticle = $article->getArticle();
//Schaut nach, ob ausgelogt werden soll, nur wenn die Id = 12 ist
if ($_GET[id] == '12') {
    $client->log_out();
}
//Warenkorbtransfer wenn der Artikel vorhanden ist
if ($_GET[a]) {
    $article->choose($_GET[a], $aArticle);
}

//fürht die Bestellung aus
if($_GET[id] == 14){
    $article->order($aClient);
}

//Warenkorbarray laden
$aCart = $article->getSessionData();
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/stylesheet.css">
    <title>Webshop 3.0</title>
</head>
<body>
<div id="content">
    <?PHP if (!$_GET[id]) { ?>
        <!-- normale Ausgabe im Webshop -->
        <h1>Willkommen beim Webshop der Konzertagentur "von Krach bis Klang"</h1>

        <p>F&uuml;r Sie, <?php echo($aClient['kndSur'] . ' ' . $aClient['kndName']); ?> haben wir folgende Karten:</p>

        <div>
            <?PHP if ($aArticle) { ?>
                <table>
                    <tr>
                        <th>Konzerttermin</th>
                        <th>Veranstaltung</th>
                        <th>Kartenvorrat</th>
                        <th>Preis</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?PHP foreach ($aArticle as $Article) {
                        $date = new DateTime($Article['date']); ?>
                        <tr>
                            <td><?PHP echo(date_format($date, "d.m.Y")); ?></td>
                            <td><?PHP echo($Article['a_name']); ?></td>
                            <td><?PHP echo($Article['a_menge']); ?></td>
                            <td><?PHP echo($Article['a_preis']); ?> Euro</td>
                            <td><?PHP echo("<a href=\"" . $_SERVER['PHP_SELF'] . '?a=' . $Article['a_artikelnr'] . "\" > In den Warenkorb </a>"); ?></td>
                        </tr>
                    <?PHP
                    }?>

                </table>
            <?PHP
            } else {
                echo('Es sind keine Karten aktuell erhältlich.');
            }?>
        </div>
        <p><?php echo("<a href=" . $_SERVER['PHP_SELF'] . '?id=13' . ">gew&auml;hlte Veranstaltung " . count($aCart) . "</a>"); ?></p>
        <p><?php echo("<a href=" . $_SERVER['PHP_SELF'] . '?id=12' . ">logout</a>"); ?></p>
    <?PHP
    } else {
        if ($aCart) {
            //Wenn etwas im Warenkorb ist
            ?>
            <table>
                <tr>
                    <th>Konzerttermin</th>
                    <th>Veranstaltung</th>
                    <th>Kartenvorrat</th>
                    <th>Preis</th>
                </tr>
                <?PHP foreach ($aCart as $cart) {
                    $date = new DateTime($cart['date']); ?>
                    <tr>
                        <td><?PHP echo(date_format($date, "d.m.Y")); ?></td>
                        <td><?PHP echo($cart['a_name']); ?></td>
                        <td><?PHP echo($cart['a_menge']); ?></td>
                        <td><?PHP echo($cart['a_preis']); ?> Euro</td>
                    </tr>
                <?PHP
                }?>

            </table>
            <p><?php echo("<a href='" . $_SERVER['PHP_SELF'] . "?id=14'>bestellen</a>"); ?></p>
        <?PHP
        } else if($_GET[id] == '14'){
            //bei der Bestellung kommt nun eine positive Rückmeldung
            echo('Ihre Waren wurden bestellt. Sie erhalten eine Bestellbestätigung per Mail');
        }

        else {
            //Wenn nichts im Warenkorb ist, wird eine einfache Ausgabe als negativmeldung
            echo('Es sind keine Karten im Warenkorb.');
        }?>
        <p><?php echo("<a href=" . $_SERVER['PHP_SELF'] . ">zur&uuml;ck</a>"); ?></p>
    <?PHP } ?>
</div>
</body>
</html>
