<?php
session_start();

if (isset($_POST['modalidade'])) {
    $_SESSION['modalidade'] = $_POST['modalidade'];
}
if (isset($_POST['escola'])) {
    $_SESSION['escola'] = $_POST['escola'];
}

$modalidade = $_SESSION['modalidade'] ?? null;
$escola = $_SESSION['escola'] ?? null;
$cadastrarMais = $_POST['cadastrarMais'] ?? 'Não';

if ($cadastrarMais === 'Sim' && $modalidade === 'Voleibol Misto') {
    $_SESSION['team'] = 2;
    header("Location: cadastro_equipe.php");
    exit;
} else {
    header("Location: ../index.php");
    exit;
}
?>