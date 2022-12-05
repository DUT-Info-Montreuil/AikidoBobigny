$(document).ready(function () {
    var form = $('#loginForm');
    var content = $('.content');
    var menu = $('#navbar');
    var footer = $('footer');
    var loginBtn = $('#log-btn');
    var closeBtn = $('#cross');
    loginBtn.click(function () {
        form.css('display', 'block');
        content.css('opacity', '0.5');
        menu.css('opacity', '0.5');
        footer.css('opacity', '0.5');
    });
    closeBtn.click(function () {
        form.css('display', 'none');
        content.css('opacity', '1');
        menu.css('opacity', '1');
        footer.css('opacity', '1');
    }
    );
});