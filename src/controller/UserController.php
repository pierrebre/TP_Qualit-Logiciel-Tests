<?php
require_once('model/User.php');
class UserController
{
    public function __construct()
    {
        $this->user = new User();
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
            $email = isset($_POST['email']) ? $_POST['email'] : NULL;
            $password = isset($_POST['password']) ? $_POST['password'] : NULL;
            $username = $this->user->login($email, $password);
            $_SESSION['username'] = $username;
            $this->redirect('index.php?action=welcome');
        }
        require('view/login.php');
    }
    public function register(): void
    {
        if (isset($_POST['submit'])) {
            $username = isset($_POST['username']) ? $_POST['username'] : NULL;
            $email = isset($_POST['email']) ? $_POST['email'] : NULL;
            $password = isset($_POST['password']) ? $_POST['password'] : NULL;
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
