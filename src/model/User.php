<?php
require_once('Manager.php');
class User extends Manager
{
    //try to login the user and return the username if successfull
    public function login(string $email, string $password): ?string
    {
        if ($this->loginInputIsValid($email, $password)) {
            $query = 'SELECT * FROM users WHERE email=:email';
            $req = $this->getDb()->prepare($query);
            $req->bindParam(':email', $email, PDO::PARAM_STR);
            $req->execute();
            $user = $req->fetch();
            if (!$user || !password_verify($password, $user['password'])) {
                throw new InvalidArgumentException('Failed to LogIn. Email or password incorrect');
            } else {
                return $user['username'];
            }
        }
    }
    public function register(
        string $username,
        string $email,
        string $password,
        string $password_verif
    ): void {
        if ($this->registerInputIsValid($username, $email, $password, $password_verif)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $query = 'INSERT INTO users(username, email, password) VALUES(:username, :email, :password)';
            $req = $this->getDb()->prepare($query);
            $req->execute(array(
                'username' => $username,
                'email' => $email,
                'password' => $hash,
            ));
        }
    }
    //return true on success, and throw exception if input is not valid
    public function registerInputIsValid(
        string $username,
        string $email,
        string $password,
        string $password_verif
    ): bool {
        if ($password !== $password_verif) {
            throw new InvalidArgumentException('Passwords don\'t match');
        } else if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Invalid email format');
        } else if (empty($username) || !$this->filterUsername($username) || strlen($username) <= 5) {
            throw new InvalidArgumentException('Invalid username format');
        } else if (empty($password) || !$this->filterPassword($password)) {
            throw new InvalidArgumentException('Invalid password format');
        } else {
            return true;
        }
    }
    public function loginInputIsValid(string $email, string $password): bool
    {
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Invalid email format');
        } else if (empty($password) || !$this->filterPassword($password)) {
            throw new InvalidArgumentException('Invalid password format');
        } else {
            return true;
        }
    }
    public function filterUsername(string $username, string $filter = "/^[a-zA-Z0-9]{6,}$/")
    {
        return preg_match($filter, $username);
    }
    public function filterPassword(string $password, string $filter = "/^(?=.*[$&+,:;=?@#|'<>.-^*()%!])(?=.*[A-Za-z]).{12,}$/")
    {
        return preg_match($filter, $password);
    }

}
