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
    <div ontouchstart="">
  <div class="button">
    <a href="../php/novolivro.php">Adicionar novo livro</a>
  </div>
</div>
    <!-- Título da seção -->
    <div class="title">RECOMENDADOS :</div>

    <!-- Grid de livros -->
    <div class="books-grid">
        <?php
        // Exemplo de como ficaria o código PHP com a URL da capa do livro
        $json = file_get_contents('http://localhost/BIBLIOTECA/api/api_update_livro.php');
        if ($json === false) {
            echo "<p>Erro ao acessar a API.</p>";
        } else {
            // Decodificando o JSON recebido da API
            $livros = json_decode($json, true);

            // Verificando se a variável $livros é válida e contém dados
            if ($livros && is_array($livros) && count($livros) > 0) {
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
                            <button class='button-edit'><a href='editar_livro.php?id={$livro['id_livro']}' style='color: white; text-decoration: none;'>EDITAR</a></button>
                            <button class='button-delete' onclick='deletarLivro({$livro['id_livro']})'>EXCLUIR</button>
                        </div>
                    </div>";
                }
            } else {
                echo "<p>Nenhum livro encontrado ou erro ao obter dados.</p>";
            }
        }
        ?>

    </div>

    <!-- Script para confirmação de exclusão -->
    <script>
        function deletarLivro(id_livro) {
            if (confirm("Você tem certeza que deseja excluir este livro?")) {
                fetch('http://localhost/BIBLIOTECA/api/api_update_livro.php?id=' + id_livro, {
                    method: 'DELETE'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        alert(data.message);
                        location.reload(); // Recarregar a página após a exclusão
                    } else {
                        alert('Erro ao excluir livro.');
                    }
                });
            }
        }
    </script>

</body>

</html>
