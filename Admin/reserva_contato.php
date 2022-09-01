<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Após 15 segundo a página será redirecionada para index.php-->
    <meta http-equiv="refresh" content="10;URL=index.php">
    <title>conf/neg para cliente</title>
    <link rel="stylesheet" href="./css/meu_estilo.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
</head>

<body class="fundofixo">
    <?php

    use PHPMailer\PHPMailer\PHPMailer;

    include('menu_publico.php'); ?>
    <main class="container">
        <section>
            <div class="jumbotron alert-success text-center">
                <h1 class="text-alert-success">Cliente receberá mensagem em breve</h1>
                <?php

                include('./PHP-maler/src/PHPMailer.php');
                include('./PHP-maler/src/SMTP.php');

                $mail = new PHPMailer(true);
                $mail->CharSet="UTF-8";
                try {
                    $assunto = $_POST['nome_contato'];
                    $email = $_POST['email_contato'];
                    $mensagem = $_POST['mensagem_contato'];

                    // Configurações do servidor
                    $mail->isSMTP();        //Devine o uso de SMTP no envio
                    $mail->SMTPAuth = true; //Habilita a autenticação SMTP
                    $mail->Username   = '8aef70db0b0230';
                    $mail->Password   = '83b99729404690';
                    // Criptografia do envio SSL também é aceito
                    $mail->SMTPSecure = 'tls';
                    // Informações específicadas pelo Google
                    $mail->Host = 'smtp.mailtrap.io';
                    $mail->Port = 2525;
                    // Define o remetente
                    $mail->setFrom('nomedaconta@gmail.com', 'Nome do Remetente');
                    // Define o destinatário
                    $mail->addAddress($email);
                    // Conteúdo da mensagem
                    $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
                    $mail->Subject = $assunto;
                    $mail->Body = $mensagem;

                    // Enviar
                    $mail->send();
                    echo 'A mensagem foi enviada!';
                } catch (Exception $e) {
                    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
                }
                ?>
            </div>
        </section>
        <footer>
            <?php include('rodape.php'); ?>
        </footer>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>