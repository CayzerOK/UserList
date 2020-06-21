<?php


class ctrl_lang {
    public function set() {
        $_SESSION['lang'] = $_REQUEST['lang'];
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
