<?php
class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this
            ->view
            ->render('login/index');
    }
    function index()
    {
        if (isset($_POST['add']))
        {
            $name = $_POST['name'];
            $password = $_POST['password'];
            require 'models/login_model.php';
            $task = Login_Model::run($name, $password);
        }
    }

}
