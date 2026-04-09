<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 12</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
<div class="container py-3">
    <h1>Exercício 12</h1>
    <p>Senha aleatória com 8 caracteres</p>

    <form method="post">
        <button type="submit" class="btn btn-primary">Gerar senha</button>
    </form>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    try {
        $senha = substr(bin2hex(random_bytes(4)), 0, 8);
        echo "<p class='mt-3'>A senha gerada foi <strong>$senha</strong></p>";
    } catch (Exception $e) {
        echo "<p class='text-danger mt-3'>Erro ao gerar senha.</p>";
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>