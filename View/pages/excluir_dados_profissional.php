<?php
include('conexao.php');

$sqlSelect = "SELECT * FROM profissionais WHERE pessoa_id = " . $_SESSION['id'];
$result = $conexao->query($sqlSelect);

if ($result->num_rows > 0) {
    $sqlDelete = "DELETE FROM profissionais WHERE pessoa_id = " . $_SESSION['id'];
    $resultDelete = $conexao->query($sqlDelete);

    if ($resultDelete) {
        // A exclusão foi bem-sucedida
        $tipo = 'Cliente';
        $sql = "UPDATE pessoas SET tipo = '$tipo' WHERE id = " . $_SESSION['id'];
        $_SESSION['tipo'] = 'Cliente';

        if ($conexao->query($sql)) {
            // Atualização do tipo foi bem-sucedida
            header('Location:/WorkPro/Home');
            exit();
        } else {
            echo "Erro ao atualizar o tipo: " . $conexao->error;
        }
    } else {
        echo "Erro ao excluir: " . $conexao->error;
    }
} else {
    // Nenhum registro encontrado para excluir
    header('Location:/WorkPro/Home');
    exit();
}
