<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <title>Wolves - Alterar - Campos Disponíveis</title>
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
            <h1>Aleração de Produto</h1>
            <br>
            
            <?php
                $id = $_POST["txbId"];
                        
                include_once './conectionDB/produto.php';

                $pro1 = new Produto();
                $pro1->setId($id);
                $pro_bd = $pro1->alterar();

            ?>

            <form name="cliente" method="POST" action="">
                <?php
                    foreach($pro_bd as $pro_mostrar){
                ?>
                <fieldset>
                    <legend><b>Dados do Produto:</b></legend>
                    <br>
                    <input type="hidden" name="txbId" size="5" value='<?php echo $pro_mostrar[0] ?>'>
                        
                        <p>
                            Id:
                            <?php echo $pro_mostrar[0] ?>
                        </p>
                        <br>
                        <p>
                            Nome:
                            <input type="text" name="txbNome" size="30" maxlength="30" value='<?php echo $pro_mostrar[1] ?>' id="textBox">
                        </p>
                        <br>
                        <p>
                            Estoque:
                            <input type="text" name="txbEstoq" size="10" value='<?php echo $pro_mostrar[2] ?>' id="textBox">
                        </p>
                        <br>
                        <input type="submit" name="btnAlterar" value="Alterar" id="button"> 
                </fieldset>
                    <?php 
                    } ?>
            </form>

            <?php

                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnAlterar)){

                    include_once './conectionDB/produto.php';
                    $pro2 = new Produto();
                    $pro2->setNome($txbNome);
                    $pro2->setEstoque($txbEstoq);
                    $pro2->setId($txbId);

                    echo "<h4><br><br>".$pro2->alterar2()."</h4>";

                    header("location:alterar1.php");

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