<?php
if (isset($user)){
    $dc = new DefaultsController($user);
}else{
    $dc = new DefaultsController;
}


class DefaultsController
{
    private static $dcuser;
    private static $loggedin;
    private static $authed;
    private $dbcontroller;
    function __construct($u = NULL)
    {
        include_once 'php/debug_to_console.php';
        $this::$dcuser = $u;
        $this::$loggedin = isset($_SESSION['id']) && isset($this::$dcuser);
        debtoc($this::$dcuser);
        $this::$authed = $this::$loggedin? 'authed': 'not_authed';
        $this->dbcontroller = new DBController();
    }
    public function onauth($html, $default = '', $roleneeded = false){
        if ($roleneeded){
            $thatrole = $this->dcuser::$role == $roleneeded;
        }else{
            $thatrole = true;
        }
        if ($this::$loggedin && $thatrole){
            return $html;
        }else{
            return $default;
        }
    }
    private function loadsmth($var)
    {
        
        $return = $this->dbcontroller->selectone('erm_zeroes', 'variable', $var, $this::$authed);
        
        if (!$return) {
            $return = '!NULL!';
        }
        return $return;
    }
    public function notification($text, $type)
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