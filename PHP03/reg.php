<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Webshop 3.0</title>
        <link rel="stylesheet" type="text/css" href="style/stylesheet.css">
    </head>
    <body>
        <div id="content">
            <form name="reg" id="login" method="POST" action="regis.php">
                <div>
                    <div>
                        <label>Name:</label>
                    </div>
                    <div>
                        <input type="text" name="name" />
                    </div>
                </div>
                <div>
                    <div>
                        <label>Vorname:</label>
                    </div>
                    <div>
                        <input type="text" name="vorname" />
                    </div>
                </div>
                <div>
                    <div>
                        <label>Strasse:</label>
                    </div>
                    <div>
                        <input type="text" name="strasse" />
                    </div>
                </div>
                <div>
                    <div>
                        <label>PLZ:</label>
                    </div>
                    <div>
                        <input type="text" name="plz" />
                    </div>
                </div>
                <div>
                    <div>
                        <label>Ort:</label>
                    </div>
                    <div>
                        <input type="text" name="ort" />
                    </div>
                </div>
                <div>
                    <div>
                        <label>E-Mail:</label>
                    </div>
                    <div>
                        <input type="text" name="email" />
                    </div>
                </div>
                <div>
                    <div>
                        <label>Loginname :</label>
                    </div>
                    <div>
                        <input type="text" name="login" />
                    </div>
                </div>
                <div>
                    <div>
                        <label>Passwort:</label>
                    </div>
                    <div>
                        <input type="password" name="pass" />
                    </div>
                </div>
                <div>
                    <input type="submit" value="registrieren" /><input type="reset" value="reset" />
                </div>
            </form>
            <input type="button" onclick="window.history.back();" value="zur&uuml;ck" />
        </div>
    </body>
</html>
