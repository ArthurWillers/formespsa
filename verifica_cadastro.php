<?php
$modalidade = $_POST['modalidade'] ?? null;
$escola = $_POST['escola'] ?? null;
$cadastrarMais = $_POST['cadastrarMais'] ?? 'Não';

if ($cadastrarMais === 'Sim') {
    header("Location: cadastro_equipe.php?modalidade=" . urlencode($modalidade) . "&escola=" . urlencode($escola));
    exit;
} else {
    header("Location: index.php");
    exit;
}
?>