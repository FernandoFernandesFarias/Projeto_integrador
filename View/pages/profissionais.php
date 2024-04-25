<?php
// Desabilita o cache
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WorkPro | Profissionais</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="shortcut icon" href="<?php echo $base ?>view/img/favicon.png" type="image/x-icon">
</head>

<body style="overflow-x: hidden;">

  <header class="d-flex p-2 bd-highlight align-items-center m-3 justify-content-between">

    <img style="height: 100px;" src="<?php echo $base; ?>View\img\logo.png" alt="Logo">

    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ">
          <li class="nav-item active">
            <a class="nav-link" href="/WorkPro/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-primary" href="">Profissionais<span class="sr-only">(Página atual)</span></a>
          </li>
        </ul>
      </div>
    </nav>

    <?php
    if (isset($_SESSION['nome'])) { ?>
    <!-- Botão para acionar modal -->
    <div>
      <span>Olá, <?= $_SESSION['nome'] ?>!</span>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">
        <img src="<?php echo $base; ?>View/img/person-3x.png" style="filter: invert();" alt="">
      </button>

      <!-- Modal -->
      <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Seus dados</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Tipo da conta</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    echo "<td>" . $_SESSION['nome'] . "</td>";
                    echo "<td>" . $_SESSION['email'] . "</td>";
                    echo "<td>" . $_SESSION['tipo'] . "</td>";
                    echo "<tr>";
                    ?>
                </tbody>
              </table>
            </div>
            <div class="modal-footer d-flex justify-content-between">
              <div>
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  Mais opções
                </button>
                <div class="dropdown-menu">
                  <?php if ($_SESSION['tipo'] == 'Cliente') { ?>
                  <div>
                    <a class="dropdown-item" href="/WorkPro/Paginas/editar_perfil_cliente">Editar</a>
                  </div>
                  <?php } else { ?>
                  <div>
                    <a class="dropdown-item" href="/WorkPro/Paginas/editar_perfil_profissional">Editar</a>
                    <button class="dropdown-item" id="excluirCadastroProfissionalBtn">Tornar conta ao tipo
                      cliente</button>

                  </div>
                  <?php
                    }
                    if ($_SESSION['tipo'] == 'Cliente') { ?>
                  <div>
                    <a class="dropdown-item" href="/WorkPro/Paginas/cadastro_profissional">Tornar-se um profissional</a>
                  </div>
                  <?php } else {
                    } ?>
                </div>
              </div>
              <a href='/WorkPro/Cadastro/logout'>Sair</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog"
      aria-labelledby="TituloModalCentralizado" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TituloModalCentralizado">Tornar conta ao tipo cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Você realmente deseja converter sua conta de volta para o tipo cliente? <br>
            Todos os dados do perfil profissional serão excluídos!
          </div>
          <div class="modal-footer">
            <a href="/WorkPro/Home/excluir_dados_profissional" class="btn btn-danger">Excluir</a>
          </div>
        </div>
      </div>
    </div>
    <?php  } else {  ?>
    <a href="/WorkPro/Home/logar">Logar-se</a>
    <?php
    }
    ?>
  </header>

  <main class="">
    <nav class="d-flex align-items-center bg-light pt-3 pb-3">
      <form action="" method="POST" class="d-flex">
        <label class="ml-5">Pesquisar por categoria</label>
        <div class="dropdown ml-3">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Categorias
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <button class="dropdown-item" type="submit" name="categoria" value="eletricista">Eletricista</button>
            <button class="dropdown-item" type="submit" name="categoria" value="encanador">Encanador</button>
            <button class="dropdown-item" type="submit" name="categoria" value="pedreiro">Pedreiro</button>
            <button class="dropdown-item" type="submit" name="categoria" value="mecânico">Mecânico</button>
            <button class="dropdown-item" type="submit" name="categoria" value="">Todos</button>
            <!-- Adicione outros itens conforme necessário -->
          </div>
        </div>
      </form>
    </nav>
    <!-- //////////////////////////////////////////////////////////////////////////////////// -->
    <?php
    function categoria($categoria)
    {
      $str = '';
      switch ($categoria) {
        case 1:
          $str = 'Eletricista';
          break;
        case 2:
          $str = 'Encanador';
          break;
        case 3:
          $str = 'Pedreiro';
          break;
        case 4:
          $str = 'Mecânico';
          break;
      }
      return $str;
    }
    include('conexao.php');
    // Inicializa a categoria com um valor padrão

    $categoriaSelecionada = '';

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Atualiza a categoria com o valor enviado pelo formulário
      $categoriaSelecionada = isset($_POST['categoria']) ? $_POST['categoria'] : '';
    }

    $query_profissionais = "SELECT pessoas.nome, pessoas.email, profissionais.*
    FROM pessoas
    JOIN profissionais ON pessoas.id = profissionais.pessoa_id";

    // Adicione a cláusula WHERE se uma categoria estiver selecionada
    if ($categoriaSelecionada !== '') {
      $query_profissionais .= " JOIN categoria ON profissionais.categoria = categoria.id_categ
                            WHERE categoria.nome = '$categoriaSelecionada'";
    }

    $resultado_profissionais = mysqli_query($conexao, $query_profissionais);

    if (mysqli_num_rows($resultado_profissionais) > 0) {
      while ($row_profissionais = mysqli_fetch_array($resultado_profissionais)) {

    ?>
    <form action="/WorkPro/Paginas/perfil_profissional" method="POST">
      <input type="hidden" name="id" value="<?= $row_profissionais['id']; ?>">
      <!-- Adicione um campo oculto para armazenar a categoria -->
      <input type="hidden" name="categoria" value="<?= $categoriaSelecionada; ?>">

      <div class="d-flex justify-content-between pr-5 pl-5 pt-3 <?= $categoriaSelecionada; ?>">
        <!-- Adicione a classe da categoria ao contêiner para permitir a filtragem -->
        <div class="">
          <h5 class="mb-1"><?= $row_profissionais['nome']; ?></h5>
          <p class="mb-1">
          <h6 class="mb-1">Profissão: <?= categoria($row_profissionais['categoria']) ?></h6>
          </p>
          <small>Descrição: <?= $row_profissionais['descricao']; ?></small>
        </div>
        <?php if ((isset($_SESSION['logado']) && ($_SESSION['logado'] == 1))) { ?>
        <div class="botoes d-flex align-items-center">
          <input type="hidden" name="id" value="<?= $row_profissionais['id']; ?>">
          <button class="btn btn-primary " type="submit">Visualizar</button>
        </div>
        <?php } ?>
      </div>
      <hr>
    </form>
    <?php
      }
    }
    ?>

  </main>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
  </script>
</body>

</html>