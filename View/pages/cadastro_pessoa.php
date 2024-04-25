<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkPro | Cadastro Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="shortcut icon" href="<?php echo $base ?>view/img/favicon.png" type="image/x-icon">
    <style>
        .p-6 {
            padding: 0px 150px;
        }
    </style>

</head>

<body>

    <body style="overflow: hidden;">


        <?php
        if ((isset($_SESSION['logado']) && ($_SESSION['logado'] == 1))) {
            header('Location:/WorkPro');
        }
        ?>

        <div class="d-flex bd-highlight">
            <!-- Conteúdo aqui -->


            <div>
                <img src="<?php echo $base ?>View\img\banner-login.png" alt="" style="height: 100vh; width: 50vw;">
            </div>

            <div class="container p-6 d-flex justify-content-center flex-column">
                <!-- Conteúdo aqui -->
                <h1 class="text-dark">Crie sua conta</h1>
                <p class="text-muted mt-2">É grátis e fácil</p>

                <form action="/WorkPro/Cadastro/cadastrar_pessoa" method="post" class="mt-5" autocomplete="off">

                    <div class="form-group">
                        <label for="exampleInputNome1">Nome completo</label>
                        <input type="text" class="form-control" id="exampleInputNome1" placeholder="Digite seu nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-mail</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite seu E-mail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senha" name="senha" required>
                    </div>
                    <button type="submit" class="btn btn-dark mt-5">Cadastre-se</button>

                    <small class="form-text text-muted">Já tem uma conta? <a href="/WorkPro/Home/logar">Logar-se</a></small>

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