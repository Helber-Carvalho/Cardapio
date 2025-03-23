<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "cardapio_sql";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}
echo "Conexão bem-sucedida!";
?>