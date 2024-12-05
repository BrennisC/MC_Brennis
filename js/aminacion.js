setTimeout(function () {
    document.getElementById('loader').style.display = 'none';
}, 2000);

const login_form = document.getElementById('login-form');

login_form.addEventListener('submit', async (event) => {
    event.preventDefault();

    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();
    const response = document.getElementById('response');


    try {
        const response = await fetch('controladorLogin.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ username, password })
        });

        if (response.ok) {
            const data = await response.json();
            if (data.success) {
                window.location.href = 'controladorInicio.php';
            } else {
                response.textContent = 'Username o contraseña incorrectos';
            }
        }

    } catch (error) {
        console.error(error);
        response.textContent = 'Error al iniciar sesión';
    }

})