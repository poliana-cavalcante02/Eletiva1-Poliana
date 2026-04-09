<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">Exercício 2</h1>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Valor de X</label>
            <input type="number" step="any" name="x" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Valor de Y</label>
            <input type="number" step="any" name="y" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $x = (float) $_POST["x"];
        $y = (float) $_POST["y"];

        $resultado = ($x === $y) 
            ? ($x + $y) * 3 
            : ($x + $y);

        $mensagem = ($x === $y) 
            ? "Como os valores são iguais, o triplo da soma é:"
            : "A soma dos valores é:";

        echo "<div class='alert alert-info mt-4'>";
        echo "$mensagem <strong>$resultado</strong>";
        echo "</div>";
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>