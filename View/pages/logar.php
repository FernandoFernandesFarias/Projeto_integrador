<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="shortcut icon" href="<?php echo $base ?>view/img/favicon.png" type="image/x-icon">

    <style>
        .p-6 {
            padding: 150px;
        }
    </style>

</head>



<body style="overflow: hidden;">


    <!-- <?php
            if ((isset($_SESSION['logado']) && ($_SESSION['logado'] == 1))) {
                header('Location:/WorkPro/Paginas');
            }
            ?> -->

    <div class="d-flex bd-highlight">
        <!-- Conteúdo aqui -->


        <div class="">
            <!-- Conteúdo aqui -->
            <img src="<?php echo $base ?>View\img\banner-login.png" alt="" style="height: 100vh; width: 50vw;">
        </div>

        <div class="container p-6 d-flex justify-content-center flex-column">
            <!-- Conteúdo aqui -->
            <h1 class="text-dark">Bem vindo de volta</h1>
            <p class="text-muted mt-2">Conheça o bom gosto hoje</p>

            <form action="/WorkPro/Login/login" method="post" class="mt-5" autocomplete="off">

                <div class="form-group">
                    <label for="exampleInputNome1">Nome</label>
                    <input type="text" class="form-control" id="exampleInputNome1" aria-describedby="emailHelp" placeholder="Seu nome" name="nome">
                    <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" name="senha">
                </div>


                <button type="submit" class="btn btn-dark mt-5">Entrar</button>

                <small id="emailHelp" class="form-text text-muted">Não tem uma conta? <a href="/WorkPro/Paginas/cadastro_pessoa">Cadastre-se</a></small>


            </form>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>