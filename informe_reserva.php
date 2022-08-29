<?php
//Sistema de autenticação
//include('acesso_com.php');
//Variaveis de ambiente
include('config.php');
//Conexão com banco
include('./connections/conn.php');


if($_POST){

        $id_reserva = $_POST['id_reserva'];
        $data_reserva = $_POST['data_reserva'];        
        $hora_reserva = $_POST['hora_reserva'];
        $numero_pessoas_reserva = $_POST['numero_pessoas_reserva'];
        $motivo_reserva = $_POST['motivo_reserva'];


        $campos_insert = "id_reserva,data_reserva,hora_reserva,numero_pessoas_reserva,motivo_reserva";
        $values = "$id_reserva,'$data_reserva','$hora_reserva','$numero_pessoas_reserva','$motivo_reserva'";
        
        $query = "insert into tbreserva ($campos_insert) values ($values);";
        $resultado = $conn->query($query);

     // var_dump($$query);

    //Após o insert direciona a pagina
   if(mysqli_insert_id($conn)){
        header("location:sucesso.php");
    }else{
        header("location:sucesso.php");
    } 
}


//Chave estrangeira tipo
$query_tipo = "select * from tbreserva";
$lista_fk = $conn->query($query_tipo);
$linha_fk = $lista_fk->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/meu_estilo.css">
    <title><?php echo SIS_NAME;?>- Reserva</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h2 class="breadcrumb tex-danger">
                    <a href="index.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Informações da reserva
                </h2>
                <div class="thumbnail">
                    <!-- Abre thumbnail -->
                    <div class="alert alert-danger" role="alert">
                        <form action="informe_reserva.php" method="post" id="form_informe_reserva" name="form_informe_reserva" enctype="multipart/form-data">
                            <!--Inserir o campo id_reserva oculto para uso no filtro -->
                            <input type="hidden" name="id_reserva" id="id_reserva">
                            <!-- label data -->
                            <label for="data_reserva">Data Reserva:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="date" class="form-control" id="data_reserva" name="data_reserva" maxlength="100" required>
                            </div>
                            <br>
                            <!-- label Hora -->
                            <label for="hora_reserva">Horário Reserva:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                </span>
                                <input type="time" class="form-control" id="hora_reserva" name="hora_reserva" maxlength="100" required  placeholder="Digite o horário que quer realizar sua reserva">
                            </div>
                            <br>
                            <!-- number pessoas -->
                            <label for="numero_pessoas_reserva">Número de pessoas:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                                </span>
                                <input type="number" class="form-control" id="numero_pessoas_reserva" name="numero_pessoas_reserva" maxlength="100" required  placeholder="Digite o numero de pessoas que irão">
                            </div>
                            <br>
                            <!-- text motivo -->
                            <label for="motivo_reserva">Motivo da reserva:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="motivo_reserva" name="motivo_reserva" maxlength="100" required  placeholder="Digite o motivo da reserva">
                            </div>
                            <br>
                            <!-- informações/regras -->
                            <h4 style="text-align: center;">No mínimo 36 horas de antecedência e no máximo 60 dias para reservar. Apenas um pedido de reserva por dia para um mesmo cpf</h4>
                            <!-- Botão Enviar -->
                            <input type="submit" value="Reservar" name="enviar" id="enviar" class="btn btn-success btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>