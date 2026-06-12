<?php
// =====================================================
// Sorriso+ | acao_auth.php
// Processa login e cadastro de pacientes e médicos
// Retorna JSON para o front-end
// =====================================================

require_once 'conexao.php';

header('Content-Type: application/json; charset=utf-8');

// Só aceita POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['sucesso' => false, 'mensagem' => 'Método não permitido.']);
    exit;
}

$tipo_acao = trim($_POST['tipo_acao'] ?? '');

switch ($tipo_acao) {

    // --------------------------------------------------
    case 'login_paciente':
    // --------------------------------------------------
        $cpf   = limparCpf($_POST['cpf']   ?? '');
        $senha = trim($_POST['senha'] ?? '');

        if (!$cpf || !$senha) {
            responder(false, 'Preencha o CPF e a senha.');
        }

        $stmt = $pdo->prepare("SELECT id, nome, senha_hash FROM pacientes WHERE cpf = ? LIMIT 1");
        $stmt->execute([$cpf]);
        $paciente = $stmt->fetch();

        if (!$paciente || !password_verify($senha, $paciente['senha_hash'])) {
            responder(false, 'CPF ou senha incorretos.');
        }

        // Login bem-sucedido — inicia sessão
        session_start();
        $_SESSION['usuario_id']   = $paciente['id'];
        $_SESSION['usuario_nome'] = $paciente['nome'];
        $_SESSION['usuario_tipo'] = 'paciente';

        responder(true, 'Login realizado com sucesso!', ['nome' => $paciente['nome'], 'redirect' => 'index.php']);
        break;

    // --------------------------------------------------
    case 'cadastro_paciente':
    // --------------------------------------------------
        $nome  = trim($_POST['nome']  ?? '');
        $cpf   = limparCpf($_POST['cpf']   ?? '');
        $senha = trim($_POST['senha'] ?? '');

        if (!$nome || !$cpf || !$senha) {
            responder(false, 'Preencha nome, CPF e senha.');
        }

        if (!validarCpf($cpf)) {
            responder(false, 'CPF inválido. Verifique o número digitado.');
        }

        if (strlen($senha) < 6) {
            responder(false, 'A senha deve ter no mínimo 6 caracteres.');
        }

        // Verifica se CPF já existe
        $stmt = $pdo->prepare("SELECT id FROM pacientes WHERE cpf = ? LIMIT 1");
        $stmt->execute([$cpf]);
        if ($stmt->fetch()) {
            responder(false, 'Este CPF já possui cadastro. Faça login.');
        }

        $hash = password_hash($senha, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare("INSERT INTO pacientes (nome, cpf, senha_hash) VALUES (?, ?, ?)");
        $stmt->execute([$nome, formatarCpf($cpf), $hash]);

        responder(true, 'Cadastro realizado com sucesso! Agora faça login.');
        break;

    // --------------------------------------------------
    case 'login_medico':
    // --------------------------------------------------
        $email = trim($_POST['email'] ?? '');
        $senha = trim($_POST['senha'] ?? '');

        if (!$email || !$senha) {
            responder(false, 'Preencha o e-mail e a senha.');
        }

        $stmt = $pdo->prepare("SELECT id, nome, senha_hash FROM medicos WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        $medico = $stmt->fetch();

        if (!$medico || !password_verify($senha, $medico['senha_hash'])) {
            responder(false, 'E-mail ou senha incorretos.');
        }

        session_start();
        $_SESSION['usuario_id']   = $medico['id'];
        $_SESSION['usuario_nome'] = $medico['nome'];
        $_SESSION['usuario_tipo'] = 'medico';

        responder(true, 'Login realizado com sucesso!', ['nome' => $medico['nome'], 'redirect' => 'index.php']);
        break;

    // --------------------------------------------------
    case 'cadastro_medico':
    // --------------------------------------------------
        $nome  = trim($_POST['nome']  ?? '');
        $email = trim($_POST['email'] ?? '');
        $senha = trim($_POST['senha'] ?? '');

        if (!$nome || !$email || !$senha) {
            responder(false, 'Preencha nome, e-mail e senha.');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            responder(false, 'E-mail inválido.');
        }

        if (strlen($senha) < 6) {
            responder(false, 'A senha deve ter no mínimo 6 caracteres.');
        }

        // Verifica se e-mail já existe
        $stmt = $pdo->prepare("SELECT id FROM medicos WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            responder(false, 'Este e-mail já possui cadastro. Faça login.');
        }

        $hash = password_hash($senha, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare("INSERT INTO medicos (nome, email, senha_hash) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $email, $hash]);

        responder(true, 'Cadastro realizado com sucesso! Agora faça login.');
        break;

    // --------------------------------------------------
    default:
        responder(false, 'Ação desconhecida.');
}

// =====================================================
// Funções auxiliares
// =====================================================

function responder(bool $sucesso, string $mensagem, array $dados = []): void {
    echo json_encode(array_merge(
        ['sucesso' => $sucesso, 'mensagem' => $mensagem],
        $dados
    ), JSON_UNESCAPED_UNICODE);
    exit;
}

function limparCpf(string $cpf): string {
    return preg_replace('/\D/', '', $cpf);
}

function formatarCpf(string $cpf): string {
    $cpf = limparCpf($cpf);
    return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $cpf);
}

function validarCpf(string $cpf): bool {
    $cpf = limparCpf($cpf);
    if (strlen($cpf) !== 11 || preg_match('/^(\d)\1{10}$/', $cpf)) return false;

    for ($t = 9; $t < 11; $t++) {
        $soma = 0;
        for ($i = 0; $i < $t; $i++) {
            $soma += $cpf[$i] * (($t + 1) - $i);
        }
        $resto = (10 * $soma) % 11;
        if ($cpf[$t] != ($resto === 10 || $resto === 11 ? 0 : $resto)) return false;
    }
    return true;
}
