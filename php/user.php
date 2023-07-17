<?php
session_set_cookie_params(['SameSite' => 'strict']);
session_start();
if (isset($_SESSION['id']))
{
    
    $user = new User($_SESSION['id']);
}

class User
{
    public $name;
    public $role;
    private $date_of_reg;
    public $id;
    private $email;
    private $session_id;
    private $udbc;
    public $profile_img = 'imgs/profile.jpg';
    function __construct(int $uid)
    {
        $this->id = $uid;
        $this->udbc = new DBController;
        $this->role = $this->udbc->selectone('users', 'id', $_SESSION['id'], 'role');
    }

    function make_apost()
    {
        
    }
    public function logout()
    {
        setcookie(session_name(), '', time() -259000, '/');
        session_destroy();
    }

}

?>