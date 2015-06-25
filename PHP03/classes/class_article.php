<?php

require_once 'classes/class_session.php';

class article extends session
{

    protected $aArticle = array();

    public function __construct()
    {
        parent::__construct();
        $this->aArticle = $this->connect();
    }

    public function getArticle()
    {
        return $this->aArticle;
    }

    public function choose($id, $article)
    {
        foreach ($article as $value) {
            if ($id == $value['a_artikelnr']) {
                $this->cart[] = $value;
            }
        }
    }

    public function order($client)
    {
        $to = $client['kndMail'];
        $subject = 'Ihre Bestellung bei unsreem Webshop';
        $message = 'Dies ist eine Testbestellung im Rahmen des Heftes PHP03';
        mail($to, $subject, $message);
        $user = 'magnus';
        $host = 'localhost';
        $pass = 'Lilie1123581321';
        $database = '1126_u12345678';
        $db = mysqli_connect($host, $user, $pass, $database);
        if (!$db) {
            exit("Verbindungsfehler: " . mysqli_connect_error());
        } else {
            foreach ($this->cart as $value) {
                $sql = "UPDATE ws_artikel SET a_menge = ( a_menge -1 ) WHERE a_artikelnr = " . $value['a_artikelnr'];
                mysqli_query($db, $sql);
            }
        }
        $this->cart = array();
        return ($sql);
    }

    private function connect()
    {
        $user = 'magnus';
        $host = 'localhost';
        $pass = 'Lilie1123581321';
        $database = '1126_u12345678';
        $db = mysqli_connect($host, $user, $pass, $database);
        if (!$db) {
            exit("Verbindungsfehler: " . mysqli_connect_error());
        } else {
            $sql = "SELECT * FROM `ws_artikel` WHERE `date` > CURDATE() ORDER BY 'date' DESC ";
            $data = mysqli_query($db, $sql);
            //Gibt ein mehrdimensionales Array aus
            while ($row = $data->fetch_array(MYSQLI_ASSOC)) {
                $result[] = $row;
            }
            return $result;
        }
    }

    public function add($name, $price, $capercity, $date)
    {
        $last = 0;
        foreach ($this->aArticle as $value) {
            if ($last < intval($value['a_artikelnr'])) {
                $last = intval($value['a_artikelnr']);
            }
        }
        $last += 1001;
        $user = 'magnus';
        $host = 'localhost';
        $pass = 'Lilie1123581321';
        $database = '1126_u12345678';
        $db = mysqli_connect($host, $user, $pass, $database);
        if (!$db) {
            exit("Verbindungsfehler: " . mysqli_connect_error());
        } else {
            $sql = "INSERT INTO " . $database . ".`ws_artikel` (`a_id`, `a_artikelnr`, `a_name`, `a_preis`, `a_menge`, `date`) VALUES (NULL, '$last', '$name', '$price', '$capercity', '$date');";
            mysqli_query($db,$sql);
        }
        $this->aArticle = $this->connect();
    }

}


?>