
function submitRegister() {
    let data = {
        email: $('#regemailIn').val(),
        login: $('#regloginIn').val(),
        pass: $('#regpassIn').val(),
        pass2: $('#regpass2In').val()
    };
    if(validRegister(data)) {

        $.post("/auth/register",
            {data: data},
            function(ret) {
                ret = JSON.parse(ret);
                if (ret.done) {
                    window.location.href = '/'
                } else {
                    $('#'+ret.info+'Alert').fadeIn()
                }
            });
    }
}

function emailValid(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function latinValid(string) {
    var re = /^[a-zA-Z0-9]{6,25}$/;
    return re.test(string);
}

function validRegister(data) {
    let result = true;
    let alerts = {
        email: $('#emailAlert'),
        login: $('#loginAlert'),
        pass: $('#passAlert'),
        passeq: $('#passeqAlert'),
    };


    if (!emailValid(data.email)) {
        alerts.email.fadeIn();
        result = false;
    } else {
        alerts.email.fadeOut();
    }
    if (!latinValid(data.login)) {
        alerts.login.fadeIn();
        result = false;
    } else {
        alerts.login.fadeOut();
    }
    if (!latinValid(data.pass)) {
        alerts.pass.fadeIn();
        result = false;
    } else {
        alerts.pass.fadeOut();
    }

    if(data.pass !== data.pass2) {
        alerts.passeq.fadeIn();
        result = false;
    } else {
        alerts.passeq.fadeOut();
    }
    return result;
}
