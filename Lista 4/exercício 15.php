<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 15</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
<div class="container py-3">
<h1>Exercício 15</h1>

<form method="post">
<div class="mb-3">
    <label for="email" class="form-label">Insira o email</label>
    <input type="email" id="email" name="email" class="form-control" required>
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = trim($_POST['email']);

    if (strpos($email, "@") !== false) {
        $dominio = substr(strstr($email, "@"), 1);
        echo "<p class='mt-3'>Domínio: <strong>$dominio</strong></p>";
    } else {
        echo "<p class='mt-3 text-danger'>Email inválido.</p>";
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>