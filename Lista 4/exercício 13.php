<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercicio 13</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
<div class="container py-3">
<h1>Exercicio 13</h1>

<form method="post">
<div class="mb-3">
    <label for="frase" class="form-label">Insira uma frase</label>
    <input type="text" id="frase" name="frase" class="form-control" required>
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $frase = trim($_POST['frase']);

    $qtdFrase = str_word_count($frase);
    $palavras = explode(" ", $frase);

    $maior = "";

    foreach ($palavras as $p){
        if(strlen($p) > strlen($maior)){
            $maior = $p;
        }
    }

    echo "<p class='mt-3'>A quantidade de palavras é <strong>$qtdFrase</strong></p>";
    echo "<p>A maior palavra é <strong>$maior</strong></p>";
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>