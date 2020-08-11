<?php
class Login_Model extends Model
{
    public function run($name, $password)
    {
        $db = new Database();
        $sth = $db->prepare("SELECT id FROM users WHERE name = :name AND password = :password");
        $sth->execute(array(
            ':name' => $name,
            ':password' => $password
        ));

        $data = $sth->fetchAll();
        $count = $sth->rowCount();
        if ($count > 0)
        {
            Session::init();
            Session::set('loggedIn', true);
            Session::set('login', $name);
            header('Location: /mvc/index');
        }
        else
        {
            header('Location: /mvc/login');
            echo "incorrect username or password";
        }
    }

}
