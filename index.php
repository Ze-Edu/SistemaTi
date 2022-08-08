<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boi na brasa</title>
    <link rel="stylesheet" href="css/meu_estilo.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="fundofixo">
    <!-- Area do menu -->
    <?php include('menu_publico.php');?>
    <a name="home"></a>

    <main>
    <!-- Area do carousel -->
    <?php include('carousel.php');?>

    <!-- Area de destaques -->
    <?php include('produtos_destaques.php');?>
    <a name="destaque">&nbsp;</a>

    <!-- Area produtos em geral -->
    <?php include('produtos_geral.php');?>
    <a name="produtos">&nbsp;</a>

    <!-- Area de rodapé-->
    <footer>

    <?php include('rodape.php');?>
    <a name="contato">&nbsp;</a>

    </footer>
    </main>
    
    <!-- Links dos arquivos bootstrap js -->
    <script src="https://ajax.google.com/ajax/libs/jquery/1.12.4/jquery.min"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>