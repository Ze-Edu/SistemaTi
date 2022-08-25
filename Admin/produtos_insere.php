<?php 
//sistema de autenticação
include("acesso_com.php");

//variaveis de ambiente
include("../config.php");

//conexão banco
include("../connections/conn.php");

if($_POST){
// Guardando o nome da imgem no banco de dados e arquivo na pasta images
if(isset($_POST['enviar'])){
    $nome_img = $_FILES['imagem_produto']['name'];
    $tmp_img = $_FILES['imagem_produto']['tmp_name'];
    $pasta_img = "../images/".$nome_img;
    move_uploaded_file($tmp_img,$pasta_img);
}

// Poderia criar uma procedure

$id_tipo_produto = $_POST['id_tipo_produto'];
$destaque_produto = $_POST['destaque_produto'];
$descri_produto = $_POST['descri_produto'];
$resumo_produto = $_POST['resumo_produto'];
$valor_produto = $_POST['valor_produto'];
$imagem_produto = $_FILES['imagem_produto']['name'];

$campos_insert = "id_tipo_produto,destaque_produto,descri_produto,resumo_produto,valor_produto,imagem_produto";
$values = "$id_tipo_produto,'$destaque_produto','$descri_produto','$resumo_produto',$valor_produto,'$imagem_produto'";
$query = "insert into tbprodutos ($campos_insert) values ($values);";
$resultado = $conn->query($query);

//Após o insert redireciona a página
if(mysqli_insert_id($conn)){
    header("location: produtos_lista.php");
}else{
    header("location: produtos_lista.php");
}

}

//chave estrangeira tipo
$query_tipo = "select * from tbtipos order by rotulo_tipo asc";
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
    <title><?php echo SIS_NAME. " - " ?>Inserir produto</title>
</head>
<body class="fundo">
    <?php include("menu_adm.php");?>
    <main class="container">
        <div class="row">
            <!-- linha de dimencionamento -->
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h3 class="breadcrumb text-warning">
                    <a href="produtos_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Inserindo Produtos
                </h3>
                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="produtos_insere.php" id="form_produtos_insere" name="form_produtos_insere" method="POST" enctype="multipart/form-data">
                            <!-- Seleciona o tipo do produto -->
                            <label for="id_tipo_produto">Tipo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks"></span>
                                </span>
                                <select name="id_tipo_produto" id="id_tipo_produto" class="form-control" required>
                                    <?php do {?>
                                        <option value="<?php echo $linha_fk['id_tipo'];?>">
                                            <?php echo $linha_fk['rotulo_tipo'];?>
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
                            <!-- label radio -->
                            <label for="destaque_produto">Destaque:</label>
                            <div class="input-group">
                                <label for="destaque_produto_s" class="radio-inline">
                                    <input type="radio" name="destaque_produto" id="destaque_produto" value="Não" checked>
                                    Sim
                                </label>
                                <label for="destaque_produto_n" class="radio-inline">
                                    <input type="radio" name="destaque_produto" id="destaque_produto" value="Não" checked>
                                    Não
                                </label>
                            </div><!-- Fecha a div do radio button -->
                            <br>
                            <label for="descri_produto">Descrição:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" name="descri_produto" id="descri_produto" placeholder="Digite o titulo do produto" maxlength="100" required>
                            </div>
                            <br>

                            <label for="resumo_produto">Resumo:</label>
                            <div class="input-group-addon">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                </span>
                                <textarea name="resumo_produto" id="resumo_produto" cols="30" rows="8"
                                placeholder="Digite os detalhes do Produto" class="form-control"></textarea>
                            </div>
                            <br>
                            <label for="valor_produto">Valor:</label>
                            <div class="input-group">
                                <span class="input-addon">
                                    <span class="glyphicon glyphicon-usd" aria-hidden="true">                                      
                                    </span>
                                    <input type="number" class="form-control" name="valor_produto" id="valor_produto" min="0" step="0.0">
                                </span>
                            </div>
                            <br>

                            <label for="imagem_produto">Imagem:</label>
                            <div class="input-group">
                                <span class="input-group-addon" aria-hidden="true">
                                    <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                                </span>
                                <img src="" alt="" id="imagem" name="imagem" class="img-responsive">
                                <input type="file" class="form-control" name="imagem_produto"
                                id="imagem_produto" accept="">
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
<!-- Script para a imagem -->
<script>
    document.getElementById("imagem_produto").onchange = function (){
        var reader = new FileReader();
        if(this.files[0].size>528385){
            alert("A imagem deve ter no máximo 500KB");
            $("#imagem").attr("src", "blank");
            $("#imagem").hide();
            $("#imagem_produto").wrap('<form>').closest('form').get(0).reset();
            $("#imagem_produto").unwrap();
            return false;
        }
        // verifica se o input do tipo file possui dados
        if(this.files[0].type.indexOf("image")==-1){
            alert("Formato inválido, escolha uma imagem!");
            $("#imagem").attr("src", "blank");
            $("#imagem").hide();
            $("#imagem_produto").wrap('<form>').closest('form').get(0).reset();
            $("#imagem_produto").unwrap();
        }
        reader.onload = function (e){
            // obter dados carregados e renderizar a miniatura
            document.getElementById("imagem").src = e.target.result;
            $("#imagem").show();
        }
        reader.readAsDataURL(this.files[0]);
    }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>