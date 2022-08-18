<?php
// Incluindo o sistema de autenticação 
include ('acesso_com.php');

// Incluindo o arquivo de conexão
include ('../connections/conn.php');

// Selecionando os dados
$consulta = "select * from tbtipos";

// buscar a lista completa de produtos
$lista = $conn->query($consulta);

// separar produtos por linha
$linha = $lista->fetch_assoc();

// contar o número de linhas na lista
$total_linhas =  $lista->num_rows;

?>
