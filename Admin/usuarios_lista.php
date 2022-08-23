<?php
//importando constante de sistema(para nome restaurante)
include('../config.php');

// Incluindo o sistema de autenticação 
include ('acesso_com.php');

// Incluindo o arquivo de conexão
include ('../connections/conn.php');

// Selecionando os dados
$consulta = "select * from tbusuarios order by login_usuario asc";

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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <title><?php echo SIS_NAME. " - Lista de " .$total_linhas; ?> Usuários</title>
</head>
<body>

<?php include ('menu_adm.php');?>

<main class="container">
<h1 class="glyphicon glyphicon-user breadcrumb alert-danger"> Lista de Usuários</h1>
<table class="table table-condensed table-hover tbopacidade">
        <!-- thead>th*7 -->
        <thead>
            <th>Id</th>
            <th>Nome</th>
            <th>Nível Usuários</th>
            <th>
                <a href="usuario_insere.php" class="btn btn-block btn-primary btn-xs" id="btn-Add">
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
                <td><?php echo $linha['id_usuario'];?></td>
                <td>
                    <span class="glyphicon glyphicon-user hiddden-xs"> <?php echo $linha['login_usuario']?></span>
                </td>
                <td><?php echo $linha['nivel_usuario'];?></td>
                <td>
                    <a href="usuario_atualiza.php?id_usuario=<?php echo $linha['id_usuario'];?>" class="btn btn-warning btn-block btn-xs"  id="btn-padrao">
                        <span class="hidden-xs">Alterar</span>
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </a>
                    <button class="btn btn-danger btn-block btn-xs delete" 
                    role="button" 
                    data-nome="<?php echo $linha['login_usuario'];?>"
                    data_id="<?php echo $linha['id_usuario'];?>"  id="btn-padrao">
                    
                    <span class="hidden-xs">Excluir</span>
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
                <button class="close" type="button" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title text-danger">Atenção</h4>
            </div>
            <div class="modal-body">
                Deseja realmente <n>excluir<n> o item?
                <h3><span class="text-danger nome"></span></h3>
            </div>
            <div class="modal-footer">
                <a href="#" type="button" class="btn btn-danger delete-yes">
                    Confirmar
                </a>
                <button class="btn btn-succes" data-dismiss="modal">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div><!-- Fecha modal -->

<!-- Link arquivos Bootstrap js -->        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- Script para o modal -->
<script type="text/javascript">
    $('.delete').on('click', function(){
        // busca o valor do atributo  data-nome
        var nome = $(this).data('nome');
        // busca o valor do atributo data-id
        var id =$(this).data('id');
        // insere o nome do item na confirmação do modal
        $('span.nome').text(nome);
        // envia o id através do link do botão confirmar
        $('a.delete-yes').attr('href','usuario_excluir.php?id_usuario='+id); 
        // Abre modal
        $('#myModal').modal('show');
    })
</script>

</main>

</body>
</html>