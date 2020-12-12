window.fbAsyncInit = function() {
    FB.init({
        appId: '{768220467315915}',
        cookie: true,
        xfbml: true,
        version: '{v6.0}'
    });

    FB.AppEvents.logPageView();

};

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function fbLogin() {
    FB.login(function(response) {
        if (response.authResponse) {
            fbAfterLogin();
        }
    });
}

function fbAfterLogin() {
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') { // Lo
            FB.api('/me', function(response) {
                $.ajax({
                    url: '/DAT/Skincare/MVC/models/check_login.php',
                    type: 'post',
                    data: 'name=' + response.name + '&id=' + response.id,
                    success: function(result) {
                        location.href = "/DAT/Skincare/Skincare/Home/";
                    }
                });
            });
        }
    });
}