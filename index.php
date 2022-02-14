<?php
include_once 'c/C_User.php';
include_once 'c/C_Goods.php';
include_once 'c/C_Bascet.php';

$action = 'action_';
$action .= isset($_GET['act']) ? $_GET['act'] : 'index';

if (isset($_GET['c'])) {
    if ($_GET['c'] == 'user') {
        $controller = new C_User();
    } elseif ($_GET['c'] == 'goods') {
        $controller = new C_Goods();
    } elseif ($_GET['c'] == 'bascet') {
        $controller = new C_Bascet();
    }
} else {
    $controller = new C_Goods();
}

$controller->Request($action);
