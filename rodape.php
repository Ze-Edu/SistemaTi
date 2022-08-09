<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Boi na Brasa</title>
</head>
<body class="fundofixo">
    <!-- Abre painel rodapé -->
    <div class="row panel-footer" style="background-color: rgba(255,255,255,0.8);">
        <div class="col-sm-6 col-md-4">
            <div class="panel-footer" style="background-color: none;">
                <img src="images/logochurrascopequeno.png" alt="">
                <br>
                <i>Aqui tem carne na brasa!</i>
                <address>
                    <i>Avenida Itaquera, 8266 Itaquera - São Paulo - SP - CEP 08295-000</i>
                    <br>
                    <span class="glyphicon glyphicon-phone-alt"></span>
                    &nbsp;(11) 2185-9200
                    <br>
                    <span class="glyphicon glyphicon-envelope"></span>
                    &nbsp;<a href="mailto:contato@boizinho.com.br?subject=Contato via site&cc=joseeduardoqueiros5@gmail.com">
                        contato@boizinho.com.br
                    </a>
                </address>
                <!--localização-->
                <div class="embed-responsive embed-responsive-4by3">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.7944237820775!2d-46.45873188447626!3d-23.539895266686155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce66bf22458913%3A0xecdac462b58a9475!2sSenac%20Itaquera!5e0!3m2!1spt-BR!2sbr!4v1660051635531!5m2!1spt-BR!2sbr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!--fecha localização-->
            </div>
        </div>
        <!-- Abre area de navegação -->
        <div class="panel-footer" style="background: none;">
            <h4>Links</h4>
            <ul class="nav nav-pills nav-stacked">
                <li>
                    <a href="index.php#home" class="text-danger">
                        <span class="glyphicon glyphicon-home" aria-hidden="true">&nbsp;Home</span>
                    </a>
                </li>
                <li>
                    <a href="index.php#destaques" class="text-danger">
                        <span class="glyphicon glyphicon-ok-sign" aria-hidden="true">&nbsp;Destaques</span>
                    </a>
                </li>
                <li>
                    <a href="index.php#produtos" class="text-danger">
                        <span class="glyphicon glyphicon-cutlery" aria-hidden="true">&nbsp;Produtos</span>
                    </a>   
                </li>
                <li>
                    <a href="index.php#contato" class="text-danger">
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true">&nbsp;Contato</span>
                    </a>
                </li>
                <li>
                    <a href="admin/index.php#" class="text-danger">
                    <span class="glyphicon glyphicon-user" aria-hidden="true">&nbsp;Admin</span>
                    </a>
                </li>
            </ul>
        </div><!-- Fecha area de navegação -->
        <div class="col-sm 6 col-md-4">
            <div class="panel-footer" style="background: none;">
                <form action="rodape_contato_envia.php" method="post" name="form-contato">
                <p>
                        <span class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </span>
                            <input type="text" 
                                    name="nome_contato" 
                                    id="nome_contato" 
                                    placeholder="Digite seu nome"
                                    aria-describedby="basic-addon1"
                                    required
                                    class="form-control">
                        </span>
                    </p>
                    <p>
                        <span class="input-group">
                            <span class="input-group-addon" id="basic-addon2">
                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            </span>
                            <input type="text" 
                                    name="email_contato" 
                                    id="email_contato" 
                                    placeholder="Digite seu email"
                                    aria-describedby="basic-addon2"
                                    required
                                    class="form-control">
                        </span>
                    </p>
                    <p>
                        <span class="input-group">
                            <span class="input-group-addon" id="basic-addon3">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </span>
                            <textarea type="text" 
                                    name="email_contato" 
                                    id="email_contato" 
                                    placeholder="Digite seu comentario  / Dúvidas"
                                    aria-describedby="basic-addon3" 
                                    required
                                    class="form-control"
                                    cols="30"
                                    rows="5"></textarea>
                        </span>
                    </p>
                    <p>
                        <button class="btn btn-danger btn-block" aria-label="Enviar" role="button" >
                            Enviar
                            <span class="glyphicon glyphicon-send"></span>
                        </button>
                    </p>
                </form>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="panel-footer">
                    <h6 class="text-danger">
                        Desenvolvido pot José&trade; 2022.
                        <br>
                        <a href="https://ze-edu.github.io/Portiti-mud/">www.PortifólioZé.com</a>
                    </h6>
            </div>
        </div>
    </div>
</body>
</html>