<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
<div class="container py-3">
    <h1>Exercício 3</h1>

    <form method="post">
        <div class="mb-3">
            <label for="palavra" class="form-label">Insira uma palavra</label>
            <input type="text" id="palavra" name="palavra" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="palavra2" class="form-label">Insira outra palavra</label>
            <input type="text" id="palavra2" name="palavra2" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <hr>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $palavra = trim($_POST['palavra']);
        $palavra2 = trim($_POST['palavra2']);

        if ($palavra != "" && $palavra2 != "") {
            if (str_contains($palavra, $palavra2)) {
                echo "<p>A palavra <strong>" . htmlspecialchars($palavra2) . "</strong> está contida em <strong>" . htmlspecialchars($palavra) . "</strong>.</p>";
            } else {
                echo "<p>A palavra <strong>" . htmlspecialchars($palavra2) . "</strong> não está contida em <strong>" . htmlspecialchars($palavra) . "</strong>.</p>";
            }
        } else {
            echo "<p class='text-danger'>Preencha os dois campos corretamente.</p>";
        }
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 