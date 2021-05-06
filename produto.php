<?php
    //parte - 5
    require_once("departamento.php");

    class Produto {
        private $idProduto;
        private $nome;
        private $preco;
        private $departamento; //fará referencia ao idDepartamento de departamento.php

        public function __construct($idProduto=null, $nome="", $preco=0, $departamento){
            $this->idProduto    = $idProduto;
            $this->nome         = $nome;
            $this->preco        = $preco;
            $this->departamento = $departamento; 
        }

        public function setIdProduto($idProduto){
            $this->idProduto = $idProduto;
        }
        public function getIdProduto(){
            return $this->idProduto;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }
        public function getNome(){
            return $this->nome;
        }

        public function setPreco($preco){
            $this->preco = $preco;
        }
        public function getPreco(){
            return $this->preco;
        }

        public function setDepartamento($departamento){
            if($departamento instanceof Departamento){
                $this->departamento-> $departamento;
            }           
        }
        public function getDepartamento(){
            return $this->departamento;
        }

        public function __sleep(){
            return array_keys(get_object_vars($this));
        }
    }
?>