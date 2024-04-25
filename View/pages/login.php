<?php

include('conexao.php');
if (empty($_POST['nome']) || empty($_POST['senha'])) {
	header('location:/WorkPro/Login/logar');
	exit();
}

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select * from pessoas where nome = '{$nome}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
	$pessoa = mysqli_fetch_assoc($result);
	$_SESSION['nome'] = $pessoa['nome'];
	$_SESSION['tipo'] = $pessoa['tipo'];
	$_SESSION['email'] = $pessoa['email'];
	$_SESSION['senha'] = $pessoa['senha'];
	$_SESSION['id'] = $pessoa['id'];
	$_SESSION['logado'] = 1;
	header('location:/WorkPro');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('location:/WorkPro/Login/logar');
	exit();
}
