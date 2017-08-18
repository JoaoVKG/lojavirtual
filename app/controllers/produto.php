<?php

class Produto extends Controller {

    public function index($id='') {
        $produto = $this->model('ProdutoModel');
        $data['produto'] = $produto->getProdutoById($id);

        $this->view('produto/index', $data);
    }
    
    public function adicionarcarrinho($id) {
        session_start();
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
            array_push($_SESSION['carrinho'], $id);
        } elseif(isset($_SESSION['carrinho'])) {
            array_push($_SESSION['carrinho'], $id);
        }
        header('Location: /lojavirtual');
    }

    public function removercarrinho($id) {
        session_start();
        if(($key = array_search($id, $_SESSION['carrinho'])) !== false) {
            unset($_SESSION['carrinho'][$key]);
        }
        header('Location: /lojavirtual/carrinho');
    }
    
    public function comprar() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: /lojavirtual/login');
        } else {
            $produtoModel = $this->model('ProdutoModel');
            $produtos = [];
            $qtd_carrinho = 0;
            if(isset($_SESSION['carrinho'])) {
                $counts = array_count_values($_SESSION['carrinho']);
                foreach ($counts as $key => $value) {
                    $qtd_carrinho += $value;
                    $produto = $produtoModel->getProdutoById($key);
                    $produto['qtd'] = $value;
                    array_push($produtos, $produto);
                }
            }

            $to      = $_SESSION['usuario']['email'];
            $subject = 'Compra realizada com sucesso!';
            $message = '<div class="col-md-9">
                <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
                <div class="col-md-12">
                    <div class="panel panel-info panel-shadow">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Produto</th>
                                            <th>Nome</th>
                                            <th>Quantidade</th>
                                            <th>Preço</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $soma = 0.00;
                                    ?>
                                    <?php foreach ($produtos as $produto) : ?>
                                        <tr>
                                            <td><img src="<?=$base_url?>/images/<?=$produto[0]["id_produto"]?>.jpg" class="img-cart"></td>
                                            <td>
                                                <strong><?=$produto[0]["nome"]?></strong>
                                            </td>
                                            <td>
                                                <center><?=$produto["qtd"]?><center>
                                            </td>
                                            <td>R$ <?=number_format($produto[0]["preco"], 2, ",", "")?></td>
                                            <td>R$ <?=(number_format($produto[0]["preco"] * $produto["qtd"], 2, ",", ""))?></td>
                                        </tr>
                                        <?php
                                        $soma += ($produto[0]["preco"] * $produto["qtd"]);
                                        $soma = number_format($soma, 2, ".", "")
                                        ?>
                                    <?php endforeach;?>
                                        <tr>
                                            <td colspan="4" class="text-right"><strong>Total</strong></td>
                                            <td>R$ <?=$soma?></td>
                                        </tr>      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>';
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $fromName = "Loja";
            $fromEmail = "lojavirtual@loja.com";
            $headers .= 'From:  ' . $fromName . ' <' . $fromEmail .'>' . " \r\n" .
            'Reply-To: '.  $fromEmail . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            $success = mail($to, $subject, $message, $headers);
            if($success) {
                echo "email aceito";
            } else {
                echo "email não aceito";
                print_r(error_get_last());
            }
            
        }
    }

}