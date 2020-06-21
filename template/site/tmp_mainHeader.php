<?php
$btnText = $lang['LOGIN_BTN'];
$regText = $lang['REG_BTN'];
$email_placeholder = $lang['EMAIL_PLACEHOLDER'];
$pass_placeholder = $lang['PASS_PLACEHOLDER'];
$loginForm = "";
$regBtnAct = '/auth/signup';
$btnAct = '/auth';
if (!$_SESSION['user_id'] == 0) {
    $btnText = $lang['LOGOUT_BTN'];
    $btnAct = '/auth/logout';
    $regText = $_SESSION['login'].'#'.$_SESSION['user_id'];
    $regBtnAct = '/user/'.$_SESSION['user_id'];
} else {
    $loginForm =
        "<div id='loginForm' class='pageRootElem'>
            <input id='loginIn' class='input loginInput' type='text' placeholder='$email_placeholder'>
            <input id='passIn' class='input loginInput' type='password' placeholder='$pass_placeholder'>
            <div onclick='submitLogin()' class='btn login'>$btnText</div> 
        </div>";
}
?>


<a href="/"><img class="headLogo" src="/assets/svg/logo.svg" alt="UserList"></a>

<?php
    echo '
    <div class="headerTitle">'.$lang['MAIN_TITLE'].'</div>
    <a href="'.$regBtnAct.'" class="reg btn">'.$regText.'</a>
    <a id="loginBTN" href="'.$btnAct.'" class="reg login btn">'.$btnText.'</a>'
?>
