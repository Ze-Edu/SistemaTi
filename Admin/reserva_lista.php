<?php
//Incluindo variaveis do sistema
include ('../config.php');

//Incluindo o sistema de autenticação
include('acesso_com.php');

//Incluindo o Arquivo de conexão
include('../connections/conn.php');

//Buscando TBRESERVA
$consulta = "select * from vw_tbreserva";

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
        <h1 class="breadcrump alert-info glyphicon glyphicon-th-list"> Lista de reservas</h1>
        <table class="table table-condensed table-hover">
            <!--thead>th*8-->
            <thead>                
                <th>ID</th>
                <th>ID Cliente</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Número da mesa</th>
                <th>Número de pessoas</th>
                <th>Motivo reserva</th>
                <th>Motivo recusa</th>
                <th>Valor Reserva</th>
                <th>status reserva</th>
                <th>Parecer</th>             
            </thead> <!-- Final linha de cabeçalho da tabela -->
            <tboby>
                <!-- Corpo da tabela -->
                <!--Abre estrutura de repetição-->
                <?php do { ?>
                    <tr style="background-color: rgba(0,0,0,0.2);">
                        <!-- Linha da tabela -->
                        <td><?php echo $linha['id_reserva']; ?></td> 
                        <td><?php echo $linha['id_cliente_reserva'];?></td>                      
                        <td><?php echo $linha['data_reserva'];?></span></td>
                        <td><?php echo $linha['hora_reserva']; ?></td> 
                        <td><?php echo $linha['numero_mesa_reserva'];?></td>
                        <td><?php echo $linha['numero_pessoas_reserva'];?></td>
                        <td><?php echo $linha['motivo_reserva'];?></td>
                        <td><?php echo $linha['motivo_recusa'];?></td>
                        <td><?php echo $linha['valor_reserva'];?></td>
                        <td><?php echo $linha['status_reserva'];?></td>
                        <td><?php echo $linha['parecer_reserva'];?></td>
                        <td>
                            <a href="email_reserva.php?id_cliente_reserva=<?php echo $linha['id_cliente_reserva']; ?>" class="btn btn-info btn-block btn-xs" id="btn-reserva-enviar">
                                <span class="hidden-xs">Enviar Parecer</span>
                                <br>
                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            </a>
                            <button class="btn btn-danger largButton btn-xs delete" 
                            role="button" 
                            data-nome="<?php echo $linha['id_cliente_reserva'];?>" 
                            data-id="<?php echo $linha['id_reserva'];?>" id="btn-reserva-excluir">
                 
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
                    Deseja realmente<strong> excluir </strong> essa reserva?
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
            $('a.delete-yes').attr('href', 'reserva_excluir.php?id_reserva='+id);
            //Abre o Modal
            $('#myModal').modal('show');

        });
    </script>

</body>

</html>