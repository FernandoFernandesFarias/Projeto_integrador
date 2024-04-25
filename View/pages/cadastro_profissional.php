<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkPro | Cadastro Profissional</title>
    <link rel="stylesheet" href="style.css">
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

        <div class="d-flex bd-highlight ">
            <!-- Conteúdo aqui -->


            <div>
                <img src="<?php echo $base ?>View\img\banner-login.png" alt="" style="height: 100vh; width: 50vw;" class="">
            </div>

            <div class="container p-6 d-flex justify-content-center flex-column">
                <!-- Conteúdo aqui -->
                <h1 class="text-dark">Torne-se um profissional</h1>
                <p class="text-muted mt-2">E ajude pessoas</p>

                <form action="/WorkPro/Cadastro/cadastrar_profissional" method="post" class="mt-" enctype="multipart/form-data" autocomplete="off">
                    <label for="" class="form-label">Sua profissão</label>
                    <div class="d-flex form-group" style="gap: 20px;">
                        <div class="d-flex align-items-center" style="gap: 5px;">
                            <label class="form-check-label" for="1">Eletricista</label>
                            <input type="radio" name="categoria" value="1" id="1" class="form-control-sm" checked>
                        </div>
                        <div class="d-flex align-items-center" style="gap: 5px;">
                            <label class="form-check-label" for="2">Encanador</label>
                            <input type="radio" name="categoria" value="2" id="2" class="form-control-sm">
                        </div>
                        <div class="d-flex align-items-center" style="gap: 5px;">
                            <label class="form-check-label" for="3">Pedreiro</label>
                            <input type="radio" name="categoria" value="3" id="3" class="form-control-sm">
                        </div>
                        <div class="d-flex align-items-center" style="gap: 5px;">
                            <label class="form-check-label" for="4">Macânico</label>
                            <input type="radio" name="categoria" value="4" id="4" class="form-control-sm">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea name="descricao" id="descricao" cols="0" rows="1" class="form-control" placeholder="Uma breve descrição sobre sua carreira (opcional)" maxlength="200"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputContato1">Contato</label>
                        <input type="tel" class="form-control" id="exampleInputContato1" placeholder="Seu número (Ex: 999887766)" name="contato" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFoto1">Insira uma foto de perfil</label>
                        <input type="file" class="" id="exampleInputFoto1" name="foto" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputData1">Data de Nascimento</label>
                        <input type="date" class="form-control" id="exampleInputData1" name="data_nasc" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCidade1">Cidade</label>
                        <select name="cidade" id="exampleInputCidade1" class="form-control">
                            <option value="1">Criciúma</option>
                            <option value="2">Forquilhinha</option>
                            <option value="3">Içara</option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-dark mt-5">Tornar-se Profissional</button>

                    <small id="emailHelp" class="form-text text-muted"><a href="/WorkPro/">Voltar</a></small>


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