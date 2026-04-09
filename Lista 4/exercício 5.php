<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
<div class="container py-3">
    <h1>Exercício 5</h1>

    <form method="post">
        <div class="mb-3">
            <label for="num1" class="form-label">Insira um número</label>
            <input type="number" id="num1" name="num1" class="form-control" min="0" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <hr>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $num1 = (float) $_POST['num1'];

        if ($num1 >= 0) {
            echo "<p>Raiz quadrada de <strong>" . htmlspecialchars($num1) . "</strong>: <strong>" . sqrt($num1) . "</strong></p>";
        } else {
            echo "<p class='text-danger'>Não é possível calcular raiz quadrada de número negativo.</p>";
        }
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>