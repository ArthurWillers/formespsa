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

<body class="bg-light">

    <div class="container my-5" style="max-width: 600px;">
        <div class="text-center mb-4">
            <img src="./assets/logoPrefeituraSA.png" alt="Logo" class="mb-3" style="width: 100px;">
            <h1 class="h3">Formulário: Inscrição para o Festival de Esportes 2025</h1>
        </div>
        <div class="card shadow p-4 bg-white border-0">
            <form action="cadastro_equipe.php" method="POST" class="row g-3">
                <div class="col-12 mb-3">
                    <label for="escola" class="form-label fw-bold">Escola</label>
                    <select id="escola" name="escola" class="form-select" required>
                        <option selected disabled>Selecione a escola</option>
                        <option value="EMEI Pequeno Paraíso">EMEI Pequeno Paraíso</option>
                        <option value="EMEI Vaga-Lume">EMEI Vaga-Lume</option>
                        <option value="EMEI Vovó Amália">EMEI Vovó Amália</option>
                        <option value="EMEF Sol Nascente">EMEF Sol Nascente</option>
                        <option value="EMEF Rui Barbosa">EMEF Rui Barbosa</option>
                        <option value="EMEF Antônio João">EMEF Antônio João</option>
                        <option value="EMEF São João">EMEF São João</option>
                        <option value="EMEF Antônio Liberato">EMEF Antônio Liberato</option>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="modalidade" class="form-label fw-bold">Modalidade</label>
                    <select id="modalidade" name="modalidade" class="form-select" required>
                        <option selected disabled>Selecione a modalidade</option>
                        <option value="Atletismo">Atletismo</option>
                        <option value="Voleibol Misto">Voleibol Misto</option>
                        <option value="Tênis de Mesa">Tênis de Mesa</option>
                        <option value="Xadrez">Xadrez</option>
                        <option value="Frisbee Misto">Frisbee Misto</option>
                        <option value="Futsal">Futsal</option>
                        <option value="Percurso Orientado">Percurso Orientado</option>
                    </select>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <button type="reset" class="btn btn-danger fw-bold">Limpar formulário</button>
                    <button type="submit" class="btn btn-success fw-bold">Próximo</button>
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