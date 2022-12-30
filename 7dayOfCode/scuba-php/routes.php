<?php
$page = ($_GET['page'] ?? 'login') . '.view';
$content = file_get_contents(VIEW_FOLDER . $page);
echo $content;
$page = $_GET['page'] ?? 'login';
switch ($page) {
    case 'login':
        do_login();
        break;
    case 'register':
        do_register();
        break;
    default:
        do_not_found();
        break;
}
