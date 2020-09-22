<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <title>Wolves - Cadastrar</title>
        <link rel="icon" href="assets/img/logo/logo-Preto-Sem_Letras.png"/>
        <link rel="stylesheet" type="text/css" href="styles/reset.css" />
        <link rel="stylesheet" type="text/css" href="styles/pageDefault.css" />
    </head>
    <body>
        <nav id="Menu">
            
            <li>
                <a href="menu.html">
                <div id="Option">
                    <img id="Logo" src="assets/img/logo/logo-Preto-Sem_Letras.png"/>
                </div>
                </a>
            </li>
            <li>
                <a href="cadastrar.php">
                <div id="Option">
                <img id="Icone" src="assets/img/menu_icons/cadastrar4.png"/><br>
                Cadastrar
                </div>
                </a>
            </li>
            <li>
                <a href="">
                <div id="Option">
                <img id="Icone" src="assets/img/menu_icons/excluir2.png"/><br>
                Excluir
                </div>
                </a>
            </li>
            <li>
                <a href="">
                <div id="Option">
                <img id="Icone" src="assets/img/menu_icons/pesquisar2.png"/><br>
                Pesquisar
                </div>
                </a>
            </li>
            <li>
                <a href="">
                <div id="Option">
                <img id="Icone" src="assets/img/menu_icons/alterar2.png"/><br>
                Alterar
                </div>
                </a>
            </li>
            <li>
                <a href="listar.php">
                <div id="Option">
                <img id="Icone" src="assets/img/menu_icons/listar2.png"/><br>
                Listar
                </div>
                </a>
            </li>
        
        </nav>

        <div id="Conteudo">
            <center>

            <h1>Cadastro de Produto</h1>
            <br>
            <form name="cliente" method="POST" action="">
                <fieldset>

                    <legend><b>Dados do Produto:</b></legend>
                    <br>
                        <p>
                            Nome:
                            <input type="text" name="txbNome" size="30" maxlength="30" placeholder="Nome do Produto" id="textBox">
                        </p>
                        <br>
                        <p>
                            Estoque:
                            <input type="text" name="txbEstoq" size="10" placeholder="0" id="textBox">
                        </p>

                </fieldset>
                <br>
                <fieldset>

                    <legend><b>Opções</b></legend>
                    <br>
                    <input type="submit" name="btnCadas" value="Cadastrar" id="button"> &nbsp;&nbsp;
                    <input type="reset" name="btnReset" value="Limpar" onClick="document.cliente.txbNome.focus()" id="button">
                
                </fieldset>
            </form>

            <?php

                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnCadas)){

                    include_once './conectionDB/produto.php';
                    $pro = new Produto();
                    $pro->setNome($txbNome);
                    $pro->setEstoque($txbEstoq);

                    echo "<h4><br><br>".$pro->salvar()."</h4>";

                }

            ?>
            <br>
            <br>
            <center>
                <button id="button"><a href="menu.html">Voltar</a></button>
            </center>
            </center>
        </div>
    </body>
</html>