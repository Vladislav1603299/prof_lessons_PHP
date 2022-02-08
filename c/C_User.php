<?php
include_once 'm/User.php';
include_once 'C_Base.php';

class C_User extends C_Base
{
    public function action_info()
    {
        $get_user = new User();
        $user_info = $get_user->get($_SESSION['user_id']);
        while ($data = mysqli_fetch_assoc($user_info)) {
            $this->title .= '::' . $data['name'];
            $this->content = $this->Template('v/u_info.php', [
                'username' => $data['name'],
                'userlogin' => $data['login'],
            ]);
        }
    }

    public function action_reg()
    {
        $this->title .= 'Регистрация';
        $this->content = $this->Template('v/u_reg.php', []);

        if ($this->isPost()) {
            $new_user = new User();
            $result = $new_user->newR(
                $_POST['name'],
                $_POST['login'],
                $_POST['password']
            );
            $this->content = $this->Template('v/u_reg.php', [
                'text' => $result,
            ]);
        }
    }

    public function action_login()
    {
        $this->title .= '::Вход';
        $this->content = $this->Template('v/u_login.php', []);

        if ($this->isPost()) {
            $login = new User();
            $result = $login->login($_POST['login'], $_POST['password']);
            $this->content = $this->Template('v/u_login.php', [
                'text' => $result,
            ]);
        }
    }

    public function action_logout()
    {
        $logout = new User();
        $result = $logout->logout();
        return $result;
    }
}
?>
