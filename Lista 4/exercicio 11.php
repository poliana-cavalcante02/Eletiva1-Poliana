<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
<div class="container py-3">
    <h1>Exercício 11</h1>

    <form method="post">
        <div class="mb-3">
            <label for="numero" class="form-label">Insira um número</label>
            <input type="number" step="any" id="numero" name="numero" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $numero = $_POST['numero'];

    if (is_numeric($numero)) {
        $valorFormatado = "R$ " . number_format((float)$numero, 2, ",", ".");
        echo "<p class='mt-3'><strong>$valorFormatado</strong></p>";
    } else {
        echo "<p class='mt-3 text-danger'>Valor inválido.</p>";
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>