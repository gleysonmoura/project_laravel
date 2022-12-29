<?php
    $page = ($_GET['page']??'login');

    match ($page){
        'register' => do_register(),
        'login' => do_login(),
        'forget_password' => do_forget_password(),
        default => do_not_found()
    };

