<?php
session_start();

include('conexao.php');

function escape($value) {
    global $db;
    return $db->escapeString(trim($value));
}

if (isset($_POST['create_usuario'])) {
    $nome = escape($_POST['nome']);
    $email = escape($_POST['email']);
    $telefone = escape($_POST['telefone']);

    if (empty($nome) || empty($email) || empty($telefone)) {
        $_SESSION['mensagem'] = 'Preencha todos os campos obrigatórios.';
        header('Location: usuario-create.php');
        exit;
    }

    $sql = "INSERT INTO usuarios (nome, email, telefone) 
            VALUES ('$nome', '$email', '$telefone')";

    if ($db->exec($sql)) {
        $_SESSION['mensagem'] = 'Usuário criado com sucesso';
    } else {
        $_SESSION['mensagem'] = 'Erro ao criar usuário';
    }
    header('Location: index.php');
    exit;
}

if (isset($_POST['update_usuario'])) {
    $usuario_id = escape($_POST['usuario_id']);
    $nome = escape($_POST['nome']);
    $email = escape($_POST['email']);
    $telefone = escape($_POST['telefone']);

    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', telefone = '$telefone' WHERE id = '$usuario_id'";

    if ($db->exec($sql)) {
        $_SESSION['mensagem'] = 'Usuário atualizado com sucesso';
    } else {
        $_SESSION['mensagem'] = 'Erro ao atualizar usuário';
    }
    header('Location: index.php');
    exit;
}

if (isset($_POST['delete_usuario'])) {
    $usuario_id = escape($_POST['delete_usuario']);
    
    $sql = "DELETE FROM usuarios WHERE id = '$usuario_id'";

    if ($db->exec($sql)) {
        $_SESSION['mensagem'] = 'Usuário deletado com sucesso';
    } else {
        $_SESSION['mensagem'] = 'Erro ao deletar usuário';
    }
    header('Location: index.php');
    exit;
}
?>