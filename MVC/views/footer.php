<footer>
    <div class="footer">
        <div class="footer__princess">
            <?php if($url[1] == 'APDTMakeup'): ?>
            <div class="footer__princess--logo">
                <img id = "footer__worker--home"  style="width: 40px; padding-top:20px; margin-left: 15px;"
                    src="/DAT/Skincare/Public/Image/worker.png" alt="logo">
            </div>
            <?php endif; ?>
            <?php if($url[1] == 'AllProduct'): ?>
            <div class="footer__princess--logo">
                <img src="/DAT/Skincare/Public/Image/LOGO PRINCESS nền trắng.png" alt="logo">
            </div>
            <?php endif; ?>
            <div class="footer__princess--socical">
                <div class="footer__socical--facebook">
                    <i class="fab fa-facebook-f"></i>
                </div>
                <div class="footer__socical--instagram">
                    <i class="fab fa-instagram"></i>
                </div>
            </div>
        </div>

        <div class="footer__worker">
            <div class="footer__princess--socical">
                <div class="footer__socical--facebook">
                    <i class="fab fa-facebook-f"></i>
                </div>
                <div class="footer__socical--instagram">
                    <i class="fab fa-instagram"></i>
                </div>
            </div>
            <?php if($url[1] == 'APDTMakeup'): ?>
            <div class="footer__princess--logo">
                <img id = "footer__worker--home"  style="width: 40px; padding-top:20px; margin-left: 15px;"
                    src="/DAT/Skincare/Public/Image/worker.png" alt="logo">
            </div>
            <?php endif; ?>
            <?php if($url[1] == 'AllProduct'): ?>
            <div class="footer__princess--logo">
                <img  src="/DAT/Skincare/Public/Image/LOGO PRINCESS nền trắng.png" alt="logo">
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="created text-center">
        <p>@Created Đạt Nguyễn</p>
    </div>
</footer>

<script>
window.fbAsyncInit = function() {
    FB.init({
        appId: '{your-app-id}',
        cookie: true,
        xfbml: true,
        version: '{api-version}'
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
</script>