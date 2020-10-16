<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <title>Wolves - Consultar</title>
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
                <a href="excluir.php">
                <div id="Option">
                <img id="Icone" src="assets/img/menu_icons/excluir2.png"/><br>
                Excluir
                </div>
                </a>
            </li>
            <li>
                <a href="consultar.php">
                <div id="Option">
                <img id="Icone" src="assets/img/menu_icons/pesquisar2.png"/><br>
                Pesquisar
                </div>
                </a>
            </li>
            <li>
                <a href="alterar1.php">
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

            <h1>Consulta de Produtos Cadastrados</h1>
            <br>
            <form name="cliente" method="POST" action="">
                <fieldset>

                    <legend><b>Informe o Nome do produto:</b></legend>
                    <br>
                        <p>
                            Nome:
                            <input type="text" name="txbNome" size="40" maxlength="40" placeholder="Digite o nome do produto" id="textBox">
                        </p>

                </fieldset>
                <br>
                <fieldset>

                    <legend><b>Opções</b></legend>
                    <br>
                    <input type="submit" name="btnConsul" value="Consultar" id="button"> &nbsp;&nbsp;
                    <input type="reset" name="btnReset" value="Limpar" onClick="document.cliente.txbNome.focus()" id="button">
                
                </fieldset>
            </form>

            <br>

            <legend><b>Resultado</b></legend>

            <?php

                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnConsul)){

                    include_once './conectionDB/produto.php';
                    $pro = new Produto();
                    $pro->setNome($txbNome.'%');//o '%' serve para que seja feita uma busca aproximada do nome, mostrando todos os registros em que o campo "nome" começa com o que foi digitado

                    $pro_bd = $pro->consultar();

                    $existe = false;
                    foreach ($pro_bd as $pro_mostrar){
                        $existe = true;
                        ?>
                        <br>
                        <b> <?php echo "ID: ".$pro_mostrar[0]; ?></b>&nbsp;&nbsp;&nbsp;
                        <b> <?php echo "Nome: ".$pro_mostrar[1]; ?></b>&nbsp;&nbsp;&nbsp;
                        <b> <?php echo "Estoque: ".$pro_mostrar[2]; ?></b>
                        
                        <?php
                    }

                    if(!$existe){
                        ?>
                        <b> <?php echo "ID: ".$pro_mostrar[0]; ?></b>

                        <?php
                    }

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