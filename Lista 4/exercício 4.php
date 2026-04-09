<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
<div class="container py-3">
    <h1>Exercício 4</h1>

    <form method="post">
        <div class="mb-3">
            <label for="dia" class="form-label">Digite o dia</label>
            <input type="number" id="dia" name="dia" class="form-control" min="1" max="31" required>
        </div>

        <div class="mb-3">
            <label for="mes" class="form-label">Digite o mês</label>
            <input type="number" id="mes" name="mes" class="form-control" min="1" max="12" required>
        </div>

        <div class="mb-3">
            <label for="ano" class="form-label">Digite o ano</label>
            <input type="number" id="ano" name="ano" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <hr>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $dia = (int) $_POST['dia'];
        $mes = (int) $_POST['mes'];
        $ano = (int) $_POST['ano'];

        if (checkdate($mes, $dia, $ano)) {
            $data = mktime(0, 0, 0, $mes, $dia, $ano);
            echo "<p>Data válida: <strong>" . date("d/m/Y", $data) . "</strong></p>";
        } else {
            echo "<p class='text-danger'>Data inválida. Verifique os valores informados.</p>";
        }
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>