<div class="userList">
    <?php
    foreach ($content as $key => $user) {
        if(!$user['avatar']) {
            $user['avatar'] = '/assets/img/user.jpg';
        }
        echo '
            <a href="user/'.$user['id'].'" class="user pageRootElem">
                <img src="'.$user['avatar'].'" class="listAvatar">
                <div class="userelem">'.$user['login']."#".$user['id'].'</div>
                <div class="userelem listEmail">'.$user['email'].'</div>
            </a>
        ';
    }
    ?>
</div>
