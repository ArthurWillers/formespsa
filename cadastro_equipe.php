<?php
session_start();
// Agora buscamos modalidade e escola diretamente da sessão
$modalidade = $_SESSION['modalidade'] ?? $_POST['modalidade'] ?? null;
$escola = $_SESSION['escola'] ?? $_POST['escola'] ?? null;

// Defina qual arquivo será usado na ação do formulário
switch ($modalidade) {
    case 'Atletismo':
        $actionFile = './cadastro/cadastra_atletismo.php';
        break;
    case 'Voleibol Misto':
        $actionFile = './cadastro/cadastra_voleibol.php';
        break;
    case 'Tênis de Mesa':
        $actionFile = './cadastro/cadastra_tenis.php';
        break;
    case 'Xadrez':
        $actionFile = './cadastro/cadastra_xadrez.php';
        break;
    case 'Frisbee Misto':
        $actionFile = './cadastro/cadastra_frisbee.php';
        break;
    case 'Futsal':
        $actionFile = './cadastro/cadastra_futsal.php';
        break;
    case 'Percurso Orientado':
        $actionFile = './cadastro/cadastra_percurso.php';
        break;
    default:
        header('Location: index.php');
        exit;
}
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./assets/logoPrefeituraSA.png" type="image/x-icon">
    <title>Formulário: Inscrição para o Festival de Esportes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container my-5" style="max-width: 600px;">
        <h1 class="text-center mb-4">Formulário da Modalidade: <?php echo htmlspecialchars($modalidade); ?></h1>
        <h2 class="text-center mb-4">Escola: <?php echo htmlspecialchars($escola); ?></h2>
        <div class="card shadow p-4 bg-light border-0">
            <form action="<?php echo $actionFile; ?>" method="POST" class="row g-3">
                <input type="hidden" name="modalidade" value="<?php echo htmlspecialchars($modalidade); ?>">
                <input type="hidden" name="escola" value="<?php echo htmlspecialchars($escola); ?>">
                <!-- Campos específicos conforme a modalidade -->
                <?php if ($modalidade == 'Atletismo'): ?>
                    <div class="col-12 mb-3">

                    </div>
                <?php elseif ($modalidade == 'Voleibol Misto'): ?>
                    <?php
                        $currentTeam = $_SESSION['team'] ?? '1';
                    ?>
                    <?php if ($currentTeam === '1'): ?>
                        <h4>Equipe Mista 1 - Voleibol Misto - Categoria B</h4>
                        <label>Nome - Atleta 1:</label>
                        <input type="text" name="vm1_atleta1" class="form-control mb-2">
                        <label>Data de Nascimento - Atleta 1:</label>
                        <input type="date" name="vm1_nasc1" class="form-control mb-3">

                        <label>Nome - Atleta 2:</label>
                        <input type="text" name="vm1_atleta2" class="form-control mb-2">
                        <label>Data de Nascimento - Atleta 2:</label>
                        <input type="date" name="vm1_nasc2" class="form-control mb-3">

                        <label>Nome - Atleta 3:</label>
                        <input type="text" name="vm1_atleta3" class="form-control mb-2">
                        <label>Data de Nascimento - Atleta 3:</label>
                        <input type="date" name="vm1_nasc3" class="form-control mb-3">

                        <label>Nome - Atleta 4:</label>
                        <input type="text" name="vm1_atleta4" class="form-control mb-2">
                        <label>Data de Nascimento - Atleta 4:</label>
                        <input type="date" name="vm1_nasc4" class="form-control mb-3">

                        <label>Nome - Atleta 5:</label>
                        <input type="text" name="vm1_atleta5" class="form-control mb-2">
                        <label>Data de Nascimento - Atleta 5:</label>
                        <input type="date" name="vm1_nasc5" class="form-control mb-3">

                        <label>Nome - Atleta 6:</label>
                        <input type="text" name="vm1_atleta6" class="form-control mb-2">
                        <label>Data de Nascimento - Atleta 6:</label>
                        <input type="date" name="vm1_nasc6" class="form-control mb-3">

                        <label>Nome - Atleta 7:</label>
                        <input type="text" name="vm1_atleta7" class="form-control mb-2">
                        <label>Data de Nascimento - Atleta 7:</label>
                        <input type="date" name="vm1_nasc7" class="form-control mb-3">

                        <label>Nome - Atleta 8:</label>
                        <input type="text" name="vm1_atleta8" class="form-control mb-2">
                        <label>Data de Nascimento - Atleta 8:</label>
                        <input type="date" name="vm1_nasc8" class="form-control mb-3">
                    <?php else: ?>
                        <h4>Equipe Mista 2 - Voleibol Misto - Categoria B</h4>
                        <label>Nome - Atleta 1:</label>
                        <input type="text" name="vm2_atleta1" class="form-control mb-2">
                        <label>Data de Nascimento - Atleta 1:</label>
                        <input type="date" name="vm2_nasc1" class="form-control mb-3">

                        <label>Nome - Atleta 2:</label>
                        <input type="text" name="vm2_atleta2" class="form-control mb-2">
                        <label>Data de Nascimento - Atleta 2:</label>
                        <input type="date" name="vm2_nasc2" class="form-control mb-3">

                        <label>Nome - Atleta 3:</label>
                        <input type="text" name="vm2_atleta3" class="form-control mb-2">
                        <label>Data de Nascimento - Atleta 3:</label>
                        <input type="date" name="vm2_nasc3" class="form-control mb-3">

                        <label>Nome - Atleta 4:</label>
                        <input type="text" name="vm2_atleta4" class="form-control mb-2">
                        <label>Data de Nascimento - Atleta 4:</label>
                        <input type="date" name="vm2_nasc4" class="form-control mb-3">

                        <label>Nome - Atleta 5:</label>
                        <input type="text" name="vm2_atleta5" class="form-control mb-2">
                        <label>Data de Nascimento - Atleta 5:</label>
                        <input type="date" name="vm2_nasc5" class="form-control mb-3">

                        <label>Nome - Atleta 6:</label>
                        <input type="text" name="vm2_atleta6" class="form-control mb-2">
                        <label>Data de Nascimento - Atleta 6:</label>
                        <input type="date" name="vm2_nasc6" class="form-control mb-3">

                        <label>Nome - Atleta 7:</label>
                        <input type="text" name="vm2_atleta7" class="form-control mb-2">
                        <label>Data de Nascimento - Atleta 7:</label>
                        <input type="date" name="vm2_nasc7" class="form-control mb-3">

                        <label>Nome - Atleta 8:</label>
                        <input type="text" name="vm2_atleta8" class="form-control mb-2">
                        <label>Data de Nascimento - Atleta 8:</label>
                        <input type="date" name="vm2_nasc8" class="form-control mb-3">
                    <?php endif; ?>

                    <!-- Mostra o select somente se estiver na equipe 1 -->
                    <?php if ($currentTeam === '1'): ?>
                        <div class="col-12 mb-3">
                            <label for="cadastrarMais" class="form-label">Deseja cadastrar mais uma equipe?</label>
                            <select id="cadastrarMais" name="cadastrarMais" class="form-select" required>
                                <option value="Não">Não</option>
                                <option value="Sim">Sim</option>
                            </select>
                        </div>
                    <?php endif; ?>
                <?php elseif ($modalidade == 'Tênis de Mesa'): ?>
                    <div class="col-12 mb-3">

                    </div>
                <?php elseif ($modalidade == 'Xadrez'): ?>
                    <div class="col-12 mb-3">

                    </div>
                <?php elseif ($modalidade == 'Frisbee Misto'): ?>
                    <div class="col-12 mb-3">

                    </div>
                <?php elseif ($modalidade == 'Futsal'): ?>
                    <div class="col-12 mb-3">

                    </div>
                <?php elseif ($modalidade == 'Percurso Orientado'): ?>
                    <div class="col-12 mb-3">

                    </div>
                <?php endif; ?>

                <div class="col-12 mb-3">
                    <button type="submit" class="btn btn-success w-100 mb-2">Cadastrar Equipe</button>
                    <a href="index.php" class="btn btn-secondary w-100 mb-2">Voltar</a>
                    <!-- Novo botão que abre o modal de confirmação para limpar -->
                    <button type="button" class="btn btn-danger w-100 mb-2" data-bs-toggle="modal" data-bs-target="#confirmResetModal">
                        Limpar Formulário
                    </button>
                </div>

                <!-- Modal de confirmação de limpeza -->
                <div class="modal fade" id="confirmResetModal" tabindex="-1" aria-labelledby="confirmResetModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirmar Limpeza</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                            </div>
                            <div class="modal-body">
                                Tem certeza de que deseja limpar o formulário?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <!-- Botão que efetivamente limpa o formulário -->
                                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Limpar formulário</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="./scripts.js"></script>
</body>

</html>