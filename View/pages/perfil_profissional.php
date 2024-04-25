<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WorkPro | Perfil do profissional</title>
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
            <a class="nav-link" href="/WorkPro/">Home <span class="sr-only">(Página atual)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/WorkPro/Paginas/profissionais">Profissionais</a>
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

  $id = $_POST['id'];

  $query_profissionais = "SELECT
            pessoas.nome,pessoas.email,
            profissionais.*
         FROM
            pessoas
         INNER JOIN
            profissionais ON pessoas.id = profissionais.pessoa_id 
        WHERE profissionais.id = $id;
         ";

  $resultado_profissionais = mysqli_query($conexao, $query_profissionais);

  if (mysqli_num_rows($resultado_profissionais) > 0) {
    while ($row_profissionais = mysqli_fetch_array($resultado_profissionais)) {
      if ($row_profissionais['categoria'] == 1) {
        $categoria = 'Eletricista';
      } else if ($row_profissionais['categoria'] == 2) {
        $categoria = 'Encanador';
      } else if ($row_profissionais['categoria'] == 3) {
        $categoria = 'Pedreiro';
      } else
        $categoria = 'Mecânico';
  ?>
  <section class="vh-100 bg-light">
    <div class=" py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-12 col-xl-4">

          <div class="card" style="border-radius: 15px;">
            <div class="card-body text-center">
              <h6><?= categoria($row_profissionais['categoria']) ?></h6>
              <div class="mt- mb-4">
                <img alt="Foto do profissional" src="<?php echo $base . $row_profissionais['path']; ?>"
                  class="rounded-circle img-fluid" style="width: 150px; border-radius: 50%;" />
              </div>
              <h4 class="mb-2"><?= $row_profissionais['nome']; ?></h4>
              <div style="line-height: 20px;">
                <p><?= $row_profissionais['descricao'] ?></p>
              </div>
              <div class="d-flex justify-content-around text-center mt-5 mb-2">
                <div class="">
                  <p class="mb-2 h5">Nascimento</p>
                  <p class="text-muted mb-0"><?= date('d/m/Y', strtotime($row_profissionais['data_nasc'])); ?></p>
                </div>
                <div>
                  <p class="mb-2 h5">Cidade</p>
                  <p class="text-muted mb-0">
                    <?php
                        if ($row_profissionais['cidade'] == 1) {
                          echo "Criciúma";
                        } else if ($row_profissionais['cidade'] == 2) {
                          echo "Forquilhinha";
                        } else if ($row_profissionais['cidade'] == 3) {
                          echo "<td>Içara</td>";
                        } else {
                          echo "Cidade não cadastrada";
                        }
                        ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <p class="text-muted  text-center pb-3">
      <a href="https://wa.me/<?= $row_profissionais['contato'] ?>/? text=Olá <?= $row_profissionais['nome'] ?>"
        target="_blank">Entrar em contato pelo WhatsApp</a>
      <span class="mx-2">|</span>
      <a href="mailto:<?= $row_profissionais['email']; ?>" target="_blank">Entrar em contato por E-mail</a>
    </p>
  </section>
  <?php
    }
  }
  ?>
</body>

</html>