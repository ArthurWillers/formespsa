<?php
session_start();

$modality = $_SESSION['modality'];
$school   = $_SESSION['school'];

if (isset($_POST['submitPercurso'])) {
  // Aqui salva no banco os dados do percurso orientado
  
  header('Location: ../confirmation.php');
  exit;
}
?>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../assets/logoPrefeituraSA.png" type="image/x-icon">
  <title>Percurso Orientado</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
  <nav class="navbar navbar-expand-lg bg-body-secondary sticky-top">
    <div class="container-fluid">
      <span class="navbar-brand fw-bold">
        Festival de Esportes - <?php echo htmlspecialchars($modality); ?>
      </span>
      <div class="ms-3">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmResetModal">
          Limpar Formulário
        </button>
        <a href="../form_router.php?action=back" class="btn btn-secondary ms-2">Cancelar</a>
      </div>
      <span class="ms-auto">
        Se enviar sem preencher nada, será considerado que não haverá equipe inscrita.
      </span>
      <div class="ms-auto">
        Escola: <?php echo htmlspecialchars($school); ?>
      </div>
    </div>
  </nav>

  <div class="container my-5" style="max-width: 800px;">
    <div class="card shadow p-4 bg-white border-0">
      <h3 class="text-center">Percurso Orientado</h3>
      <form method="post" class="percurso-form">
        
        <h5 class="mt-4">PRÉ-ESCOLA NÍVEL 1</h5>
        <?php for ($i = 1; $i <= 2; $i++): ?>
          <div class="mb-3">
            <label>Nome - Aluno <?php echo $i; ?></label>
            <input type="text" name="pre1_aluno_<?php echo $i; ?>" class="form-control" placeholder="Digite o nome do aluno">
          </div>
        <?php endfor; ?>

        <h5 class="mt-4">PRÉ-ESCOLA NÍVEL 2</h5>
        <?php for ($i = 1; $i <= 2; $i++): ?>
          <div class="mb-3">
            <label>Nome - Aluno <?php echo $i; ?></label>
            <input type="text" name="pre2_aluno_<?php echo $i; ?>" class="form-control" placeholder="Digite o nome do aluno">
          </div>
        <?php endfor; ?>

        <h5 class="mt-4">1º ANO</h5>
        <?php for ($i = 1; $i <= 2; $i++): ?>
          <div class="mb-3">
            <label>Nome - Aluno <?php echo $i; ?></label>
            <input type="text" name="ano1_aluno_<?php echo $i; ?>" class="form-control" placeholder="Digite o nome do aluno">
          </div>
        <?php endfor; ?>

        <h5 class="mt-4">2º ANO</h5>
        <?php for ($i = 1; $i <= 2; $i++): ?>
          <div class="mb-3">
            <label>Nome - Aluno <?php echo $i; ?></label>
            <input type="text" name="ano2_aluno_<?php echo $i; ?>" class="form-control" placeholder="Digite o nome do aluno">
          </div>
        <?php endfor; ?>

        <h5 class="mt-4">3º ANO</h5>
        <?php for ($i = 1; $i <= 2; $i++): ?>
          <div class="mb-3">
            <label>Nome - Aluno <?php echo $i; ?></label>
            <input type="text" name="ano3_aluno_<?php echo $i; ?>" class="form-control" placeholder="Digite o nome do aluno">
          </div>
        <?php endfor; ?>

        <div class="col-12 text-center mt-4">
          <button type="submit" name="submitPercurso" class="btn btn-primary">
            Enviar Percurso Orientado
          </button>
        </div>
        
        <?php include '../assets/modal_reset.php'; ?>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
</body>
</html>