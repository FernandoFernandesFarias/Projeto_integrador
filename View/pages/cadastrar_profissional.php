<?php
include('conexao.php');

$contato = mysqli_real_escape_string($conexao, trim($_POST['contato']));
$cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
$categoria = mysqli_real_escape_string($conexao, trim($_POST['categoria']));
$data_nasc = mysqli_real_escape_string($conexao, trim($_POST['data_nasc']));
$descricao = mysqli_real_escape_string($conexao, trim($_POST['descricao']));
$pessoa_id = $_SESSION['id'];

function formataNum($contato)
{
	// Verifique se $contato é um número válido
	if (!is_numeric($contato)) {
		// Trate o erro conforme necessário
		return 'Número inválido';
	}
	// Adicione a string ao número de telefone
	$num = '+5548' . $contato;
	return $num;
}

$contato = formataNum($contato);
// $sql = "SELECT count(*) AS total FROM profissionais WHERE id = '$pessoa_id'";
// $result = mysqli_query($conexao,$sql);
// $row= mysqli_fetch_assoc($result);

// if ($row['total']==1) {
// 	$_SESSION['usuario_existe']=true;
// 	header('location:/WorkPro/Paginas/cadastro_profissional');
// 	exit();
// }

if (isset($_FILES['foto'])) {
	$foto = $_FILES['foto'];

	if ($foto['error'])
		die("Falha ao enviar arquivo");

	if ($foto['size'] > 2097152)
		die("Arquivo muito grande! Max: 2MB");

	$pasta = "fotos/";
	$nomeDoArquivo = $foto['name'];
	$novoNomeDoArquivo = uniqid();
	$extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

	if ($extensao != "jpg" && $extensao != "png")
		die("Tipo de aquivo não aceito");

	$path = $pasta . $novoNomeDoArquivo . "." . $extensao;

	$deu_certo = move_uploaded_file($foto["tmp_name"], $path);
}

$sql_tipo = "UPDATE pessoas AS c JOIN profissionais AS p ON p.pessoa_id = c.id SET c.tipo = 'Profissional' WHERE p.pessoa_id = $pessoa_id";

$result_tipo = mysqli_query($conexao, $sql_tipo);
$_SESSION['tipo'] = 'Profissional';

$sql = "INSERT INTO profissionais(path,contato,cidade,categoria,data_nasc,descricao,pessoa_id)VALUES('$path','$contato','$cidade','$categoria','$data_nasc','$descricao','$pessoa_id')";

if ($conexao->query($sql) === true && $conexao->query($sql_tipo) === true) {
	$_SESSION['status_cadastro'] = true;
}
$conexao->close();
header('location:/WorkPro/Paginas/cadastro_profissional');
exit();
