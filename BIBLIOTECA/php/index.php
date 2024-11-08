<?php
include('menu.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Recomendações</title>
    <link rel="stylesheet" href="../css/catalago.css">
</head>

<body>

    <!-- Barra de busca -->
    <div class="search-bar">
        <input type="text" placeholder="Pesquisar...">
    </div>
    <!-- Título da seção -->
    <div class="title">RECOMENDADOS :</div>

    <!-- Grid de livros -->
    <div class="books-grid">
        <?php
        // Exemplo de como ficaria o código PHP com a URL da capa do livro
        $json = file_get_contents('http://localhost/BIBLIOTECA/api/api_catalago.php');
        if ($json === false) {
            echo "<p>Erro ao acessar a API.</p>";
        } else {
            $livros = json_decode($json, true);
            if ($livros === null) {
                echo "<p>Erro ao decodificar JSON: " . json_last_error_msg() . "</p>";
            } elseif (!empty($livros) && is_array($livros)) {
                foreach ($livros as $livro) {
                    echo "<div class='book-card'>
                <img src='{$livro['capa_livro']}' alt='Capa do Livro' class='book-cover'>
                <div class='description'><strong>{$livro['titulo']}</strong><br>
                Autor: {$livro['autor']}<br>
                Quantidade: {$livro['quantidade_fisico']}<br>
                Tipo: {$livro['tipo_livro']}<br>
                Editora: {$livro['editora']}<br>
                Ano: {$livro['ano_publicacao']}</div>
                <div class='buttons'>
                   <button class='button-view'><a href='{$livro['url_ebook']}' target='_blank' style='color: white; text-decoration: none;'>LER AGORA</a></button>
                    <button class='button-schedule'>AGENDAR</button>
                </div>
            </div>";
                }
            } else {
                echo "<p>Nenhum livro encontrado ou erro ao obter dados.</p>";
            }
        }
        ?>

    </div>

</body>

</html>