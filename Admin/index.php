<?php
// incluindo o sistema de autenticação
include('acesso_com.php');

//importando constante de sistema(para nome restaurante)
include('../config.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SIS_NAME. " - "?> Área administrativa</title>
</head>
<body>
    <?php include('menu_adm.php')?>
    <?php include('adm_options.php')?>
</body>
</html>