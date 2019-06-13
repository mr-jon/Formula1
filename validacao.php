<?php
include_once "funcao.php";
$email= $_POST["email"];
$senha= $_POST["senha"];
// echo "Usuário $email tem a senha $senha";
$usuario = obterUsuarioByEmail($email);
$erro = "";
if ($usuario) {
    // var_dump($usuario);
	if ($usuario["senha"] == $senha) {
      // setcookie("email", $email);
		session_start();
		$_SESSION["email"] = $email;
		header("location: dashboard.php");
      // include_once "index.php";

		exit(0);
	} else {
		$erro = "senha inválida";
	}
} else {
	$erro =  "Usuario não encontrado";
}
if ($erro != "") {
	include_once "login.php";
}
?>
