<?php

class Produto extends Controller {

    public function index($id='') {
        $produto = $this->model('ProdutoModel');
        $data['produto'] = $produto->getProdutoById($id);
        $data['qtd_carrinho'] = 0;
        session_start();
        if(isset($_SESSION['carrinho'])) {
            $counts = array_count_values($_SESSION['carrinho']);
            $data['teste'] = $counts;
            foreach ($counts as $key => $value) {
                $data['qtd_carrinho'] += $value;
            }
        }
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
        header('Location: /lojavirtual/carrinho');
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
        ini_set('max_execution_time', 300);
        $data['titulo'] = 'Compra realizada com sucesso!';
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
            $message = '<table class="table">
                                    <thead>
                                        <tr>
                                            <th style="float: left">Produto</th>
                                            <th>Quantidade</th>
                                            <th>Preço</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
            $soma = 0.00;
       
            foreach ($produtos as $produto) {
            $message .= '<tr>
                        <td>
                            '.$produto[0]["nome"].'
                        </td>
                        <td>
                            <center>'.$produto["qtd"].'<center>
                        </td>
                        <td>R$ ' . number_format($produto[0]["preco"], 2, ",", "").'</td>
                        <td>R$ ' . number_format($produto[0]["preco"] * $produto["qtd"], 2, ",", "") . '</td>
                    </tr>';
                    
                    $soma += ($produto[0]["preco"] * $produto["qtd"]);
                    $soma = number_format($soma, 2, ".", "");
            }
            $message .= '<tr><td colspan="3" class="text-right"><strong>Total</strong></td><td>R$ '.$soma.'</td></tr></tbody></table>';
            $data['msg_html'] = $message;
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $fromName = "Loja";
            $fromEmail = "lojavirtual@loja.com";
            $headers .= 'From:  ' . $fromName . ' <' . $fromEmail .'>' . " \r\n" .
            'Reply-To: '.  $fromEmail . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            $success = false;
            if(isset($_SESSION['carrinho'])) {
                $success = mail($to, $subject, $message, $headers);
            }
            if($success) {
                unset($_SESSION['carrinho']);
                $this->view('produto/compra', $data);
            } else {
                header("Location: /lojavirtual/carrinho");
            }
            
        }
    }

}