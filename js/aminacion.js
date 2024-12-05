setTimeout(function () {
    document.getElementById('loader').style.display = 'none';
}, 2000);

const login_form = document.getElementById('login-form');

async function showLoader() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const datos = await fetch('http://examen_medio_curso.test/ver', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ username, password })
    })
    const loader = document.getElementById('loader');
    loader.style.display = 'block';

    setTimeout(function () {
        loader.style.display = 'none';

        if (username === datos['username'] && password === datos['password']) {
            window.location.href = 'controladorInicio.php';
        } else {
            alert('Credenciales incorrectas');
        }
    }, 2000);

}

login_form.addEventListener('submit', function (event) {
    event.preventDefault();
    showLoader();
});
