function login() {
    let username = document.querySelector(".username");
    let password = document.querySelector(".password");
    const tipcontainer = document.querySelector(".tip-container");

    username = md5(username.value);
    password = sha224(sha256(md5(password.value)));

    const token = grecaptcha.getResponse();

    if (username === 'd41d8cd98f00b204e9800998ecf8427e') {
        tipcontainer.style.color = 'red';
        tipcontainer.innerHTML = '请填入用户名';
    } else if (password === '303e2b94daa27ce46d381d22b30959cde5e43b98edf2630511d43d30') {
        tipcontainer.style.color = 'red';
        tipcontainer.innerHTML = '请填入密码';
    } else {
        tipcontainer.style.color = '';
        tipcontainer.innerHTML = '';
        window.location = '../../api/auth/session/login?username=' + username + '&password=' + password + '&captcha_token=' + token;
        //console.log('auth/session/login?username=' + username + '&password=' + password + '&captcha_token=' + token);
    }
}