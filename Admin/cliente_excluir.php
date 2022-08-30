<?php 
//incluindo o sistema de autenticação
include("acesso_com.php");

//incluindo conexão com o banco de dados
include("../connections/conn.php");

$id_cli = $_GET["id_cliente"];

//removendo usando músculos (Força bruta)
$query = "delete from tbcliente where id_cliente = $id_cli;";

//removendo usando método de acumular (vai que precisa outra hora!)
//$query = "update tbusuarios set deletado = default where id_usuarios = $id_user;";


$resultado = $conn->query($query);
if(mysqli_insert_id($conn)){
    header("location:cliente_lista.php");
}else{
    header("location:cliente_lista.php");
}
?>