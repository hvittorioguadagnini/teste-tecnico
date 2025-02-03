<?php
session_start();

include('conexao.php');

function escape($value) {
    global $db;
    return $db->escapeString(trim($value));
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuário - Visualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include('navbar.php'); ?>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Visualizar Usuário
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $usuario_id = escape($_GET['id']);
                            
                            $stmt = $db->prepare("SELECT * FROM usuarios WHERE id = :id");
                            $stmt->bindValue(':id', $usuario_id, SQLITE3_INTEGER);
                            $result = $stmt->execute();
                            $usuario = $result->fetchArray(SQLITE3_ASSOC);

                            if ($usuario) {
                        ?>
                                <div class="mb-3">
                                    <label>Nome</label>
                                    <p class="form-control"><?= htmlspecialchars($usuario['nome']); ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <p class="form-control"><?= htmlspecialchars($usuario['email']); ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Telefone</label>
                                    <p class="form-control"><?= htmlspecialchars($usuario['telefone']); ?></p>
                                </div>
                        <?php
                            } else {
                                echo "<h5>Usuário não encontrado</h5>";
                            }
                        } else {
                            echo "<h5>ID não informado</h5>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
