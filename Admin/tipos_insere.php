<?php
//Sistema de autenticação
include('acesso_com.php');
//Variaveis de ambiente
include('../config.php');
//Conexão com banco
include('../connections/conn.php');


if($_POST){

        $id_tipo = $_POST['id_tipo'];
        $sigla_tipo = $_POST['sigla_tipo'];        
        $rotulo_tipo = $_POST['rotulo_tipo'];       

        $campos_insert = "id_tipo,sigla_tipo,rotulo_tipo";
        $values = "$id_tipo,'$sigla_tipo','$rotulo_tipo'";
        
        $query = "insert into tbtipos ($campos_insert) values ($values);";
        $resultado = $conn->query($query);

     // var_dump($$query);

    //Após o insert direciona a pagina
   if(mysqli_insert_id($conn)){
        header("location:tipos_lista.php");
    }else{
        header("location:tipos_lista.php");
    } 
}


//Chave estrangeira tipo
$query_tipo = "select * from tbtipos order by sigla_tipo asc";
$lista_fk = $conn->query($query_tipo);
$linha_fk = $lista_fk->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SIS_NAME. " - " ?>Inserir Tipo</title>
            <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
</head>

<body>
    <?php include('menu_adm.php'); ?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h2 class="breadcrumb tex-danger">
                    <a href="tipos_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Inserindo Tipo
                </h2>
                <div class="thumbnail">
                    <!-- Abre thumbnail -->
                    <div class="alert alert-danger" role="alert">
                        <form action="usuario_insere.php" method="post" id="form_usuario_insere" name="form_usuario_insere" enctype="multipart/form-data">
                            <!--Inserir o campo id_tipo oculto para uso no filtro -->
                            <input type="hidden" name="id_tipo" id="id_tipo">
                            <!-- Select id_tipo -->
                            <label for="id_tipo">Tipo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="id_tipo" name="id_tipo" maxlength="100" required  placeholder="Digite o novo tipo">
                            </div>
                            <br>
                            <!-- Text sigla -->
                            <label for="sigla_tipo">Sigla:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="sigla_tipo" name="sigla_tipo" maxlength="100" required  placeholder="Digite a nova sigla">
                            </div>
                            <br>
                            <!-- number rotulo -->
                            <label for="rotulo_tipo">Rótulo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="rotulo_tipo" id="rotulo_tipo" required class="form-control" placeholder="Digite o novo rotulo">
                            </div>
                            <br>
                            <!-- Botão Enviar -->
                            <input type="submit" value="Cadastrar" name="enviar" id="enviar" class="btn btn-success btn-block">
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