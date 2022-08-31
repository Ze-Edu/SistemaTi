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
                    <a href="reserva_lista.php">
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
                            name="nome_contato" 
                            id="nome_contato" 
                            placeholder="Digite o nome do cliente"
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
                                name="email_contato" 
                                id="email_contato" 
                                placeholder="Email Cliente"
                                aria-describedby="basic-addon2"
                                required
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
                                placeholder="Digite o parecer"
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