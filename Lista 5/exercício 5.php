<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
session_start();

if (!isset($_SESSION['livro'])) {
    $_SESSION['livro'] = [];
}

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = trim($_POST['titulo']);
    $qtdEstoque = (int) $_POST['qtdEstoque'];

    if ($titulo != "" && $qtdEstoque >= 0) {
        $_SESSION['livro'][$titulo] = [
            'qtdEstoque' => $qtdEstoque
        ];

        if ($qtdEstoque < 5) {
            $mensagem = "A quantidade do estoque do livro <strong>" . htmlspecialchars($titulo) . "</strong> está abaixo de 5!";
        } else {
            $mensagem = "Livro <strong>" . htmlspecialchars($titulo) . "</strong> cadastrado com sucesso.";
        }
    } else {
        $mensagem = "Preencha os campos corretamente.";
    }
}
?>

<div class="container py-3">
    <h1>Exercício 5 - Livro</h1>

    <?php if ($mensagem != ""): ?>
        <div class="alert alert-info">
            <?= $mensagem ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="titulo" class="form-label">Insira o título do livro</label>
            <input type="text" id="titulo" name="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="qtdEstoque" class="form-label">Insira a quantidade de livros</label>
            <input type="number" id="qtdEstoque" name="qtdEstoque" class="form-control" min="0" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <hr>

    <h2>Livros cadastrados</h2>

    <?php
    if (count($_SESSION['livro']) > 0) {
        $livros = $_SESSION['livro'];
        ksort($livros);

        foreach ($livros as $chave => $valor) {
            echo "<p>O livro <strong>" . htmlspecialchars($chave) . "</strong> tem " . $valor['qtdEstoque'] . " livro(s) em estoque.</p>";
        }
    } else {
        echo "<p>Nenhum livro cadastrado ainda.</p>";
    }

    if (count($_SESSION['livro']) == 5) {
        echo '<div class="alert alert-success mt-3">Você cadastrou 5 livros.</div>';
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>