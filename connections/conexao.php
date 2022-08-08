<?php 
# Comentário de linhas 
// Comentário de linhas
/*
Comentário de bloco
*/ 

$hostname_conexao = "localhost";
$database_conexao = "sistemaDB";
$username_conexao = "root";
$password_conexao ="";
$charset_conexao = "utf8";

// Definindo os parâmetros da  conexão
$conexao = new mysqli($hostname_conexao,
$username_conexao,
$password_conexao, 
$database_conexao);

// Definindo o conjunto de caracteres da conexão
mysqli_set_charset($conexao, $charset_conexao);

// Verificando possíveis erros de conexão
if($conexao -> connect_error)
{
    echo "Error: ".$conexao -> connect_error;
}

?>