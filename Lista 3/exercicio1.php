<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">Exercício 1</h1>

    <form method="post">
        <?php for ($i = 1; $i <= 7; $i++): ?>
            <div class="mb-3">
                <label for="valor<?= $i ?>" class="form-label">Digite o <?= $i ?>º número</label>
                <input 
                    type="number" 
                    step="any"
                    name="valor<?= $i ?>" 
                    id="valor<?= $i ?>" 
                    class="form-control"
                    required
                >
            </div>
        <?php endfor; ?>

        <button type="submit" class="btn btn-success">Verificar menor número</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $numeros = [];

        for ($i = 1; $i <= 7; $i++) {
            $numeros[] = (float) $_POST["valor$i"];
        }

        $menorNumero = $numeros[0];

        foreach ($numeros as $numero) {
            if ($numero < $menorNumero) {
                $menorNumero = $numero;
            }
        }

        echo "<div class='alert alert-info mt-4'>";
        echo "O menor número informado foi: <strong>$menorNumero</strong>";
        echo "</div>";
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>