
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastro</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= $base_url?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?= $base_url?>/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= $base_url?>/css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin">
        <h2 class="form-signin-heading text-center">Cadastro</h2>
        <label for="inputName" class="sr-only">Nome</label>
        <input type="text" id="inputName" class="form-control" name="nome" placeholder="Nome" required autofocus>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      </form>

    </div> <!-- /container -->

  </body>
</html>
