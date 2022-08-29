<?php
//Incluindo variaveis do sistema
include ('../config.php');

//Incluindo o sistema de autenticação
//include('acesso_com.php');

//Incluindo o Arquivo de conexão
include('../connections/conn.php');

//Buscando o nome do nível
$consulta = "select r.id_reserva,
r.id_cliente_reserva,
r.data_reserva,
r.hora_reserva,
r.numero_mesa_reserva,
r.numero_pessoas_reserva,
r.motivo_reserva,
r.motivo_recusa,
r.valor_reserva,
r.status_reserva,
r.parecer_reserva

from tbreserva r
INNER JOIN tbreserva r on u.id_reserva = r.id_reserva";

// Buscar a lista completa de usuários
$lista = $conn->query($consulta);

//Separar usuarios por linha
$linha = $lista->fetch_assoc();

//Contar numero de linhas da lista
$totalLinhas = $lista->num_rows;
?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/meu_estilo.css" rel="stylesheet" type="text/css">
    <title><?php echo SIS_NAME. " - Lista de " .$totalLinhas; ?> Reservas</title>
</head>

<body>
    <?php include('menu_adm.php'); ?>

    <main class="container">
        <h1 class="breadcrump alert-info glyphicon glyphicon-user"> Lista de Usuários</h1>
        <table class="table table-condensed table-hover">
            <!--thead>th*8-->
            <thead>                
                <th>ID</th>
                <th>Login</th>
                <th>Nível</th>                
                <th class="largButton">
                    <a href="usuario_insere.php" class="btn btn-block btn-primary btn-xs" id="btn-Add">
                        <span class="hidden-xs">Adicionar<br></span>
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                </th>
            </thead> <!-- Final linha de cabeçalho da tabela -->
            <!-- tboby>tr>td*8 -->
            <tboby>
                <!-- Corpo da tabela -->
                <!--Abre estrutura de repetição-->
                <?php do { ?>
                    <tr>
                        <!-- Linha da tabela -->
                        <td><?php echo $linha['id_usuario']; ?></td>                       
                        <td>
                            <span class="visible-xs"><?php echo $linha['nome_nivel'];?></span>
                            <span class="hidden-xs"><?php echo $linha['login_usuario'];?></span>
                        </td>
                        <td>
                            <?php
                            if ($linha['nome_nivel'] == 'Supervisor') {
                                echo ("<span class='glyphicon glyphicon-briefcase text-danger aria-hidden='true'></span>");
                            } else if($linha['nome_nivel'] == 'Comercial') {
                                echo ("<span class='glyphicon glyphicon-shopping-cart text-info aria-hidden='true'></span>");
                            } else if($linha['nome_nivel'] == 'Cliente'){
                                echo ("<span class='glyphicon glyphicon-user text-success aria-hidden='true'></span>");
                            } else{
                                echo ("<span class='glyphicon glyphicon-remove text-danger aria-hidden='true'></span>");
                            }
                            ?>
                            <?php echo $linha['nome_nivel']; ?>
                        </td>  
                                                                       
                        <td>
                            <a href="usuario_atualiza.php?id_usuario=<?php echo $linha['id_usuario']; ?>" class="btn btn-warning btn-block btn-xs" id="btn-padrao">
                                <span class="hidden-xs">Alterar</span>
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a>
                   
                            <button class="btn btn-danger largButton btn-xs delete" 
                            role="button" 
                            data-nome="<?php echo $linha['login_usuario'];?>" 
                            data-id="<?php echo $linha['id_usuario'];?>" id="btn-padrao">
                 
                            <span class="hidden-xs">Excluir</span>
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </td>
                    </tr> <!-- Final da linha da tabela -->
                <?php } while ($linha = $lista->fetch_assoc()); ?>
            </tboby> <!-- Final do corpo da tabela -->

        </table>

    </main>
    <!-- Inicio do modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-danger">Atenção!</h4>
                </div>
                <div class="modal-body">
                    Deseja realmente<strong> excluir </strong> o usuário?
                    <h3><span class="text-danger nome"></span></h3>
                </div>
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-danger delete-yes">Confirmar</a>
                    <button class="btn btn-success" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>                         
    </div> <!-- Fim do modal -->
    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Script para o modal -->
    <script type="text/javascript">
        $('.delete').on('click', function(){
            //Busca o valor do atributo data-nome
            var nome = $(this).data('nome');
            //Busca o valor do atributo data-id
            var id = $(this).data('id');
            //Insere o nome do item na confirmação do modal
            $('span.nome').text(nome);
            //Envia o id através do link do butão confirmar
            $('a.delete-yes').attr('href', 'usuario_excluir.php?id_usuario='+id);
            //Abre o Modal
            $('#myModal').modal('show');

        });
    </script>

</body>

</html>