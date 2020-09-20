<?php

    include_once 'conectar.php';

    class Produto {
        
        /*Atributos*/

        private $id;
        private $nome;
        private $estoque;
        private $conn;//Futura instância de Conectar 

        /*Getters e Setters*/

        public function getId(){
            return $this->id;
        }
        public function setId($idF){
            $this->id = $idF;
        }

        public function getNome(){
            return $this->nome;
        }
        public function setNome($nomeF){
            $this->nome = $nomeF;
        }

        public function getEstoque(){
            return $this->estoque;
        }
        public function setEstoque($estoqueF){
            $this->estoque = $estoqueF;
        }

        /*Métodos para realizar as ações de manutenção do banco de dados*/

        /*Função para salvar um novo registro*/
        function salvar(){
            try{
                
                $this->conn = new Conectar();//Instânciando a classe Conectar
                $sql = $this->conn->prepare("insert into produto values (null,?,?)");//Inserindo por código sql um novo registro, com 2 parâmetros ainda não definidos
                @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);//Defindo primeiro parâmetro ($nome)
                @$sql->bindParam(2, $this->getEstoque(), PDO::PARAM_STR);//Definindo segundo parâmetro ($estoque)

                if($sql->execute() == 1){//Se a execução do comando sql ocorrer sem erros
                    return "Registro salvo com sucesso!";
                }


            }catch(PDOException $exc){//Exceção PHP ou MySQL
                
                echo "Erro ao salvar o registro:<br>".$exc->getMessage();
                
            }
        }

        /*Funções para alterar um registro*/
        /*Função para pesquisar e mostrar os campos de um registro*/
        function alterar(){
            try{

                $this->conn = new Conectar();//Instânciando a classe Conectar
                $sql = $this->conn->prepare("select * from produto where id = ?");//Selecionando todos os campos de produto com o id passado por parâmetro ainda não definido
                @$sql->bindParam(1, $this->getId(), PDO::PARAM_STR);//Definindo o parâmetro
                $sql->execute();
                return $sql->fechAll();//Carrega uma matriz com os campos selecionados da tabela do banco de dados
                $this->conn = null;

            }catch(PDOException $exc){//Exceção PHP ou MySQL
                
                echo "Erro ao alterar ".$exc->getMessage();

            }
        }

        /*Função para salvar as atualizações feitas nos campos*/
        function alterar2(){
            
            try{
            
                $this->conn = new Conectar();//Instânciando a classe Conectar
                $sql = $this->conn->prepare("update produto set nome = ?, estoque = ? where id = ?");//Atualizando os campos do registro passando parâmetros ainda não definidos
                @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);//Definindo primeiro parâmetro
                @$sql->bindParam(2, $this->getEstoque(), PDO::PARAM_STR);//Definindo segundo parâmetro
                @$sql->bindParam(3, $this->getId(), PDO::_PARAM_STR);//Definindo terceiro parâmetro

                if($sql->execute() == 1){//Se a execução do código sql ocorrer sem erros
                    
                    return "Registro alterado com sucesso!";
                    
                }

                $this->conn = null;

            }catch(PDOException $exc){//Exceção PHP ou MySQL

                echo "Erro ao salvar o registro ".$exc->getMessage();
            }
        }

        /*Função para consultar dados na tabela por meio do campo "nome"*/
        function consultar(){

            try{

                $this->conn = new Conectar();//Instânciando a classe Conectar
                $sql = $this->conn->prepare("select * from produto where nome like ?");//Selecionando todos os campos ligados ao nome passado pelo parâmetro ainda não definido
                @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);//Definindo o parâmetro
                $sql->execute();
                return $sql->fetchAll();//Retorna uma matriz com os dados selecionados
                $this->conn = null;

            }catch(PDOException $exc){//Exceção PHP ou MySQL

                echo "Erro ao executar consultar ".$exc->getMessage();
            }

        }

        /*Função para excluir um registro da tabela*/
        function exclusao(){

            try{

                $this->conn = new Conectar();//Instânciando a classe Conectar
                $sql = $this->conn->prepare("delete * from produto where id = ?");//Deletando o registro que tenha o id passado por parâmetro ainda não definido
                @$sql->bindParam(1, $this->getId(), PDO::PARAM_STR);//Definindo o parâmetro

                if($sql->execute() == 1){//Se a execução do código sql ocorrer sem erros

                    return "Excluido com sucesso!";

                }else{

                    return "Erro na exclusão";

                }

            }catch(PDOException $exc){//Exceção PHP ou MySQL

                echo "Erro ao excluir ".$exc->getMessage();

            }

        }

        /*Função para listar todos os registros da tabela*/
        function listar(){

            try{

                $this->conn = new Conectar();//Instânciando a classe Conectar
                $sql = $this->conn->query("select * from produto order by nome");//Selecionando todos os registros de "produto" e ordenando em ordem alfabética
                $sql->execute();
                return $sql->fetchAll();//Retorna uma matriz com os dados selecionados
                $this->conn = null;

            }catch(PDOException $exc){//Exceção PHP ou MySQL

                echo "Erro ao executar listagem ".$exc->getMessage();

            }

        }
    }

?>