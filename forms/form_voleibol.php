<?php
session_start();

$modality = $_SESSION['modality'];
$school   = $_SESSION['school'];

if (!isset($_SESSION['voleibol_step'])) {
  $_SESSION['voleibol_step'] = 'B_team1';
}

$currentStep = $_SESSION['voleibol_step'];

if (isset($_POST['submitVoleibol'])) {

  if ($currentStep === 'B_team1') {
    // Aqui salvar no banco os dados da Equipe Mista 1
 
    
    if (isset($_POST['moreTeam']) && $_POST['moreTeam'] === 'sim') {
      $_SESSION['voleibol_step'] = 'B_team2';
      $_SESSION['message'] = 'Dados da Equipe Mista 1 salvos com sucesso! Agora, preencha a Equipe Mista 2.';
      $_SESSION['message_type'] = 'success';
    } else {
      header('Location: ../confirmation.php');
      exit;
    }
    header('Location: form_voleibol.php');
    exit;
  } elseif ($currentStep === 'B_team2') {
    // Aqui salvar no banco os dados da Equipe Mista 2

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
  <title>Voleibol Misto – Categoria B</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">
  <?php
  if (isset($_SESSION['message'])) {
    $toastClass = (isset($_SESSION['message_type']) && $_SESSION['message_type'] == 'success') ? 'text-bg-success' : 'text-bg-danger';
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
        Se enviar sem preencher os campos, será considerado que não haverá equipe inscrita nesta categoria.
      </span>
      <div class="ms-auto">
        Escola: <?php echo htmlspecialchars($school); ?>
      </div>
    </div>
  </nav>

  <div class="container my-5" style="max-width: 800px;">
    <div class="card shadow p-4 bg-white border-0">
      <h3 class="text-center">Voleibol Misto – Categoria B</h3>
      <p class="text-center">50% masculino/feminino ou superioridade feminina</p>

      <?php if ($currentStep === 'B_team1'): ?>
        <h4 class="text-center">Equipe Mista 1 – Voleibol Misto – Categoria B</h4>
        <form method="post" class="cat-b">
          <?php for ($i = 1; $i <= 8; $i++): ?>
            <div class="mb-3">
              <label>Nome – Atleta <?php echo $i; ?></label>
              <input type="text" name="team1_nome_<?php echo $i; ?>" class="form-control athlete-name" data-index="<?php echo $i; ?>">
            </div>
            <div class="mb-3">
              <label>Data de Nascimento – Atleta <?php echo $i; ?></label>
              <input type="date" name="team1_nasc_<?php echo $i; ?>" class="form-control athlete-date" data-index="<?php echo $i; ?>">
            </div>
          <?php endfor; ?>

          <div class="mb-4">
            <p class="fw-bold">Deseja cadastrar mais um time?</p>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="moreTeam" id="moreTeamSim" value="sim">
              <label class="form-check-label" for="moreTeamSim">Sim</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="moreTeam" id="moreTeamNao" value="nao" checked>
              <label class="form-check-label" for="moreTeamNao">Não</label>
            </div>
          </div>

          <div class="col-12 text-center">
            <button type="submit" name="submitVoleibol" class="btn btn-primary submit-button">
              Enviar Equipe Mista 1
            </button>
          </div>
          <?php include '../assets/modal_reset.php'; ?>
        </form>
      <?php elseif ($currentStep === 'B_team2'): ?>
        <h4 class="text-center">Equipe Mista 2 – Voleibol Misto – Categoria B</h4>
        <form method="post" class="cat-b">
          <?php for ($i = 1; $i <= 8; $i++): ?>
            <div class="mb-3">
              <label>Nome – Atleta <?php echo $i; ?></label>
              <input type="text" name="team2_nome_<?php echo $i; ?>" class="form-control athlete-name" data-index="<?php echo $i; ?>">
            </div>
            <div class="mb-3">
              <label>Data de Nascimento – Atleta <?php echo $i; ?></label>
              <input type="date" name="team2_nasc_<?php echo $i; ?>" class="form-control athlete-date" data-index="<?php echo $i; ?>">
            </div>
          <?php endfor; ?>
          <div class="col-12 text-center">
            <button type="submit" name="submitVoleibol" class="btn btn-primary submit-button">
              Enviar Equipe Mista 2
            </button>
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