<?php
//importando constante de sistema(para nome restaurante)
include('../config.php');

// Incluindo o sistema de autenticação 
include ('acesso_com.php');

// Incluindo o arquivo de conexão
include ('../connections/conn.php');

// Selecionando os dados
$consulta = "select * from vw_tbprodutos order by descri_produto asc";

// buscar a lista completa de produtos
$lista = $conn->query($consulta);

// separar produtos por linha
$linha = $lista->fetch_assoc();

// contar o número de linhas na lista
$total_linhas =  $lista->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
    <title><?php echo SIS_NAME. " - Lista de " .$total_linhas; ?> Produtos</title>
</head>
<body>

<?php include ('menu_adm.php');?>

<main class="container">
    <h1 class="glyphicon glyphicon-shopping-cart breadcrumb alert-danger"> Lista de Produtos</h1>
    <table class="table table-condensed table-hover tbopacidade">
        <!-- thead>th*7 -->
        <thead>
            <th class="hidden">Id</th>
            <th>Tipo</th>
            <th>Descrição</th>
            <th>Resumo</th>
            <th>Valor</th>
            <th>Imagem</th>
            <th>
                <a href="produtos_insere.php" class="btn btn-block btn-primary btn-xs">
                    <span class="hidden-xs">Adicionar<br></span>
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </th>
        </thead><!-- Fecha linha de cabeçalho da tabela -->
        <!-- tbody>tr>td*8 -->
        <tbody><!-- Corpo da tabela -->
        <!-- Abre a estrutura de repetição -->
        <?php do {?>
            <tr><!-- linha da tabela -->
                <td class="hidden"><?php echo $linha['id_produto'];?></td>
                <td>
                    <span class="visible-xs"><?php echo $linha['sigla_tipo']?></span>
                    <span class="hiddden-xs"><?php echo $linha['rotulo_tipo']?></span>
                </td>
                <td>
                    <?php 
                    if($linha['destaque_produto']=='Sim'){
                        echo ("<span class='glyphicon glyphicon-heart text-danger' aria-hidden='true'></span>");
                    } else {
                        echo ("<span class='glyphicon glyphicon-ok text-info' aria-hidden='true'></span>");
                    }
                    ?>
                    <?php echo $linha['descri_produto'];?>
                </td>
                <td><?php echo $linha['resumo_produto'];?></td>
                <td><?php echo number_format($linha['valor_produto'],2,',','.');?></td>
                <td>
                    <img src="../images/<?php echo $linha['imagem_produto'];?>" width="100px" alt="">
                </td>
                <td>
                            <a href="produto_atualiza.php?id_produto=<?php echo $linha['id_produto'] ?>" class="btn btn-warning btn-block btn-xs">
                                <span class="hidden-xs">Alterar</span>
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a>
                            <button class="btn btn-danger btn-block btn-xs delete " role="button"
                            data-id="<?php echo $linha['id_produto']; ?>"
                            data-nome="<?php echo $linha['descri_produto']; ?>">
                                <span class="hidden-xs ">Excluir <br></span>
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </td>
            </tr><!-- Fecha a linha da tabela -->

            <?php } while ($linha=$lista->fetch_assoc()); ?><!-- Fecha a estrutura de repetição -->

        </tbody><!-- Fecha o Corpo da tabela -->
    </table>
</main>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button class="close" type="button"data-dismiss="modal" >&times;</button>
            <h4 class="modal-title text-danger">Atenção</h4>
        </div>
        <div class="modal-body">
            Deseja Realmente  <strong>Excluir</strong> Este Produto ?
            <h3><span class="text-danger nome"></span></h3>
        </div>
        <div class="modal-footer">
            <a href="#" type="button" class="btn btn-danger delete-yes">Confirmar</a>
            <button class="btn btn-success" data-dismiss="modal">
                    Cancelar
            </button>
        </div>
    </div>
</div>
</div>
<!-- Fecha modal -->

<!-- Link arquivos Bootstrap js -->        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- Script para o modal -->

<script type="text/javascript">

$('.delete').on('click',function(){
    //Busca o valor do atributo data-nome
    var nome = $(this).data('nome');
    //Busca o valor do atributo data-id
    var id = $(this).data('id');
    //Insere o nome do item na confirmação do Modal
    $('span.nome').text(nome);
    //Envia o id através do link do botão para confirmar
    $('a.delete-yes').attr('href','produto_excluir.php?id_produto='+id);
    //Abre o Modal
    $('#myModal').modal('show');
})

</script>

</body>
</html>