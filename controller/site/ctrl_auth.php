<?php
class ctrl_auth {
    public function index() {
        TMP::add('login');
        TMP::exec();
    }

    public function signup() {
        TMP::add('register');
        TMP::exec();
    }

    function registerValid($data) {
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            die(json_encode(['done' => false, 'info' => 'email']));
        }
        if (!preg_match('/^[a-zA-Z0-9]{5,25}$/', $data['login'])) {
            die(json_encode(['done' => false, 'info' => 'login']));
        }
        if (!preg_match('/^[a-zA-Z0-9]{5,25}$/', $data['pass'])) {
            die(json_encode(['done' => false, 'info' => 'pass']));
        }
        if($data['pass'] != $data['pass2']) {
            die(json_encode(['done' => false, 'info' => 'passeq']));
        }
        return true;
    }
    function loginValid($data) {
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            die(json_encode(['done' => false, 'info' => 'email']));
        }
        if (!preg_match('/^[a-zA-Z0-9]{5,25}$/', $data['pass'])) {
            die(json_encode(['done' => false, 'info' => 'pass']));
        }
        return true;
    }


    public function login() {
        $data = $_REQUEST['data'];
        if ($this->loginValid($data)) {
            echo json_encode(AUTH::login($data));
        }
    }

    public function login_valid() {
        return $_SESSION['guest'];
    }

    public function register_valid() {
        return $_SESSION['guest'];
    }

    public function register() {
        $data = $_REQUEST['data'];
        if ($this->registerValid($data)) {
            echo json_encode(AUTH::register($data));
        }
    }

    public function logout() {
        AUTH::logout();
        header('Location: ' . '/');
    }
}
