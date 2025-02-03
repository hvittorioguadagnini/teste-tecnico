<?php
$db_path = 'database/users.db';
try {
    $db = new SQLite3($db_path);
} catch (Exception $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
