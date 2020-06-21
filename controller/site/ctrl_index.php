<?php
class ctrl_index {
    public function index() {
        DATABASE::query('SELECT id, login, email, avatar FROM users');
        $result = DATABASE::getResult();
        TMP::add('index', $result);
        TMP::exec();
    }
}
