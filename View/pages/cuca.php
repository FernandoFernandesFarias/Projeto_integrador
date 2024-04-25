<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Obra</title>

  <link rel="stylesheet" href="<?php echo $base; ?>view/bootstrap/css/bootstrap.min.css">


  <style>
    body {
      background-image: url("<?php echo $base; ?>view/img/background_login.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      margin: 0;
      padding: 0;
    }

    .dark-theme {
      background-color: #242424;
      /* Cor de fundo escura */
      color: #fff;
      /* Cor do texto branca */

    }

    .dark-theme:focus {
      background-color: #333;
      /* Cor de fundo escura quando em foco */
      color: #fff;
      /* Cor do texto branca quando em foco */
    }
  </style>

</head>

<body>

  <?php
  if (!isset($_SESSION['logado']) || $_SESSION['logado'] != 1) {
    header('Location:/Inkscribe_com/Home/logar');
    exit;
  }



  if ($_SESSION['tipo_usuario'] == 'L') {
    header('Location:/Inkscribe_com/Paginas');
  }



  include('conexao.php');
  $id_usuario = $_SESSION['id_usuario'];
  $result_usuario = "SELECT autores.*, usuarios.nome 
                   FROM autores 
                   INNER JOIN usuarios ON autores.cod_usuario = usuarios.id_usuario
                   WHERE autores.cod_usuario ='{$id_usuario}'";

  $resultado_usuario = mysqli_query($conexao, $result_usuario);
  $row_usuario = mysqli_fetch_assoc($resultado_usuario)
  ?>



  <form action="/Inkscribe_com/Cadastro/editar_perfil" method="POST" class="row g-3 position-absolute top-50 start-50 translate-middle text-white " style="width:800px; background-color:#242424; padding:20px; border-radius:7">
    <h3>Editar Perfil</h3>
    <div class="col-md-6">
      <label class="form-label">Nome</label>
      <input type="text" class="form-control dark-theme" style="max-width:350px" name="nome" value="<?php echo $row_usuario['nome_autor'] ?>" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Usuario</label>
      <input type="text" class="form-control dark-theme" style="max-width:350px" name="usuario" value="<?php echo $row_usuario['nome'] ?>" required>
    </div>

    <div class="col-md-12">
      <label class="form-label">Sobrenome</label>
      <input type="text" class="form-control dark-theme" style="max-width:350px" name="sobrenome" value="<?php echo $row_usuario['sobrenome_autor'] ?>" required>
      <h6 class="text-white col-6"></h6>
    </div>

    <div class="col-md-6">
      <label class="form-label">Data de Nascimento</label>
      <input type="date" class="form-control dark-theme" style="max-width:350px" name="nasc" value="<?php echo $row_usuario['data_nasc'] ?>" required>
      <h6 class="text-white col-6"></h6>
    </div>

    <div class="col-md-6">
      <label class="form-label">CPF</label>
      <input type="text" class="form-control dark-theme" maxlength="11" style="max-width:350px" name="cpf" value="<?php echo $row_usuario['cpf'] ?>" required>
      <h6 class="text-white col-6"></h6>
    </div>



    <div class="col-md-6">
      <label for="inputState" class="form-label ">Pais</label>
      <select name="pais" id="inputState" class="form-select dark-theme" required>

        <!-- seleção baseado no pais registrado no perfil do usuario -->
        <?php
        $pais_select = "select paises.pais from paises as paises join autores as autores where autores.pais = paises.pais and autores.cod_usuario = '{$id_usuario}' ";
        $resultado_pais_select = mysqli_query($conexao, $pais_select);
        $row_pais_select = mysqli_fetch_assoc($resultado_pais_select);

        ?>
        <option value="<?php echo $row_pais_select['pais'] ?>" hidden selected><?php echo $row_pais_select['pais'] ?>
        </option>

        <!-- Seleção padrao de paises -->
        <?php
        include('conexao.php');
        $pais = "select * from paises";
        $resultado_pais = mysqli_query($conexao, $pais);

        while (($row_pais = mysqli_fetch_assoc($resultado_pais))) {
        ?>
          <option value="<?php echo $row_pais['pais'] ?>"> <?php echo $row_pais['pais'] ?> </option>

        <?php
        }
        ?>

      </select>
    </div>


    <div class="col-md-6">
      <label class="form-label">Estado</label>
      <input type="text" class="form-control dark-theme" name="estado" value="<?php echo $row_usuario['estado'] ?>" required>
      <h6 class="text-white col-6"></h6>
    </div>





    <div class="col-12">

    </div>

    <?php
    $verifica_perfil = true;
    ?>
    <input type="hidden" name="verifica_perfil" value="<?php echo  $verifica_perfil ?>">


    <div class="col-12">
      <button type="submit" class="btn btn-primary">Alterar Perfil</button>
    </div>
  </form>


</body>

<script src="<?php echo $base; ?>view/bootstrap/js/jquery.js"></script>
<script src="<?php echo $base; ?>view/bootstrap/js/popper.js"></script>
<script src="<?php echo $base; ?>view/bootstrap/js/bootstrap.min.js"></script>

</html>