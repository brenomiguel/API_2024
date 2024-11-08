<?php 
include('../php/menu.php'); 
include('../api/api_search.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Pesquisa</title>
    <link rel="stylesheet" href="../css/search.css">
    
</head>

<body>
    <div class="container">
        <!-- Imagem do Papagaio -->
        <div class="image-container">
            <img src="../imgs/pet.png" alt="Papagaio lendo um livro">
        </div>

        <!-- Barra de Pesquisa -->
        <div class="search-bar">
            <form action="search.php" method="get">
                <input type="text" id="inputPesquisa" name="query" placeholder="Pesquisar..." value="<?php echo isset($query) ? htmlspecialchars($query) : ''; ?>">
            </form>
        </div>

        <!-- Filtros -->
        <div class="filters">
            <form action="search.php" method="get">
                <button type="submit" class="filter-button <?php echo (isset($tipoLivro) && $tipoLivro == 'ebook') ? 'active' : ''; ?>" name="tipo" value="ebook">e-book</button>
                <button type="submit" class="filter-button <?php echo (isset($tipoLivro) && $tipoLivro == 'fisico') ? 'active' : ''; ?>" name="tipo" value="fisico">físico</button>
            </form>
        </div>

        <!-- Resultados da Pesquisa -->
        <div class="results">
            <?php
            if (isset($result) && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='result-item'>";
                    echo "<img src='../uploads/" . (isset($row['capa_livro']) ? htmlspecialchars($row['capa_livro']) : 'default.jpg') . "' alt='Capa do livro'>";
                   // echo "<img src='{$livro['capa_livro']}' alt='Capa do Livro' class='book-cover'>";
                    echo "<h3>" . (isset($row['titulo']) ? htmlspecialchars($row['titulo']) : 'Título não disponível') . "</h3>";
                    echo "<p>Autor: " . (isset($row['autor']) ? htmlspecialchars($row['autor']) : 'Autor não disponível') . "</p>";
                    echo "<p>Tipo: " . (isset($row['tipo_livro']) ? htmlspecialchars($row['tipo_livro']) : 'Tipo não disponível') . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhum livro encontrado para a pesquisa.</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>