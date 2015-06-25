<?php

require_once 'class_session.php';

class client extends session
{
    public $ok;
    private $aClient = array();

    public function __construct($login = NULL, $pass = NULL)
    {
        parent::__construct();
        if (!$_SESSION['client'] || !is_null($pass)) {
            $this->log_in($login, $pass);
        } else if ($_SESSION['client']) {
            $this->aClient = $_SESSION['client'];
        }
    }

    public function __destruct()
    {
        $_SESSION['client'] = $this->aClient;
    }

    private function log_in($login, $pass)
    {
        $client = $this->connect($login, $pass);
        if ($client) {
            $this->aClient["kndNr"] = $client[k_kundennummer];
            $this->aClient["kndSur"] = $client[k_vorname];
            $this->aClient["kndName"] = $client[k_name];
            $this->aClient["kndMail"] = $client[k_email];
            $this->aClient["kndStr"] = $client[k_strasse];
            $this->aClient["kndPLZ"] = $client[k_plz];
            $this->aClient["kndOrt"] = $client[k_ort];
            $this->aClient["kndPass"] = $client[k_passwort];
            $this->aClient["kndLogin"] = $client[k_kennung];
            $this->ok = true;
        } else {
            $this->ok = false;
        }
    }

    public function log_out()
    {
        session_destroy();
        header('location: index.php');
        exit(1);
    }

    public function regis($login, $pass, $name, $surename, $street, $email, $city, $post)
    {
        $user = 'magnus';
        $host = 'localhost';
        $pass = 'Lilie1123581321';
        $database = '1126_u12345678';
        $db = mysqli_connect($host, $user, $pass, $database);
        if (!$db) {
            exit("Verbindungsfehler: " . mysqli_connect_error());
        } else {
            $sql = "INSERT INTO " . $database . ".`ws_kunden` (`k_kundennummer`, `k_name`, `k_vorname`, `k_plz`, `k_ort`, `k_email`, `k_passwort`, `k_kennung`, `k_strasse`) VALUES (NULL, '$name', '$surename', '$post', '$city', '$email', '$pass', '$login', '$street');";
            $query = mysqli_query($db, $sql);
        }
    }

    private function connect($login, $password)
    {
        $user = 'magnus';
        $host = 'localhost';
        $pass = 'Lilie1123581321';
        $database = '1126_u12345678';
        $db = mysqli_connect($host, $user, $pass, $database);
        if (!$db) {
            exit("Verbindungsfehler: " . mysqli_connect_error());
        } else {
            $sql = "SELECT * FROM ws_kunden where k_kennung = '$login' AND k_passwort = '$password'";
            $result = mysqli_fetch_assoc(mysqli_query($db, $sql));
            return $result;
        }
    }

    public function get_Client()
    {
        return $this->aClient;
    }

}

?>