function showForm() {
    var form = document.getElementById('loginForm');
    var content = document.getElementsByClassName('content');
    form.style.display = 'block';
    for (const key in content[0].children) {
        if(content[0].children[key].id != 'loginForm')
            content[0].children[key].style.opacity = '0.5';
    }
}

function hideForm() {
    var form = document.getElementById('loginForm');
    var content = document.getElementsByClassName('content');
    form.style.display = 'none';
    for (const key in content[0].children) {
        if(content[0].children[key].id != 'loginForm')
            content[0].children[key].style.opacity = '1';
    }
}