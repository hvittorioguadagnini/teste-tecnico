<?php

session_start();
$db_path = __DIR__ . '/database/users.db';

if (!is_dir(__DIR__ . '/database')) {
    mkdir(__DIR__ . '/database', 0755, true);
}

try {
    $conexao = new PDO("sqlite:$db_path");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $tableExists = $conexao->query("SELECT name FROM sqlite_master WHERE type='table' AND name='usuarios'")->fetchColumn();

    if (!$tableExists) {
        $sql = "CREATE TABLE usuarios (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    nome TEXT NOT NULL,
                    email TEXT NOT NULL UNIQUE,
                    telefone TEXT
                )";
        $conexao->exec($sql);
        echo "Tabela 'usuarios' criada com sucesso.\n";
    } else {
        echo "A tabela 'usuarios' já existe.\n";
    }
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>