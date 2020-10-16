<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <title>Wolves - Listar</title>
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

            <h1>Relação de Produtos Cadastrados</h1>

            <?php

                include_once './conectionDB/produto.php';
                $p = new Produto();
                $pro_bd = $p->listar();

            ?>

            <b>Id &nbsp;&nbsp;&nbsp;&nbsp; Nome &nbsp;&nbsp;&nbsp;&nbsp; Estoque</b>

            <?php
                foreach($pro_bd as $pro_mostrar){
            ?>
                    <br><br>
                    <b> <?php echo $pro_mostrar[0]; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $pro_mostrar[1]; ?>    &nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $pro_mostrar[2]; 
                }?> 
            <br><br>
            <center>
                <button id="button"><a href="menu.html">Voltar</a></button>
            </center>
            </center>
        </div>
    </body>
</html>