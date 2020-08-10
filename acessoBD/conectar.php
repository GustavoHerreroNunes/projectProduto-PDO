<?php
    class Conectar extends PDO{
        private static $instancia;
        private $query;
        private $host = "127.0.0.1";//ender servidor pessoal
        private $usuario = "root";//usuário servidor pessoal
        private $senha = "";//senha
        private $db = "exemplocurso";//banco do mysql

        public function __construct(){
            parent::__construct("mysql:host=$this->host;dbname=$this->db","$this->usuario","$this->senha");
        }

        public static function getInstance(){
            if(!isset(self::$instancia)){
                try{
                    self::$instancia = new Conectar;
                    echo 'Conectado com sucesso!!!';
                }catch(Exception $e){
                    echo 'Erro ao conectar';
                    exit();
                }
            }
            return self::$instancia;
        }

        public function sql($query){
            $this->getInstance();
            $this->query = $query;
            $stmt = $pdo->prepare($this->query);
            $pdo = null;
        }
    }
?>