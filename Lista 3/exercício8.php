<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">Exercício 8</h1>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Digite um número</label>
            <input type="number" name="inicio" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-success">Gerar contagem</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $inicio = (int) $_POST["inicio"];

        echo "<div class='mt-4'>";
        echo "<h5>Contagem regressiva:</h5>";
        echo "<ol class='list-group list-group-numbered'>";

        while ($inicio >= 1) {
            echo "<li class='list-group-item'>$inicio</li>";
            $inicio--;
        }

        echo "</ol>";
        echo "</div>";
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>