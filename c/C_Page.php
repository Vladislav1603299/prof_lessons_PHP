<?php

include_once 'm/model.php';
include_once 'C_Base.php';

class C_Page extends C_Base
{
    public function action_index()
    {
        $this->title .= '::Чтение';
        $text = text_get();
        $this->content = $this->Template('v/v_index.php', ['text' => $text]);
    }

    public function action_edit()
    {
        $this->title .= '::Редактирование';

        if ($this->isPost()) {
            text_set($_POST['text']);
            header('location: index.php');
            exit();
        }

        $text = text_get();
        $this->content = $this->Template('v/v_edit.php', ['text' => $text]);
    }
}
