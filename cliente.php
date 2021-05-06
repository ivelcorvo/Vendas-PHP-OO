<?php
    // parte - 2
    require_once("pessoa.php");
    
    class Cliente extends Pessoa {          
        private $pontosFidelidade;

        public function __construct($id=null, $nome="", $endereco="", $telefone="", $pontos=0){
            parent:: __construct($id,$nome,$endereco,$telefone);
            $this->pontosFidelidade = $pontos;
        }

        public function setPontosFidelidade($pontos){
            $this->pontosFidelidade = $pontos;
        }
        public function getPontosFidelidade(){
            return $this->pontosFidelidade;
        }        
    }
?>