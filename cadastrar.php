<?php 
include("linkar.php");
// Recebe os dados do formulário
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$valor = $_POST["valor"];
$imagem = $_FILES['imagem']['name'];
// Tratamento da imagem (upload)
 $imagem = isset($_FILES['imagem']) ? $_FILES['imagem']['name'] : null;

  // Insere o nome da imagem no banco de dados
  $sql = "INSERT INTO pratos (titulo, descricao, valor, imagem) VALUES
          ('$titulo', '$descricao', '$valor', '$imagem')";
  



$sql = "INSERT INTO pratos (titulo, descricao, valor) VALUES
  ('$titulo', '$descricao', '$valor', '$imagem')";

// Executa a query
if (mysqli_query($conexao, $sql)) {
    echo "Dados inseridos com sucesso.";
}else { 
    echo "Erro ao inserir dados. <br>"; 
    
}

?> 