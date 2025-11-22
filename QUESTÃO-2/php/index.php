<?php require 'database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="flex">
    <div class="container flex">
    <h1>Nova Tarefa</h1>

    <form action="add_tarefa.php" method="POST" class="flex">
        <input type="text" name="descricao" placeholder="Descrição" required><br>
        <input type="date" name="vencimento" required><br>
        <button type="submit">Adicionar</button>
    </form>

    <h2>Tarefas pendentes</h2>
    <ul class="font-size">
        <?php
        $pendentes = $db->query("SELECT * FROM tarefas WHERE concluida = 0 ORDER BY vencimento");
        foreach ($pendentes as $tarefa):
        ?>
            <li>
                <strong><?= $tarefa['descricao'] ?></strong> - Vence em <?= $tarefa['vencimento'] ?>
                <a href="update_tarefa.php?id=<?= $tarefa['id'] ?>" class="done-button">Concluir</a>
                <a href="delete_tarefa.php?id=<?= $tarefa['id'] ?>" class="delete-button">Excluir</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Tarefas concluídas</h2>
    <ul class="font-size">
        <?php
        $concluidas = $db->query("SELECT * FROM tarefas WHERE concluida = 1 ORDER BY vencimento");
        foreach ($concluidas as $tarefa):
        ?>
            <li>
               <strong><s><?= $tarefa['descricao'] ?></s></strong>
                (<?= $tarefa['vencimento'] ?>)
                <a href="delete_tarefa.php?id=<?= $tarefa['id'] ?>" class="delete-button">Excluir</a>
            </li>
        <?php endforeach; ?>
    </ul>
    </div>
</body>
</html>
