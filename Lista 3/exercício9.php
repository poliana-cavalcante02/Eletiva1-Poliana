<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 9</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">Exercício 9</h1>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Digite um número</label>
            <input type="number" name="numero" class="form-control" min="0" required>
        </div>

        <button type="submit" class="btn btn-success">Calcular fatorial</button>
    </form>

    <?php
    function calcularFatorial($n) {
        $resultado = 1;

        for ($i = 1; $i <= $n; $i++) {
            $resultado *= $i;
        }

        return $resultado;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $numero = (int) $_POST["numero"];

        $fatorial = calcularFatorial($numero);

        echo "<div class='alert alert-info mt-4'>";
        echo "Fatorial de <strong>$numero</strong> é <strong>$fatorial</strong>";
        echo "</div>";
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>