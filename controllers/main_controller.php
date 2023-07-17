<?php
$dc = new DefaultsController;

class DefaultsController
{
    private $user_status;
    private static $loggedin;
    private $dbcontroller;
    function __construct()
    {
        $this::$loggedin = isset($_SESSION['id']) ? 'authed' : 'not_authed';
        $this->dbcontroller = new DBController();
    }
    private function loadsmth($var)
    {
        $return = $this->dbcontroller->selectone('erm_zeroes', 'variable', $var, $this::$loggedin);
        if (!$return) {
            $return = '!NULL!';
        }
        return $return;
    }
    public function notification($type, $text)
    {
        switch ($type)
        {
            case 0:
                $substyle = 'info';
                $symbol = 'i';
                break;
            case 1:
                $substyle = 'ok';
                $symbol = '&#10003;';
                break;
            case 2:
                $substyle = 'error';
                $symbol = '&#10006;';
                break;
        }
        $notification = <<<_not
            <div class='notif notif_$substyle'>
                <div class='notif_symbol_div'>
                    <span class='notif_symbol_span notif_symbol_span_$substyle'>$symbol</span>
                    $text
                </div>
            </div>
        _not;
        echo $notification;
    }
    public function auth_key()
    {
        echo $this->loadsmth('html_auth_key');
    }
    public function shop_add_prod()
    {

    }
}
?>