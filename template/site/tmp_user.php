<?php
$image = $content['avatar'];
$login = $content['login'].'#'.$content['id'];
$email = $content['email'];

echo'<div class="userWrapper pageRootElem">
    <div class="avatarWrapper">
        <div class="userTitle">'.$lang['USER_TITLE'].'</div>
        <img src="'.$image.'" class="avatar" alt="/assets/img/user.jpg">
    </div>
    <div class="userInfoWrapper">
        <div class="userLogin">'.$login.'</div>
        <dic class="userEmail">'.$email.'</dic>
    </div>
</div>';
