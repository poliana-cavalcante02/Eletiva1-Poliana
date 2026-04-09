<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
<div class="container py-3">
    <h1>Exercício 2</h1>

    <form method="post">
        <div class="mb-3">
            <label for="palavra" class="form-label">Insira uma palavra</label>
            <input type="text" id="palavra" name="palavra" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <hr>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $palavra = trim($_POST['palavra']);

        if ($palavra != "") {
            echo "<p><strong>Maiúsculas:</strong> " . strtoupper(htmlspecialchars($palavra)) . "</p>";
            echo "<p><strong>Minúsculas:</strong> " . strtolower(htmlspecialchars($palavra)) . "</p>";
        } else {
            echo "<p class='text-danger'>Digite uma palavra válida.</p>";
        }
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>