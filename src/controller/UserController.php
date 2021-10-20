<?php
require_once('model/User.php');
class UserController
{
    public function __construct()
    {
        $this->user = new User();
        $this->username_field = 'username';
        $this->password_field = 'password';
        $this->email_field = 'email';
    }

    public function handleRequest()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : NULL;
        if ($action === 'login') {
            $this->login();
        } else if ($action === 'register') {
            $this->register();
        } else if ($action === 'welcome') {
            $this->welcome();
        } else if ($action === 'logout') {
            $this->logout();
        } else if (is_null($action)) {
            $this->home();
        } else {
            throw new InvalidArgumentException('Page for ' . $action . ' was not found!');
        }
    }
    public function login(): void
    {
        if (isset($_POST['submit'])) {
            $email = isset($_POST[$this->email_field]) ? $_POST[$this->email_field] : NULL;
            $password = isset($_POST[$this->password_field]) ? $_POST[$this->password_field] : NULL;
            $username = $this->user->login($email, $password);
            $_SESSION[$this->username_field] = $username;
            $this->redirect('index.php?action=welcome');
        }
        require('view/login.php');
    }
    public function register(): void
    {
        if (isset($_POST['submit'])) {
            $username = isset($_POST[$this->username_field]) ? $_POST[$this->username_field] : NULL;
            $email = isset($_POST[$this->email_field]) ? $_POST[$this->email_field] : NULL;
            $password = isset($_POST[$this->password_field]) ? $_POST[$this->password_field] : NULL;
            $password_verif = isset($_POST['password_verif']) ? $_POST['password_verif'] : NULL;
            $this->user->register($username, $email, $password, $password_verif);
            $this->redirect('index.php?action=login');
        }
        require('view/register.php');
    }
    public function logout(): void
    {
        session_destroy();
        $this->redirect('index.php');
    }
    public function welcome(): void
    {
        require('view/welcome.php');
    }
    public function home(): void
    {
        require('view/home.php');
    }
    private function redirect($location): void
    {
        header('Location: ' . $location);
    }
}
