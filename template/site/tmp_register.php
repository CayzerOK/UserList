<?php
$btn_text = $lang['REG_BTN'];
$email_placeholder = $lang['EMAIL_PLACEHOLDER'];
$login_placeholder = $lang['LOGIN_PLACEHOLDER'];
$pass_placeholder = $lang['PASS_PLACEHOLDER'];
$pass2_placeholder = $lang['PASS2_PLACEHOLDER'];

$email_alert = $lang['EMAIL_ALERT'];
$login_alert = $lang['LOGIN_ALERT'];
$pass_alert = $lang['PASS_ALERT'];
$passeq_alert = $lang['PASSEQ_ALERT'];

echo '
<div class="registerWrapper pageRootElem">
    <div class="regTitleWrapper"> 
        <div class="bigTitle">'.$lang["REGISTER_TITLE"]."</div>
        <a href='/auth'>".$lang["GOTO_LOGIN"]."</a><br>
    </div>
    
    
    
    <input id='regemailIn' class='input register' type='text' placeholder='$email_placeholder'><br>
    <input id='regloginIn' class='input register' type='text' placeholder='$login_placeholder'><br>
    <input id='regpassIn' class='input register' type='password' placeholder='$pass_placeholder'><br>
    <input id='regpass2In' class='input register' type='password' placeholder='$pass2_placeholder'><br>
    <div onclick='submitRegister()' style='font-size: 20px;' class='btn login'>$btn_text</div>
    
    <div class='alerts'>
        <div id='emailAlert' class='pageRootElem alertElem'>
            $email_alert
        </div>
        <div id='loginAlert' class='pageRootElem alertElem'>
            $login_alert
        </div>
        <div id='passAlert' class='pageRootElem alertElem'>
            $pass_alert
        </div>
        <div id='passeqAlert' class='pageRootElem alertElem'>
            $passeq_alert
        </div>
    </div>
</div>";
