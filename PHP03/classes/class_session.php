<?php

class session
{

    protected $cart = array();

    public function __construct ()
    {
        session_start();
        
        if ( !is_array($_SESSION[ 'cart' ]) )
        {
            $_SESSION[ 'cart' ] = array();
        }
        $this->cart = $_SESSION['cart'];
    }

    public function __destruct ()
    {
        $_SESSION['cart'] = $this->cart;
    }
    
    public function getSessionData()
    {
        return $this->cart;
    }
}

?>
