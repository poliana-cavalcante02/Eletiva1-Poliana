<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
<div class="container py-3">
    <h1>Exercício 6</h1>

    <form method="post">
        <div class="mb-3">
            <label for="num1" class="form-label">Insira um número</label>
            <input type="number" id="num1" name="num1" class="form-control" step="any" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <hr>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $num1 = (float) $_POST['num1'];

        echo "<p>Número informado: <strong>" . htmlspecialchars($num1) . "</strong></p>";
        echo "<p>Arredondado para cima: <strong>" . ceil($num1) . "</strong></p>";
        echo "<p>Arredondado para baixo: <strong>" . floor($num1) . "</strong></p>";
        echo "<p>Arredondado para o mais próximo: <strong>" . round($num1) . "</strong></p>";
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>