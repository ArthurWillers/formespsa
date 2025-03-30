<?php
session_start();

$modality = $_SESSION['modality'];
$school   = $_SESSION['school'];

$steps = [
  "corrida100_a_feminino",
  "corrida100_a_masculino",
  "corrida100_b_feminino",
  "corrida100_b_masculino",
  "corrida200_a_feminino",
  "corrida200_a_masculino",
  "corrida200_b_feminino",
  "corrida200_b_masculino",
  "corrida400_b_feminino",
  "corrida400_b_masculino",
  "arremesso_peso_a_feminino",
  "arremesso_peso_a_masculino",
  "arremesso_peso_b_feminino",
  "arremesso_peso_b_masculino",
  "arremesso_pelota_a_feminino",
  "arremesso_pelota_a_masculino",
  "arremesso_pelota_b_feminino",
  "arremesso_pelota_b_masculino",
  "salto_distancia_a_feminino",
  "salto_distancia_a_masculino",
  "salto_distancia_b_feminino",
  "salto_distancia_b_masculino",
  "revezamento4x100_a_feminino",
  "revezamento4x100_a_masculino",
  "revezamento4x100_b_feminino",
  "revezamento4x100_b_masculino"
];

if (!isset($_SESSION['atletismo_step'])) {
  $_SESSION['atletismo_step'] = $steps[0];
}

$currentStep = $_SESSION['atletismo_step'];

if (isset($_POST['submitAtletismo'])) {
  // Aqui você pode salvar os dados do banco para a etapa atual
  // Exemplo: salvarDados($currentStep, $_POST);

  // Determine o próximo passo
  $currentIndex = array_search($currentStep, $steps);
  if ($currentIndex !== false && $currentIndex < count($steps) - 1) {
    $nextStep = $steps[$currentIndex + 1];
    $_SESSION['message'] = "Dados para " . getEventName($currentStep) . " salvos com sucesso! Prossiga para " . getEventName($nextStep) . ".";
    $_SESSION['message_type'] = 'success';
    $_SESSION['atletismo_step'] = $nextStep;
    header('Location: form_atletismo.php');
    exit;
  } else {
    // Última etapa: redireciona para confirmação
    unset($_SESSION['atletismo_step']);
    header('Location: ../confirmation.php');
    exit;
  }
}

function getEventName($step)
{
  $names = [
    "corrida100_a_feminino"   => "Corrida 100m - Categoria A Feminino",
    "corrida100_a_masculino"   => "Corrida 100m - Categoria A Masculino",
    "corrida100_b_feminino"    => "Corrida 100m - Categoria B Feminino",
    "corrida100_b_masculino"   => "Corrida 100m - Categoria B Masculino",
    "corrida200_a_feminino"    => "Corrida 200m - Categoria A Feminino",
    "corrida200_a_masculino"   => "Corrida 200m - Categoria A Masculino",
    "corrida200_b_feminino"    => "Corrida 200m - Categoria B Feminino",
    "corrida200_b_masculino"   => "Corrida 200m - Categoria B Masculino",
    "corrida400_b_feminino"    => "Corrida 400m - Categoria B Feminino",
    "corrida400_b_masculino"   => "Corrida 400m - Categoria B Masculino",
    "arremesso_peso_a_feminino"  => "Arremesso de Peso - Categoria A Feminino",
    "arremesso_peso_a_masculino" => "Arremesso de Peso - Categoria A Masculino",
    "arremesso_peso_b_feminino"  => "Arremesso de Peso - Categoria B Feminino",
    "arremesso_peso_b_masculino" => "Arremesso de Peso - Categoria B Masculino",
    "arremesso_pelota_a_feminino"  => "Arremesso de Pelota - Categoria A Feminino",
    "arremesso_pelota_a_masculino" => "Arremesso de Pelota - Categoria A Masculino",
    "arremesso_pelota_b_feminino"  => "Arremesso de Pelota - Categoria B Feminino",
    "arremesso_pelota_b_masculino" => "Arremesso de Pelota - Categoria B Masculino",
    "salto_distancia_a_feminino"   => "Salto em Distância - Categoria A Feminino",
    "salto_distancia_a_masculino"  => "Salto em Distância - Categoria A Masculino",
    "salto_distancia_b_feminino"   => "Salto em Distância - Categoria B Feminino",
    "salto_distancia_b_masculino"  => "Salto em Distância - Categoria B Masculino",
    "revezamento4x100_a_feminino"  => "Corrida de Revezamento 4x100m - Categoria A Feminino",
    "revezamento4x100_a_masculino" => "Corrida de Revezamento 4x100m - Categoria A Masculino",
    "revezamento4x100_b_feminino"  => "Corrida de Revezamento 4x100m - Categoria B Feminino",
    "revezamento4x100_b_masculino" => "Corrida de Revezamento 4x100m - Categoria B Masculino"
  ];
  return isset($names[$step]) ? $names[$step] : $step;
}

function getAthleteCount($step)
{
  // Para revezamento são 4 atletas; para os demais são 2
  if (strpos($step, 'revezamento4x100') !== false) {
    return 4;
  }
  return 2;
}
?>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../assets/logoPrefeituraSA.png" type="image/x-icon">
  <title>Atletismo</title>
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
        Se enviar sem preencher nada, será considerado que não haverá equipe inscrita nesta categoria.
      </span>
      <div class="ms-auto">
        Escola: <?php echo htmlspecialchars($school); ?>
      </div>
    </div>
  </nav>

  <div class="container my-5" style="max-width: 800px;">
    <div class="card shadow p-4 bg-white border-0">
      <h3 class="text-center"><?php echo getEventName($currentStep); ?></h3>
      <form method="post" class="<?php echo (strpos($currentStep, '_a_') !== false ? 'cat-a' : 'cat-b'); ?>">
        <?php
        $athleteCount = getAthleteCount($currentStep);
        for ($i = 1; $i <= $athleteCount; $i++):
        ?>
          <div class="mb-3">
            <label>Nome - Atleta <?php echo $i; ?></label>
            <input type="text" name="<?php echo $currentStep . '_nome_' . $i; ?>" class="form-control athlete-name" data-index="<?php echo $i; ?>">
          </div>
          <div class="mb-3">
            <label>Data de Nascimento - Atleta <?php echo $i; ?></label>
            <input type="date" name="<?php echo $currentStep . '_nasc_' . $i; ?>" class="form-control athlete-date" data-index="<?php echo $i; ?>">
          </div>
        <?php endfor; ?>
        <div class="col-12 text-center">
          <button type="submit" name="submitAtletismo" class="btn btn-primary submit-button">
            Enviar <?php echo getEventName($currentStep); ?>
          </button>
        </div>
        <?php include '../assets/modal_reset.php'; ?>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabBfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="./script_form.js"></script>
  <script src="../script.js"></script>
</body>

</html>