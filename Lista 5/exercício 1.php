<?php
session_start();

if (!isset($_SESSION['contatos'])) {
    $_SESSION['contatos'] = [];
}

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $telefone = trim($_POST['telefone']);

    $contatos = $_SESSION['contatos'];

    if ($nome !== "" && $telefone !== "") {
        if (array_key_exists($nome, $contatos)) {
            $mensagem = "O nome \"$nome\" já foi cadastrado.";
        } elseif (in_array($telefone, $contatos)) {
            $mensagem = "O telefone \"$telefone\" já foi cadastrado.";
        } else {
            $contatos[$nome] = $telefone;
            ksort($contatos);
            $_SESSION['contatos'] = $contatos;
            $mensagem = "Contato cadastrado com sucesso.";
        }
    } else {
        $mensagem = "Preencha todos os campos.";
    }
}

$listaContatos = $_SESSION['contatos'];
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 1 - Lista Telefônica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    <h1 class="mb-4">Exercício 1 - Lista Telefônica</h1>

    <form method="post" class="mb-4">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" id="telefone" name="telefone" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

    <?php if ($mensagem !== ""): ?>
        <div class="alert alert-info">
            <?= $mensagem ?>
        </div>
    <?php endif; ?>

    <h2 class="mt-4">Contatos cadastrados</h2>

    <?php if (count($listaContatos) > 0): ?>
        <ul class="list-group mt-3">
            <?php foreach ($listaContatos as $nome => $telefone): ?>
                <li class="list-group-item">
                    <strong><?= htmlspecialchars($nome) ?></strong>: <?= htmlspecialchars($telefone) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="mt-3">Nenhum contato cadastrado.</p>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>