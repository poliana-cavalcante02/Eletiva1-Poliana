<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">Exercício 4</h1>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Preço do produto</label>
            <input type="number" step="any" name="preco" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Calcular desconto</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $preco = (float) $_POST["preco"];
        $desconto = 0;

        // usa operador ternário pra decidir o desconto
        $desconto = ($preco > 100) ? $preco * 0.15 : 0;

        $valorFinal = $preco - $desconto;

        echo "<div class='alert alert-info mt-4'>";
        echo "Valor original: R$ " . number_format($preco, 2, ',', '.');
        echo "<br>Desconto aplicado: R$ " . number_format($desconto, 2, ',', '.');
        echo "<br><strong>Valor final: R$ " . number_format($valorFinal, 2, ',', '.')</strong>";
        echo "</div>";
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>