<?php
if (isset($_POST["ergebnis"])) {
  setcookie("voted", "ja");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>maidcafelotos.de - Umfrage</title>

		<meta name="keywords" lang="de" content="Lotosbl&uuml;te, Maidcaf&eacute;, Umfrage Geschäftsidee">
		<meta name="description" content="&bdquo;Willkommen zu Hause Meister&rdquo;">
		
		<meta name="robots" content="index,follow" />
		<meta name="author" content="Magnus Kruschwitz" />
		<meta name="revisit-after" content="30 days" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />


		<!-- Begin Stylesheet -->
		<link type="text/css" rel="stylesheet" href="styles/main.css" media="screen" />
		<!-- End Stylesheet -->
</head>
<body id="umfrage">
<section id="content">
	<header>
		<img src="bilder/content/header/header.png" alt="Maidcafe Lotosblüte" />
	</header>
	<nav>
		<ul>
			<li><a href="index.html" class="home">Home</a></li>
			<li><a href="maidcafe.html" class="maidcafe">Maidcafé</a></li>
			<li><a href="umfrage.php" class="umfrage">Umfrage</a></li>
			<li><a href="kontakt.php" class="kontakt">Kontakt</a></li>
		</ul>
	</nav>
	<section>
		<article>
			<h2>Lohnt sich ein Maidcaf&eacute; in Deutschland zu er&ouml;ffnen?</h2>
			<form action="umfrage.php" method="post">
			<p>
			<input type="radio" name="ergebnis" value="0"> ja<br />
			<input type="radio" name="ergebnis" value="1"> nein<br />
			<input type="radio" name="ergebnis" value="2"> vielleicht
			</p>
			<?php
			/* Submit nur zeigen, wenn Formular noch nicht abgeschickt/gevoted */
			if (empty($_COOKIE["voted"]) && !isset($_POST["ergebnis"])) {
			  echo "<input type=\"submit\" value=\"Daten senden\">\n";
			} else {
			  // Formular abgeschickt? Aber bisher noch nicht gevoted?
			  if (empty($_COOKIE["voted"]) && isset($_POST["ergebnis"])) {
				$ergebnis = $_POST["ergebnis"];
				// Wert aus Formular überprüfen
				$muster = "/^[0-2]$/"; // regulärer Ausdruck für 0-2
				if (preg_match($muster, $ergebnis) == 0) {
				  die("<p>Abbruch wegen Manipulation!</p></form></body></html>");
				}
				// Dateiname in Variable speichern
				$datei = "result.txt";
				$fp = fopen($datei, "r+");
				$vote = fread($fp, filesize($datei));
				// String mit Komma als Trenner in Array zerlegen
				$vote = explode(",", $vote);
				// Welcher Wert wurde im Formular ausgewählt?
				// Diese Position wird um 1 erhöht!
				$vote[$ergebnis]++;
				// String neu zusammensetzen
				$vote = $vote[0].",".$vote[1].",".$vote[2];
				rewind($fp);
				// neuen String in Datei schreiben
				fputs($fp,$vote);
				fclose($fp);
				echo "<p>Danke f&uuml;r die &Uuml;bermittlung der Daten!</p>\n";
			  }
			}
			?>
			</form>
			<p> 
			[ <a href="ergebnis.php" target="_blank">Umfrageergebnisse ansehen</a> ]
			</p>
		</article>
	</section>
	<footer>
		&copy; Magnus K. und Franziska K.
	</footer>
</section>
</body>
</html>