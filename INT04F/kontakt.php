<!DOCTYPE html>

<html>
<head>
	<title>maidcafelotos.de - Kontakt</title>

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
		<article>
			<form action="antwort.php" method="POST"> 
				Vorname:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="name" name="Vorname" class="textfeld" placeholder="Max" autofocus /><br />
				<br />
				Name*:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="name"  name="Nachname" class="textfeld" placeholder="Mustermann" required /><br />
				<br />
				E-Mail*:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="email"	name="EMail" class="textfeld" placeholder="max.mustermann@aol.de" required /><br />
				<br />
				Ihr Anliegen*:&nbsp;&nbsp;&nbsp;<textarea type="text" name="Anliegen" class="textfeld" required ></textarea><br />
				<br />
				<input type="submit" class="submit" value="Formular jetzt absenden" />
			</form>
		</article>
	</section>
	<footer>
		&copy; Magnus K. und Franziska K.
	</footer>
</section>
</body>
</html>