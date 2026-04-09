<?php
session_start();

if (!isset($_SESSION['alunos'])) {
    $_SESSION['alunos'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomes = $_POST['nome'];
    $notas1 = $_POST['nota1'];
    $notas2 = $_POST['nota2'];
    $notas3 = $_POST['nota3'];

    $alunos = $_SESSION['alunos'];

    for ($i = 0; $i < count($nomes); $i++) {
        $nome = trim($nomes[$i]);
        $nota1 = (float) $notas1[$i];
        $nota2 = (float) $notas2[$i];
        $nota3 = (float) $notas3[$i];

        if ($nome !== "") {
            $media = ($nota1 + $nota2 + $nota3) / 3;
            $alunos[$nome] = $media;
        }
    }

    ksort($alunos);
    $_SESSION['alunos'] = $alunos;
}

$alunos = $_SESSION['alunos'];
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
<div class="container py-3">
    <h1>Exercício 2 - Notas dos alunos</h1>

    <form method="post">
        <?php for ($i = 0; $i < 5; $i++): ?>
            <div class="mb-3">
                <label for="nome<?= $i ?>" class="form-label">Insira o nome do aluno</label>
                <input type="text" id="nome<?= $i ?>" name="nome[]" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nota1_<?= $i ?>" class="form-label">Insira a nota 1</label>
                <input type="number" step="any" id="nota1_<?= $i ?>" name="nota1[]" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nota2_<?= $i ?>" class="form-label">Insira a nota 2</label>
                <input type="number" step="any" id="nota2_<?= $i ?>" name="nota2[]" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nota3_<?= $i ?>" class="form-label">Insira a nota 3</label>
                <input type="number" step="any" id="nota3_<?= $i ?>" name="nota3[]" class="form-control" required>
            </div>

            <hr>
        <?php endfor; ?>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php if (!empty($alunos)): ?>
        <div class="mt-4">
            <h2>Resultados</h2>
            <?php foreach ($alunos as $chave => $valor): ?>
                <p>A média do aluno <strong><?= htmlspecialchars($chave) ?></strong> é: <strong><?= number_format($valor, 2, ',', '.') ?></strong></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>