<?php
    // parte - 3
    require_once("pessoa.php");
    
    class Vendedor extends Pessoa {
        private $salario;

        public function __construct($id=null, $nome="", $endereco="", $telefone="", $salario=0){
            parent::__construct($id, $nome, $endereco, $telefone);
            $this->salario = $salario;
        }

        public function setSalario($salario){
            $this->salario = $salario;
        }
        public function getSalario(){
            return $this->salario;
        }
    }
?>