<?php 
// A sessão será iniciada a cada página diferente
// determinar o nível de acesso, se necessário
session_name('chulettaaa');
if (!isset($_SESSION)){
    session_start();
}

// verifica se há usuario logado na sessão
// identifica o usuário
if(!isset($_SESSION['login_usuario'])){
    // se não exixtir, destruímos a sessão por segurança
    header("location: login.php");
    exit;
}

$nome_da_sessao = session_name();
// verifica o nome da sessão
if(!isset($_SESSION['nome_da_sessao']) OR ($_SESSION['nome_da_sessao']!=$nome_da_sessao)){
// se não existir, destruímos a sessão por segurança
session_destroy();
header("location: login.php");
exit;
}

// verificar se o login é válido
if(!isset($_SESSION['login_usuario'])){
    // se não existir, destruímos a sessão por segurança
    session_destroy();
    header("location: login.php");
    exit;
}

?>