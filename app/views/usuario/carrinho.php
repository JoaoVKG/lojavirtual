<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?=$titulo?>
    </title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=$base_url?>/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?=$base_url?>/css/carrinho.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=$base_url?>/css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/lojavirtual">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php if (!isset($_SESSION)) : ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="login">Entrar</a>
                    </li>
                    <li>
                        <a href="cadastro">Cadastro</a>
                    </li>
                </ul>
                <?php else : ?>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        Nome
                        <span class="glyphicon glyphicon-menu-down"></span>
                    </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="navbar-login">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <p class="text-center">
                                                <span class="glyphicon glyphicon-user icon-size"></span>
                                            </p>
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="text-left"><strong>Nome</strong></p>
                                            <p class="text-left small">email@email.com</p>
                                            <p class="text-left">
                                                <a href="#" class="btn btn-primary btn-block btn-sm">Carrinho</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="navbar-login navbar-login-session">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p>
                                                <a href="#" class="btn btn-danger btn-block">Sair</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <?php endif; ?>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Loja</p>
                <div class="list-group">
                    <a href="/lojavirtual" class="list-group-item"><span class="glyphicon glyphicon-th-list"></span> Produtos</a>
                    <a href="carrinho" class="list-group-item"><span class="glyphicon glyphicon-shopping-cart"></span> Carrinho</a>
                </div>
            </div>

            <div class="col-md-9">

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
                                        <tr>
                                            <td><img src="https://lorempixel.com/400/200/fashion/2/" class="img-cart"></td>
                                            <td>
                                                <strong>Product 1</strong>
                                            </td>
                                            <td>
                                                <input class="form-control input-qtd" type="text" value="1"><a href="#" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                            <td>$54.00</td>
                                            <td>$54.00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right">Total Product</td>
                                            <td>$86.00</td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="text-right"><strong>Total</strong></td>
                                            <td>$88.00</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Continuar comprando</a>
                    <a href="#" class="btn btn-success pull-right">Comprar<span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>




            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?=$base_url?>/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=$base_url?>/js/bootstrap.min.js"></script>

</body>

</html>