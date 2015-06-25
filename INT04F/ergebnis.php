<!DOCTYPE html>
<html>
<head>
	<title>maidcafelotos.de - Ergebnis</title>

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
<body id="ergebnis">
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
			<h2>Die Umfrage-Ergebnisse:</h2>
			<?php
			$datei = "result.txt";
			$fp = fopen($datei, "r");
			$vote = fread($fp, filesize($datei));
			fclose($fp);
			// String zerlegen, Array entsteht
			$vote = explode(",", $vote);
			// Gesamtzahl aller Wahlvorgänge
			$gesamt = $vote[0] + $vote[1] + $vote[2];
			if ($gesamt > 0) {
			  // Höchstlänge der Balken angeben
			  $laenge = 400;
			  // Anteil von Balken 1 (Indexwert 0!)
			  $laenge0 = $vote[0] * $laenge / $gesamt;
			  // Anteil von Balken 2 (Indexwert 1!)
			  $laenge1 = $vote[1] * $laenge / $gesamt;
			  // Anteil von Balken 3 (Indexwert 2!)
			  $laenge2 = $vote[2] * $laenge / $gesamt;
			  // Werte auf ganze Zahlen runden
			  $laenge0 = round($laenge0);
			  $laenge1 = round($laenge1);
			  $laenge2 = round($laenge2);
			  // Prozentwert 0 ermitteln:
			  $prozent0 = 100 * $vote[0] / $gesamt;
			  // Prozentwert 0 runden:
			  $prozent0 = round($prozent0);
			  // Prozentwert 1 ermittlen und runden:
			  $prozent1 = 100 * $vote[1] / $gesamt;
			  $prozent1 = round($prozent1);
			  // Prozentwert 2 ermittlen und runden:
			  $prozent2 = 100 * $vote[2] / $gesamt;
			  $prozent2 = round($prozent2);
			?>
			<p>Anzahl der Stimmen: <b><?php echo $gesamt; ?></b></p>
			<section class="ergebnis">
				<table border="0">
				<tr>
				<td width="100">ja</td>
				<td>&nbsp;</td><td width="<?php echo $laenge0; ?>" bgcolor="red">&nbsp;</td>
				<td>&nbsp;<i><?php echo "$prozent0% ($vote[0])"; ?></i></td>
				</tr></table>
				<table border="0">
				<tr>
				<td width="100">nein</td>
				<td>&nbsp;</td><td width="<?php echo $laenge1; ?>" bgcolor="green">&nbsp;</td>
				<td>&nbsp;<i><?php echo "$prozent1% ($vote[1])"; ?></i></td>
				</tr></table>
				<table border="0">
				<tr>
				<td width="100">vielleicht</td>
				<td>&nbsp;</td><td width="<?php echo $laenge2; ?>" bgcolor="black">&nbsp;</td>
				<td>&nbsp;<i><?php echo "$prozent2% ($vote[2])"; ?></i></td>
				</tr></table>
				<?php
				} else {
				  echo "<p>Bisher wurden noch keine Stimmen abgegeben!</p>";
				} 
				?>
			</section>
		</article>
	</section>
	<footer>
		&copy; Magnus K. und Franziska K.
	</footer>
</section>
</body>
</html>