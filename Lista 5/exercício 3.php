<?php
session_start();

if (!isset($_SESSION['produtos'])) {
    $_SESSION['produtos'] = [];
}

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = trim($_POST['codigo']);
    $nome = trim($_POST['nome']);
    $preco = (float) $_POST['preco'];

    if ($codigo !== "" && $nome !== "" && $preco >= 0) {
        $precoFinal = $preco;

        if ($preco > 100) {
            $precoFinal = $preco * 0.9;
        }

        $_SESSION['produtos'][$codigo] = [
            'nome' => $nome,
            'preco' => $precoFinal
        ];

        $mensagem = "Produto cadastrado com sucesso.";
    } else {
        $mensagem = "Preencha os campos corretamente.";
    }
}

$produtos = $_SESSION['produtos'];

if (!empty($produtos)) {
    uasort($produtos, function ($a, $b) {
        return strcmp($a['nome'], $b['nome']);
    });
}
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
<div class="container py-3">
    <h1>Exercício 3 - Produto</h1>

    <form method="post" class="mt-4">
        <div class="mb-3">
            <label for="codigo" class="form-label">Insira o código do produto</label>
            <input type="number" id="codigo" name="codigo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="produto" class="form-label">Insira o nome do produto</label>
            <input type="text" id="produto" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Insira o preço do produto</label>
            <input type="number" step="any" id="preco" name="preco" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php if ($mensagem !== ""): ?>
        <div class="alert alert-info mt-3">
            <?= $mensagem ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($produtos)): ?>
        <div class="mt-4">
            <h2>Produtos cadastrados</h2>

            <ul class="list-group">
                <?php foreach ($produtos as $codigo => $dados): ?>
                    <li class="list-group-item">
                        <strong>Código:</strong> <?= htmlspecialchars($codigo) ?><br>
                        <strong>Produto:</strong> <?= htmlspecialchars($dados['nome']) ?><br>
                        <strong>Preço final:</strong> R$ <?= number_format($dados['preco'], 2, ',', '.') ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>