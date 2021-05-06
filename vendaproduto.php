<?php
    // parte - 6
    require_once("produto.php");
    
    class VendaProduto {
        private $produto; // será uma referencia ao objeto produto
        private $quantidade;
        private $desconto;

        public function __construct($produto=null, $quantidade=0, $desconto=null){
            $this->produto    = $produto;
            $this->quantidade = $quantidade;
            $this->desconto   = $desconto;
        }

        public function setProduto($produto){
            if($produto instanceof Produto){
                $this->produto = $produto;    
            }
        }
        public function getProduto(){
            return $this->produto;
        }

        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }
        public function getQuantidade(){
            return  $this->quantidade;
        }

        public function setDesconto($desconto){
            $this->desconto = $desconto;
        }
        public function getDesconto(){
            return $this->desconto;
        }

        public function __sleep(){
            return array_keys(get_object_vars($this));
        }
    }
?>