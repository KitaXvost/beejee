<?php
class Index extends Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->view->render('index/index');
        require 'views/header.php';
        require 'models/index_model.php';

    }

    public function index($sort = 'id')
    {
        $tasks = Index_Model::index($id, $name, $email, $class, $sort);
        $total = Index_Model::getCount(); //всего записей
        $kol = 3; //количество записей для вывода
        $art = ($page * $kol) - $kol; //с какой записи выводить
        $str_pag = ceil($total / $kol); // Количество страниц для пагинации
        require 'views/index/index.php';
        require 'views/footer.php';
    }

    public function task_show($id = false)
    {
        //$this->model->task_show();
        $task = Index_Model::task_show($id);
        require 'views/index/task_show.php';
    }

    public function task_add()
    {
        require 'views/index/task_add.php';
        if (isset($_POST['add']))
        {
            $id = '';
            $name = $_POST['name'];
            $email = $_POST['email'];
            $class = $_POST['task'];
            $task = Index_Model::task_add($id, $name, $email, $class);
        }
    }
    public function task_edit($id = false)
    {
        $task = Index_Model::task_show($id);
        require 'views/index/task_edit.php';

        if (isset($_POST['add']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $class = $_POST['task'];
            $status = $_POST['status'];
            $task = Index_Model::task_edit($id, $name, $email, $class, $status);
        }
    }

    public function task_delete($id = false)
    {
        $task = Index_Model::task_show($id);
        require 'views/index/task_delete.php';

        if (isset($_POST['add']))
        {
            $task = Index_Model::task_delete($id);
        }

    }

}
