<?php 
//incluindo o sistema de autenticação
include("acesso_com.php");

//incluindo conexão com o banco de dados
include("../connections/conn.php");

$id_tipo = $_GET['id_tipo'];

//removendo usando músculos (Força bruta)
$query = "delete from tbtipos where id_tipo = $id_tipo;";

//removendo usando método de acumular (vai que precisa outra hora!)
//$query = "update tbtipo set deletado = default where id_tipo = $id_tipo;";



$resultado = $conn->query($query);
if(mysqli_insert_id($conn)){
    header("location:tipos_lista.php");
}else{
    header("location:tipos_lista.php");
}
?>