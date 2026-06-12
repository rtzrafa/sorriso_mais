<?php
// Configurações do banco de dados
$servername = "127.0.0.1";
$username = "root";
$password = "Senai@118";
$dbname = "sistema";

try {
    // Cria a conexão usando o PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    
    // Configura o PDO para lançar exceções em caso de erros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Define o modo de busca padrão para Array Associativo (facilita ler os dados depois)
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // echo "Conexão realizada com sucesso!"; // Descomente apenas para testar
    
} catch (PDOException $e) {
    // Se der erro, ele cai aqui e exibe a mensagem sem travar o servidor
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}
?>