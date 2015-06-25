<!DOCTYPE html>
<?PHP
require_once(__DIR__ . '/classes/class_client.php');
require_once(__DIR__ . '/classes/class_article.php');
$client = new client();
$article = new article();
if ($_GET['name']) {
    $name = $_GET['name'];
    $date = $_GET['date'];
    $capercity = $_GET['capercity'];
    $price = $_GET['price'];
    $article->add($name, $price, $capercity, $date);
}
//Hole das Artikel- und Clientarray
$aArticle = $article->getArticle();
//Schaut nach, ob ausgelogt werden soll, nur wenn die Id = 12 ist
if ($_GET[id] == '12') {
    $client->log_out();
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../style/stylesheet.css">
    <script type="text/javascript" src="../function.js"></script>
    <title>Webshop 3.0 - Adminbereich</title>
</head>
<body id="ctl_backend_index">
<div id="content">
    <!-- Ausgabe im Backend -->
    <h1>Willkommen beim Webshop der Konzertagentur "von Krach bis Klang"</h1>

    <div>
        <table class="article">
            <tr>
                <th>Konzerttermin</th>
                <th>Veranstaltung</th>
                <th>Kartenvorrat</th>
                <th>Preis</th>
            </tr>
            <?PHP foreach ($aArticle as $Article) {
                $date = new DateTime($Article['date']); ?>
                <tr>
                    <td><?PHP echo(date_format($date, "d.m.Y")); ?></td>
                    <td><?PHP echo($Article['a_name']); ?></td>
                    <td><?PHP echo($Article['a_menge']); ?></td>
                    <td><?PHP echo($Article['a_preis']); ?> Euro</td>
                </tr>
            <?PHP } ?>
        </table>
        <form method="get" action="index.php" onsubmit="return form_check(this);">
            <table>
                <tr>
                    <th>Konzerttermin</th>
                    <th>Veranstaltung</th>
                    <th>Kartenvorrat</th>
                    <th>Preis</th>
                </tr>
                <tr>
                    <td><input type="text" name="date" placeholder="yyyy-mm-dd"/></td>
                    <td><input type="text" name="name"/></td>
                    <td><input type="text" name="capercity" placeholder="mind. 1"/></td>
                    <td><input type="text" name="price" placeholder="€€.€€"/></td>
                </tr>
            </table>
            <input type="submit" value="hinzuf&uuml;gen" title="hinzuf&uuml;gen"/>
        </form>
    </div>
    <p><?php echo("<a href=" . $_SERVER['PHP_SELF'] . '?id=12' . ">logout</a>"); ?></p>
</div>
</body>
</html>