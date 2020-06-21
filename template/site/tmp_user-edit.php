<?php
$image = $content['avatar'];
$login = $content['login'].'#'.$content['id'];
$email = $content['email'];

echo'<div class="userWrapper pageRootElem">
    <div class="avatarWrapper">
        <div class="userTitle">'.$lang['USER_TITLE'].'</div>
        <img src="'.$image.'" class="avatar" alt="/assets/img/user.jpg">
        <form id="inputForm" role="form" action="/user/upload" method="post" enctype="multipart/form-data">
        <label for="file">
            <input onchange="upload()" id="file" name="avatar" type="file" hidden>
            <span class="fileButton">'.$lang['UPLOAD'].'</span>
        </label>
        </form>
    </div>
    <div class="userInfoWrapper">
        <div class="userLogin">'.$login.'</div>
        <dic class="userEmail">'.$email.'</dic>
    </div>
    
</div>';
