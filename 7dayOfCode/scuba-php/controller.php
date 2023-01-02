<?php
function do_register()
{
    if ($_POST['person'] ?? false) {
        register_post();
    } else {
        register_get();
    }
}

function register_get()
{
    render_view('register');
}

function register_post()
{
    $validation_errors = validate_register($_POST['person']);
    if (count($validation_errors) == 0) {
        unset($_POST['person']['password-confirm']);
        crud_create($_POST['person']);
        header("Location: /?page=login");
        header("Location: /?page=login&from=register");
    } else {
        render_view('register');
        $messages = [
            'validation_errors' => $validation_errors
        ];
        render_view('register', $messages);
    }
}

function do_login()
{
    render_view('login');
    $messages = [];
    switch ($_GET['from']) {
        case 'register':
            $messages['success'] = "Você ainda precisa confirmar o email!";
            break;
    }
    render_view('login', $messages);
}
function do_not_found()
{
    http_response_code(404);
    render_view('not_found');
}

function do_forget_password()
{
    render_view('forget_password');
}