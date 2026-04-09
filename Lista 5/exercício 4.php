<?php
session_start();

if (!isset($_SESSION['itens'])) {
    $_SESSION['itens'] = [];
}

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $precoOriginal = (float) $_POST['preco'];

    if ($nome !== "" && $precoOriginal >= 0) {
        $precoReajustado = $precoOriginal * 1.15;

        $_SESSION['itens'][$nome] = [
            'preco' => $precoReajustado
        ];

        $mensagem = "Item cadastrado com reajuste aplicado.";
    } else {
        $mensagem = "Preencha os dados corretamente.";
    }
}

$itens = $_SESSION['itens'];

if (!empty($itens)) {
    uasort($itens, function ($a, $b) {
        return $a['preco'] <=> $b['preco'];
    });
}
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
<div class="container py-3">
    <h1>Exercício 4 - Item</h1>

    <form method="post" class="mt-4">
        <div class="mb-3">
            <label for="nome" class="form-label">Insira o nome do produto</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
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

    <?php if (!empty($itens)): ?>
        <div class="mt-4">
            <h2>Itens cadastrados</h2>
            <ul class="list-group">
                <?php foreach ($itens as $nome => $dados): ?>
                    <li class="list-group-item">
                        <strong>Item:</strong> <?= htmlspecialchars($nome) ?><br>
                        <strong>Preço com reajuste:</strong> R$ <?= number_format($dados['preco'], 2, ',', '.') ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>