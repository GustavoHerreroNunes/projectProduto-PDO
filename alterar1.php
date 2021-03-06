<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <title>Wolves - Alterar</title>
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

            <h1>Alteração de Produto</h1>
            <br>
            <form name="cliente" method="POST" action="alterar2.php">
                <fieldset>

                    <legend><b>Informe o ID do produto:</b></legend>
                    <br>
                        <p>
                            ID:
                            <input type="number" name="txbId" size="30" min="1" maxlength="5" placeholder="Digite apenas números" id="textBox">
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
            <br>
            <center>
                <button id="button"><a href="menu.html">Voltar</a></button>
            </center>
            </center>
        </div>
    </body>
</html>