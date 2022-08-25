<?php 
//sistema de autenticação
include("acesso_com.php");

//variaveis de ambiente
include("../config.php");

//conexão banco
include("../connections/conn.php");

if($_POST){

// Poderia criar uma procedure
$login_usuario = $_POST['login_usuario'];
$senha_usuario = $_POST['senha_usuario'];
$nivel_usuario = $_POST['nivel_usuario'];

$campos_insert = "login_usuario,senha_usuario,nivel_usuario";
$values = "$login_usuario','$senha_usuario','$nivel_usuario'";
$query = "insert into tbusuarios ($campos_insert) values ($values);";
$resultado = $conn->query($query);

//Após o insert redireciona a página
if(mysqli_insert_id($conn)){
    header("location:usuarios_lista.php");
}else{
    header("location:usuarios_lista.php");
}

}

//chave estrangeira tipo
$query_tipo = "select * from tbusuarios order by login_usuario asc";
$lista_fk = $conn->query($query_tipo);
$linha_fk = $lista_fk->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title><?php echo SIS_NAME. " - " ?>Inserir Usuario</title>
</head>
<body class="fundo">
    <?php include("menu_adm.php");?>
    <main class="container">
        <div class="row">
            <!-- linha de dimencionamento -->
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h3 class="breadcrumb text-warning">
                    <a href="usuarios_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Inserindo Usuarios
                </h3>
                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="usuario_insere.php" id="form_usuarios_insere" name="form_usuarios_insere" method="POST" enctype="multipart/form-data">
                            <br>
                            <label for="login_usuario">Nome/Login Usuário:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" name="login_usuario" id="login_usuario" placeholder="Digite o Nome/Login do usuário" maxlength="100" required>
                            </div>
                            <br>
                            <!-- Seleciona o tipo do produto -->
                            <label for="nivel_usuario">Nivel Usuário:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks"></span>
                                </span>
                                <select name="id_usuario" id="id_usuario" class="form-control" required>
                                    <?php do {?>
                                        <option value="<?php echo $linha_fk['id_usuario'];?>">
                                            <?php echo $linha_fk['nivel_usuario'];?>
                                    </option>
                                        <?php } while($linha_fk=$lista_fk->fetch_assoc());
                                        $linha_fk = mysqli_num_rows($lista_fk);
                                        if($linha_fk > 0){
                                            mysqli_data_seek($lista_fk,0);
                                            $linha_fk = $lista_fk->fetch_assoc();
                                        }

                                        ?> 
                                </select>
                            </div>

                            <br>
                            <label for="senha_usuario">Senha:</label>
                            <div class="input-group-addon">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" name="senha_usuario" id="senha_usuario" placeholder="Digite a senha do usuário" maxlength="100" required>
                            </div>
                            <br>
                            <!-- botao enviar -->                                
                            <input type="submit" value="Cadastrar" name="enviar" id="enviar" class="btn btn-danger btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>