<?php
    // parte - 1    
    abstract class Pessoa{
        protected $id;
        protected $nome;
        protected $endereco;
        protected $telefone; 

        public function __construct($id, $nome, $endereco, $telefone){
            $this->id       = $id;
            $this->nome     = $nome;
            $this->endereco = $endereco;
            $this->telefone = $telefone;            
        }

        public function setId($id){
            $this->id = $id;
        }
        public function getId(){
            return $this->id;
        }
        
        public function setNome($nome){
            $this->nome  = $nome;
        }
        public function getNome(){
            return $this->nome;
        }

        public function setEndereco($endereco){
            $this->endereco = $endereco;
        }
        public function getEndereco(){
            return $this->endereco;
        }

        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }
        public function getTelefone(){
            return $this->telefone;
        }

        public function __sleep(){
            return array_keys(get_object_vars($this));
        }
    }
?>