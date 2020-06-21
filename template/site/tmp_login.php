<?php
$btn_text = $lang['LOGIN_BTN'];

$email_placeholder = $lang['EMAIL_PLACEHOLDER'];
$pass_placeholder = $lang['PASS_PLACEHOLDER'];

$email_alert = $lang['EMAIL_ALERT'];
$wrong_alert = $lang['WRONG_ALERT'];
$pass_alert = $lang['PASS_ALERT'];

echo '
<div class="loginWrapper pageRootElem">
    <div class="logTitleWrapper"> 
        <div class="bigTitle">'.$lang["LOGIN_TITLE"]."</div>
        <a href='/auth/signup'>".$lang["GOTO_REGISTER"]."</a><br>
    </div>
    
    <input id='logemailIn' class='input log' type='text' placeholder='$email_placeholder'><br>
    <input id='logpassIn' class='input log' type='password' placeholder='$pass_placeholder'><br>
    <div onclick='submitLogin()' style='font-size: 20px;' class='btn login'>$btn_text</div>
    
    <div class='alerts'>
        <div id='emailAlert' class='pageRootElem alertElem'>
            $email_alert
        </div>
        <div id='wrongAlert' class='pageRootElem alertElem'>
            $wrong_alert
        </div>
        <div id='passAlert' class='pageRootElem alertElem'>
            $pass_alert
        </div>
    </div>
</div>";
