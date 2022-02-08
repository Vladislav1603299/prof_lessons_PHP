<?php
include_once 'c/C_Page.php';
include_once 'c/C_User.php';
/*function __autoload($classname)
{
    include_once "c/$classname.php";
}*/

$action = 'action_';
$action .= isset($_GET['act']) ? $_GET['act'] : 'index';

if (isset($_GET['c'])) {
    if ($_GET['c'] == 'page') {
        $controller = new C_Page();
    } elseif ($_GET['c'] == 'user') {
        $controller = new C_User();
    }
} else {
    $controller = new C_Page();
}

$controller->Request($action);
