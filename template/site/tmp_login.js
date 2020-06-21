function submitLogin() {
    let data = {
        email: $('#logemailIn').val(),
        pass: $('#logpassIn').val(),
    };
    if(validLogin(data)) {

        $.post("/auth/login",
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

function validLogin(data) {
    let result = true;
    let alerts = {
        email: $('#emailAlert'),
        pass: $('#passAlert'),
    };

    if (!emailValid(data.email)) {
        alerts.email.fadeIn();
        result = false;
    } else {
        alerts.email.fadeOut();
    }
    if (!latinValid(data.pass)) {
        alerts.pass.fadeIn();
        result = false;
    } else {
        alerts.pass.fadeOut();
    }
    return result;
}
