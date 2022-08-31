<?php
// incluindo o sistema de autenticação
include('acesso_com.php');

//importando constante de sistema(para nome restaurante)
include('../config.php');

//Incluindo o Arquivo de conexão
include('../connections/conn.php');

//Buscando o nome do nível
$consulta = "select * from tbcliente";

// Buscar a lista completa de usuários
$lista = $conn->query($consulta);

//Separar usuarios por linha
$linha = $lista->fetch_assoc();

//Contar numero de linhas da lista
$totalLinhas = $lista->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SIS_NAME;?> - Parecer cliente</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/meu_estilo.css">
</head>
<body>
    <?php include('menu_adm.php');?>
    <main class="container">
    <h3 class="breadcrumb text-danger">
                    <a href="cliente_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Enviando parecer para cliente
                </h3>
        <div class="panel-footer" style="background: none;">
            <form action="reserva_contato.php" method="post" name="form-contato-reserva">
                <p>
                    <span class="input-group">
                        <span class="input-group-addon" id="basic-addon1">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        </span>
                        <input type="text" 
                            name="nome_cliente" 
                            id="nome_cliente" 
                            placeholder="Digite seu nome"
                            aria-describedby="basic-addon1"
                            required
                            class="form-control">
                        </span>
                </p>
                <p>
                    <span class="input-group">
                        <span class="input-group-addon" id="basic-addon2">
                            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            </span>
                            <input type="text" 
                                name="email_cliente" 
                                id="email_cliente" 
                                value="<?php echo $linha['email_cliente'];?>"
                                aria-describedby="basic-addon2"
                                disabled
                                class="form-control">
                        </span>
                </p>
                    <p>
                        <span class="input-group">
                            <span class="input-group-addon" id="basic-addon3">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </span>
                            <textarea type="text" 
                                name="mensagem_contato" 
                                id="mensagem_contato" 
                                placeholder="Digite seu comentario  / Dúvidas"
                                aria-describedby="basic-addon3" 
                                required
                                class="form-control"
                                cols="30"
                                rows="5"></textarea>
                        </span>
                    </p>
                    <p>
                        <button class="btn btn-danger btn-block" aria-label="Enviar" role="button" >
                            Enviar
                            <span class="glyphicon glyphicon-send"></span>
                        </button>
                    </p>
            </form>
        </div>
    </main>
</body>
</html>