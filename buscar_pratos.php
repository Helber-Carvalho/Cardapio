<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("linkar.php");

// Verifica a conexão
if (!$conexao) {
    die("Erro de conexão: " . mysqli_connect_error());
}

// Busca os pratos no banco de dados
$sql = "SELECT titulo, descricao, valor, imagem FROM pratos";
$result = mysqli_query($conexao, $sql);

// Verifica se há resultados
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="uploads/' . htmlspecialchars($row["imagem"]) . '" class="card-img-top" alt="' . htmlspecialchars($row["titulo"]) . '">
                    <div class="card-body">
                        <h5 class="card-title">' . htmlspecialchars($row["titulo"]) . '</h5>
                        <p class="card-text">' . htmlspecialchars($row["descricao"]) . '</p>
                        <p class="card-text"><strong>R$ ' . number_format($row["valor"], 2, ',', '.') . '</strong></p>
                    </div>
                </div>
            </div>';
    }
} else {
    echo "<p class='text-center'>Nenhum prato encontrado.</p>";
}

// Fecha a conexão
mysqli_close($conexao);
?>
