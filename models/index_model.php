<?php
class Index_Model extends Model
{
    public function index($id, $name, $email, $class, $sort)
    {
        echo '<div class="text-right">' . $_SESSION['login'] . '</div>';
        $db = new Database();

        if (isset($_GET['page']))
        {
            $page = $_GET['page'];
        }
        else $page = 1;

        $kol = 3; //количество записей для вывода
        $art = ($page * $kol) - $kol; //с какой записи выводить
        $str_pag = ceil($total / $kol); // Количество страниц для пагинации
        $stm = $db->prepare('SELECT * FROM `users` ORDER BY ' . $sort . ' ASC LIMIT ?,?');
        $stm->bindValue(1, $art, PDO::PARAM_INT);
        $stm->bindValue(2, $kol, PDO::PARAM_INT);
        $stm->execute();

        $task = array();
        $i = 0;
        while ($row = $stm->fetch())
        {
            $task[$i]['id'] = $row['id'];
            $task[$i]['name'] = $row['name'];
            $task[$i]['email'] = $row['email'];
            $task[$i]['task'] = $row['task'];
            $task[$i]['status'] = $row['status'];
            $i++;
        }
        return $task;
    }

    public function getCount()
    {
        $db = new Database();
        $sql = 'SELECT count(id) AS count FROM users';
        $result = $db->prepare($sql);
        $result->execute();
        $row = $result->fetch();
        return $row['count'];
    }

    public function task_show($id)
    {
        $db = new Database();
        $stmt = $db->prepare("SELECT * FROM `users` WHERE `id` = ?");
        $stmt->execute([$id]);
        $task = $stmt->fetch();
        return $task;
    }

    public function task_add($id, $name, $email, $class)
    {
        $db = new Database();
        $query = "INSERT INTO users
               SET id=:id, name=:name, email=:email, task=:task";

        $stmt = $db->prepare($query);

        $name = htmlspecialchars(strip_tags($name));
        $email = htmlspecialchars(strip_tags($email));
        $class = htmlspecialchars(strip_tags($class));

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":task", $class);
        $stmt->execute();
        header('Location: /mvc/index');
    }

    function task_edit($id, $name, $email, $class, $status)
    {
        $db = new Database();
        $query = "UPDATE
                   users
               SET
                   name = :name,
                   email = :email,
                   task = :class,
                   status = :status
               WHERE
                   id = :id";
        $params = [':id' => $id, ':name' => $name, ':email' => $email, ':class' => $class, ':status' => $status];
        $stmt = $db->prepare($query);
        $stmt->execute($params);

        header('Location: /mvc/index');
    }

    function task_delete($id)
    {
        $db = new Database();
        $query = "DELETE FROM users WHERE `id` = ?";
        $params = [$id];
        $stmt = $db->prepare($query);
        $stmt->execute($params);
        header('Location: /mvc/index');
    }

}
