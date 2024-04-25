<?php
include('conexao.php');

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
$tipo = mysqli_real_escape_string($conexao, trim('Cliente'));

$sql = "select count(*) as total from pessoas where senha = '$senha'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('location:/WorkPro/Paginas/cadastro_pessoa');
	exit();
}

$sql = "INSERT INTO pessoas(nome,email,senha,data_criacao,tipo)VALUES('$nome','$email','$senha',NOW(),'$tipo')";

if ($conexao->query($sql) === true) {
	$_SESSION['status_cadastro'] = true;
}
$conexao->close();
header('location:/WorkPro/Paginas/cadastro_pessoa');
exit();
