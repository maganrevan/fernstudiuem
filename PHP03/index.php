<!DOCTYPE html>
<?PHP session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Webshop 3.0</title>
        <link rel="stylesheet" type="text/css" href="style/stylesheet.css">
        <script type="text/javascript" src="function.js"></script>
    </head>
    <body>
        <div id="content">
            <form name="login" method="POST" action="login.php" id="login" onsubmit="return form_check(this);">
                <div><div><label>Loginname:</label></div><div><input name="login" type="text" /></div></div>
                <div><div><label>Passwort:</label></div><div><input name="pass" type="password" /></div></div>
                <div><input type="submit" value="einloggen" /></div>
            </form>
            <hr>
            <a href="reg.php">registrieren?</a>
        </div>
    </body>
</html>
