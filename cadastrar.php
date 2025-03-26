<?php
include("linkar.php");

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];

    // Verifica se o arquivo foi enviado sem erros
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $imagem_nome = $_FILES['imagem']['name'];
        $imagem_temp = $_FILES['imagem']['tmp_name'];
        $diretorio_destino = "uploads/";

        // Cria a pasta 'uploads' caso não exista
        if (!is_dir($diretorio_destino)) {
            mkdir($diretorio_destino, 0755, true);
        }

        // Define um novo nome único para evitar sobreposição
        $extensao = pathinfo($imagem_nome, PATHINFO_EXTENSION);
        $novo_nome = uniqid() . "." . $extensao;
        $caminho_final = $diretorio_destino . $novo_nome;

        // Move a imagem para a pasta
        if (move_uploaded_file($imagem_temp, $caminho_final)) {
            // Insere os dados no banco de dados
            $sql = "INSERT INTO pratos (titulo, descricao, valor, imagem) VALUES
                    ('$titulo', '$descricao', '$valor', '$novo_nome')";

            if (mysqli_query($conexao, $sql)) {
                echo "Dados inseridos com sucesso!";
            } else {
                echo "Erro ao inserir no banco: " . mysqli_error($conexao);
            }
        } else {
            echo "Erro ao mover a imagem para o diretório.";
        }
    } else {
        echo "Erro no envio da imagem.";
    }
} else {
    echo "Método inválido!";
}
?>
