<?php
include ('../api/api_editar_livro.php');

?>
<link rel="stylesheet" href="../css/editar_livro.css">
<form method="POST" action="">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" value="<?php echo $livro['titulo']; ?>" required><br>

    <label for="autor">Autor:</label>
    <input type="text" name="autor" value="<?php echo $livro['autor']; ?>" required><br>

    <label for="quantidade_fisico">Quantidade Física:</label>
    <input type="number" name="quantidade_fisico" value="<?php echo $livro['quantidade_fisico']; ?>" required><br>

    <label for="tipo_livro">Tipo:</label>
    <input type="text" name="tipo_livro" value="<?php echo $livro['tipo_livro']; ?>" required><br>

    <label for="editora">Editora:</label>
    <input type="text" name="editora" value="<?php echo $livro['editora']; ?>" required><br>

    <label for="ano_publicacao">Ano de Publicação:</label>
    <input type="text" name="ano_publicacao" value="<?php echo $livro['ano_publicacao']; ?>" required><br>

    <label for="capa_livro">Capa (URL):</label>
    <input type="text" name="capa_livro" value="<?php echo $livro['capa_livro']; ?>"><br>

    <button type="submit">Atualizar Livro</button>
</form>
