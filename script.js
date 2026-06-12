// Alternar Tema (Claro / Escuro)
const themeBtn = document.getElementById('themeBtn');
const body = document.body;

themeBtn.addEventListener('click', () => {
    body.classList.toggle('dark-theme');
    themeBtn.textContent = body.classList.contains('dark-theme') ? '☀️' : '🌙';
});

// Login
const forms = document.querySelectorAll('.clinic-form');

forms.forEach(form => {
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        const nome = formData.get('nome');
        const email = formData.get('email');
        const senha = formData.get('senha');

        if (!nome || !email || !senha) {
            alert('Preencha todos os campos!');
            return;
        }

        alert(`Bem-vindo(a), ${nome}!`);

        form.reset();
    });
});