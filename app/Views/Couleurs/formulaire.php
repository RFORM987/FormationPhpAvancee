<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test de palette</title>
    <meta name="description" content="Test de comparaison de couleurs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
</head>
<body>

<h2>Créer une couleur</h2>

<form action="<?=  site_url('couleurs/validate') ?>" method="post">
    <?= csrf_field() ?>

    <label>Nom :</label><br>
    <input type="text" name="name"><br><br>

    <label>Code hexadécimal :</label><br>
    <input type="text" name="hexa"><br><br>

    <button type="submit">Envoyer</button>

</form>


</body>