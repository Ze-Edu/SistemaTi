<?php
//Sistema de autenticação
//include('acesso_com.php');
//Variaveis de ambiente
include('config.php');
//Conexão com banco
include('connections/conn.php');


if($_POST){

        $nome_cliente = $_POST['nome_cliente'];
        $cpf_cliente = $_POST['cpf_cliente'];        
        $email_cliente = $_POST['email_cliente'];
        $telefone_cliente = $_POST['telefone_cliente'];       

        $campos_insert = "nome_cliente,cpf_cliente,email_cliente,telefone_cliente";
        $values = "$nome_cliente,'$cpf_cliente','$email_cliente','$telefone_cliente'";
        
        $query = "insert into tbcliente ($campos_insert) values ($values);";
        $resultado = $conn->query($query);

     // var_dump($$query);

    //Após o insert direciona a pagina
   if(mysqli_insert_id($conn)){
        header("location:informe_reserva.php");
    }else{
        header("location:informe_reserva.php");
    } 
}


//Chave estrangeira tipo
$query_tipo = "select * from tbcliente order by nome_cliente asc";
$lista_fk = $conn->query($query_tipo);
$linha_fk = $lista_fk->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo(SIS_NAME);?> - Cadastro Reserva</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/meu_estilo.css">
</head>
<body>
    <?php include('menu_publico.php');?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h2 class="breadcrumb tex-danger">
                    <a href="index.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Cadastro e Regras para a reserva 
                </h2>
                <div class="thumbnail">
                    <!-- Abre thumbnail -->
                    <div class="alert alert-danger" role="alert">
                        <form action="cadastro_regra_reserva.php" method="post" id="form_cadastro_regra_reserva" name="form_cadastro_regra_reserva" enctype="multipart/form-data">
                            <!--Inserir o campo id_cliente oculto para uso no filtro -->
                            <input type="hidden" name="id_cliente" id="id_cliente">
                            <!-- label nome_cliente -->
                            <label for="nome_cliente">Nome completo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" maxlength="100" required  placeholder="Digite seu nome completo">
                            </div>
                            <br>
                            <!-- label email_cliente -->
                            <label for="email_cliente">E-mail:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="email_cliente" name="email_cliente" maxlength="100" required  placeholder="Digite seu email">
                            </div>
                            <br>
                            <!-- number cpf -->
                            <label for="cpf_cliente">Cpf:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                                </span>
                                <input type="number" class="form-control" id="cpf_cliente" name="cpf_cliente" maxlength="100" required  placeholder="Digite seu cpf">
                            </div>
                            <br>
                            <!-- number telefone -->
                            <label for="telefone_cliente">Telefone:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                                </span>
                                <input type="number" class="form-control" id="telefone_cliente" name="telefone_cliente" maxlength="100" required  placeholder="Digite seu telefone para contato">
                            </div>
                            <br>
                            <!-- informações/regras -->
                            <h4 style="text-align: center;">No mínimo 36 horas de antecedência e no máximo 60 dias para reservar. Apenas um pedido de reserva por dia para um mesmo cpf</h4>
                            <!-- Botão Enviar -->
                            <a href="informe_reserva.php">
                            <input type="submit" value="Cadastrar" name="enviar" id="enviar" class="btn btn-success btn-block">
                            </a>
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