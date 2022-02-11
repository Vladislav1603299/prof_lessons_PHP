<?php
include_once "config/DB.php";

class User extends DB{
    public $user_id, $user_login, $user_name, $user_password;


    public function pass($name, $password)
    {
        return strrev(md5($name)) . md5($password);
    }


    public function get($id)
    {
        $sql = "SELECT * FROM users WHERE id = '" . $id . "'";
        $res = mysqli_query($this->connect, $sql);
        return $res;
    }

    public function newR($name, $login, $password)
    {
        $sql = "SELECT * FROM users WHERE login = '" . $login . "'";
        $res = mysqli_query($this->connect, $sql);
        if (mysqli_num_rows($res) == 0) {
            if (
                mysqli_query(
                    $this->connect,
                    "INSERT INTO users VALUES (null, '" .
                        $name .
                        "', '" .
                        $login .
                        "', '" .
                        $this->pass($name, $password) .
                        "')"
                )
            ) {
                return 'Вы успешно зарегистрированы!';
            }
        } else {
            return 'Логин уже используется!';
        }
    }

    public function login($login, $password)
    {
        $sql = "SELECT * FROM users WHERE login = '" . $login . "'";
        $res = mysqli_query($this->connect, $sql);
        if (mysqli_num_rows($res) != 0) {
            while ($data = mysqli_fetch_assoc($res)) {
                if (
                    $data['password'] ==
                    $this->pass($data['name'], strip_tags($password))
                ) {
                    $_SESSION['user_id'] = $data['id'];
                    return 'Добро пожаловать, ' . $data['name'] . '!';
                } else {
                    return 'Пароль не верный!';
                }
            }
        } else {
            return 'Пользователь с таким логином не зарегистрирован!';
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user_id'])) {
            $_SESSION['user_id'] = null;
            session_destroy();
            return true;
        }
        return false;
    }
}
?>
