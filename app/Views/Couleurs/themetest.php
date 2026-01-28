<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test de palette</title>
    <meta name="description" content="Test de comparaison de couleurs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <style>
    .conteneur {
        display: flex;
    }
    .contenu {
        width:500px;
        height:500px;
        display: flex;
    }
    </style>
</head>
<body>

<h1>Comparaison :</h1>
<div class="conteneur">
    <div class="contenu" style="background-color:#<?= $c1 ?>;">
    </div><div class="contenu" style="background-color:#<?= $c2 ?>;"></div>
</div>

<!-- SCRIPTS -->

<script>
</script>

<!-- -->

</body>
</html>