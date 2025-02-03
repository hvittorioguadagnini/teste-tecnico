<?php
session_start();
include('conexao.php');
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuário - Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Editar usuário
                <a href="index.php" class="btn btn-danger float-end">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
              <?php
              if (isset($_GET['id'])) {
                $usuario_id = SQLite3::escapeString($_GET['id']);
                $sql = "SELECT * FROM usuarios WHERE id='$usuario_id'";
                $result = $db->query($sql);

                if ($result && $row = $result->fetchArray(SQLITE3_ASSOC)) {
                  $usuario = $row;
              ?>
              <form action="acoes.php" method="POST">
                <input type="hidden" name="usuario_id" value="<?= $usuario['id'] ?>">
                <div class="mb-3">
                  <label>Nome</label>
                  <input type="text" name="nome" value="<?= $usuario['nome'] ?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Email</label>
                  <input type="text" name="email" value="<?= $usuario['email'] ?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Telefone</label>
                  <input type="text" name="telefone" value="<?= $usuario['telefone'] ?>" class="form-control">
                </div>
                <div class="mb-3">
                  <button type="submit" name="update_usuario" class="btn btn-primary">Salvar</button>
                </div>
              </form>
              <?php
                } else {
                  echo "<h5>Usuário não encontrado</h5>";
                }
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