<?php


class ctrl_user {
    public function index($id) {
        DATABASE::query('SELECT id, login, email, avatar FROM users where id = ?', [$id]);
        $user = DATABASE::getResult();
        if($user) {
            if(!$user[0]['avatar']) {
                $user[0]['avatar'] = '/assets/img/user.jpg';
            }
            if($_SESSION['user_id'] == $id) {
                TMP::add('user-edit', $user[0]);
            } else {
                TMP::add('user', $user[0]);
            }
        } else {
            TMP::add('404', $id);
        }
        TMP::exec();
    }

    public function upload_Valid() {
        preg_match("/image/", $_FILES['avatar']['type'], $match);
        return $match && !$_SESSION['guest'];
    }

    public function upload() {

        DATABASE::query('SELECT avatar FROM users where id = ?', [$_SESSION['user_id']]);
        $user = DATABASE::getResult();
        if($user[0]['avatar']) {
            unlink($_SERVER['DOCUMENT_ROOT'].$user[0]['avatar']);
        }

        $uuid = uniqid('', true);
        $uuid = base64_encode($uuid);
        $uuid = str_replace('=', '', $uuid);

        $file = $_FILES['avatar'];
        $dest ='/data/users/'.$uuid;
        if(move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$dest)) {
            DATABASE::query('UPDATE users SET avatar = ? WHERE id = ?', [$dest, $_SESSION['user_id']]);
            header('Location: /user/'.$_SESSION['user_id']);
        } else {
            var_dump($user);
            var_dump($file);
        }
    }
}
