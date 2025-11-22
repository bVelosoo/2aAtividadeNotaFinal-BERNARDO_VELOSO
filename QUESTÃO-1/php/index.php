<?php require 'database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Livraria</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="flex">
    <div class="container flex">
    <h1>Cadastro de Livros</h1>

    <form action="add_book.php" method="POST" class="flex">
        <input type="text" name="titulo" placeholder="Título" required class="input"><br>
        <input type="text" name="autor" placeholder="Autor" required class="input"><br>
        <input type="number" name="ano" placeholder="Ano" required class="input"><br>
        <button type="submit">Adicionar</button>
    </form>

    <h2>Livros cadastrados</h2>
    <ul>
        <?php
        $livros = $db->query("SELECT * FROM livros");
        foreach ($livros as $livro):
        ?>
            <li class="font-size">
                <b><?= $livro['titulo'] ?></b> - <?= $livro['autor'] ?> (<?= $livro['ano'] ?>)
                <a href="delete_book.php?id=<?= $livro['id'] ?>" class="delete-button">Excluir</a>
            </li>
        <?php endforeach; ?>
    </ul>
    </div>
</body>
</html>
