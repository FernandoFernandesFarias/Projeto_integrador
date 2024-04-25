<?php
include('conexao.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $novo_nome = $_POST['novo_nome'];
    $novo_email = $_POST['novo_email'];
    // $nova_senha = md5($_POST['nova_senha']);
    $novo_contato = $_POST['novo_contato'];
    $nova_data_nasc = $_POST['nova_data_nasc'];
    $nova_descricao = $_POST['nova_descricao'];
    $nova_cidade = $_POST['nova_cidade'];
    // $nova_categoria = $_POST['nova_categoria'];

    function removeSequencia($novo_contato)
    {
        // Remova a sequência '+5548'
        $numeroSemSequencia = str_replace('+5548', '', $novo_contato);

        return $numeroSemSequencia;
    }

    $numeroSemSequencia = removeSequencia($novo_contato);


    function formataNum($numeroSemSequencia)
    {
        // Verifique se $contato é um número válido
        if (!is_numeric($numeroSemSequencia)) {
            // Trate o erro conforme necessário
            return 'Número inválido';
        }

        // Adicione a string ao número de telefone
        $num = '+5548' . $numeroSemSequencia;
        return $num;
    }

    $contato = formataNum($numeroSemSequencia);


    $sql = "UPDATE pessoas SET nome = '$novo_nome', email = '$novo_email' WHERE id = " . $_SESSION['id'];

    $sql_profissional = "UPDATE profissionais SET contato = '$contato', data_nasc = '$nova_data_nasc', descricao = '$nova_descricao' WHERE pessoa_id =" . $_SESSION['id'];

    $_SESSION['nome'] = $novo_nome;
    $_SESSION['email'] = $novo_email;


    echo "SQL Pessoas: " . $sql . "<br>";
    echo "SQL Profissional: " . $sql_profissional . "<br>";

    if ($conexao->query($sql) === TRUE && $conexao->query($sql_profissional) === TRUE) {
        // // Atualização bem-sucedida
        // $_SESSION['nome'] = $novo_nome;
        // $_SESSION['email'] = $novo_email;   
        // $_SESSION['senha'] = $nova_senha;

        // Redirecionar de volta para a página de perfil após a edição
        header("Location: /WorkPro/Paginas/editar_perfil_profissional");
        exit();
    } else {
        // Erro na atualização
        echo "Erro ao atualizar dados: " . $conexao->error;
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

<body>

    <div class="d-flex bd-highlight">
        <!-- Conteúdo aqui -->

        <div>
            <img src="<?php echo $base ?>View\img\banner-login.png" alt="" style="height: 100%; width: 50vw;">
        </div>

        <div class="container p-6 d-flex justify-content-center flex-column">
            <!-- Conteúdo aqui -->
            <h1 class="text-dark">Altere seus dados</h1>

            <form action="" method="post" class="mt-5" autocomplete="" enctype="multipart/form-data">

                <?php

                // Verifique se a sessão contém um ID válido
                if (isset($_SESSION['id'])) {
                    $query_profissionais = "SELECT * FROM profissionais WHERE pessoa_id = " . $_SESSION['id'];

                    // Imprima a consulta SQL para fins de depuração
                    //  echo "Consulta SQL: " . $query_profissionais . "<br>";

                    $resultado_profissionais = mysqli_query($conexao, $query_profissionais);

                    // Verifique se a consulta foi bem-sucedida
                    if ($resultado_profissionais) {
                        $row_profissionais = mysqli_fetch_assoc($resultado_profissionais);

                        // Imprima os resultados para fins de depuração
                        //  var_dump($row_profissionais);
                    } else {
                        // Imprima possíveis erros do MySQL para fins de depuração
                        echo "Erro MySQL: " . mysqli_error($conexao);
                    }
                } else {
                    echo "ID da sessão não está definido.";
                }


                $query_pessoa = "SELECT * FROM pessoas WHERE id = " . $_SESSION['id'];
                $resultado_pessoa = mysqli_query($conexao, $query_pessoa);
                $row_pessoa = mysqli_fetch_assoc($resultado_pessoa);

                function cidade($cidade)
                {
                    $str = '';
                    switch ($cidade) {
                        case 1:
                            $str = 'Criciúma';
                            break;
                        case 2:
                            $str = 'Forquilhinha';
                            break;
                        case 3:
                            $str = 'Içara';
                            break;
                    }
                    return $str;
                }
                ?>

                <div class="form-group">
                    <label for="exampleInputNome1">Nome completo</label>
                    <input type="text" class="form-control" id="exampleInputNome1" placeholder="Digite seu novo nome" name="novo_nome" value="<?= $row_pessoa['nome']; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite seu novo E-mail" name="novo_email" value="<?php echo $row_pessoa['email']; ?>">
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea name="nova_descricao" id="descricao" cols="0" rows="1" class="form-control" placeholder="Uma breve descrição sobre sua carreira (opcional)" maxlength="200" value=""><?= $row_profissionais['descricao'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputContato1">Contato</label>
                    <input type="tel" class="form-control" id="exampleInputContato1" placeholder="Seu novo número (Ex: 922334455)" name="novo_contato" value="<?= $row_profissionais['contato'] ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputData1">Data de Nascimento</label>
                    <input type="date" class="form-control" id="exampleInputData1" name="nova_data_nasc" value="<?= $row_profissionais['data_nasc'] ?>">
                </div>

                <button type="submit" class="btn btn-dark mt-5">Salvar alterações</button>

            </form>
            <small class="form-text text-muted">Para voltar a página principal <a href="/WorkPro/">Clique aqui</a></small>

        </div>
    </div>
</body>

</html>