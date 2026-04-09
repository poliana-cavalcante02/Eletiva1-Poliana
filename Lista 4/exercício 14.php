<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 14</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
<div class="container py-3">
<h1>Exercício 14</h1>

<form method="post">
<div class="mb-3">
    <label for="palavra" class="form-label">Insira uma palavra</label>
    <input type="text" id="palavra" name="palavra" class="form-control" required>
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $palavra = trim($_POST['palavra']);
    $contrario = strrev($palavra);

    if($contrario == $palavra){
        echo "<p class='mt-3'>A palavra <strong>$palavra</strong> é um palíndromo</p>";
    }
    else{
        echo "<p class='mt-3'>A palavra <strong>$palavra</strong> não é um palíndromo</p>";
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>