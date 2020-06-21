<?php
class AUTH {

    static function register($data) {
        self::initBase();


        $query = [
            $data['login'],
            $data['email'],
        ];
        $password = $data['pass'];
        $query[] = hash('sha256',$password);
        DATABASE::query("SELECT * FROM users where email=?", [$data['email']]);
        if(DATABASE::getResult()) {
            return [
                'done' => false,
                'info' => 'email'
            ];
        }
        DATABASE::query("INSERT INTO users (login, email, passhash) values (?, ?, ?)", $query);
        DATABASE::query("SELECT * FROM users where email = ?", [$data['email']]);
        $result = DATABASE::getResult();
        $_SESSION = [
            'lang' => $_SESSION['lang'],
            'admin' => $result[0]['admin'],
            'user_id' => $result[0]['id'],
            'login' => $result[0]['login'],
            'email' => $result[0]['email'],
            'guest' => false
        ];
        return [
            'done' => true,
        ];
    }

    static function login($data) {
        $email = $data['email'];
        $password = $data['pass'];

        DATABASE::query("SELECT * FROM users where email = ?", [$email]);

        $result = DATABASE::getResult();
        if ($result) {
            if (hash('sha256',$password) === $result[0]['passhash']) {
                $_SESSION = [
                    'lang' => $_SESSION['lang'],
                    'admin' => $result[0]['admin'],
                    'user_id' => $result[0]['id'],
                    'login' => $result[0]['login'],
                    'email' => $result[0]['email'],
                    'guest' => false
                ];
                return [
                    'done' => 'true'
                ];
            }
            return [
                'done' => false,
                'info' => 'pass'
            ];
        }
        return [
            'done' => false,
            'info' =>'email'
        ];
    }
    static function logout() {
        $_SESSION = [
            'lang' => $_SESSION['lang'],
            'admin' => false,
            'user_id' => 0,
            'login' => "guest",
            'email' => '',
            'guest' => true];
    }

    static function initBase() {
        DATABASE::query('CREATE TABLE IF NOT EXISTS `users` (
                                  `id` BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                  `email` char(255) NOT NULL UNIQUE,
                                  `login` char(25) NOT NULL,
                                  `passhash` char(64) NOT NULL,
                                  `avatar` char(64),
                                  `admin` BOOLEAN NOT NULL DEFAULT FALSE)');

        DATABASE::query('CREATE UNIQUE INDEX email ON users(email)');
        DATABASE::query('CREATE INDEX login_id ON users(login, id)');
    }
}
