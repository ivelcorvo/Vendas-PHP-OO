<?php
    //parte - 7 
    require_once("cliente.php");
    require_once("vendedor.php");
    require_once("vendaproduto.php");

    class Venda {
        private $idVenda;
        private $total;
        private $cliente;
        private $vendedor;
        private $produtos;

        public function __construct($idVenda=null, $total=0, $cliente=null, $vendedor=null, $produtos=[]){
            $this->idVenda   = $idVenda;
            $this->total     = $total;
            $this->cliente   = $cliente;
            $this->vendedor  = $vendedor;
            $this->produtos  = $produtos;
        }

        public function setIdVenda($idVenda){
            $this->idVenda = $idVenda;
        }
        public function getIdVenda(){
            return $this->idVenda;
        }

        public function setCliente($cliente){
            if($cliente instanceof Cliente){
                $this->cliente = $cliente;
            }
        }
        public function getCliente(){
            return $this->cliente;
        }

        public function setVendedor($vendedor){
           if($vendedor instanceof Vendedor){
               $this->vendadeor = $vendedor;               
           }
        }
        public function getVendedor(){
            return $this->vendedor;
        }

        public function setProdutos($vendaProduto){   
            if($vendaProduto instanceof VendaProduto){  //recebe uma instancia de VendaProduto
                $this->produtos[] = $vendaProduto;
            }            
        }
        public function getProdutos(){  //esse getProduto() trará uma instancia de VendaProduto
            return $this->produtos;
        }

        public function _sleep(){
            return array_keys(get_object_vars($this));
        }

        public function calcularTotal(){   //total da venda         
            $total = 0;
            foreach($this->produtos as $p){
                $total += ($p->getProduto()->getPreco() * $p->getQuantidade())*(1 - $p->getDesconto());
            }
            $this->total = $total;
        }
        public function getTotal(){
            return $this->total;
        }
    }   
?>