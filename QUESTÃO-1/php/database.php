<?php
// Conexão com SQLite
$db = new PDO('sqlite:livraria.db');

// Cria tabela se não existir
$db->exec("CREATE TABLE IF NOT EXISTS livros (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo TEXT NOT NULL,
    autor TEXT NOT NULL,
    ano INTEGER
)");
?>
