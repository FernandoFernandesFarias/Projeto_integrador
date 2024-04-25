<?php
include('conexao.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $novo_nome = $_POST['novo_nome'];
    $novo_email = $_POST['novo_email'];
    $nova_senha = md5($_POST['nova_senha']);



    $sql = "UPDATE pessoas SET nome = '$novo_nome', email = '$novo_email', senha = '$nova_senha' WHERE id = " . $_SESSION['id'];

    if ($conexao->query($sql) === TRUE) {
        // Atualização bem-sucedida
        $_SESSION['nome'] = $novo_nome;
        $_SESSION['email'] = $novo_email;
        $_SESSION['senha'] = $nova_senha;

        // Redirecionar de volta para a página de perfil após a edição
        header("Location: /WorkPro/Paginas/editar_perfil_cliente");
        exit();
    } else {
        // Erro na atualização
        echo "Erro ao atualizar dados: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkPro | Editar perfil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="shortcut icon" href="<?php echo $base ?>view/img/favicon.png" type="image/x-icon">
</head>

<body style="overflow: hidden;">

    <div class="d-flex bd-highlight">
        <!-- Conteúdo aqui -->


        <div>
            <img src="<?php echo $base ?>View\img\banner-login.png" alt="" style="height: 100vh; width: 50vw;">
        </div>

        <div class="container p-6 d-flex justify-content-center flex-column">
            <!-- Conteúdo aqui -->
            <h1 class="text-dark">Altere seus dados</h1>

            <form action="" method="post" class="mt-5" autocomplete="off">

                <?php
                $query_clientes = "SELECT * FROM pessoas WHERE id = " . $_SESSION['id'];

                $resultado_clientes = mysqli_query($conexao, $query_clientes);

                if (mysqli_num_rows($resultado_clientes) > 0) {
                    while ($row_clientes = mysqli_fetch_array($resultado_clientes)) {
                ?>

                        <div class="form-group">
                            <label for="exampleInputNome1">Nome completo</label>
                            <input class="form-control" type="text" id="novo_nome" name="novo_nome" value="<?= $row_clientes['nome'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite seu novo E-mail" name="novo_email" value="<?= $row_clientes['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite sua nova senha" name="nova_senha">
                        </div>

                <?php
                    }
                }
                ?>
                <button type="submit" class="btn btn-dark mt-5">Salvar alterações</button>

            </form>
            <small class="form-text text-muted">Para voltar a página principal <a href="/WorkPro/">Clique aqui</a></small>

        </div>
    </div>


</body>

</html>