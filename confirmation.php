<?php
session_start();

$modality = $_SESSION['modality'] ?? 'Modalidade';
$school   = $_SESSION['school']   ?? 'Escola';
?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="./assets/logoPrefeituraSA.png" type="image/x-icon">
  <title>Formulário: Festival de Esportes 2025 - Confirmação</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-lg bg-body-secondary sticky-top">
    <div class="container-fluid">
      <span class="navbar-brand fw-bold">
        Festival de Esportes - <?php echo htmlspecialchars($modality); ?>
      </span>
      <span class="ms-auto">
        Escola: <?php echo htmlspecialchars($school); ?>
      </span>
    </div>
  </nav>

  <div class="container my-5" style="max-width: 700px;">
    <div class="card shadow p-4 bg-white border-0">
      <h3 class="text-center mb-4">Confirmação de Cadastro</h3>
      <p class="text-center">
        As equipes de <strong><?php echo htmlspecialchars($modality); ?></strong> foram cadastradas para a escola
        <strong><?php echo htmlspecialchars($school); ?></strong>.
      </p>
      <p class="text-center">
        <!-- Tabela de atletas a ser carregada do banco no futuro -->
        <em>Aqui será exibida a lista de atletas cadastrados...</em>
      </p>
      <div class="text-center mt-3">
        <a href="form_router.php?action=back" class="btn btn-primary">Voltar à Página Inicial</a>
      </div>
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