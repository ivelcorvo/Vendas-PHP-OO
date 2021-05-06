<?php
    // parte - 8
    require_once("cliente.php");
    require_once("vendedor.php");
    require_once("departamento.php");
    require_once("produto.php");
    require_once("vendaproduto.php");
    require_once("venda.php");

    $depAlimentos   = new Departamento(1,"Alimentos");
    $depRoupas      = new Departamento(2,"Roupas");
    $depEletronicos = new Departamento(3,"Eletronicos");
    $depRevistas    = new Departamento(4,"resvistas");

    
    $prodNote   = new Produto(1,"Notebook Dell", 5000.00, $depEletronicos);
    $prodInfo   = new Produto(2,"Revista InfoExame 2021", 15.00, $depRevistas);
    $prodPastel = new Produto(3,"Pastel", 5.00, $depAlimentos);
    $prodMouse  = new Produto(4,"Mouse usb", 20.00, $depEletronicos);
    $prod = [$prodInfo, $prodNote, $prodPastel, $prodMouse];

    echo"<h1>Todos os Produtos</h1>";
    echo"<table border='1'>";
        echo"<tr>";
            echo"<td>ID-Produto</td><td>Nome</td><td>Preco</td><td>Departamento</td>";            
        echo"</tr>";        
        foreach($prod as $p){
            echo"<tr>";    
            echo"<td>".$p->getIdProduto()."</td>";       
            echo"<td>".$p->getNome()."</td>";       
            echo"<td>".$p->getPreco()."</td>";       
            echo"<td>".$p->getDepartamento()->getNome()."</td>"; // em Produto, estamos atribuindo uma instancia -> "departamento". 
                                                                 // então dentro de atributo "departamento" não existe uma string mas sim uma instancia de um objeto
            echo"</tr>";
        }
    echo"</table>";
    // ================================================================================================================================
    // parte - 9
    // VENDEDOR - CLIENTE
    $vendedorPedro = new Vendedor(1,"Pedro da Silva","Av. Carlos Branco, 600","16 9999-9999",5000.00);
    $vendedorMaria = new Vendedor(2,"Maria Olga","Rua Carvalho, 650","16 8888-8888",5000.00);

    $clienteJonas   = new Cliente(1,"Jonas oliveira","Rua Mato Grosso","16 6666-6666",200);
    $clienteMarcelo = new Cliente(2,"Marcelo Santos","Rua sebastião","16 6446-6446",300);
    $clientePaula   = new Cliente(3,"Paula Silva","Rua Coronel","16 2226-6222",200);
    
    // VENDAS
    $venda1 = new Venda(1,0,$clienteJonas,$vendedorMaria);
    $venda1->setProdutos(new VendaProduto($prodMouse,1,0));
    $venda1->setProdutos(new VendaProduto($prodPastel,2,0.1));
    $venda1->setProdutos(new vendaProduto($prodInfo,1,0.1));
    $venda1->calcularTotal();

    $venda2 = new Venda(2,0,$clienteMarcelo,$vendedorPedro);
    $venda2->setProdutos(new VendaProduto($prodInfo,2,0.1));
    $venda2->setProdutos(new VendaProduto($prodPastel,1,0.1));
    $venda2->setProdutos(new vendaProduto($prodMouse,1,0.1));
    $venda2->calcularTotal();

    $venda3 = new Venda(3,0,$clienteJonas,$vendedorMaria);
    $venda3->setProdutos(new VendaProduto($prodNote,1,0.5));
    $venda3->setProdutos(new VendaProduto($prodPastel,5,0.1));
    $venda3->setProdutos(new vendaProduto($prodInfo,1,0.1));
    $venda3->calcularTotal();

    $vendas = [$venda1,$venda2,$venda3];

    function imprimirVendas($vendas){
        echo"<br><br>";
        echo"<h1>VENDAS</h1>";       
        foreach($vendas as $v){         
            echo"<p>ID-venda: ".$v->getIdVenda()."</p>";
            echo"<p>Cliente: ".$v->getCliente()->getNome()."</p>";
            echo"<p>Vendedor: ".$v->getVendedor()->getNome()."</p>";                         
        
            echo"<table border=1>";
            echo"<tr>";
                echo"<td>ID-Produto</td><td>Produto</td><td>Departamento</td><td>desconto</td><td>Total</td>";
            echo"<tr>";                  
            foreach($v->getProdutos() as $vendaproduto){
                echo"<tr>";
                echo"<td>".$vendaproduto->getProduto()->getIdProduto()."</td>";
                echo"<td>".$vendaproduto->getProduto()->getNome()."</td>";
                echo"<td>".$vendaproduto->getProduto()->getDepartamento()->getNome()."</td>";             
                echo"<td>".$vendaproduto->getDesconto()."</td>";
                $totalprod = ($vendaproduto->getProduto()->getPreco() * $vendaproduto->getQuantidade()) * (1-$vendaproduto->getDesconto());
                echo"<td>R$".$totalprod."</td>";
                echo"<tr>";
            }            
            echo"</table>";
            echo"<h3>Total da venda: ".$v->getTotal()."</h3>";
            echo"<hr><br><br>";
          }        
    }

    imprimirVendas($vendas);

    echo"<br><br><hr>";

    //exercicio: primeiro produto da venda 3 , nome , departamento

    function primeiroProduto($v){
        foreach($v->getProdutos() as $i => $vp){
            if($i == 0){
                echo"<p>Nome Produto: ".$vp->getProduto()->getNome()."</p>";
                echo"<p>Departamento: ".$vp->getProduto()->getDepartamento()->getNome()."</p>";
            }
        }        
    }
    primeiroProduto($venda3);
    // ou
    echo"<p>=================================</p>";
    $vp = $vendas[2]->getProdutos();
    echo"<p>nome produto:".$vp[0]->getProduto()->getNome()."</p>";    
    echo"<p>departamento:".$vp[0]->getProduto()->getDepartamento()->getNome()."</p>";    
    // ou    
    echo"<p>=================================</p>";
    echo"<p>nome produto:".$vendas[2]->getProdutos()[0]->getProduto()->getNome()."</p>";    
    echo"<p>departamento:".$vendas[2]->getProdutos()[0]->getProduto()->getDepartamento()->getNome()."</p>";    
?>