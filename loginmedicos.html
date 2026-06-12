<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorriso+ | Acesso</title>
    
    <style>
        /* --- RESET E ESTILOS GERAIS --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body, html {
            height: 100%;
            width: 100%;
        }

        /* --- TELA DE FUNDO --- */
        .background-container {
            /* IMPORTANTE: Substitua pela foto do seu consultório de fundo */
            background-image: url('https://images.unsplash.com/photo-1629909613654-28e377c37b09?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* --- CARD DE VIDRO FOSCO (Glassmorphism) --- */
        .glass-card {
            background: rgba(255, 255, 255, 0.45); /* Transparência do vidro */
            backdrop-filter: blur(15px); /* Efeito embaçado do fundo */
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 25px;
            padding: 40px 35px;
            width: 400px;
            max-width: 90%;
            text-align: center;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        /* --- LOGO INTERNA --- */
        .logo-container {
            margin-bottom: 25px;
        }

        .logo-container h1 {
            color: #0c2340; /* Azul escuro da marca */
            font-size: 42px;
            font-weight: 800;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2px;
            margin-bottom: 2px;
        }

        .logo-container h1 span {
            color: #007bff; /* Mais azul do '+' */
        }

        .subtitulo-logo {
            color: #1c355e;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 4px;
        }

        /* --- FORMULÁRIO E INPUTS --- */
        .form-grupo {
            margin-bottom: 18px;
            text-align: left;
        }

        .form-grupo label {
            display: block;
            color: #ffffff; /* Texto em branco idêntico à imagem */
            text-transform: uppercase;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 6px;
            letter-spacing: 0.5px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .form-grupo input {
            width: 100%;
            padding: 14px 16px;
            background: rgba(240, 240, 240, 0.9); /* Fundo cinza bem claro dos inputs */
            border: none;
            border-radius: 10px;
            font-size: 15px;
            color: #333;
            outline: none;
            transition: background 0.2s;
        }

        .form-grupo input:focus {
            background: #ffffff;
        }

        /* --- MEDIDOR DE FORÇA DA SENHA --- */
        .medidor-container {
            width: 100%;
            height: 5px;
            background: rgba(255, 255, 255, 0.4);
            border-radius: 3px;
            margin-top: 8px;
            overflow: hidden;
            display: none; /* Só aparece na tela de cadastro */
        }

        #barra-forca {
            height: 100%;
            width: 0%;
            transition: width 0.3s, background-color 0.3s;
        }

        #texto-forca {
            font-size: 12px;
            font-weight: bold;
            color: #ffffff;
            margin-top: 5px;
            display: block;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        /* --- BOTÃO ESTILO IDÊNTICO À IMAGEM --- */
        .btn-entrar {
            width: 100%;
            background-color: #2b6cb0; /* Azul do botão da imagem */
            color: #ffffff;
            border: none;
            padding: 14px;
            border-radius: 25px; /* Bordas bem arredondadas */
            font-size: 15px;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 10px rgba(43, 108, 176, 0.4);
            margin-top: 25px;
            transition: background 0.2s;
        }

        .btn-entrar:hover {
            background-color: #1e4e8c;
        }

        /* --- LINK INFERIOR --- */
        .link-alternar {
            margin-top: 20px;
            display: inline-block;
            color: #ffffff;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: bold;
            text-decoration: none;
            letter-spacing: 0.5px;
            cursor: pointer;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .link-alternar:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="background-container">
        
        <!-- O Card de vidro -->
        <div class="glass-card">
            
            <!-- Logo Sorriso+ recriada em código -->
            <div class="logo-container">
                <h1 id="logo-main">Sorriso<span>+</span></h1>
                <div class="subtitulo-logo">Clínica Odontológica</div>
            </div>

            <!-- Formulário Dinâmico -->
            <form id="formAcesso" onsubmit="event.preventDefault();">
                
                <!-- Campo Nome (Começa oculto no modo Login) -->
                <div class="form-grupo" id="grupo-nome" style="display: none;">
                    <label for="nome">Nome Completo</label>
                    <input type="text" id="nome" placeholder="Digite seu nome">
                </div>

                <!-- Campo E-mail -->
                <div class="form-grupo">
                    <label id="label-usuario" for="email">E-mail ou ID do Responsável</label>
                    <input type="text" id="email" required>
                </div>

                <!-- Campo Senha -->
                <div class="form-grupo">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" required oninput="validarSenha()">
                    
                    <!-- Barra de força (Cadastro) -->
                    <div class="medidor-container" id="medidor-senha">
                        <div id="barra-forca"></div>
                    </div>
                    <span id="texto-forca"></span>
                </div>

                <!-- Botão de Ação Principal -->
                <button type="submit" class="btn-entrar" id="btn-submit">
                    <span id="icone-btn">➔</span> <span id="texto-btn">Entrar na Conta</span>
                </button>

                <!-- Link de Alternância -->
                <a class="link-alternar" id="link-troca" onclick="alternarTela()">Não tem conta? Cadastre-se</a>
            </form>

        </div>

    </div>

    <!-- --- LÓGICA DE INTERAÇÃO (JS) --- -->
    <script>
        let modoCadastro = false;

        function alternarTela() {
            modoCadastro = !modoCadastro;

            const grupoNome = document.getElementById('grupo-nome');
            const labelUsuario = document.getElementById('label-usuario');
            const medidorSenha = document.getElementById('medidor-senha');
            const textoForca = document.getElementById('texto-forca');
            const textoBtn = document.getElementById('texto-btn');
            const linkTroca = document.getElementById('link-troca');
            const campoNome = document.getElementById('nome');
            const campoSenha = document.getElementById('senha');

            if (modoCadastro) {
                // Configura interface para Criar Conta
                grupoNome.style.display = 'block';
                campoNome.setAttribute('required', 'true');
                labelUsuario.innerText = 'E-mail';
                medidorSenha.style.display = 'block';
                textoBtn.innerText = 'Criar minha conta';
                linkTroca.innerText = 'Já possui ID? Fazer Login';
                campoSenha.value = '';
                validarSenha();
            } else {
                // Volta para o padrão da Imagem (Login)
                grupoNome.style.display = 'none';
                campoNome.removeAttribute('required');
                labelUsuario.innerText = 'E-mail ou ID do Responsável';
                medidorSenha.style.display = 'none';
                textoForca.innerText = '';
                textoBtn.innerText = 'Entrar na Conta';
                linkTroca.innerText = 'Não tem conta? Cadastre-se';
            }
        }

        function validarSenha() {
            if (!modoCadastro) return; // Só valida força de senha se for Cadastro

            const senha = document.getElementById('senha').value;
            const barra = document.getElementById('barra-forca');
            const texto = document.getElementById('texto-forca');
            
            let pontos = 0;

            if (senha.length >= 6) pontos += 1;
            if (senha.match(/[0-9]/)) pontos += 1;
            if (senha.match(/[A-Z]/)) pontos += 1;
            if (senha.match(/[^A-Za-z0-9]/)) pontos += 1;

            if (senha.length === 0) {
                barra.style.width = '0%';
                texto.innerText = '';
                return;
            }

            if (pontos <= 1) {
                barra.style.width = '30%';
                barra.style.backgroundColor = '#ff4d4d'; // Vermelho
                texto.innerText = 'Senha Fraca';
            } else if (pontos === 2 || pontos === 3) {
                barra.style.width = '65%';
                barra.style.backgroundColor = '#ffcc00'; // Amarelo
                texto.innerText = 'Senha Média';
            } else {
                barra.style.width = '100%';
                barra.style.backgroundColor = '#28a745'; // Verde
                texto.innerText = 'Senha Forte';
            }
        }
    </script>
</body>
</html>