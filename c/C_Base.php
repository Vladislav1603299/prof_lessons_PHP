<?php
include_once 'C_Controller.php';

include_once 'm/User.php';

abstract class C_Base extends C_Controller
{
    protected $title;
    protected $content;

    function __construct()
    {
    }

    protected function before()
    {
        $this->title = 'Сайт::';
        $this->content = '';
    }

    public function render()
    {
        $get_user = new User();

        if (isset($_SESSION['user_id'])) {
            $user_info = $get_user->get($_SESSION['user_id']);
            while ($data = mysqli_fetch_assoc($user_info)) {
                $name = $data['name'];
            }
        } else {
            $user_info['name'] = false;
        }

        $vars = [
            'title' => $this->title,
            'content' => $this->content,
            'user' => $name,
        ];

        $page = $this->Template('v/v_main.php', $vars);
        echo $page;
    }
}
