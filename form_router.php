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

if (!in_array($_POST['school'] ?? '', $validSchools)) {
    unset($_SESSION['school']);
    unset($_SESSION['modality']);
    $_SESSION['message'] = 'Escola inválida!';
    $_SESSION['message_type'] = 'error';
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
        unset($_SESSION['school']);
        unset($_SESSION['modality']);
        $_SESSION['message'] = 'Modalidade inválida!';
        $_SESSION['message_type'] = 'error';
        header('Location: index.php');
        exit;
}
