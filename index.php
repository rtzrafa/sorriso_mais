<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorriso+ Odontologia - Sorria com Confiança</title>
    
    <!-- Fonte Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Ícones Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        /* Variáveis de cores e fontes para consistência */
        :root {
            --azul-claro: #f0f7ff;
            --azul-claro-formulario: #e6f0ff;
            --azul-escuro: #1d2c60;
            --azul-principal: #007bff;
            --branco: #ffffff;
            --cinza: #666;
            --fonte-principal: 'Montserrat', sans-serif;
            --border-radius-principal: 20px;
            --shadow-principal: 0 4px 15px rgba(0, 0, 0, 0.05);
            /* Opacidade ajustada para 94% para não ficar transparente demais */
            --overlay-hero: linear-gradient(135deg, rgba(240, 247, 255, 0.94) 0%, rgba(196, 224, 255, 0.94) 100%);
        }

        /* Variáveis para o Modo Escuro */
        body.dark-theme {
            --azul-claro: #121b3a;
            --azul-claro-formulario: #1a264e;
            --azul-escuro: #f0f7ff;
            --branco: #1d2c60;
            --cinza: #b3c0dd;
            --shadow-principal: 0 4px 15px rgba(0, 0, 0, 0.3);
            /* Opacidade ajustada para 94% no modo escuro */
            --overlay-hero: linear-gradient(135deg, rgba(18, 27, 58, 0.94) 0%, rgba(26, 38, 78, 0.94) 100%);
        }

        /* Estilos globais */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        section {
            scroll-margin-top: 90px;
        }

        body {
            font-family: var(--fonte-principal);
            color: var(--azul-escuro);
            background-color: var(--branco);
            line-height: 1.6;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            width: 100%;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: color 0.3s ease, opacity 0.3s ease;
        }

        a:hover {
            opacity: 0.8;
        }

        ul {
            list-style: none;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* Botão principal */
        .btn-principal {
            background-color: var(--azul-principal);
            color: #ffffff;
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-principal:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        /* Cabeçalho */
        header {
            background-color: var(--azul-claro);
            padding: 20px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: background-color 0.3s ease;
        }

        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            height: 40px;
            width: auto;
            object-fit: contain;
        }

        nav ul {
            display: flex;
            gap: 30px;
        }

        nav a {
            font-weight: 600;
        }

        nav a:hover {
            color: var(--azul-principal);
            opacity: 1;
        }

        .header-icons {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .social-icons {
            display: flex;
            gap: 18px;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .social-icons a:hover {
            color: var(--azul-principal);
            opacity: 1;
        }

        .theme-toggle button {
            background: rgba(0, 0, 0, 0.05);
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            color: var(--azul-escuro);
            padding: 8px 12px;
            border-radius: 50%;
            transition: background-color 0.3s;
        }
        
        body.dark-theme .theme-toggle button {
            background: rgba(255, 255, 255, 0.1);
        }

        /* Seção Hero com Imagem de Fundo Corrigida */
        .hero {
            position: relative;
            padding: 160px 0 60px;
            min-height: 85vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            
            /* Imagem com overlay mais sólido para evitar transparência excessiva */
            background-image: url(img_clinica/image\ \(1\).png);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transition: background-image 0.3s ease;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
        }

        .hero-text h1 {
            font-size: 4rem;
            font-weight: 700;
            line-height: 1.1;
            max-width: 400px;
            color: var(--azul-principal);
            text-shadow: 4px 4px 10px rgba(0, 0, 0, 0.4);
            background-color: rgba(255, 255, 255, 0.120);
            padding: 10px;
            border-radius: 20px;
            backdrop-filter: blur(1.5px);
            -webkit-backdrop-filter: blur(1.5px);
        }

        /* Formulário flutuante */
        .hero-booking-form {
            background-color: var(--azul-claro-formulario);
            padding: 40px;
            border-radius: var(--border-radius-principal);
            box-shadow: var(--shadow-principal);
            width: 450px;
            transition: background-color 0.3s ease;
        }

        .hero-booking-form h3 {
            font-size: 1.8rem;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: var(--azul-escuro);
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 15px;
            border: 1px solid #d9e9fb;
            border-radius: 10px;
            background-color: var(--branco);
            color: var(--azul-escuro);
            font-family: var(--fonte-principal);
            font-size: 1rem;
            transition: border-color 0.3s, background-color 0.3s;
        }

        .form-group input:focus, .form-group textarea:focus {
            outline: none;
            border-color: var(--azul-principal);
        }

        .form-group textarea {
            height: 100px;
            resize: none;
        }

        .btn-booking {
            width: 100%;
        }

        .hero-footer {
            position: relative;
            z-index: 2;
            text-align: center;
            margin: auto;
            margin-top: 50px;
            padding: 20px;
            max-width: 700px;
            color: var(--azul-principal);
            text-shadow: 4px 4px 10px rgba(0, 0, 0, 0.4);
            background-color: rgba(255, 255, 255, 0.120);
            padding: 10px;
            border-radius: 20px;
            backdrop-filter: blur(1.5px);
            -webkit-backdrop-filter: blur(1.5px);
        }

        .hero-footer p {
            font-weight: 600;
            letter-spacing: 2px;
            font-size: 0.9rem;
        }

        .hero-footer h2 {
            font-size: 2.5rem;
            font-weight: 700;
            letter-spacing: -1px;
        }

        /* Seção Tratamentos */
        .treatments {
            padding: 100px 0;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 60px;
        }

        .treatment-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
        }

        .treatment-card {
            text-align: center;
            padding: 30px;
            background-color: var(--branco);
            border-radius: var(--border-radius-principal);
            box-shadow: var(--shadow-principal);
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .treatment-card:hover {
            transform: translateY(-5px);
        }

        .treatment-image {
            width: 160px;
            height: 160px;
            margin: 0 auto 25px;
            border-radius: 50%;
            overflow: hidden;
            border: 5px solid var(--azul-claro);
            display: flex;
            justify-content: center;
            align-items: center;
            background: #fff;
        }

        .treatment-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .treatment-card h3 {
            font-size: 1.35rem;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .treatment-card p {
            color: var(--cinza);
            font-size: 0.95rem;
        }

        /* Seção Nossa História */
        .history {
            padding: 100px 0;
            background-color: var(--azul-claro);
            transition: background-color 0.3s ease;
        }

        .history .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 50px;
        }

        .history-image {
            flex: 1;
            border-radius: var(--border-radius-principal);
            overflow: hidden;
            box-shadow: var(--shadow-principal);
        }

        .history-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .history-text {
            flex: 1.2;
        }

        .history-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .logo-10-anos img {
            height: 60px;
            width: 60px;
            object-fit: contain;
        }

        .history-text h2 {
            font-size: 2.5rem;
            font-weight: 700;
        }

        .history-paragraphs p {
            font-size: 1.1rem;
            margin-bottom: 15px;
        }

        /* Seção Diferenciais */
        .differentials {
            padding: 100px 0;
            background-color: #121b3a;
            color: #ffffff;
        }

        .differentials h2 {
            color: #ffffff;
            margin-bottom: 20px;
            text-align: center;
        }

        .differentials p {
            font-size: 1.1rem;
            max-width: 800px;
            margin: 0 auto 30px;
            color: #b3c0dd;
            text-align: center;
        }

        .highlight-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 60px;
            color: #ffffff;
            text-align: center;
        }

        .differentials-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .differential-card {
            background-color: var(--branco);
            color: var(--azul-escuro);
            padding: 30px;
            border-radius: var(--border-radius-principal);
            box-shadow: var(--shadow-principal);
            text-align: center;
        }

        .icon-container {
            width: 100px;
            height: 100px;
            margin: 0 auto 25px;
            background-color: var(--azul-claro);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 5px solid var(--azul-claro-formulario);
        }

        /* Ajuste para usar o Font Awesome no lugar dos Emojis */
        .icon-placeholder {
            font-size: 2.5rem;
            color: var(--azul-principal); /* Cor dos ícones */
        }

        .differential-card h4 {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .differential-card p {
            color: var(--cinza);
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        /* Seção Localização / Agendamento */
        .contact {
            padding: 100px 0;
        }

        .contact .container {
            display: flex;
            justify-content: space-between;
            align-items: stretch;
            gap: 50px;
        }

        .location, .booking {
            flex: 1;
            background-color: var(--branco);
            padding: 40px;
            border-radius: var(--border-radius-principal);
            box-shadow: var(--shadow-principal);
            transition: background-color 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .location h2, .booking h2 {
            font-size: 2rem;
            margin-bottom: 30px;
        }

        .map {
            width: 100%;
            height: 300px;
            border-radius: var(--border-radius-principal);
            overflow: hidden;
            margin-bottom: 20px;
            border: 1px solid #d9e9fb;
        }

        .location-address p {
            font-size: 1.1rem;
            color: var(--azul-escuro);
        }

        .form-row {
            display: flex;
            gap: 20px;
        }

        .form-row .col {
            flex: 1;
        }

        /* Rodapé */
        footer {
            padding: 80px 0;
            background-color: var(--azul-claro);
            border-top: 1px solid #d9e9fb;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        footer .container {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 50px;
            align-items: flex-start;
        }

        .footer-logo img {
            height: 60px;
            width: auto;
            margin-bottom: 20px;
            object-fit: contain;
        }

        .footer-logo-text p {
            font-size: 1.1rem;
        }

        .footer-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .footer-info p {
            margin-bottom: 15px;
        }

        .opening-hours p strong {
            display: block;
            margin-bottom: 5px;
        }

        .awards {
            display: flex;
            flex-direction: column;
            gap: 15px;
            justify-content: flex-start;
        }

        .award-badge {
            border: 2px solid var(--azul-escuro);
            padding: 12px;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 700;
            text-align: center;
            color: var(--azul-escuro);
            background-color: rgba(255,255,255,0.5);
            letter-spacing: 0.5px;
        }

        /* Responsividade */
        @media (max-width: 992px) {
            .hero-text h1 { font-size: 3rem; text-align: center; }
            .hero-content { flex-direction: column; text-align: center; }
            .treatment-grid { grid-template-columns: repeat(2, 1fr); }
            .differentials-grid { grid-template-columns: repeat(2, 1fr); }
            footer .container { grid-template-columns: 1fr; text-align: center; }
            .awards { align-items: center; }
            .award-badge { width: 80%; }
            .history .container, .contact .container { flex-direction: column; }
            header .container { flex-direction: column; gap: 15px; }
        }

        @media (max-width: 768px) {
            .hero-text h1 { font-size: 2.5rem; margin-bottom: 10px; }
            .hero-booking-form { width: 100%; padding: 25px; }
            .treatment-grid, .differentials-grid { grid-template-columns: 1fr; }
            .form-row { flex-direction: column; gap: 0; }
            .location, .booking { padding: 25px; }
            nav { display: none; }
        }
    </style>
</head>
<body>

    <header>
        <div class="container">
            <a href="#inicio" class="logo">
                <img src="img_clinica/logomaior1-removebg-preview.png" alt="Sorriso+ Odontologia">
            </a>
            <nav>
                <ul>
                    <li><a href="#inicio">Início</a></li>
                    <li><a href="#tratamento">Tratamentos</a></li>
                    <li><a href="#historia">História</a></li>
                    <li><a href="#agendar">Agendar</a></li>
                </ul>
            </nav>
            <div class="header-icons">
                <div class="social-icons">
                    <a href="https://facebook.com" target="_blank" rel="noopener"><i class="fa-brands fa-facebook"></i> Facebook</a>
                    <a href="https://instagram.com" target="_blank" rel="noopener"><i class="fa-brands fa-instagram"></i> Instagram</a>
                    <a href="https://wa.me/5511999999999" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
                </div>
                <div class="theme-toggle">
                    <button id="themeBtn" aria-label="Alternar modo escuro">☀️</button>
                </div>
            </div>
        </div>
    </header>

    <section id="inicio" class="hero">
        <div class="container hero-content">
            <div class="hero-text">
                <h1>Sorria com confiança</h1>
            </div>
            <div class="hero-booking-form">
                <h3>Fazer Login!</h3>
                <form class="clinic-form">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" name="senha" required>
                    </div>
                    <button type="submit" class="btn-principal btn-booking">Entrar</button>
                    <a href="#" class="login-footer-text">Não tem uma conta? Cadastre-se</a>
                </form>
            </div>
        </div>
        <div class="hero-footer">
            <p>SOLICITE SEU ATENDIMENTO</p>
            <h2>TRANSFORME SEU SORRISO!</h2>
        </div>
    </section>

    <section id="tratamento" class="treatments">
        <div class="container">
            <h2 class="section-title">Nossos Tratamentos</h2>
            <div class="treatment-grid">
                
                <!-- Card 1 -->
                <div class="treatment-card">
                    <div class="treatment-image">
                        <img src="img_clinica/image (6).png" alt="Lentes de Contato Dentais">
                    </div>
                    <h3>Lentes de Contato</h3>
                    <p>As lentes de contato dentais são facetas ultrafinas de porcelana aplicadas sobre os dentes para corrigir imperfeições e manchas.</p>
                </div>

                <!-- Card 2 -->
                <div class="treatment-card">
                    <div class="treatment-image">
                        <img src="img_clinica/image (9).png" alt="Clareamento Dental">
                    </div>
                    <h3>Clareamento Dental</h3>
                    <p>Recupere a brancura original dos seus dentes com procedimentos modernos, seguros e de rápida aplicação clínica.</p>
                </div>

                <!-- Card 3 -->
                <div class="treatment-card">
                    <div class="treatment-image">
                        <img src="img_clinica/image (7).png" alt="Alinhadores Invisíveis">
                    </div>
                    <h3>Alinhadores Invisíveis</h3>
                    <p>Conquiste o alinhamento perfeito de forma discreta, confortável e sem a necessidade de braquetes metálicos.</p>
                </div>

                <!-- Card 4 -->
                <div class="treatment-card">
                    <div class="treatment-image">
                        <img src="img_clinica/image (8).png" alt="Odontologia Digital">
                    </div>
                    <h3>Odontologia Digital</h3>
                    <p>Planejamento moderno e escaneamento computadorizado 3D para criar soluções personalizadas com máxima previsibilidade.</p>
                </div>

                <!-- Card 5 -->
                <div class="treatment-card">
                    <div class="treatment-image">
                        <img src="img_clinica/image (10).png" alt="Endodontia avançada">
                    </div>
                    <h3>Endodontia</h3>
                    <p>Tratamentos de canal precisos para salvar elementos dentários danificados ou infeccionados com total conforto.</p>
                </div>

                <!-- Card 6 -->
                <div class="treatment-card">
                    <div class="treatment-image">
                        <img src="img_clinica/image (11).png" alt="Ortodontia Especializada">
                    </div>
                    <h3>Ortodontia</h3>
                    <p>Prevenção e correção dos problemas de crescimento, desenvolvimento e posicionamento da sua estrutura facial.</p>
                </div>

            </div>
        </div>
    </section>

    <section id="historia" class="history">
        <div class="container">
            <div class="history-image">
                <img src="img_clinica/image.png" alt="Interior da Clínica Sorriso+">
            </div>
            <div class="history-text">
                <div class="history-header">
                    <div class="logo-10-anos">
                        <img src="img_clinica/image (4).png" alt="Sorriso+ Ícone">
                    </div>
                    <h2>NOSSA HISTÓRIA</h2>
                </div>
                <div class="history-paragraphs">
                    <p>Em 2015, a Sorriso+ nascia como uma pequena clínica movida por um grande sonho: transformar vidas através do sorriso. Dez anos depois, seguimos com o mesmo propósito, agora somando muito mais experiência e milhares de transformações em nossa bagagem.</p>
                    <p>Nossa trajetória é feita de histórias reais: a mãe que recupera sua autoconfiança, o jovem que inicia um novo ciclo e a criança em sua primeira consulta. São esses momentos que definem quem somos — uma marca que prioriza o cuidado, o respeito e o bem-estar.</p>
                    <p>Somos uma empresa feita de pessoas que se importam com pessoas. E depois de uma década transformando sorrisos, temos uma certeza: estamos apenas começando.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="diferenciais" class="differentials">
        <div class="container">
            <h2>POR QUE A SORRISO+ É DIFERENTE?</h2>
            <p>Cuidar do sorriso é também cuidar de quem está por trás dele.</p>
            <p>Por isso, tudo o que a gente faz é guiado por quatro pilares que refletem o nosso jeito de atender: acesso, conforto, conveniência e qualidade.</p>
            <h3 class="highlight-title">Na prática, isso quer dizer:</h3>
            <div class="differentials-grid">
                <div class="differential-card">
                    <div class="icon-container">
                        <!-- Substituído EMOJI por Ícone Vetorial -->
                        <i class="fa-solid fa-couch icon-placeholder"></i>
                    </div>
                    <h4>Consultórios Modernos</h4>
                    <p>Ambientes acolhedores, pensados para que você se sinta bem desde o momento em que entra até o fim do seu atendimento.</p>
                </div>
                <div class="differential-card">
                    <div class="icon-container">
                        <!-- Substituído EMOJI por Ícone Vetorial -->
                        <i class="fa-solid fa-user-doctor icon-placeholder"></i>
                    </div>
                    <h4>Profissionais Qualificados</h4>
                    <p>Nossos especialistas combinam formação técnica com um olhar humano, garantindo tratamentos com excelência.</p>
                </div>
                <div class="differential-card">
                    <div class="icon-container">
                        <!-- Substituído EMOJI por Ícone Vetorial -->
                        <i class="fa-solid fa-location-dot icon-placeholder"></i>
                    </div>
                    <h4>Presente em todo o Brasil</h4>
                    <p>De norte a sul, sempre tem uma Sorriso+ perto de você — pronta pra atender com o mesmo carinho.</p>
                </div>
                <div class="differential-card">
                    <div class="icon-container">
                        <!-- Substituído EMOJI por Ícone Vetorial -->
                        <i class="fa-solid fa-clock icon-placeholder"></i>
                    </div>
                    <h4>Atendimento ágil</h4>
                    <p>Nossa estrutura garante processos rápidos, mas sempre atentos às suas necessidades reais.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="agendar" class="contact">
        <div class="container">
            <div class="location">
                <div>
                    <h2>Localização</h2>
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3654.6716091011355!2d-46.54160292376179!3d-23.65017266491763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce42ee77b47b27%3A0x298ced9bf17a783!2sBairro%20Jardim%2C%20Santo%20Andr%C3%A9%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1718112000000!5m2!1spt-BR!2sbr" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="location-address">
                    <p>Rua das Figueiras, nº 1200, Bairro Jardim, Santo André – SP</p>
                </div>
            </div>
            <div class="booking">
                <h2>Fazer Login!</h2>
                <form class="clinic-form">
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Nome</label>
                            <input type="text" name="nome" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Email</label>
                            <input type="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Senha</label>
                            <input type="password" name="senha" required>
                        </div>
                    </div>
                    <button type="submit" class="btn-principal btn-booking">Entrar</button> <br>
                    <a href="#" class="login-footer-text-map">Não tem uma conta? Cadastre-se</a>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-logo footer-col">
                <a href="#inicio" class="logo">
                    <img src="img_clinica/image (5).png" alt="Sorriso+ Logo Completa">
                </a>
                <div class="footer-logo-text">
                    <p>Rua das Figueiras, nº 1200</p>
                    <p>Bairro Jardim, Santo André – SP</p>
                </div>
            </div>
            <div class="footer-info footer-col">
                <h4 class="footer-title">Atendimento</h4>
                <p>Tel: (11) 4994-0000</p>
                <p>WhatsApp: (11) 99999-9999</p>
                <div class="opening-hours">
                    <p><strong>Segunda a sexta-feira:</strong> 8:00 às 18:00</p>
                </div>
            </div>
            <div class="awards footer-col">
                <h4 class="footer-title">Reconhecimento</h4>
                <div class="award-badge">
                    🏆 SELO DE EXCELÊNCIA ABF 2026
                </div>
                <div class="award-badge">
                    ⭐ MELHORES FRANQUIAS DO BRASIL
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Alternar Tema (Claro / Escuro)
        const themeBtn = document.getElementById('themeBtn');
        const body = document.body;

        themeBtn.addEventListener('click', () => {
            body.classList.toggle('dark-theme');
            themeBtn.textContent = body.classList.contains('dark-theme') ? '🌙' : '☀️';
        });

        // Envio de Formulários
        const forms = document.querySelectorAll('.clinic-form');
        forms.forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const formData = new FormData(form);
                alert(`Obrigado, ${formData.get('nome')}! Sua solicitação foi enviada.`);
                form.reset();
            });
        });
    </script>
</body>
</html>