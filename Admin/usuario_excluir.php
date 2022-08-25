<?php 
//incluindo o sistema de autenticação
include("acesso_com.php");

//incluindo conexão com o banco de dados
include("../connections/conn.php");

$id_user = $_GET["id_usuario"];

//removendo usando músculos (Força bruta)
$query = "delete from tbusuarios where id_usuario = $id_user;";

//removendo usando método de acumular (vai que precisa outra hora!)
//$query = "update tbusuarios set deletado = default where id_usuarios = $id_user;";


$resultado = $conn->query($query);
if(mysqli_insert_id($conn)){
    header("location:usuarios_lista.php");
}else{
    header("location:usuarios_lista.php");
}
?>