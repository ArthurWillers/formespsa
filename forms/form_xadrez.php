<?php
session_start();

$modality = $_SESSION['modality'];
$school   = $_SESSION['school'] ?? '';

// Definindo a etapa inicial
if (!isset($_SESSION['xadrez_step'])) {
  $_SESSION['xadrez_step'] = 'A_feminino';
}

$currentStep = $_SESSION['xadrez_step'];

// Quando o formulário é enviado:
if (isset($_POST['submitXadrez'])) {
  // Aqui você salvaria no banco ou faria a lógica de cada etapa
  if ($currentStep === 'A_feminino') {
    // Salva as atletas de Xadrez Categoria A Feminino
    $_SESSION['xadrez_step'] = 'A_masculino';
    $_SESSION['message']     = 'Dados da Categoria A Feminino salvos com sucesso! Agora, preencha a Categoria A Masculino.';
    $_SESSION['message_type'] = 'success';
    header('Location: form_xadrez.php');
    exit;
  } elseif ($currentStep === 'A_masculino') {
    // Salva os atletas de Xadrez Categoria A Masculino
    $_SESSION['xadrez_step'] = 'B_feminino';
    $_SESSION['message']     = 'Dados da Categoria A Masculino salvos com sucesso! Agora, preencha a Categoria B Feminino.';
    $_SESSION['message_type'] = 'success';
    header('Location: form_xadrez.php');
    exit;
  } elseif ($currentStep === 'B_feminino') {
    // Salva as atletas de Xadrez Categoria B Feminino
    $_SESSION['xadrez_step'] = 'B_masculino';
    $_SESSION['message']     = 'Dados da Categoria B Feminino salvos com sucesso! Agora, preencha a Categoria B Masculino.';
    $_SESSION['message_type'] = 'success';
    header('Location: form_xadrez.php');
    exit;
  } elseif ($currentStep === 'B_masculino') {
    // Salva os atletas de Xadrez Categoria B Masculino
    header('Location: ../confirmation.php');
    exit;
  }
}
?>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../assets/logoPrefeituraSA.png" type="image/x-icon">
  <title>Xadrez</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">
  <?php
  if (isset($_SESSION['message'])) {
    $toastClass = (isset($_SESSION['message_type']) && $_SESSION['message_type'] == 'success')
      ? 'text-bg-success'
      : 'text-bg-danger';
    echo '<div class="toast-container position-fixed top-0 start-50 translate-middle-x mt-2">
            <div id="toastMessage" class="toast align-items-center ' . $toastClass . ' border-0 w-auto" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="d-flex">
                <div class="toast-body">' . $_SESSION['message'] . '</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
            </div>
          </div>';
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
  }
  ?>
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
        Se enviar sem preencher nada, será considerado que não haverá equipe inscrita nesta categoria.
      </span>
      <div class="ms-auto">
        Escola: <?php echo htmlspecialchars($school); ?>
      </div>
    </div>
  </nav>

  <div class="container my-5" style="max-width: 800px;">
    <div class="card shadow p-4 bg-white border-0">

      <?php if ($currentStep === 'A_feminino'): ?>
        <h3 class="text-center">Xadrez - Categoria A Feminino</h3>
        <form method="post" class="cat-a">
          <?php for ($i = 1; $i <= 3; $i++): ?>
            <div class="mb-3">
              <label>Nome - Atleta <?php echo $i; ?></label>
              <input type="text" name="A_fem_nome_<?php echo $i; ?>" class="form-control athlete-name" data-index="<?php echo $i; ?>">
            </div>
            <div class="mb-3">
              <label>Data de Nascimento - Atleta <?php echo $i; ?></label>
              <input type="date" name="A_fem_nasc_<?php echo $i; ?>" class="form-control athlete-date" data-index="<?php echo $i; ?>">
            </div>
          <?php endfor; ?>
          <div class="col-12 text-center">
            <button type="submit" name="submitXadrez" class="btn btn-primary submit-button">Enviar Categoria A Feminino</button>
          </div>
          <?php include '../assets/modal_reset.php'; ?>
        </form>

      <?php elseif ($currentStep === 'A_masculino'): ?>
        <h3 class="text-center">Xadrez - Categoria A Masculino</h3>
        <form method="post" class="cat-a">
          <?php for ($i = 1; $i <= 3; $i++): ?>
            <div class="mb-3">
              <label>Nome - Atleta <?php echo $i; ?></label>
              <input type="text" name="A_mas_nome_<?php echo $i; ?>" class="form-control athlete-name" data-index="<?php echo $i; ?>">
            </div>
            <div class="mb-3">
              <label>Data de Nascimento - Atleta <?php echo $i; ?></label>
              <input type="date" name="A_mas_nasc_<?php echo $i; ?>" class="form-control athlete-date" data-index="<?php echo $i; ?>">
            </div>
          <?php endfor; ?>
          <div class="col-12 text-center">
            <button type="submit" name="submitXadrez" class="btn btn-primary submit-button">Enviar Categoria A Masculino</button>
          </div>
          <?php include '../assets/modal_reset.php'; ?>
        </form>

      <?php elseif ($currentStep === 'B_feminino'): ?>
        <h3 class="text-center">Xadrez - Categoria B Feminino</h3>
        <form method="post" class="cat-b">
          <?php for ($i = 1; $i <= 3; $i++): ?>
            <div class="mb-3">
              <label>Nome - Atleta <?php echo $i; ?></label>
              <input type="text" name="B_fem_nome_<?php echo $i; ?>" class="form-control athlete-name" data-index="<?php echo $i; ?>">
            </div>
            <div class="mb-3">
              <label>Data de Nascimento - Atleta <?php echo $i; ?></label>
              <input type="date" name="B_fem_nasc_<?php echo $i; ?>" class="form-control athlete-date" data-index="<?php echo $i; ?>">
            </div>
          <?php endfor; ?>
          <div class="col-12 text-center">
            <button type="submit" name="submitXadrez" class="btn btn-primary submit-button">Enviar Categoria B Feminino</button>
          </div>
          <?php include '../assets/modal_reset.php'; ?>
        </form>

      <?php elseif ($currentStep === 'B_masculino'): ?>
        <h3 class="text-center">Xadrez - Categoria B Masculino</h3>
        <form method="post" class="cat-b">
          <?php for ($i = 1; $i <= 3; $i++): ?>
            <div class="mb-3">
              <label>Nome - Atleta <?php echo $i; ?></label>
              <input type="text" name="B_mas_nome_<?php echo $i; ?>" class="form-control athlete-name" data-index="<?php echo $i; ?>">
            </div>
            <div class="mb-3">
              <label>Data de Nascimento - Atleta <?php echo $i; ?></label>
              <input type="date" name="B_mas_nasc_<?php echo $i; ?>" class="form-control athlete-date" data-index="<?php echo $i; ?>">
            </div>
          <?php endfor; ?>
          <div class="col-12 text-center">
            <button type="submit" name="submitXadrez" class="btn btn-primary submit-button">Enviar Categoria B Masculino</button>
          </div>
          <?php include '../assets/modal_reset.php'; ?>
        </form>
      <?php endif; ?>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
  <script src="./script_form.js"></script>
  <script src="../script.js"></script>
</body>

</html>