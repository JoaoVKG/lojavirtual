<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$titulo?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=$base_url?>/css/bootstrap.min.css" rel="stylesheet">

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
                <?php if (!isset($_SESSION['usuario'])) : ?>
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
                        <?=$_SESSION['usuario']['nome']?>
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
                                        <p class="text-left"><strong><?=$_SESSION['usuario']['nome']?></strong></p>
                                        <p class="text-left small"><?=$_SESSION['usuario']['email']?></p>
                                        <p class="text-left">
                                            <a href="carrinho" class="btn btn-primary btn-block btn-sm">Carrinho</a>
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
                                            <a href="logout" class="btn btn-danger btn-block">Sair</a>
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
                    <a href="#" class="list-group-item"><span class="glyphicon glyphicon-th-list"></span> Produtos</a>
                    <a href="carrinho" class="list-group-item"><span class="glyphicon glyphicon-shopping-cart"></span> Carrinho (<?=$qtd_carrinho?>)</a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="<?=$base_url?>/images/logo_friends.jpeg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="<?=$base_url?>/images/logo_himym.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="<?=$base_url?>/images/logo_simpsons.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="row">
                <?php foreach ($produtos as $produto) : ?>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img class="product-image" src="<?=$base_url?>/images/<?=$produto['id_produto']?>.jpg" alt="">
                            <div class="caption">
                                <h4><a href="<?=$base_url?>/produto/<?=$produto['id_produto']?>"><?=$produto['nome']?></a>
                                </h4>
                                <br>
                                <h4 class="pull-right">R$ <?=number_format($produto['preco'], 2, ',', '')?></h4>
                                <a href="<?=$base_url?>/produto/adicionarcarrinho/<?=$produto['id_produto']?>" type="button" class="btn btn-primary">
							    Adicionar ao carrinho
						        </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>

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
                    <p>Copyright &copy; Loja 2017</p>
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
