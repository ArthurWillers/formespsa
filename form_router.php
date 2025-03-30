<?php
session_start();

$validSchools = [
    'EMEI Pequeno Paraíso',
    'EMEI Vaga-Lume',
    'EMEI Vovó Amália',
    'EMEF Sol Nascente',
    'EMEF Rui Barbosa',
    'EMEF Antônio João',
    'EMEF São João',
    'EMEF Antônio Liberato'
];

if (isset($_GET['action']) && $_GET['action'] === 'back') {
    session_destroy();
    header('Location: index.php');
    exit;
}

if (isset($_GET['error']) && $_GET['error'] === 'missingCategory') {
    session_reset();
    $_SESSION['message'] = 'Um erro inesperado ocorreu!';
    header('Location: index.php');
    exit;
}

if (!in_array($_POST['school'] ?? '', $validSchools)) {
    session_reset();
    $_SESSION['message'] = 'Escola inválida!';
    header('Location: index.php');
    exit;
}

$_SESSION['school'] = $_POST['school'];
$_SESSION['modality'] = $_POST['modality'];

switch ($_SESSION['modality']) {
    case 'Atletismo':
        header('Location: ./forms/form_atletismo.php');
        exit;
    case 'Voleibol Misto':
        header('Location: ./forms/form_voleibol.php');
        exit;
    case 'Tênis de Mesa':
        header('Location: ./forms/form_tenis.php');
        exit;
    case 'Xadrez':
        header('Location: ./forms/form_xadrez.php');
        exit;
    case 'Frisbee Misto':
        header('Location: ./forms/form_frisbee.php');
        exit;
    case 'Futsal':
        header('Location: ./forms/form_futsal.php');
        exit;
    case 'Percurso Orientado':
        header('Location: ./forms/form_percurso.php');
        exit;
    default:
        session_reset();
        $_SESSION['message'] = 'Modalidade inválida!';
        header('Location: index.php');
        exit;
}
