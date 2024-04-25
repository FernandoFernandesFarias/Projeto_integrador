<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkPro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="shortcut icon" href="<?php echo $base ?>view/img/favicon.png" type="image/x-icon">
    <style>
        .circulo {
            height: 75px;
            width: 75px;
            border-radius: 50%;
            border: 2px solid black;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .item {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 15px;
        }

        .servicos {
            display: flex;
            gap: 50px;
        }
    </style>
</head>

<body style="overflow-x: hidden;">

    <header class="d-flex p-2 bd-highlight align-items-center m-3 justify-content-between">

        <img style="height: 100px;" src="<?php echo $base; ?>View\img\logo.png" alt="Logo">

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item active">
                        <a class="nav-link text-primary" href="">Home <span class="sr-only">(Página atual)</span></a>
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
                <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
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
        <div class="d-flex p-2 bd-highlight justify-content-around bg-light p-5 align-items-center" style="width: 100vw;">
            <div class="texto">
                <h1 style="font-size: 60px; width: 6em; line-height: 1;"><strong>Conecte-se ao <br> Futuro</strong></h1>
                <p class="lead" style="width: 18em;">Conectando talentos ao mundo! Encontre os melhores profissionais para a sua
                    necessidade aqui.</p>
            </div>
            <img src="<?php echo $base; ?>view/img/banner01.png" alt="">
        </div>

        <div class=" d-flex p-2 bd-highlight justify-content-around mt-5 align-items-center">

            <img src="<?php echo $base; ?>view/img/banner02.png" alt="">

            <div class="texto">
                <h1 style="font-size: 60px; width: 8em;  line-height: 1;">Crie sua própria carreira</h1>
                <p class="lead" style="width: 18em;">Inicie sua jornada profissional independente e conquiste o sucesso por
                    conta própria. Sua dedicação e paixão são o combustível para construir a carreira dos seus sonhos.</p>
            </div>
        </div>


        <div class="d-flex p-2 bd-highlight justify-content-center mt-5 align-items-center flex-column">
            <div class="text-center">
                <h4>Categorias</h4>
                <h2><strong>Escolha conforme sua procura</strong></h2>
            </div>

            <div class="justify-content-center align-items-center d-flex mt-4">

                <div class="servicos">
                    <div class="item">
                        <div class="circulo">
                            <img src="<?php echo $base ?>view/img/tomada.png" alt="Elétrica">
                        </div>
                        <h6>Elétrica</h6>
                    </div>
                    <div class="item">
                        <div class="circulo">
                            <img src="<?php echo $base ?>view/img/carro.png" alt="Mecânica">
                        </div>
                        <h6>Mecânica</h6>
                    </div>
                    <div class="item">
                        <div class="circulo">
                            <img src="<?php echo $base ?>view/img/encanamento.png" alt="Hidráulica">
                        </div>
                        <h6>Hidráulica</h6>
                    </div>
                    <div class="item">
                        <div class="circulo">
                            <img src="<?php echo $base ?>view/img/tijolos.png" alt="Edificações">
                        </div>
                        <h6>Edificações</h6>
                    </div>
                </div>

    </main>

    <footer>
        <img src="<?php echo $base ?>view/img/footer.png" class="mt-5" style="width: 100%;">

        <section class="d-flex ml-5 p-5 flex-column">
            <h5 class="font-weight-bold">WorkPro</h5>

            <div class="d-flex " style="gap: 100px;">
                <div class="d-flex flex-column">
                    <span class="text-primary font-weight-bold">Entre em contato</span>
                    <p class="text-muted">WorkPro@gmail.com <br>
                        +55-2345-6789 <br>
                    </p>
                </div>
                <div class="d-flex flex-column">
                    <span class="text-primary font-weight-bold">Profissionais</span>
                    <p class="text-muted">
                        Encanador <br>
                        Pedreiros<br>
                        Eletricistas<br>
                        Mecânicos
                    </p>
                </div>
            </div>

        </section>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#excluirCadastroProfissionalBtn").on("click", function() {
                $('#ExemploModalCentralizado').modal('show');
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>