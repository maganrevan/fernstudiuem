<?PHP
	
	$Nachname = $_POST["Nachname"];
	$Vorname = $_POST["Vorname"];
	$EMail = $_POST["EMail"];
	$Anliegen = $_POST["Anliegen"];
	
	$Empfaenger="f.abshagen@web.de";
	$Betreff="maidcafelotos.funpic.de | hier: Nachricht über Ihre Internetseite";

	@mail($Empfaenger,$Betreff,
"Über das Kontaktformular wurde folgende Anfrage gestellt:
---------------------------------------------------------------------------

Name: 	$Nachname
Vorname: $Vorname

E-Mail: $EMail

Anfrage:
$Anliegen

---------------------------------------------------------------------------
	
","From: \"$Nachname\" <$EMail>");


?>	
<!DOCTYPE html>

<html>
<head>
	<title>maidcafelotos.de - Antwort</title>

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

<body id="kontakt">
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
		<article><br />
			Vielen Dank für Ihr Interesse an meiner Idee. Ich werde mich ggf. umgehend bei Ihnen melden.
			<br><br>
			Mit freundlichen Gr&uuml;ßen<br />
			F. Kruschwitz
			<br><br>
			&raquo; <a href="index.php">zur Startseite</a><br /><br />
		</article>
	</section>
	<footer>
		&copy; Magnus K. und Franziska K.
	</footer>
</section>
</body>
</html>