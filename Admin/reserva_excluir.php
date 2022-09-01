<?php 
//incluindo o sistema de autenticação
include("acesso_com.php");

//incluindo conexão com o banco de dados
include("../connections/conn.php");

$id_reserva = $_GET["id_reserva"];

//removendo usando músculos (Força bruta)
//$query = "delete from tbreserva where id_reserva = $id_reserva;";

//removendo usando método de acumular (vai que precisa outra hora!)
$query = "update tbreserva set deletado = default where id_reserva = $id_reserva;";


$resultado = $conn->query($query);
if(mysqli_insert_id($conn)){
    header("location:reserva_lista.php");
}else{
    header("location:reserva_lista.php");
}
?>